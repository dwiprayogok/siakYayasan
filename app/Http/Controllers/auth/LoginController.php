<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    
    public function showLoginForm()
    {
        if (Auth::check()) 
        {
        return redirect('home');
        } 
        else 
        {
        return view('auth.login');

        }
    }

    public function actionlogin(Request $request)
    {
       
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $loginType => $request->login,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirect based on role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'guru') {
                return redirect()->route('guru.dashboard');
            } else {
                return redirect()->route('siswa.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
