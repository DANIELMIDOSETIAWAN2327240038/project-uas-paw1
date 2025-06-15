<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // cek apakah user memiliki izin untuk membuat pelanggan
        if($request->user()->cannot('create', Pelanggan::class)) {
            abort(403);
        }

        // validasi input
        $input = $request->validate([
            'nama_pelanggan' => 'required',
            'jenis_kelamin' => 'required',
            'no_telepon' => 'required'
        ]);

        // simpan data ke tabel pelanggan
        Pelanggan::create($input); 

        // redirect ke route pelanggan.index
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Pelanggan $pelanggan)
    {
        // cek apakah user memiliki izin umtuk menghapus pelanggan
        if($request->user()->cannot('delete', Pelanggan::class)) {
            abort(403);
        }

        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan deleted successfully');
    }
}
