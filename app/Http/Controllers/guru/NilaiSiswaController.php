<?php

namespace App\Http\Controllers\guru;


use App\Http\Controllers\Controller;
use App\Models\kelas;
use App\Models\Siswa;
use App\Models\matapelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;




class NilaiSiswaController extends Controller
{
    public function index(Request $request)
    {

        $query = Siswa::query();

        // If search is filled, filter by name or NIS
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('nis', 'LIKE', "%{$search}%");
            });
        }
        elseif ($request->filled('kelas')) {
            $kelas = $request->input('kelas');
            $query->where('kelas_id', $kelas); // kelas_id holds the value like "VIII1"
        }
        

        $kelass = Kelas::all();
        $matapelajarans = matapelajaran::all(); // Fetch all Gurus
        $siswas = Kelas::all();
        $siswas = $query->orderBy('id', 'asc')->paginate(10);
        //return view('guru.views.nilaisiswa');
        return view('/guru/views/nilaisiswa', compact('siswas', 'kelass','matapelajarans'));


    }
}