<?php

namespace App\Http\Controllers\adminControl;

use App\Exports\GuruExport;
use App\Http\Controllers\Controller;
use App\Models\guru;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;


class GuruController extends Controller
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

        //$gurus = $query->paginate(10); // Paginate results
        $gurus = $query->orderBy('id', 'asc')->paginate(10);

        
        return view('/admin/views/guru', compact('gurus'));
    }


  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nip' => 'required',
            'sk' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'role' => 'required',
            'education' => 'required',
            
        ]);

        $formattedDate = Carbon::createFromFormat('m/d/Y', $request->tanggal_lahir)->format('Y-m-d');

        $fullName = $request->name;
        $parts = explode(' ', $fullName);

        $firstName = $parts[0]; // "Alan"
        $lastInitial = isset($parts[1]) ? substr($parts[1], 0, 1) : ''; // "M"

        $result = $firstName . $lastInitial; // "AlanM"


        // Create and store the user
        $gurus = guru::create([
            'kode' => $request->nip,
            'name' => $request->name,
            'nip' => $request->nip,
            'sk' => $request->sk,
            'email' => $result.'@mail.com',
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $formattedDate,
            'phone' => $request->phone,
            'role' => $request->role,
            'education' => $request->input('education'),
        ]);


        $user = User::create([
        'id'       => $gurus->id,
        'name'     => $request->name,
        'email'    => $result.'@mail.com',
        'username' => $result,
        'password' => Hash::make('1'),
        'role'     => 'guru',
        'active'   => '1',
    ]);
    

        return redirect()->route('guru')->with('success', 'User added successfully!');
    }

   
    public function show(string $id)
    {
        $gurus = guru::find($id);
        if (!$gurus) {
            return response()->json(['error' => 'Guru not found'], 404);
        }

        return response()->json($gurus);
    }

    public function update(Request $request,string $id)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'name' => 'required',
            'nip' => 'required',
            'role' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$id) {
            return response()->json(['error' => 'User ID is missing'], 400);
        }
    
        // Find the user or return a 404 error
        $gurus = guru::find($id);
        
        if (!$gurus) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $gurus->update([
            'kode'          => $request->kode,
            'name'          => $request->name,
            'nip'           => $request->nip,
            'role'          => $request->role,
            'email'         => $request->email,
            'gender'        => $request->gender, // fallback to existing value if null
            'address'       => $request->address, // fallback to existing value if null
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'sk'            => $request->sk,
            'phone'         => $request->phone,
            'role'          => $request->role,
            'education'     => $request->education,
        ]);



        return response()->json(['success' => 'User updated successfully!']);
    }

    public function destroy(string $id)
    {
        $gurus = guru::find($id);
        $gurus->delete();

        return response()->json(['success' => 'User deleted successfully']);
        
    }

    public function printPdf()
    {
        //$siswas = Siswa::with('kelas')->get();
        $gurus = guru::all();

        $pdf = Pdf::loadView('/admin/views/downloadPDF/guruPDF', compact('gurus'))
                ->setPaper('A4', 'portrait');

        return $pdf->download('daftar-Guru.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new GuruExport, 'daftar-Guru.xlsx');
    }
}
