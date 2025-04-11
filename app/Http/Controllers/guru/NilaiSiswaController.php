<?php

namespace App\Http\Controllers\guru;


use App\Http\Controllers\Controller;



class NilaiSiswaController extends Controller
{
    public function index()
    {
        return view('guru.views.nilaisiswa');

    }
}