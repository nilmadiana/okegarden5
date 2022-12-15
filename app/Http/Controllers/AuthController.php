<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->level == 'gardener') {
                return redirect()->intended('gardener');
            } elseif ($user->level == 'designer') {
                return redirect()->intended('designer');
            } elseif ($user->level == 'user') {
                return redirect()->intended('user');
        }
    }
        return view('login');
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]);

        $kredensil = $request->only('username','password');

            if (Auth::attempt($kredensil)) {
                $user = Auth::user();
                if ($user->level == 'gardener') {
                    return redirect()->intended('gardener');
                } elseif ($user->level == 'designer') {
                    return redirect()->intended('designer');
                } elseif ($user->level == 'user') {
                    return redirect()->intended('user');
            }
                return redirect()->intended('/');
            }

        return redirect('login')
                                ->withInput()
                                ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }

    // public function logout(Request $request)
    // {
    //    $request->session()->flush();
    //    Auth::logout();
    //    return Redirect('login');
    // }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}