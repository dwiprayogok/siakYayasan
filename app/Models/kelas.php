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
        //return $this->hasMany(Siswa::class, 'kelas_id','kode'); //This model belongs to one Kelas, and the foreign key in this model (probably Siswa) is kelas_id."
        //return $this->hasMany(Siswa::class, 'kelas_id','kode_kelas'); //This model belongs to one Kelas, and the foreign key in this model (probably Siswa) is kelas_id."
        return $this->hasMany(Siswa::class, 'kode_kelas','kode_kelas'); //This model belongs to one Kelas, and the foreign key in this model (probably Siswa) is kelas_id."

    }

    public function jadwalpelajaran()
    {
        return $this->hasMany(JadwalPelajaran::class, 'kode_kelas', 'kode_kelas');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'kode_kelas','kode_kelas');
    }


}
