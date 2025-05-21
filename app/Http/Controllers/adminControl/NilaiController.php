<?php

namespace App\Http\Controllers\adminControl;

use App\Http\Controllers\Controller;
use App\Models\kelas;
use App\Models\Siswa;
use App\Models\nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


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
        elseif ($request->filled('kelas')) {
            $kelas = $request->input('kelas');
            $query->where('kode_kelas', $kelas);
        }

        $kelass = Kelas::all();
        $siswas = $query->orderBy('id', 'asc')->paginate(10);

        return view('/admin/views/nilai', compact('siswas', 'kelass'));
    }


    // public function printPdf()
    // {
        
    //     $siswas = Siswa::with('kelas.jadwalpelajaran.guru', 'kelas.jadwalpelajaran.matapelajaran',  'nilai.matapelajaran');


    //     $pdf = Pdf::loadView('/admin/views/downloadPDF/NilaiPDF', compact('siswas'))
    //             ->setPaper('A4', 'portrait');

    //     return $pdf->download('daftar-users.pdf');
    // }
 
    

    public function NilaiSiswaPrintPdf(Request $request)
    {
        $id_student = $request->input('id_student');
        $siswas = Siswa::findOrFail($id_student);

        $pdf = Pdf::loadView('admin.views.detailPDF.DetailNilaiSiswaPDF', compact('siswas'))
            ->setPaper('A4', 'portrait');

        return $pdf->download('siswa-details-' . $siswas->id . '.pdf');
    }

}
