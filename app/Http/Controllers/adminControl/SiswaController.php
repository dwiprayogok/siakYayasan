<?php

namespace App\Http\Controllers\adminControl;

use App\Http\Controllers\Controller;
use App\Models\kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class SiswaController extends Controller
{
    
    public function index(Request $request)
    {
        //
        $query = Siswa::query();

        // If search is filled, filter by name or NIS
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('nis', 'LIKE', "%{$search}%");
            });
        }
        elseif ($request->filled('kelas')) {
            $kelas = $request->input('kelas');
            $query->where('kelas_id', $kelas); // kelas_id holds the value like "VIII1"
        }
        
        $kelass = Kelas::all();
        $siswas = $query->orderBy('id', 'asc')->paginate(10);
        
        return view('/admin/views/siswa', compact('siswas', 'kelass'));
    }

    public function store(Request $request)
    {
        

        $validator = Validator::make($request->all(), [
            'id_student' => 'required',
            'nis' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'class_id' => 'required',
            'address' => 'required',
            'born_place' => 'required',
            'birth_date' => 'required|date_format:m/d/Y',
            'name_of_parent' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $formattedDate = Carbon::createFromFormat('m/d/Y', $request->birth_date)->format('Y-m-d');

        // Create and store the user
        $siswas = Siswa::create([
            'id_student' => $request->id_student,
            'nis' => $request->nis,
            'name' => $request->name,
            'gender' => $request->input('gender'),
            'kelas_id' => $request->input('class_id'),
            'address' => $request->address,
            'phone' => $request->phone,
            'born_place' => $request->born_place,
            'birth_date' => $formattedDate, // Store formatted date
            'name_of_parent' => $request->name_of_parent,
            
        ]);

        //return response()->json(['message' => 'User created successfully!', 'siswa' => $siswa]);
        return redirect()->route('siswa')->with('success', 'Data Siswa added successfully!');


    }

   
    public function show(string $id)
    {
        $siswas = Siswa::find($id);
        if (!$siswas) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($siswas);
    }

   
    public function edit(string $id)
    {
        //
        $user = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswas'));
    }


    public function update(Request $request,string $id)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'kelas_id' => 'required',
            'address' => 'required',
            'born_place' => 'required',
            'birth_date' => 'required',
            'name_of_parent' => 'required',
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
            'nis' => $request->nis,
            'name' => $request->name,
            'gender' => $request->gender,
            'kelas_id' => $request->kelas_id,
            'address' => $request->address,
            'phone' => $request->phone,
            'born_place' => $request->born_place,
            'birth_date' => $request->birth_date,
            'name_of_parent' => $request->name_of_parent,
        ]);

        return response()->json(['success' => 'User updated successfully!']);
    }

    public function destroy(string $id)
    {
        $siswas = Siswa::find($id);
        $siswas->delete();

        return response()->json(['success' => 'User deleted successfully']);
        
    }
}
