<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class jadwalpelajaran extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'hari', 
        'start_time', 
        'end_time', 
        'kode_guru', 
        'kode_kelas',
        'kode_mapel', 
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'kode_guru', 'kode_guru');

    }

    public function matapelajaran()
    {
        //return $this->belongsTo(Matapelajaran::class, 'kode_mapel', 'kode');
        return $this->belongsTo(Matapelajaran::class, 'kode_mapel', 'kode_mapel');

    }
  
    public function siswa()
    {
        //return $this->belongsTo(Siswa::class, 'kelas', 'kelas_id');
        return $this->belongsTo(Siswa::class, 'kode_kelas', 'kode_kelas');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kode_kelas', 'kode_kelas');
    }

}
