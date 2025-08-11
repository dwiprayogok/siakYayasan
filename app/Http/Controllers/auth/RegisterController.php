<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Siswa;
use App\Models\guru;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Mail\RegistrationConfirmation;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    
    public function actionregister(Request $request)
    {
        $adminCount = User::where('role', 'admin')->count();

        if ($request->input('role') === 'admin' && $adminCount >= 3) {
            Session::flash('message', 'Jumlah admin maksimum telah tercapai.');
            return redirect('/auth/register');
   
        }

        DB::transaction(function () use ($request) {
            // 👤 Create User
            $user = new User();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->input('role');
            $user->active = '1';
            $user->save();
    
            // 🎓 Conditionally insert into siswas or gurus table
            if ( $request->input('role') === 'siswa') {
                $siswas = new Siswa();
                $siswas->id = $user->id;
                $siswas->name = $user->name;
                $siswas->nis = $request->nis;
                $siswas->id_student = $request->nis;
                $siswas->email = $user->email;
                $siswas->save();
            } elseif ( $request->input('role') === 'guru') {
                $gurus = new guru();
                $gurus->id = $user->id;
                $gurus->name = $user->name;
                $gurus->kode_guru = $request->nip;
                $gurus->nip = $request->nip;
                $gurus->email = $user->email;
                $gurus->save();
            }
            
            Mail::to($user->email)->send(new RegistrationConfirmation($user, $request->password));

        });

          // Send confirmation email
    
         Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
         return redirect('/auth/register');

    }
}
