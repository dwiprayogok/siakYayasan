<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



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

        //return view('/siswa/views/profilesiswa', compact('user','siswa'));
        return view('/siswa/views/profilesiswa', compact('data', 'name'));


    }

  
}
