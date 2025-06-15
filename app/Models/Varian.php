<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Varian extends Model
{
    protected $table = 'varian';

    protected $fillable = [
        'nama_tipe', 
        'img_tipe',
        'merk_id'
    ];

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'merk_id', 'id');
    }
}
