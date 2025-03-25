<?php

namespace App\Http\Controllers\adminControl;

use App\Http\Controllers\Controller;
use App\Models\guru;
use App\Models\matapelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MataPelajaranController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        $query = matapelajaran::query();

        // Search by name or email
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name_mapel', 'LIKE', "%$search%");
        }

        $matapelajarans = $query->orderBy('id', 'asc')->paginate(10);
        $gurus = guru::all(); // Fetch all Gurus
        //$matapelajarans = matapelajaran::with('guru')->get(); // Load Guru relationship

        return view('/admin/views/matapelajaran', compact('matapelajarans', 'gurus'));

    }

    
  
    public function create()
    {
    }
  
    public function store(Request $request)
    {
    
        $validator = Validator::make($request->all(), [
            'kode_mapel' => 'required',
            'nama_mapel' => 'required'           
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $matapelajarans = matapelajaran::create([
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel,
            'kode_guru' =>  $request->input('kode_guru'),
        ]);

        return redirect()->route('matapelajaran')->with('success', 'User added successfully!');

    }

   
    public function show(string $id)
    {
        $matapelajarans = matapelajaran::find($id);
        if (!$matapelajarans) {
            return response()->json(['error' => 'Mata Pelajaran not found'], 404);
        }

        return response()->json($matapelajarans);
    }

   
    public function edit(string $id)
    {
        
        $matapelajarans = matapelajaran::findOrFail($id);
        return view('matapelajaran.edit', compact('users'));
    }


    public function update(Request $request,string $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
            'kode_guru' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$id) {
            return response()->json(['error' => 'ID is missing'], 400);
        }
    
        // Find the user or return a 404 error
        $matapelajarans = matapelajaran::find($id);
        
        if (!$matapelajarans) {
            return response()->json(['error' => 'mapel not found'], 404);
        }
        $matapelajarans->update([
            'id'                => $request->id,
            'kode_mapel'        => $request->kode_mapel,
            'nama_mapel'        => $request->nama_mapel,
            'kode_guru'         =>  $request->input('kode_guru')
        ]);

        return response()->json(['success' => 'Mata Pelajaran updated successfully!']);
    }

    public function destroy(string $id)
    {
        $matapelajarans = matapelajaran::find($id);
        $matapelajarans->delete();

        return response()->json(['success' => 'Mata Pelajaran deleted successfully']);
        
    }

    // public function showSubjects()
    // {
    //     // Fetch subjects with teacher details
    //     $matapelajarans = matapelajaran::with('guru')->get();

    //     return view('/admin/views/matapelajaran', compact('matapelajarans'));
    // }
    
}
