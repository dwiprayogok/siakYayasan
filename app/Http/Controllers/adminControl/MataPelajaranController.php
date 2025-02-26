<?php

namespace App\Http\Controllers\adminControl;

use App\Http\Controllers\Controller;
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

        $gurus = $query->orderBy('id', 'asc')->paginate(10);

        return view('/admin/views/matapelajaran', compact('matapelajarans'));
    }

  
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
        ]);

        // Create and store the user
        $matapelajarans = matapelajaran::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'role' => $request->input('role'),
            'password' => bcrypt($request->password),
        ]);

        //return response()->json(['message' => 'User created successfully!', 'user' => $user]);
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
        //
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
            'kode_guru'         =>  $request->input('role')
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
