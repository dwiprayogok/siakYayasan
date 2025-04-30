<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SiswaExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        //return Siswa::with('kelas')->get();
        return Siswa::all();


    }

    public function headings(): array
    {
        return ['Nis', 'Nama', 'Kelas', 'Jenis Kelamin', 'No Telephone'];
    }

    public function map($siswas): array
    {

        return [
            $siswas->nis,
            $siswas->name,
            $siswas->kelas_id,
            $siswas->gender,
            $siswas->phone,
        ];
    }
}