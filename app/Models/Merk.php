<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $table = 'merk';
    
    protected $fillable = [
        'nama_merk',
        'img_merek',
    ];
}