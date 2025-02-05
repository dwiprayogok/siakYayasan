<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwalPelajaranController extends Controller
{
    //
    public function index() {
        return view('jadwalpelajaran');
    }
}
