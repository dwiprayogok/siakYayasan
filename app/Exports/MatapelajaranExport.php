<?php

namespace App\Exports;

use App\Models\Matapelajaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MatapelajaranExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Matapelajaran::with('guru')->get();

    }

    public function headings(): array
    {
        return ['Id', 'Kode', 'Nama', 'Nama Guru'];
    }

    public function map($matapelajaran): array
    {

        return [
            $matapelajaran->id,
            $matapelajaran->kode,
            $matapelajaran->nama,
            optional($matapelajaran->guru)->name ?? '-',
        
        ];
    }
}