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
        $gurus = Guru::all(); // Fetch all Gurus
        return view('/admin/views/matapelajaran', compact('matapelajarans', 'gurus'));

    }

  
    public function create()
    {
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
            'kode_guru' => 'required',
        ]);

        $matapelajarans = matapelajaran::create([
            'id' => $request->name,
            'kode_mapel' => $request->email,
            'nama_mapel' => $request->username,
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
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
            'email' => 'required',
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
            'kode_mapel'        => $request->name,
            'nama_mapel'        => $request->username,
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
    
}
