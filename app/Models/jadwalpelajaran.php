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
        'kelas',
        'kode_mapel', 
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'kode_guru', 'kode');

    }

    public function matapelajaran()
    {
        return $this->belongsTo(Matapelajaran::class, 'kode_mapel', 'kode');

    }
  
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'kelas', 'kelas_id');
    }
}
