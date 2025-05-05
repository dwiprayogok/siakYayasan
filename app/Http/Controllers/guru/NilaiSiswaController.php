<?php

namespace App\Http\Controllers\guru;


use App\Http\Controllers\Controller;
use App\Models\kelas;
use App\Models\Siswa;
use App\Models\guru;
use App\Models\matapelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;




class NilaiSiswaController extends Controller
{
    public function index(Request $request)
    {

        //$query = Siswa::query();
        $query = Siswa::with('kelas.jadwalpelajaran.guru', 'kelas.jadwalpelajaran.matapelajaran');


        $nip =Auth::user()->guru->nip ; // Get the logged-in user
                
        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                ->orWhere('nis', 'LIKE', "%{$search}%");
            });
        }
        // Kelas filter
        elseif ($request->filled('kelas')) {
            $kelas = $request->input('kelas');
            $query->where('kelas_id', $kelas);
        }

        $kelass = Kelas::all();
        $siswas = $query->orderBy('id', 'asc')->paginate(10);

        return view('/guru/views/nilaisiswa', compact('siswas', 'kelass'));


    }





}