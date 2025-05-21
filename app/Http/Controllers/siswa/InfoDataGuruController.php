<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use App\Models\guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class InfoDataGuruController extends Controller
{
   
    public function index(Request $request)
    {
        
        $query = guru::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('nip', 'LIKE', "%{$search}%");
            });
        }

        $gurus = $query->orderBy('id', 'asc')->paginate(10);

        return view('/siswa/views/InfoDataGuru', compact('gurus'));

    }

  
}
