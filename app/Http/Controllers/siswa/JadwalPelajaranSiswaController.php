<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class JadwalPelajaranSiswaController extends Controller
{
   
    public function index()
    {
        
        $name = Auth::user()->name;

        $data = DB::table('jadwalpelajarans')
        ->join('siswas', 'jadwalpelajarans.kelas', '=', 'siswas.kelas_id')
        ->join('users', 'siswas.name', '=', 'users.name')
        ->join('matapelajarans', 'jadwalpelajarans.kode_mapel', '=', 'matapelajarans.kode')
        ->join('gurus', 'jadwalpelajarans.kode_guru', '=', 'gurus.kode')
        ->select(
            'jadwalpelajarans.hari',
            'jadwalpelajarans.start_time',
            'jadwalpelajarans.end_time',
            'matapelajarans.nama as matapelajaran',
            'jadwalpelajarans.kelas',
            'gurus.name as Nama_Guru'
        )
        ->where('users.name', $name)
        ->get();

        return view('/siswa/views/jadwalpelajaransiswa', compact('data', 'name'));
    }

  
}
