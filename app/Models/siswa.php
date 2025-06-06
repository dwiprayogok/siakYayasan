<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    //
    use HasFactory;
    protected $table = 'siswas'; // Only if the table name isn't the default
    protected $fillable = [
        'id_student',
        'nis',
        'name',
        'email',
        'gender',
        'kode_kelas',
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


    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_student', 'id_student');
    }

    public function matapelajaran()
    {
    return $this->belongsTo(Matapelajaran::class, 'kode_mapel','kode_mapel'); // or the correct foreign key
    }

}
