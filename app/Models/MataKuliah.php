<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $fillable = [
        'nama_matakuliah',
        'nama_dosen'
    ];
}
