<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    //

    protected $fillable = [
        'kode_guru',
        'name',
        'nip',
        'role',
        'sk',
        'tanggal_lahir',
        'education',
        'walas',
    ];
}
