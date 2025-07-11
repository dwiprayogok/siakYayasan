<?php

namespace App\Http\Controllers\adminControl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\kelas;
use App\Models\Siswa;
use App\Models\guru;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;



class UserController extends Controller
{
   
    public function index(Request $request)
    {
        //
        $query = User::query();

        // Search by name or email
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        //$users = $query->paginate(10); // Paginate results
        $kelass = Kelas::all();
        $users = $query->orderBy('id', 'asc')->paginate(15);


        return view('/admin/views/user', compact('users','kelass'));
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        // Create and store the user
        DB::transaction(function () use ($request) {
            // 👤 Create User
            $user = new User();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = $request->input('role');
            $user->active =  $request->input('active');
            $user->save();
    
            if ( $request->input('role') === 'siswa') {
                $siswas = new Siswa();
                $siswas->id = $user->id;
                $siswas->name = $user->name;
                $siswas->nis = $request->nis;
                $siswas->id_student = $request->nis;
                $siswas->email = $user->email;
                $siswas->kode_kelas =  $request->input('kode_kelas');
                $siswas->save();
            } elseif ( $request->input('role') === 'guru') {
                $gurus = new guru();
                $gurus->id = $user->id;
                $gurus->name = $user->name;
                $gurus->kode_guru = $request->nip;
                $gurus->nip = $request->nip;
                $gurus->email = $user->email;
                $gurus->save();
            }
        });

        //return response()->json(['message' => 'User created successfully!', 'user' => $user]);
        return redirect()->route('user')->with('success', 'User added successfully!');
    }

   
    public function show(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }

   
    public function edit(string $id)
    {
        //
        $user = User::findOrFail($id);
        return view('user.edit', compact('users'));
    }


    public function update(Request $request,string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
            'email' => 'required',
            
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$id) {
            return response()->json(['error' => 'User ID is missing'], 400);
        }
    
        // Find the user or return a 404 error
        $user = User::find($id);
        
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        $user->update([
            'id'            => $request->id,
            'name'          => $request->name,
            'username'      => $request->username,
            'email'         => $request->email,
            'role'          => $request->input('role'),
            'password'      => bcrypt($request->password),
            'active'        => $request->input('active')
        ]);

        return response()->json(['success' => 'User updated successfully!']);
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json(['success' => 'User deleted successfully']);
        
    }


    
    public function printPdf()
    {
        $users = User::all();

        $pdf = Pdf::loadView('/admin/views/downloadPDF/userPDF', compact('users'))
                ->setPaper('A4', 'portrait');

        return $pdf->download('daftar-users.pdf');
    }


    public function UserPrintPdf(Request $request)
    {
        $id = $request->input('id');
    $user = User::findOrFail($id);

    $pdf = Pdf::loadView('admin.views.detailPDF.DetailUserPDF', compact('user'))
            ->setPaper('A4', 'portrait');

    return $pdf->download('user-details-' . $user->id . '.pdf');
    }

}
