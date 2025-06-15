<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';

    protected $fillable = [
        'tipe_kendaraan',
        'tahun_kendaraan',
        'transmisi_kendaraan',
        'plat_kendaraan',
        'harga_kendaraan',
        'kapasitasMesinOP_kendaraan',
        'kilometerOP_kendaraan',
        'bahanBakarOP_kendaraan',
        'warnaFisikOP_kendaraan',
        'foto',
        'varian_id',
    ];

    public function varian()
    {
        return $this->belongsTo(Varian::class, 'varian_id', 'id');
    }
}
