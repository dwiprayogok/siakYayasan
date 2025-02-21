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
        'gender',
        'class',
        'address',
        'born_place',
        'birth_date',
        'phone',
        'name_of_parent',
    ];
}
