<?php
namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller 
{
    public function showAdminLogin()
    {
        return view('admin.loginAdmin');
    }

    public function showGuruLogin()
    {
        return view('guru.loginGuru');
    }

    public function showSiswaLogin()
    {
        return view('siswa.loginSiswa');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid admin credentials']);
    }

    public function guruLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'guru']))) {
            return redirect()->route('guru.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid guest credentials']);
    }

    public function siswaLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'siswa']))) {
            return redirect()->route('siswa.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid guest credentials']);
    }

    public function actionlogoutAdmin()
    {
        Auth::logout();
        return redirect('/admin/loginAdmin');
    }


    public function actionlogoutGuru()
    {
        Auth::logout();
        return redirect('/guru/loginGuru');
    }

    public function actionlogoutSiswa()
    {
        Auth::logout();
        return redirect('/siswa/loginSiswa');
    }

}