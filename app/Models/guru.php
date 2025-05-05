<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    //
    protected $table = 'gurus';
    protected $fillable = [
        'kode_guru',
        'name',
        'nip',
        'role',
        'sk',
        'email',
        'gender',
        'tempat_lahir',
        'tanggal_lahir',
        'phone',
        'address',
        'education',
    ];

    public function matapelajaran()
    {
        //return $this->hasMany(matapelajaran::class, 'kode');
        return $this->hasMany(matapelajaran::class, 'kode_mapel');
    }

    public function jadwalPelajaran()
    {
        //return $this->hasMany(JadwalPelajaran::class,'kode');
        return $this->hasMany(JadwalPelajaran::class, 'kode_guru', 'kode_guru');

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
