<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\userprofile;
use Illuminate\Support\Facades\Auth;

class ProfileController  extends Controller
{
    public function index() {
        $userprofiles = Auth::user()->profile; // Get the authenticated user's profile
        return view('/user/profile/profile', compact('userprofiles'));
    }
}
