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


    public function printNIlaiPdf(Request $request)
    {
        
        $query = Siswa::with('kelas.jadwalpelajaran.guru', 'kelas.jadwalpelajaran.matapelajaran',  'nilai.matapelajaran');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('nis', 'like', "%{$search}%");
            });
        }
    
        if ($request->filled('kelas')) {
            $kelas = $request->input('kelas');
            $query->where('kode_kelas', $kelas);
        }

        $siswas = $query->get();


        $pdf = Pdf::loadView('admin.views.downloadPDF.NilaiPDF', compact('siswas'))
                ->setPaper('A4', 'landscape');

        return $pdf->download('daftar-nilai.pdf');
    }
 
    

    public function NilaiSiswaPrintPdf(Request $request)
    {
        $id_student = $request->input('id_student'); // ✅ No trailing space

        $siswas = Siswa::with(['nilai.matapelajaran']) // ✅ Uses 'nilai' as defined in the model
            ->where('id_student', $id_student)         // ✅ No space in column name
            ->firstOrFail();


        $pdf = Pdf::loadView('admin.views.detailPDF.DetailNilaiSiswaPDF', compact('siswas'))
            ->setPaper('A4', 'portrait');

        return $pdf->download('Nilai_Siswa' . $siswas->name . '.pdf');

    }

}
