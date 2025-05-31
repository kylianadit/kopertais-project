<!-- resources/views/informasi-admin/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Daftar Informasi Admin</h1>

    <a href="{{ route('informasi-admin.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Informasi</a>

    @foreach($informasis as $informasi)
        <div class="bg-white shadow p-4 rounded mb-4">
            <h2 class="text-xl font-semibold">{{ $informasi->judul }}</h2>
            <p class="text-gray-700">{{ $informasi->deskripsi }}</p>
            @if ($informasi->gambar)
                <img src="{{ asset('images/' . $informasi->gambar) }}" alt="" class="mt-2 rounded w-full max-w-xs">
            @endif

            <div class="mt-4">
                <a href="{{ route('informasi-admin.edit', $informasi->id) }}" class="text-blue-600">Edit</a>
                <form action="{{ route('informasi-admin.destroy', $informasi->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 ml-2" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
