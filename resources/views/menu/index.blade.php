@extends('layouts.app')

@section('title', 'Data Menu')

@section('content')

<div class="container">
    <a href="/admin/menu/create" class="btn btn-primary mb-1">Tambah Data</a>

    @if ($message = Session::get('message'))
        <div class="alert alert-success">
            <strong>Berhasil</strong>
            <p>{{$message}}</p>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1
                @endphp
                @foreach ($menus as $menu)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $menu->nama_menu }}</td>
                    <td>{{ $menu->harga_menu }}</td>
                    <td>{{ $menu->deskripsi_menu }}</td>
                    <td>{{ $menu->kategori }}</td>
                    <td>
                        <img src="/image/{{ $menu->foto_menu }}" alt="" class="img-fluid" width="90">
                    </td>
                    <td>
                        <a href="{{ route('menu.edit', $menu->id_menu) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('menu.destroy', $menu->id_menu) }}" method="POST">
                        @csrf    
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>      
</div>

@endsection