<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;


class ListUserController extends Controller
{
    //
    public function index() : View
    {
        $users = User::latest()->paginate(5);

        //render view with users
        return view('listuser', compact('users'));

    }
}
