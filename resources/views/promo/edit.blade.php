@extends('layouts.app')

@section('title', 'Edit Data Promosi')

@section('content')

<div class="container">
    <a href="/admin/promosi" class="btn btn-primary mb-1">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('promosi.update', $promosi->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{ $promosi->judul }}">
                    @error('judul')
                    <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="text" class="form-control" name="harga" placeholder="Harga" value="{{ $promosi->harga }}">
                    @error('harga')
                    <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Deskripsi 1</label>
                    <textarea name="deskripsi_1" cols="30" rows="4" class="form-control" placeholder="Deskripsi 1">{{ $promosi->deskripsi_1 }}</textarea>
                    @error('deskripsi_1')
                    <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Kelebihan 1</label>
                    <input type="text" class="form-control" name="kelebihan_1" placeholder="Kelebihan 1" value="{{ $promosi->kelebihan_1 }}">
                    @error('kelebihan_1')
                    <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Kelebihan 2</label>
                    <input type="text" class="form-control" name="kelebihan_2" placeholder="Kelebihan 2" value="{{ $promosi->kelebihan_2 }}">
                    @error('kelebihan_2')
                    <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Kelebihan 3</label>
                    <input type="text" class="form-control" name="kelebihan_3" placeholder="Kelebihan 3" value="{{ $promosi->kelebihan_3 }}">
                    @error('kelebihan_3')
                    <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Deskripsi 2</label>
                    <textarea name="deskripsi_2" cols="30" rows="4" class="form-control" placeholder="Deskripsi 2">{{ $promosi->deskripsi_2 }}</textarea>
                    @error('deskripsi_2')
                    <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Gambar Saat Ini</label><br>
                    <img src="/image/{{ $promosi->image }}" alt="" class="img-fluid" style="max-height: 200px;">
                </div>

                <div class="form-group">
                    <label for="">Ganti Gambar</label>
                    <input type="file" class="form-control" name="image">
                    @error('image')
                    <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
