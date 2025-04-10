<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;




class ProfileSiswaController extends Controller
{
   
    public function index()
    {
    
        return view('/siswa/views/profilesiswa');
    }

  
}
