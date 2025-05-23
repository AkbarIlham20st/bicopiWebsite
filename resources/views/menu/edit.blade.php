@extends('layouts.app')

@section('title', 'Data Menu')

@section('content')

<div class="container">
    <a href="/admin/menu" class="btn btn-primary mb-1">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('menu.update', $menu->id_menu) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
                <div class="form-group">
                    <label for="">Nama Menu</label>
                    <input type="text" class="form-control" name="nama_menu" placeholder="Judul" value="{{ $menu->nama_menu }}">
                </div>
                @error('nama_menu')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">Harga Menu</label>
                    <input type="text" class="form-control" name="harga_menu" placeholder="Judul" value="{{ $menu->harga_menu }}">
                </div>
                @error('nama_menu')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">Deskripsi Menu</label>
                    <textarea name="deskripsi_menu" id="" cols="30" rows="10" class="form-control" placeholder="Deskripsi">{{ $menu->deskripsi_menu }}</textarea>
                </div>
                @error('deskripsi_menu')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">Kategori</label>
                    <input type="text" class="form-control" name="kategori" placeholder="Judul" value="{{ $menu->kategori }}">
                </div>
                @error('kategori')
                <small style="color:red">{{$message}}</small>
                @enderror
                <img src="/image/{{ $menu->foto_menu }}" alt="" class="img-fluid">
                <div class="form-group">
                    <label for="">Gambar Menu</label>
                    <input type="file" class="form-control" name="foto_menu">
                </div>
                @error('foto_menu')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
