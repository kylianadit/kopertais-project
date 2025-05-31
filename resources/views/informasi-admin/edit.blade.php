@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Informasi</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('informasi-admin.update', $informasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" id="judul" value="{{ $informasi->judul }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4" required>{{ $informasi->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar (Opsional)</label>
            @if ($informasi->gambar)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $informasi->gambar) }}" alt="Gambar Lama" width="150">
                </div>
            @endif
            <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('informasi-admin.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
