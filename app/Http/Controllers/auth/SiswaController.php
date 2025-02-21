<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
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

        // Search by name or email
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%$search%");
        }

        $siswas = $query->orderBy('name', 'asc')->paginate(10);

        return view('siswa', compact('siswas'));
    }

  
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        

        $validator = Validator::make($request->all(), [
            'id_student' => 'required',
            'nis' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'class' => 'required',
            'address' => 'required',
            'phone' => 'required',
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
            'class' => $request->class,
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
            'class' => 'required',
            'address' => 'required',
            'phone' => 'required',
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
            'class' => $request->class,
            'address' => $request->address,
            'phone' => $request->phone,
            'born_place' => $request->born_place,
            'birth_date' => $request->birth_date,
            'name_of_parent' => $request->name_of_parent,
        ]);

        return response()->json(['success' => 'User updated successfully!']);
    }

    public function destroy(string $id_student)
    {
        $siswas = Siswa::find($id_student);
        $siswas->delete();

        return response()->json(['success' => 'User deleted successfully']);
        
    }
}
