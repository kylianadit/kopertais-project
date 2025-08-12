<!-- resources/views/informasi-gambar/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-gray-600">Daftar Informasi Gambar</h2>
        <a href="{{ route('informasi-gambar.create') }}" 
           class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
            Upload Gambar
        </a>
    </div>

    {{-- Pesan Sukses --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-300 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Galeri Gambar --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse($data as $item)
            <div class="bg-white rounded-xl shadow-md border border-gray-200 p-4 flex flex-col items-center">
                <img src="{{ asset('uploads/' . $item->gambar) }}" 
                     alt="Informasi Gambar" 
                     class="w-full h-56 object-contain mb-4 rounded-md border border-gray-100 bg-gray-50">

                <form action="{{ route('informasi-gambar.destroy', $item->id) }}" method="POST" class="w-full">
                    @csrf
                    @method('DELETE')
                    <button 
                        type="submit"
                        onclick="return confirm('Yakin ingin menghapus gambar ini?')"
                        class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 transition text-sm font-semibold">
                        Hapus
                    </button>
                </form>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500 italic">
                Belum ada gambar yang diunggah.
            </div>
        @endforelse
    </div>
</div>
@endsection
