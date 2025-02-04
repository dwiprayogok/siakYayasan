<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ListSiswaController extends Controller
{
    
      public function index()
      {
          return view('siswa');
      }

      public function getUsers()
      {
          //return response()->json(User::all());
          $users = User::all();
          return view('siswa', compact('users'));

      }
}
