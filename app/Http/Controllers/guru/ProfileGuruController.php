<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\guru;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class ProfileGuruController extends Controller
{
    public function index()
    {
    
        $name = Auth::user()->name;
        $data = DB::table('users')
        ->join('gurus', 'users.id', '=', 'gurus.id')
        ->where('users.name', $name)
        ->select('users.*', 'gurus.*') // Select columns you want
        ->first();
        //dd($data);

        return view('/guru/views/profileguru', compact('data', 'name'));
    }


    public function updateData(Request $request, string $id)
    {
        Log::info('Request masuk:', $request->all());

    
        $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'name' => 'required',
            'nip' => 'required',
            'role' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            Log::error('Validation Failed:', $validator->errors()->toArray());
            return response()->json($validator->errors(), 422);
        }

        if (!$id) {
            return response()->json(['error' => 'User ID is missing'], 400);
        }
    
        // Find the user or return a 404 error
        $gurus = guru::findOrFail($id);
        
        if (!$gurus) {
            return response()->json(['error' => 'User not found'], 404);
        }

        //dd($request->only(['gender', 'address']));

        Log::info('Gender and address from request:', [
            'gender' => $request->gender,
            'address' => $request->address
        ]);

        $gurus->update([
            'kode' => $request->kode,
            'name' => $request->name,
            'nip' => $request->nip,
            'role' => $request->role,
            'sk' => $request->sk,
            'gender' => $request->gender, // fallback to existing value if null
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'phone' => $request->phone,
            'address' => $request->address, // fallback to existing value if null
            'education' => $request->education,
        ]);
    
        $gurus->refresh(); // re-fetch updated data from DB

        Log::info('After update:', [
            'gender' => $gurus->gender,
            'address' => $gurus->address,
        ]);
        return response()->json(['success' => 'User updated successfully!']);
    }
}