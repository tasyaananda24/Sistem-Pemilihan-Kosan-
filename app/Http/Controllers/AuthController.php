<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

   public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('pemilik.dashboard');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah',
    ]);
}


    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'nama_kosan' => 'required|string|max:255',
            'alamat_kosan' => 'required|string|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pemilik',
            'nama_kosan' => $request->nama_kosan,
            'alamat_kosan' => $request->alamat_kosan,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login!');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
