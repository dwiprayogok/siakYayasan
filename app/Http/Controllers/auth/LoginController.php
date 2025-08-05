<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    
    public function showLoginForm()
    {
        if (Auth::check()) 
        {
        //return redirect('home');
        return view('auth.login');
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

        return back()->withInput()->with('error', 'User Tidak Ditemukan');

    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function actionResetPassword() { 

       if (Auth::check()) {
        $user = Auth::user(); 
        return view('layout.masterResetPassword', [
            'email' => $user->email,
            'userid' => $user->id
        ]);
    }

    // If not logged in, you might redirect to login
    return redirect()->route('login')->with('error', 'Please login first.');

    }

}
