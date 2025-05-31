@extends('layouts.app') {{-- Atau sesuaikan dengan layout kamu --}}

@section('content')
<div class="container">
    <h2>Upload Infografis</h2>

    {{-- Menampilkan pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Upload --}}
    <form action="{{ route('infografis.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control" placeholder="Masukkan judul">
        </div>

        <div class="form-group mb-3">
            <label for="gambar">Upload Gambar</label>
            <input type="file" name="gambar" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    {{-- Menampilkan gambar terakhir --}}
    @if(isset($infografis))
        <div class="mt-4">
            <h4>Infografis Terbaru:</h4>
            <img src="{{ asset('storage/infografis/' . $infografis->gambar) }}" class="img-fluid" alt="Infografis">
        </div>
    @endif
</div>
@endsection