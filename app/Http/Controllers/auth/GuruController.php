<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class GuruController extends Controller
{
    //
    public function index(Request $request)
    {
        //

        $query = guru::query();

        // Search by name or email
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%$search%")
                  ->orWhere('kode_guru', 'LIKE', "%$search%");
        }

        //$gurus = $query->paginate(10); // Paginate results
        $gurus = $query->orderBy('id', 'asc')->paginate(10);

        
        return view('guru', compact('gurus'));
    }

  
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'role' => 'required|string|max:10',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        // Create and store the user
        $gurus = guru::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'role' => $request->input('role'),
            'password' => bcrypt($request->password),
            'active' => $request->input('active'),
        ]);

        return redirect()->route('guru')->with('success', 'User added successfully!');
    }

   
    public function show(string $id)
    {
        $gurus = guru::find($id);
        if (!$gurus) {
            return response()->json(['error' => 'Guru not found'], 404);
        }

        return response()->json($gurus);
    }

   
    public function edit(string $id)
    {
        //
        $gurus = guru::findOrFail($id);
        return view('guru.edit', compact('gurus'));
     
    }


    public function update(Request $request,string $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_guru' => 'required',
            'name' => 'required',
            'nip' => 'required',
            'role' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$id) {
            return response()->json(['error' => 'User ID is missing'], 400);
        }
    
        // Find the user or return a 404 error
        $gurus = guru::find($id);
        
        if (!$gurus) {
            return response()->json(['error' => 'User not found'], 404);
        }
        $gurus->update([
            'kode_guru'     => $request->kode_guru,
            'name'          => $request->name,
            'nip'           => $request->nip,
            'role'          => $request->role,
            'education'     => $request->input('ediucation'),
        ]);

        return response()->json(['success' => 'User updated successfully!']);
    }

    public function destroy(string $id)
    {
        $g = guru::find($id);
        $g->delete();

        return response()->json(['success' => 'User deleted successfully']);
        
    }
}
