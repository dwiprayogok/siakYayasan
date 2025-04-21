<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\guru;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
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



        $gurus->update([
            'kode' => $request->kode,
            'name' => $request->name,
            'nip' => $request->nip,
            'role' => $request->role,
            'sk' => $request->sk,
            'email' => $request->email,
            'gender' => $request->gender, // fallback to existing value if null
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'phone' => $request->phone,
            'address' => $request->address, // fallback to existing value if null
            'education' => $request->education,
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
        
        return response()->json(['success' => 'User updated successfully!']);
    }
}