<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    //
    protected $table = 'nilai';
    protected $fillable = [
        'id_student',
        'kode_mapel',
        'nilai',
        'tanggal',
       
    ];

    public function matapelajaran()
    {
        return $this->hasMany(matapelajaran::class, 'kode_mapel');
    }

    public function jadwalPelajaran()
    {
        return $this->hasMany(JadwalPelajaran::class, 'kode_guru', 'kode_guru');

    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
