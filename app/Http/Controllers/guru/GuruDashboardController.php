<?php

namespace App\Http\Controllers\guru;


use App\Http\Controllers\Controller;
use App\Models\guru;
use App\Models\Siswa;
use App\Models\kelas;
use App\Models\matapelajaran;


class GuruDashboardController extends Controller
{
    public function index()
    {

        $guru = guru::count();
        $siswa = Siswa::count();
        $matapelajaran = matapelajaran::count();
        $kelass = kelas::count();

    
        return view('guru.dashboard.dashboard', compact('guru', 'siswa','matapelajaran','kelass'));

    }
}