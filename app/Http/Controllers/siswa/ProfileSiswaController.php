<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;



class ProfileSiswaController extends Controller
{
   
    public function index()
    {
       

        $name = Auth::user()->name;
        
        $data = DB::table('users')
        ->join('siswas', 'users.name', '=', 'siswas.name')
        ->where('users.name', $name)
        ->select('users.*', 'siswas.*') // get all fields if needed
        ->first(); // or ->get() if expecting multiple rows



        //dd($data);

        // +"id": 1
        // +"name": "Ahmad Muhajir"
        // +"username": "AhmadM"
        // +"email": "AhmadM@gmail.com"
        // +"email_verified_at": null
        // +"password": "$2y$12$ORS.g6jdjUrZ7uDmGWyFLeeoufJsYqf54qLb4XVfYHH6g4mKbOo86"
        // +"role": "siswa"
        // +"remember_token": null
        // +"active": 1
        // +"created_at": null
        // +"updated_at": "2025-04-08 06:42:50"
        // +"id_student": "1"
        // +"nis": "123456"
        // +"gender": "Male"
        // +"kelas_id": "VIII1"
        // +"address": "Tester"
        // +"born_place": "Bogor"
        // +"birth_date": "2000-01-01"
        // +"phone": "081385270311"
        // +"name_of_parent": "ADA"

        return view('/siswa/views/profilesiswa', compact('data', 'name'));


    }


    public function update(Request $request, string $id)
{
    // DB::beginTransaction();
    
    // try {
    //     // Update User table data
    //     $user = User::findOrFail($id);
    //     $user->update([
    //         'name' => $request->name,
    //         'email' => $request->email, // if you have email in your form
    //         'username' => $request->username, // if you have username in your form
    //         // other user fields
    //     ]);
        
    //     // Update Student table data
    //     $student = Siswa::where('id', $id)->firstOrFail();
    //     $student->update([
    //         'nis' => $request->nis,
    //         'address' => $request->address,
    //         'phone' => $request->phone,
    //         'name_of_parent' => $request->name_of_parent,
    //     ]);
        
    //     DB::commit();
        
    //     return response()->json(['success' => 'Profile updated successfully']);
        
    // } catch (\Exception $e) {
    //     DB::rollBack();
    //     return response()->json(['message' => 'Error updating profile: ' . $e->getMessage()], 500);
    // }


    // try {
    //     // Validate the request
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email,'.$id,
    //         'nis' => 'required|string|max:50',
    //         // Add other validation rules
    //     ]);

    //     DB::beginTransaction();

    //     // Update User
    //     $user = User::findOrFail($id);
    //     $user->update([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'username' => $request->username,
    //     ]);

    //     // Update Student
    //     $student = Siswa::where('id', $id)->firstOrFail();
    //     $student->update([
    //         'nis' => $request->nis,
    //         'address' => $request->address,
    //         'phone' => $request->phone,
    //         'name_of_parent' => $request->name_of_parent,
    //     ]);

    //     DB::commit();

    //     return response()->json([
    //         'success' => 'Profile updated successfully',
    //         'data' => $user
    //     ]);

    // } catch (\Illuminate\Validation\ValidationException $e) {
    //     DB::rollBack();
    //     return response()->json([
    //         'message' => 'Validation Error',
    //         'errors' => $e->errors()
    //     ], 422);
        
    // } catch (\Exception $e) {
    //     DB::rollBack();
    //     return response()->json([
    //         'message' => 'Error updating profile: ' . $e->getMessage()
    //     ], 500);
    // }


    $request->validate([
        'nis' => 'required|string',
        'address' => 'nullable|string',
        'phone' => 'nullable|string',
        'name_of_parent' => 'nullable|string',
    ]);

    $siswa = Siswa::findOrFail($id);

  

    // Update siswa fields
    $siswa->update([
        'nis' => $request->nis,
        'address' => $request->address,
        'phone' => $request->phone,
        'name_of_parent' => $request->name_of_parent,
    ]);

    return response()->json(['success' => 'Profile updated successfully.']);
}

  
}
