<?php

namespace App\Http\Controllers\siswa;


use App\Http\Controllers\Controller;
use App\Models\guru;
use App\Models\Siswa;
use App\Models\kelas;
use App\Models\matapelajaran;


class SiswaDashboardController extends Controller
{
    public function index()
    {

        $guru = guru::count();
        $siswa = Siswa::count();
        $matapelajaran = matapelajaran::count();
    
        return view('siswa.dashboard.dashboard', compact('guru', 'siswa','matapelajaran'));

        //return view('siswa.dashboard.dashboard');
    }
}