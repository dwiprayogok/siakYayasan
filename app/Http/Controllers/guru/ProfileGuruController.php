<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileGuruController extends Controller
{
    public function index()
    {
    
        $name = Auth::user()->name;
        $data = DB::table('users')
        ->join('gurus', 'users.name', '=', 'gurus.name')
        ->where('users.name', $name)
        ->select('users.*', 'gurus.*') // Select columns you want
        ->first();
        //dd($data);

        return view('/guru/views/profileguru', compact('data', 'name'));



    }
}