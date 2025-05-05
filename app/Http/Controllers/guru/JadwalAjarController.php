<?php

namespace App\Http\Controllers\guru;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class JadwalAjarController extends Controller
{
    public function index()
    {
        $nip =Auth::user()->guru->nip ; 

        $jadwal = DB::table('jadwalpelajarans')
            ->join('gurus', 'jadwalpelajarans.kode_guru', '=', 'gurus.kode')
            ->join('matapelajarans', 'jadwalpelajarans.kode_mapel', '=', 'matapelajarans.kode_mapel')
            ->select(
                'jadwalpelajarans.id',
                'jadwalpelajarans.hari',
                'jadwalpelajarans.start_time',
                'jadwalpelajarans.end_time',
                'jadwalpelajarans.kode_kelas',
                'gurus.nip as NIP',
                'gurus.name as Nama_Guru',
                'matapelajarans.nama as Nama_Mapel'
            )
            ->where('gurus.nip', $nip)
            ->get();

            

        return view('/guru/views/JadwalAjar', compact('jadwal', 'nip'));


    }
}