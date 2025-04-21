<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\kelas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;





class ProfileSiswaController extends Controller
{
   
    public function index()
    {
       

        $name = Auth::user()->name;
        
        $data = DB::table('users')
        ->join('siswas', 'users.id', '=', 'siswas.id')
        ->where('users.name', $name)
        ->select('users.*', 'siswas.*') // get all fields if needed
        ->first(); // or ->get() if expecting multiple rows
        //dd($data);

        $kelass = Kelas::all();
        return view('/siswa/views/profilesiswa', compact('data', 'name','kelass'));


    }


    public function update(Request $request, string $id)
{

    Log::info('Request masuk:', $request->all());

    $validator = Validator::make($request->all(), [
        'nis' => 'required',
        'name' => 'required',
        'email' => 'required',
        'gender' => 'required',
        'kelas_id' => 'required',
        'born_place' => 'required',
        'birth_date' => 'required',
        'phone' => 'required',
        'name_of_parent' => 'required',
        'address' => 'required',

    ]);

    //check if validation fails
     if ($validator->fails()) {
        Log::error('Validation Failed:', $validator->errors()->toArray());
        return response()->json($validator->errors(), 422);
    }

    if (!$id) {
        return response()->json(['error' => 'User ID is missing'], 400);
    }

    // Find the siswa or return a 404 error
    $siswas = siswa::find($id);
    
    if (!$siswas) {
        return response()->json(['error' => 'User not found'], 404);
    }
    $siswas->update([
        'nis' => $request->nis,
        'name' => $request->name,
        'email' => $request->email,
        'gender' => $request->gender,
        'kelas_id' => $request->kelas_id,
        'born_place' => $request->born_place,
        'birth_date' => $request->birth_date,
        'phone' => $request->phone,
        'name_of_parent' => $request->name_of_parent,
        'address' => $request->address,

    ]);

    $user = User::find($id); // or auth()->user();

    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }
    
    $request->validate([
        'name'  => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
    ]);
    
    $user->update([
        'name'  => $request->name,
        'email' => $request->email,
    ]);
    

    return response()->json(['success' => 'Profile updated successfully.']);
}

  
}
