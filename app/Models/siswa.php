<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'id_student',
        'nis',
        'name',
        'email',
        'gender',
        'kelas_id',
        'born_place',
        'birth_date',
        'phone',
        'name_of_parent',
        'address',
    ];

    public function kelas(){
    //return $this->belongsTo(kelas::class);
    //return $this->belongsTo(Kelas::class, 'kelas_id','kode'); //This model has many Siswa (students), and the foreign key in the siswas table is kelas_id."
    //return $this->belongsTo(Kelas::class, 'kelas_id','kode_kelas'); //This model has many Siswa (students), and the foreign key in the siswas table is kelas_id."
    return $this->belongsTo(Kelas::class, 'kode_kelas','kode_kelas'); //This model has many Siswa (students), and the foreign key in the siswas table is kelas_id."

    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
