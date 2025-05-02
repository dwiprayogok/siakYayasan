<?php

namespace App\Http\Controllers\adminControl;

use App\Http\Controllers\Controller;
use App\Models\jadwalpelajaran;
use Illuminate\Http\Request;
use App\Models\guru;
use App\Models\kelas;
use App\Models\matapelajaran;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;


class JadwalPelajaranController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        $query = jadwalpelajaran::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('kelas', 'LIKE', "%{$search}%")
                  ->orWhere('hari', 'LIKE', "%{$search}%")
                  ->orWhere('kode_mapel', 'LIKE', "%{$search}%");
            });
        }elseif ($request->filled('kelas')) {
            $kelas = $request->input('kelas');
            $query->where('kelas', $kelas); // kelas_id holds the value like "VIII1"
        }
        

        $jadwalpelajarans = $query
        ->orderBy('start_time', 'asc')
        ->orderBy('kelas', 'asc')
        ->paginate(11);

        //$jadwalPelajarans = JadwalPelajaran::with(['guru', 'matapelajaran'])->paginate(10);

        $gurus = guru::all(); // Fetch all Gurus
        $kelass = Kelas::all();
        $matapelajarans = matapelajaran::all(); // Fetch all Gurus

        return view('/admin/views/jadwal', compact('jadwalpelajarans', 'gurus','matapelajarans','kelass'));

    }

    public function store(Request $request)
    {

        
        $validator = Validator::make($request->all(), [
            'hari' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'kelas' => 'required',
            'kode_guru' => 'required',
            'kode_mapel' => 'required',
           
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create and store the user
        $jadwalpelajarans = jadwalpelajaran::create([
            'hari'          => $request->hari,
            'start_time'    => $request->start_time,
            'end_time'      => $request->end_time,
            'kelas'         => $request->input('kelas'),
            'kode_guru'     => $request->input('kode_guru'),
            'nama_guru'     => $request->input('name'),
            'kode_mapel'    => $request->input('kode_mapel'),
            'nama_mapel'    => $request->input('nama_mapel'),
        ]);

        //return response()->json(['message' => 'User created successfully!', 'user' => $user]);
        return redirect()->route('jadwalpelajaran')->with('success', 'Jadwal Pelajaran added successfully!');

    }

   
    public function show(string $id)
    {
        $jadwalpelajarans = jadwalpelajaran::find($id);
        if (!$jadwalpelajarans) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($jadwalpelajarans);
    }

   

    public function update(Request $request,string $id)
    {
        $validator = Validator::make($request->all(), [
            'hari' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'kelas' => 'required',
            'kode_guru' => 'required',
            'kode_mapel' => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$id) {
            return response()->json(['error' => 'User ID is missing'], 400);
        }
    
        // Find the user or return a 404 error
        $jadwalpelajarans = jadwalpelajaran::find($id);
        
        if (!$jadwalpelajarans) {
            return response()->json(['error' => 'User not found'], 404);
        }
        $jadwalpelajarans->update([
            'hari'          => $request->hari,
            'start_time'    => $request->start_time,
            'end_time'      => $request->end_time,
            'kelas'         => $request->input('kelas'),
            'kode_guru'     => $request->input('kode_guru'),
            'nama_guru'     => $request->input('name'),
            'kode_mapel'    => $request->input('kode_mapel'),
            'nama_mapel'    => $request->input('nama_mapel'),
        ]);

        return response()->json(['success' => 'User updated successfully!']);
    }

    public function destroy(string $id)
    {
        $jadwalpelajarans = jadwalpelajaran::find($id);
        $jadwalpelajarans->delete();

        return response()->json(['success' => 'User deleted successfully']);
        
    }

    
    public function printPdf()
    {

        $jadwalpelajarans = jadwalpelajaran::with(['guru', 'matapelajaran'])->get();


        $pdf = Pdf::loadView('/admin/views/downloadPDF/jadwalpelajaranPDF', compact('jadwalpelajarans'))
                ->setPaper('A4', 'portrait');

        return $pdf->download('daftar-jadwalpelajaran.pdf');
    }
    
}
