<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class JadwalPelajaranController extends Controller
{
    //
    // public function index() {

        
    //     return view('jadwalpelajaran');
    // }


    public function index(Request $request)
    {
        return view('jadwalpelajaran');
        //
        // $query = User::query();

        // // Search by name or email
        // if ($request->has('search')) {
        //     $search = $request->input('search');
        //     $query->where('name', 'LIKE', "%$search%")
        //           ->orWhere('email', 'LIKE', "%$search%");
        // }

        // $users = $query->paginate(10); // Paginate results
        // $users = User::all(); // Fetch all users
        // return view('jadwalpelajaran', compact('users'));
    }

    public function getUserData(Request $request)
    {
        $user = User::find($request->id);
        return response()->json($user);
    }

    
}
