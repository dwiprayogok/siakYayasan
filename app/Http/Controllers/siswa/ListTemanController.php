<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class ListTemanController extends Controller
{
   
    public function index(Request $request)
    {
        
        $query = Siswa::query();
        
        $kelas_id =Auth::user()->siswa->kelas_id ; // Get the logged-in user
        $nameOfstudent =Auth::user()->siswa->name;

        $query->where('kelas_id', $kelas_id)
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

        return view('/siswa/views/ListTeman', compact('siswas'));

    }

  
}
