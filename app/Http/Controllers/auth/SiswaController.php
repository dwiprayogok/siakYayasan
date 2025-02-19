<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    
 

    public function index(Request $request)
    {
        //
        $query = siswa::query();

        // Search by name or email
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%$search%");
        }

        $siswas = $query->orderBy('id', 'asc')->paginate(10);

        return view('siswa', compact('siswas'));
    }

  
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nis' => 'required',
            'gender' => 'required',
            'class' => 'required',
        ]);

        // Create and store the user
        $user = siswa::create([
            'name' => $request->name,
            'nis' => $request->email,
            'gender' => $request->username,
            'class' => $request->class,
        ]);

        //return response()->json(['message' => 'User created successfully!', 'user' => $user]);
        return redirect()->route('siswa')->with('success', 'User added successfully!');

    }

   
    public function show(string $id)
    {
        $s = siswa::find($id);
        if (!$s) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($s);
    }

   
    public function edit(string $id)
    {
        //
        $user = siswa::findOrFail($id);
        return view('siswa.edit', compact('siswas'));
    }


    public function update(Request $request,string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nis' => 'required',
            'gender' => 'required',
            'class' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$id) {
            return response()->json(['error' => 'User ID is missing'], 400);
        }
    
        // Find the user or return a 404 error
        $user = siswa::find($id);
        
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        $user->update([
        'id_student'        => $request->id,
        'name'              => $request->name,
        'nis'               => $request->nis,
        'gender'            => $request->gender,
        'class'             => $request->class,
        'name_of_parent'    => $request->name_of_parent
        ]);

        return response()->json(['success' => 'User updated successfully!']);
    }

    public function destroy(string $id)
    {
        $user = siswa::find($id);
        $user->delete();

        return response()->json(['success' => 'User deleted successfully']);
        
    }
}
