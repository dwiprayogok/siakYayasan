<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Matapelajaran extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'id',
        'kode_mapel',
        'nama',
        'kode_guru',
    ];


    // Define relationship with teacher
    public function guru()
    {
        return $this->belongsTo(guru::class, 'kode_guru', 'kode_guru');
    }

    public function jadwalPelajaran()
    {
        return $this->hasMany(JadwalPelajaran::class,'kode_guru', 'kode_guru');
        //return $this->hasMany(JadwalPelajaran::class, 'kode_mapel', 'kode');

    }
    
}
