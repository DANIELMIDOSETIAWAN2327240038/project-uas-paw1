<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Varian;
use App\Models\Merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraan = Kendaraan::all();
        return view('kendaraan.index')->with('kendaraan', $kendaraan);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // cek apakah user memiliki izin untuk membuat kendaraan
        if($request->user()->cannot('create', Kendaraan::class)) {
            abort(403);
        }

        $varian = Varian::all();
        return view('kendaraan.create', compact('varian'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // cek apakah user memiliki izin umtuk membuat kendaraan
        if($request->user()->cannot('create', Kendaraan::class)) {
            abort(403);
        }

        // validasi input
        $input = $request->validate(
            [
                'tipe_kendaraan' => 'required',
                'tahun_kendaraan' => 'required',
                'transmisi_kendaraan' => 'required',
                'plat_kendaraan' => 'required',
                'harga_kendaraan' => 'required',
                'kapasitasMesinOP_kendaraan' => 'required',
                'kilometerOP_kendaraan' => 'required',
                'bahanBakarOP_kendaraan' => 'required',
                'warnaFisikOP_kendaraan' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'varian_id' => 'required'
            ]
        );

        // jika ada foto didalam input
        if ($request->hasFile('foto')) {
            try {
                $file = $request->file('foto');
                // dd($file->getRealPath());

                $response = Http::asMultipart()->post(
                    'https://api.cloudinary.com/v1_1/' . env('CLOUDINARY_CLOUD_NAME') . '/image/upload',
                    [
                        [
                            'name'     => 'file',
                            'contents' => fopen($file->getRealPath(), 'r'),
                            'filename' => $file->getClientOriginalName(),
                        ],
                        [
                            'name'     => 'upload_preset',
                            'contents' => env('CLOUDINARY_UPLOAD_PRESET'),
                        ],
                    ]
                );

                $result = $response->json();
                if (isset($result['secure_url'])) {
                    $input['foto'] = $result['secure_url'];
                } else {
                    return back()->withErrors(['foto' => 'Cloudinary upload error: ' . ($result['error']['message'] ?? 'Unknown error')]);
                }
            } catch (\Exception $e) {
                return back()->withErrors(['foto' => 'Cloudinary error: ' . $e->getMessage()]);
            }
        }

        // simpan data ke tabel kendaraan
        Kendaraan::create($input);

        // redirect ke route kendaraan.index
        return redirect()->route('kendaraan.index')->with('success', 'Kendaraan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kendaraan $kendaraan)
    {
        return view('kendaraan.show', compact('kendaraan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Kendaraan $kendaraan)
    {
        // cek apakah user memiliki izin umtuk mengedit kendaraan
        if($request->user()->cannot('update', Kendaraan::class)) {
            abort(403);
        }

        $varian = Varian::all();
        return view('kendaraan.edit', compact('kendaraan', 'varian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kendaraan $kendaraan)
    {
        // cek apakah user memiliki izin umtuk mengedit kendaraan
        if($request->user()->cannot('update', Kendaraan::class)) {
            abort(403);
        }

        // validasi input - copas dari store
        $input = $request->validate(
            [
                'tipe_kendaraan' => 'required',
                'tahun_kendaraan' => 'required',
                'transmisi_kendaraan' => 'required',
                'plat_kendaraan' => 'required',
                'harga_kendaraan' => 'required',
                'kapasitasMesinOP_kendaraan' => 'required',
                'kilometerOP_kendaraan' => 'required',
                'bahanBakarOP_kendaraan' => 'required',
                'warnaFisikOP_kendaraan' => 'required',
                'varian_id' => 'required'
            ]
        );

        // update data kendaraan
        $kendaraan->update($input);

        // redirect ke route kendaraan.index
        return redirect()->route('kendaraan.index')->with('success', 'Kendaraan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Kendaraan $kendaraan)
    {
        // cek apakah user memiliki izin untuk menghapus kendaraan
        if($request->user()->cannot('destroy', $kendaraan)) {
            abort(403);
        }

        $kendaraan->delete();
        return redirect()->route('kendaraan.index')->with('success', 'Kendaraan deleted successfully');
    }
}
