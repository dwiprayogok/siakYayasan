<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class matapelajaran extends Model
{
    //
    use HasFactory;
    protected $table = 'matapelajarans';
    protected $fillable = [
        'id',
        'kode_mapel',
        'nama_mapel',
        'kode_guru',
    ];


    // Define relationship with teacher
    public function guru()
    {
        return $this->belongsTo(guru::class, 'kode_guru', 'kode');
    }

    
}
