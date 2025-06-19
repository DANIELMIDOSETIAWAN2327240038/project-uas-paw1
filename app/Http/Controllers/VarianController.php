<?php

namespace App\Http\Controllers;

use App\Models\Varian;
use App\Models\Merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VarianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $varian = Varian::all();
        return view('varian.index')->with('varian', $varian);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // cek apakah user memiliki izin untuk membuat varian
        if($request->user()->cannot('create', Varian::class)) {
            abort(403);
        }

        $merk = Merk::all();
        return view('varian.create', compact('merk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // cek apakah user memiliki izin untuk membuat varian
        if($request->user()->cannot('create', Varian::class)) {
            abort(403);
        }

        $input = $request->validate(
            [
                'nama_tipe' => 'required|unique:varian',
                'img_tipe' => 'required',
                'merk_id' => 'required'
            ]
        );

        // jika ada gambar yang di-upload
        if ($request->hasFile('img_tipe')) {
            try {
                $file = $request->file('img_tipe');
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
                    $input['img_tipe'] = $result['secure_url'];
                } else {
                    return back()->withErrors(['img_tipe' => 'Cloudinary upload error: ' . ($result['error']['message'] ?? 'Unknown error')]);
                }
            } catch (\Exception $e) {
                return back()->withErrors(['img_tipe' => 'Cloudinary error: ' . $e->getMessage()]);
            }
        }

        // simpan data ke tabel varian
        Varian::create($input);

        // redirect ke route varian.index
        return redirect()->route('varian.index')->with('success', 'Varian Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Varian $varian)
    {
        // tidak diperlukan
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Varian $varian)
    {
        // tidak diperlukan
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Varian $varian)
    {
        // tidak diperlukan
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Varian $varian)
    {
        // cek apakah user memiliki izin untuk membuat varian
        if($request->user()->cannot('delete', $varian)) {
            abort(403);
        }

        $varian->delete();
        return redirect()->route('varian.index')->with('success', 'Varian deleted successfully');
    }
}
