<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class matapelajaran extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'id',
        'kode_mapel',
        'nama_mapel',
        'kode_guru',
    ];

    // public function guru()
    // {
    //     return $this->belongsTo(guru::class, 'kode_guru', 'kode_guru');
    // }

    // Define relationship with teacher
    // public function guru()
    // {
    //     return $this->belongsTo(guru::class, 'kode_guru', 'kode_guru');
    // }

    
}
