<?php

namespace App\Http\Controllers\guru;


use App\Http\Controllers\Controller;



class JadwalAjarController extends Controller
{
    public function index()
    {
        return view('guru.views.JadwalAjar');

    }
}