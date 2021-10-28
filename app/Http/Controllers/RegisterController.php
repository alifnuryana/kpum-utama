<?php


namespace App\Http\Controllers;

use App\Models\Major;
use App\Mail\SendMail;
use App\Models\Student;
use App\Models\Pengaturan;
use Illuminate\Support\Str;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register', [
            'active' => 'register',
            'majors' => Major::with('faculty')->get(),
            'organizations' => Organization::get(),
            'config' => Pengaturan::get(),
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'npm' => 'required|min:10|unique:students,npm',
            'name' => 'required|min:7',
            'ukm' => '',
            'major_id' => 'required',
            'email' => 'required|email|unique:students,email|ends_with
            :@widyatama.ac.id',
        ]);
        $password = Str::random(5);
        $attributes['password'] = Hash::make($password);
        $attributes['ukm'] = collect(request()->ukm)->implode('_');
        $maildata = [
            'title' => "Komisi Pemilihan Umum Mahasiswa",
            'password' => $password,
        ];
        Mail::to($attributes['email'])->send(new SendMail($maildata));
        Student::create($attributes);
        return redirect(route('login'))->with('success', 'berhasil.');
    }
}
