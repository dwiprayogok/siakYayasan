<?php

namespace App\Http\Controllers\guru;


use App\Http\Controllers\Controller;
use App\Models\kelas;
use App\Models\Siswa;
use App\Models\nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;




class NilaiSiswaController extends Controller
{
    public function index(Request $request)
    {

        $query = Siswa::with('kelas.jadwalpelajaran.guru', 'kelas.jadwalpelajaran.matapelajaran',  'nilai.matapelajaran');
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
        elseif ($request->filled('kode_kelas')) {
            $kelas = $request->input('kode_kelas');
            $query->where('kode_kelas', $kelas);
        }

        $kelass = Kelas::all();
        $siswas = $query->orderBy('id', 'asc')->paginate(10);

        return view('/guru/views/NilaiSiswa', compact('siswas', 'kelass'));


    }


    public function store(Request $request)
    {
        $request->validate([
            'id_student'     => 'required',
            'kode_mapel'     => 'required',
            'nilai'          => 'required',
            'nameofstudent'  => 'required',
            'kode_kelas'     => 'required',
        ]);
    
        $currentDate = Carbon::now();
    
        // $nilai = nilai::create([
        //     'id_student'     => $request->id_student,
        //     'kode_mapel'     => $request->kode_mapel,
        //     'nilai'          => $request->nilai,
        //     'tanggal'        => $currentDate,
        //     'nameofstudent'  => $request->nameofstudent,
        //     'kode_kelas'     => $request->kode_kelas,
        // ]);


    //     // Upsert: update if exists, else create
    //         $nilai = nilai::updateOrCreate(
    //             [ // Search condition
    //                 'id_student' => $request->id_student,
    //                 'kode_mapel' => $request->kode_mapel,
    //             ],
    //             [ // Data to insert or update
    //                 'nilai'          => $request->nilai,
    //                 'tanggal'        => $currentDate,
    //                 'nameofstudent'  => $request->nameofstudent,
    //                 'kode_kelas'     => $request->kode_kelas,
    //             ]
    // );


    $existing = nilai::where('id_student', $request->id_student)
                 ->where('kode_mapel', $request->kode_mapel)
                 ->first();

        if ($existing) {
            // Manually update
            $existing->update([
                'nilai'         => $request->nilai,
                'kode_kelas'    => $request->kode_kelas,
            ]);
        } else {
            // Create new
            nilai::create([
                'id_student'    => $request->id_student,
                'kode_mapel'    => $request->kode_mapel,
                'nilai'         => $request->nilai,
                'tanggal'       => $currentDate,
                'nameofstudent' => $request->nameofstudent,
                'kode_kelas'    => $request->kode_kelas,
            ]);
        }
            
        //return response()->json(['success' => 'Nilai Siswa added successfully!']);
        return redirect()->route('guru.inputnilai')->with('success', 'Nilai Siswa added successfully!');

    }



}