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
        'nama_guru', 
        'kode_mapel', 
        'nama_mapel', 
    ];
  
}
