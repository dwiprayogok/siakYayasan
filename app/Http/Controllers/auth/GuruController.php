<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;



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
                  ->orWhere('nip', 'LIKE', "%$search%");
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
            'kode_guru' => 'required',
            'name' => 'required',
            'nip' => 'required',
            'sk' => 'required',
            'tanggal_lahir' => 'required',
            'role' => 'required',
            'education' => 'required',
            
        ]);

        $formattedDate = Carbon::createFromFormat('m/d/Y', $request->tanggal_lahir)->format('Y-m-d');


        // Create and store the user
        $gurus = guru::create([
            'kode_guru' => $request->kode_guru,
            'name' => $request->name,
            'nip' => $request->nip,
            'sk' => $request->sk,
            'tanggal_lahir' => $formattedDate,
            'role' => $request->role,
            'walas' => $request->input('walas', '-'),
            'education' => $request->input('education'),
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
