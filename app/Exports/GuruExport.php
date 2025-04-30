<?php

namespace App\Exports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class GuruExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Guru::all();


    }

    public function headings(): array
    {
        return ['Nip', 'Nama', 'Posisi', 'SK', 'Tempat & Tanggal Lahir', 'Pendidikan','No Telepon'];
    }

    public function map($gurus): array
    {

        return [
            $gurus->nip ,
            $gurus->name ,
            $gurus->role ,
            $gurus->sk ,
            $gurus->tempat_lahir . ', ' . $gurus->tanggal_lahir,
            $gurus->education ,
            $gurus->phone ,

        
        ];
    }
}