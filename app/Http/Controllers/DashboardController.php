<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil jumlah kendaraan berdasarkan nama merk
        // Bergabung dengan tabel 'kendaraan', 'varian', dan 'merk'
        $kendaraanPerMerk = DB::select('
            SELECT merk.nama_merk AS nama, COUNT(kendaraan.id) AS jumlah
            FROM `kendaraan`
            JOIN varian ON kendaraan.varian_id = varian.id
            JOIN merk ON varian.merk_id = merk.id
            GROUP BY merk.nama_merk;
        ');

        // Mengirim data ke view dengan nama variabel yang lebih deskriptif
        return view('dashboard.index', compact('kendaraanPerMerk'));
    }
}
