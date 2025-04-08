<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_kelas',
        'nama',
    ];

    public function siswa()
    {
        //return $this->hasMany(Siswa::class);
        return $this->hasMany(Siswa::class, 'kelas_id');

    }
}
