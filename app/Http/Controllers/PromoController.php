<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promosi = Promo::orderBy('created_at', 'asc')->get();

        return view('promo.index', compact('promosi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promo.create');
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
            'harga' => 'required', 
            'deskripsi_1' => 'required',
            'kelebihan_1' => 'required',
            'kelebihan_2' => 'required',
            'kelebihan_3' => 'required',
            'deskripsi_2' => 'required',
            'image' => 'required|image',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $imageName = $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $input['image'] = $imageName;
        }

        Promo::create($input);

        return redirect('admin/promosi')->with('message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promosi)
    {
        return view('promo.edit', compact('promosi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo $promosi)
    {
        $request->validate([
            'judul' => 'required', 
            'harga' => 'required', 
            'deskripsi_1' => 'required',
            'kelebihan_1' => 'required',
            'kelebihan_2' => 'required',
            'kelebihan_3' => 'required',
            'deskripsi_2' => 'required',
            'image' => 'nullable|image',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $imageName = $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $input['image'] = $imageName;
        }


        $promosi->update($input);

        return redirect('admin/promosi')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo $promosi)
    {
        $image_path = '/image'; 

        if (file_exists($image_path)) {

       unlink($image_path);

    }
        $promosi->delete();

        return redirect('admin/promosi')->with('message', 'Data berhasil dihapus');
    }
}
