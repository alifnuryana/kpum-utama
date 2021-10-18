<?php


namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register', [
            'active' => 'register',
            'majors' => Major::with('faculty')->get(),
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
            'password' => 'required|min:8',
        ]);
        $attributes['password'] = Hash::make($attributes['password']);
        $attributes['ukm'] = collect(request()->ukm)->implode('_');
        Student::create($attributes);
        return redirect(route('login'))->with('success', 'berhasil.');
    }
}
