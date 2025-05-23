<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('created_at', 'asc')->get();
        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required',
            'deskripsi_menu' => 'required',
            'harga_menu' => 'required|numeric',
            'kategori' => 'required',
            'foto_menu' => 'required|image',
        ]);

        $input = $request->all();

        if ($foto = $request->file('foto_menu')) {
            $destinationPath = 'image/';
            $imageName = time() . '_' . $foto->getClientOriginalName();
            $foto->move($destinationPath, $imageName);
            $input['foto_menu'] = $imageName;
        }

        Menu::create($input);

        return redirect('admin/menu')->with('message', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama_menu' => 'required',
            'deskripsi_menu' => 'required',
            'harga_menu' => 'required|numeric',
            'kategori' => 'required',
            'foto_menu' => 'image',
        ]);

        $input = $request->all();

        if ($foto = $request->file('foto_menu')) {
            $destinationPath = 'image/';
            $imageName = time() . '_' . $foto->getClientOriginalName();
            $foto->move($destinationPath, $imageName);
            $input['foto_menu'] = $imageName;
        } else {
            unset($input['foto_menu']);
        }

        $menu->update($input);

        return redirect('admin/menu')->with('message', 'Data berhasil diedit');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect('admin/menu')->with('message', 'Data berhasil dihapus');
    }
}
