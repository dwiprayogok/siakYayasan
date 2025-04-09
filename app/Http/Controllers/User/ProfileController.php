<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController  extends Controller
{
    public function index() {
        $user = Auth::user()->profile; // Get the authenticated user's profile
        //return view('/user/profile/profile', compact('userprofiles'));
        return view('/user/profile/profile', compact('users'));
    }
}
