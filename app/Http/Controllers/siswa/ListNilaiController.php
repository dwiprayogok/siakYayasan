<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use App\Models\nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class ListNilaiController extends Controller
{
   
    public function index(Request $request)
    {
        
       // Ambil id_student dari user yang login
    $id_student = Auth::user()->siswa->id_student;

    // Query nilai dengan eager loading
    $query = Nilai::with(
        'kelas.jadwalpelajaran.guru', 
        'kelas.jadwalpelajaran.matapelajaran',  
        'matapelajaran', 
        'siswa'
    );

    // Filter berdasarkan id_student yang sedang login
    $query->where('id_student', $id_student);

   

    // Ambil hasil dengan pagination
    $nilai = $query->orderBy('id', 'asc')->paginate(10);

    return view('/siswa/views/ListNilai', compact('nilai'));

    }

  
}
