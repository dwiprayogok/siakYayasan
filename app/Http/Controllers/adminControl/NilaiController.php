<?php

namespace App\Http\Controllers\adminControl;

use App\Http\Controllers\Controller;
use App\Models\nilai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NilaiController extends Controller
{
    //   public function index()
    //   {
    //       return view('nilai');
    //   }

    public function index(Request $request)
    {
        //
        $query = nilai::query();

        // Search by name or email
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%$search%")
                  ->orWhere('email', 'LIKE', "%$search%");
        }

        $nilai = $query->paginate(10); // Paginate results

        return view('/admin/views/nilai', compact('nilai'));
    }

  
}
