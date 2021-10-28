<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function create()
    {
        return view('auth.login', [
            'active' => 'login',
            'config' => Pengaturan::get(),
        ]);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|ends_with
            :@widyatama.ac.id',
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->is_admin) {
                return redirect()->intended(route('dashboard.admin'));
            }
            return redirect()->intended(route('dashboard.home'));
        }

        return back()
            ->withInput()
            ->withErrors(['email' => 'Informasi data yang ada masukan tidak sesuai.']);

    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('home'));
    }
}
