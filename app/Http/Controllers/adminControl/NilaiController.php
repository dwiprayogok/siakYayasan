<?php

namespace App\Http\Controllers\adminControl;

use App\Http\Controllers\Controller;
use App\Models\kelas;
use App\Models\Siswa;
use App\Models\nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class NilaiController extends Controller
{
   

    public function index(Request $request)
    {
        $query = Siswa::with('kelas.jadwalpelajaran.guru', 'kelas.jadwalpelajaran.matapelajaran',  'nilai.matapelajaran');
                
        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                ->orWhere('nis', 'LIKE', "%{$search}%");
            });
        }
        // Kelas filter
        elseif ($request->filled('kode_kelas')) {
            $kelas = $request->input('kode_kelas');
            $query->where('kode_kelas', $kelas);
        }

        $kelass = Kelas::all();
        $siswas = $query->orderBy('id', 'asc')->paginate(10);

        return view('/admin/views/nilai', compact('siswas'));
    }

  
}
