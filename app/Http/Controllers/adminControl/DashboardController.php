<?php

namespace App\Http\Controllers\adminControl;


use App\Http\Controllers\Controller;
use App\Models\guru;
use App\Models\Siswa;
use App\Models\kelas;
use App\Models\matapelajaran;


class DashboardController extends Controller
{
    public function index()
    {

        $guru = guru::count();
        $siswa = Siswa::count();
        $matapelajaran = matapelajaran::count();
    
        return view('admin.dashboard.dashboardAdmin', compact('guru', 'siswa','matapelajaran'));

    }
}