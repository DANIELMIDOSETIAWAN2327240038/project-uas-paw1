<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merk = Merk::all();
        return view('merk.index', compact('merk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('merk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // cek apakah user memiliki izin utuk membuat merk
        if($request->user()->cannot('create', Merk::class)) {
            abort(403);
        }

        $input = $request->validate([
            'nama_merk' => 'required|unique:merk',
            'img_merek' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);

        // jika ada gambar yang di-upload
        if ($request->hasFile('img_merek')) {
            try {
                $file = $request->file('img_merek');
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
                    $input['img_merek'] = $result['secure_url'];
                } else {
                    return back()->withErrors(['img_merek' => 'Cloudinary upload error: ' . ($result['error']['message'] ?? 'Unknown error')]);
                }
            } catch (\Exception $e) {
                return back()->withErrors(['img_merek' => 'Cloudinary error: ' . $e->getMessage()]);
            }
        }

        // simpan data ke tabel merk
        Merk::create($input); 

        // redirect ke route merk.index
        return redirect()->route('merk.index')->with('success', 'Merk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Merk $merk)
    {
        // tidak diperlukan
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merk $merk)
    {
        // opsional
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Merk $merk)
    {
        // opsional
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Merk $merk)
    {
        // cek apakah user memiliki izin untuk menghapus merk
        if($request->user()->cannot('delete', Merk::class)) {
            abort(403);
        }

        $merk->delete();
        return redirect()->route('merk.index')->with('success', 'Merk deleted successfully');
    }
}
