@extends('layouts.app')

@section('title', 'Data Promosi')

@section('content')

<div class="container">
    <a href="/admin/promosi/create" class="btn btn-primary mb-1">Tambah Data</a>

    @if ($message = Session::get('message'))
        <div class="alert alert-success">
            <strong>Berhasil</strong>
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Harga</th>
                    <th>Deskripsi 1</th>
                    <th>Kelebihan 1</th>
                    <th>Kelebihan 2</th>
                    <th>Kelebihan 3</th>
                    <th>Deskripsi 2</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($promosi as $promo)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $promo->judul }}</td>
                    <td>{{ $promo->harga }}</td>
                    <td>{{ $promo->deskripsi_1 }}</td>
                    <td>{{ $promo->kelebihan_1 }}</td>
                    <td>{{ $promo->kelebihan_2 }}</td>
                    <td>{{ $promo->kelebihan_3 }}</td>
                    <td>{{ $promo->deskripsi_2 }}</td>
                    <td>
                        <img src="/image/{{ $promo->image }}" alt="" class="img-fluid" width="90">
                    </td>
                    <td>
                        <a href="{{ route('promosi.edit', $promo->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('promosi.destroy', $promo->id) }}" method="POST" style="display:inline-block;">
                            @csrf    
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>      
</div>

@endsection
