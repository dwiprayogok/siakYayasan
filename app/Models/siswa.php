<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    //
    protected $fillable = [
        'id_student',
        'nis',
        'name',
        'gender',
        'class',
        'address',
        'born_place',
        'birth_date',
        'name_of_parent',
    ];
}
