<?php

namespace App\Http\Controllers\guru;


use App\Http\Controllers\Controller;



class ProfileGuruController extends Controller
{
    public function index()
    {
    
        return view('/guru/views/profileguru');

    }
}