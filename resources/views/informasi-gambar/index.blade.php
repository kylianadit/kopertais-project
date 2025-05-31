<!-- resources/views/informasi-gambar/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <h2 class="text-2xl font-bold mb-4">Daftar Gambar</h2>

    <a href="{{ route('informasi-gambar.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded">Upload Gambar</a>

    @if(session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-2 gap-4">
        @foreach($data as $item)
            <div class="border rounded p-2">
                <img src="{{ asset('uploads/' . $item->gambar) }}" class="w-full max-h-96 object-contain mb-2">
                <form action="{{ route('informasi-gambar.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
