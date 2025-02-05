<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;


class ListUserController extends Controller
{
    //
    // public function index() : View
    // {

    //     $query = User::query();

    //     // Search by name or email
    //     if ($request->has('search')) {
    //         $search = $request->input('search');
    //         $query->where('name', 'LIKE', "%$search%")
    //               ->orWhere('email', 'LIKE', "%$search%");
    //     }



    //     $users = User::all();
    //     return view('listuser', compact('users'));

    // }

    public function index(Request $request)
    {
        $query = User::query();

        // Search by name or email
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%$search%")
                  ->orWhere('email', 'LIKE', "%$search%");
        }

        $users = $query->paginate(10); // Paginate results

        return view('listuser', compact('users'));
    }
    
}
