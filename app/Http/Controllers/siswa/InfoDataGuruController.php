<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class InfoDataGuruController extends Controller
{
   
    public function index(Request $request)
    {
        
        $query = Siswa::query();
        
        $kode_kelas =Auth::user()->siswa->kode_kelas ; // Get the logged-in user
        $nameOfstudent =Auth::user()->siswa->name;

        $query->where('kode_kelas', $kode_kelas)
        ->where('name', '!=', $nameOfstudent);
        
        // Optional: Search by name or email
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%")
                  ->orWhere('email', 'LIKE', "%$search%");
            });
        }
        
        $siswas = $query->orderBy('id', 'asc')->paginate(10);

        return view('/siswa/views/InfoDataGuru', compact('siswas'));

    }

  
}
