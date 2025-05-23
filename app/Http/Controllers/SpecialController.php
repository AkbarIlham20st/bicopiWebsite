<?php

namespace App\Http\Controllers;

use App\Models\Special; // Menggunakan model Special
use Illuminate\Http\Request;

class SpecialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Urutkan berdasarkan ID ASC supaya urutan tetap seperti saat ditambahkan
    $specials = Special::orderBy('created_at', 'asc')->get();

    return view('special.index', compact('specials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('special.create'); // Menampilkan form untuk membuat data baru
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image', // Validasi untuk file gambar
        ]);

        $input = $request->all();

        // Menangani unggahan gambar
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $imageName = $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $input['image'] = $imageName; // Menyimpan nama file gambar
        }

        // Menyimpan data ke tabel 'specials'
        Special::create($input);

        return redirect('admin/specials')->with('message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Optional: Menampilkan detail dari special yang dipilih
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Special $special)
    {
        return view('special.edit', compact('special')); // Menampilkan form untuk mengedit data special
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Special  $special
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Special $special)
{
    $request->validate([
        'judul' => 'required',
        'deskripsi' => 'required',
        'image' => 'image', // ✅ tidak required
    ]);

    $input = $request->all();

    if ($image = $request->file('image')) {
        $destinationPath = 'image/';
        $imageName = $image->getClientOriginalName();
        $image->move($destinationPath, $imageName);
        $input['image'] = $imageName;
    } else {
        unset($input['image']); // ✅ agar tidak mengganti dengan null
    }

    $special->update($input);

    return redirect('admin/specials')->with('message', 'Data berhasil diedit');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  Special  $special
     * @return \Illuminate\Http\Response
     */
    public function destroy(Special $special)
    {
        $image_path = public_path('image/' . $special->image); // Menentukan path gambar yang akan dihapus

        if (file_exists($image_path)) {
            unlink($image_path); // Menghapus gambar
        }

        $special->delete(); // Menghapus data special

        return redirect('admin/specials')->with('message', 'Data berhasil dihapus');
    }
}
