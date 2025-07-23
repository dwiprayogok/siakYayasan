<?php

namespace App\Http\Controllers\adminControl;

use App\Http\Controllers\Controller;
use App\Models\guru;
use App\Models\Matapelajaran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;


class MataPelajaranController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        //$query = Matapelajaran::query();
        $query = Matapelajaran::with('guru'); // move this here


        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('kode_mapel', 'LIKE', "%{$search}%")
                  ->orWhere('nama', 'LIKE', "%{$search}%");
            });
        }
    
        $matapelajarans = $query->orderBy('id', 'asc')->paginate(10);
        $gurus = guru::all(); // Fetch all teachers from database

        return view('/admin/views/matapelajaran', compact('matapelajarans','gurus'));

    }

  
    public function store(Request $request)
    {
    
        $validator = Validator::make($request->all(), [
            'kode_mapel' => 'required',
            'nama_mapel' => 'required'           
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $matapelajarans = Matapelajaran::create([
            'kode_mapel' => $request->kode_mapel,
            'nama' => $request->nama_mapel,
            'kode_guru' =>  $request->input('kode_guru'),
        ]);

        return redirect()->route('matapelajaran')->with('success', 'User added successfully!');

    }

   
    public function show(string $id)
    {
        $matapelajarans = Matapelajaran::find($id);
        if (!$matapelajarans) {
            return response()->json(['error' => 'Mata Pelajaran not found'], 404);
        }

        return response()->json($matapelajarans);
    }


    public function update(Request $request,string $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_mapel' => 'required',
            'nama_mapel' => 'required',
            'kode_guru' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$id) {
            return response()->json(['error' => 'ID is missing'], 400);
        }
    
        // Find the user or return a 404 error
        $matapelajarans = Matapelajaran::find($id);
        
        if (!$matapelajarans) {
            return response()->json(['error' => 'mapel not found'], 404);
        }
        $matapelajarans->update([
            'id'                => $request->id,
            'kode_mapel'              => $request->kode_mapel,
            'nama'              => $request->nama_mapel,
            'kode_guru'         =>  $request->input('kode_guru')
        ]);

        return response()->json(['success' => 'Mata Pelajaran updated successfully!']);
    }

    public function destroy(string $id)
    {
        $matapelajarans = Matapelajaran::find($id);
        $matapelajarans->delete();

        return response()->json(['success' => 'Mata Pelajaran deleted successfully']);
        
    }


        public function printPdf()
        {
            $matapelajarans = Matapelajaran::with('guru')->get();

            $pdf = Pdf::loadView('/admin/views/downloadPDF/matapelajaranPDF', compact('matapelajarans'))
                    ->setPaper('A4', 'portrait');

            return $pdf->download('daftar-matapelajarans.pdf');
        }


        public function MapelprintPdf(Request $request)
        {
            $id = $request->input('id');
            $matapelajarans = Matapelajaran::findOrFail($id);
    
            $pdf = Pdf::loadView('admin.views.detailPDF.DetailMataPelajaranPDF', compact('matapelajarans'))
                ->setPaper('A4', 'portrait');
    
            return $pdf->download('matapelajaran-details-' . $matapelajarans->nama . '.pdf');
        }

      
    
}
