@extends('layouts.app')

@section('title', 'Data Kontak')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if ($message = Session::get('message'))
                <div class="alert alert-success">
                    <strong>Berhasil</strong>
                    <p>{{$message}}</p>
                </div>
            @endif
            <form action="/admin/contact/{{ $contact->id }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
                
                
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="{{ $contact->alamat }}">
                </div>
                @error('alamat')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $contact->email }}">
                </div>
                @error('email')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">Telepon</label>
                    <input type="text" class="form-control" name="telepon" placeholder="Telepon" value="{{ $contact->telepon }}">
                </div>
                @error('telepon')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">jambuka</label>
                    <input type="text" class="form-control" name="jam_buka" placeholder="Telepon" value="{{ $contact->jam_buka }}">
                </div>
                @error('jam_buka')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">Maps Embed</label>
                    <textarea name="maps_embed" id="" cols="30" rows="10" class="form-control" placeholder="Maps Embed">{{ $contact->maps_embed }}</textarea>
                </div>
                @error('maps_embed')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">twitter</label>
                    <input type="text" class="form-control" name="twitter" placeholder="Telepon" value="{{ $contact->twitter }}">
                </div>
                @error('twitter')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">facebook</label>
                    <input type="text" class="form-control" name="facebook" placeholder="Telepon" value="{{ $contact->facebook }}">
                </div>
                @error('facebook')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">instagram</label>
                    <input type="text" class="form-control" name="instagram" placeholder="Telepon" value="{{ $contact->instagram }}">
                </div>
                @error('instagram')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">lynkin</label>
                    <input type="text" class="form-control" name="lynkin" placeholder="Telepon" value="{{ $contact->lynkin }}">
                </div>
                @error('lynkin')
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
