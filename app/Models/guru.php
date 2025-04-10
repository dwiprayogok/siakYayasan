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
        'tanggal_lahir',
        'education',
        'walas',
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
