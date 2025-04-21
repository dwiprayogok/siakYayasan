<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    //
    protected $table = 'gurus';
    protected $fillable = [
        'kode',
        'name',
        'nip',
        'role',
        'sk',
        'gender',
        'tempat_lahir',
        'tanggal_lahir',
        'phone',
        'address',
        'education',
    ];

    public function matapelajaran()
    {
        return $this->hasMany(matapelajaran::class, 'kode');
    }

    public function jadwalPelajaran()
    {
        //return $this->hasMany(JadwalPelajaran::class,'kode');
        return $this->hasMany(JadwalPelajaran::class, 'kode_guru', 'kode');

    }
}
