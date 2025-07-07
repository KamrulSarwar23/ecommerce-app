<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class SSOAuthController extends Controller
{
    public function SSOLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            $payload = [
                'id' => $user->id,
                'email' => $user->email,
                'expires_at' => now()->addMinutes(5)->timestamp,
            ];

            $token = Crypt::encryptString(json_encode($payload));

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    public function dashboard()
    {

        $user = Auth::user();

        $payload = [
            'id' => $user->id,
            'email' => $user->email,
            'expires_at' => now()->addMinutes(5)->timestamp,
        ];

        $token = Crypt::encryptString(json_encode($payload));

        return view('dashboard', ['token' => $token]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('https://foodpanda-app.iconicsolutionsbd.com/sso-logout');
    }
}
