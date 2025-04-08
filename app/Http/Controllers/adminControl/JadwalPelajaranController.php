<?php

namespace App\Http\Controllers\adminControl;

use App\Http\Controllers\Controller;
use App\Models\jadwalpelajaran;
use Illuminate\Http\Request;
use App\Models\guru;
use App\Models\matapelajaran;
use Illuminate\Support\Facades\Validator;


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
                  ->orWhere('kode_mapel', 'LIKE', "%{$search}%");
            });
        }

        $jadwalpelajarans = $query->orderBy('id', 'asc')->paginate(10);
        $gurus = guru::all(); // Fetch all Gurus
        $matapelajarans = matapelajaran::all(); // Fetch all Gurus

        return view('/admin/views/jadwalpelajaran', compact('jadwalpelajarans', 'gurus','matapelajarans'));
    }

  
    public function create()
    {
        //
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

   
    public function edit(string $id)
    {
        //
        $jadwalpelajarans = jadwalpelajaran::findOrFail($id);
        return view('jadwalpelajaran.edit', compact('users'));
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
    
}
