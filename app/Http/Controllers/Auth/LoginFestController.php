<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginFestController extends Controller
{
    public function showLoginForm()
    {
        return view('loginfestify');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Debug: Cetak informasi untuk memastikan login berhasil
            \Log::info('Login berhasil: ' . Auth::user()->username);
            
            return redirect()->intended('dashboardfest');
        }

        // Debug: Cetak informasi untuk login gagal
        \Log::info('Login gagal dengan kredensial: ' . json_encode($credentials));
        
        return back()->withErrors([
            'username' => 'Kredensial yang diberikan tidak cocok dengan data kami.',
        ])->withInput($request->except('password'));
    }
}