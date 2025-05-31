{{-- resources/views/admin/jurnal/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded-xl shadow">
    <h1 class="text-xl font-semibold text-green-700 mb-4">Tambah Jurnal PTKIS</h1>

    <form action="{{ route('admin.jurnal-ptkis.store') }}" method="POST" class="space-y-5">
        @csrf

        {{-- Nama Universitas --}}
        <div>
            <label for="nama_universitas" class="block text-sm font-medium mb-1">Nama Universitas</label>
            <input type="text" name="nama_universitas" id="nama_universitas" value="{{ old('nama_universitas') }}" required
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                   placeholder="Contoh: Universitas Islam Negeri Lampung">
            @error('nama_universitas')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Nama Jurnal --}}
        <div>
            <label for="nama_jurnal" class="block text-sm font-medium mb-1">Nama Jurnal</label>
            <input type="text" name="nama_jurnal" id="nama_jurnal" value="{{ old('nama_jurnal') }}" required
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
            @error('nama_jurnal')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Link Jurnal --}}
        <div>
            <label for="link_jurnal" class="block text-sm font-medium mb-1">Link Jurnal</label>
            <input type="url" name="link_jurnal" id="link_jurnal" value="{{ old('link_jurnal') }}" required
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                   placeholder="https://contoh-jurnal.ac.id">
            @error('link_jurnal')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Akreditasi --}}
        <div>
            <label for="akreditasi" class="block text-sm font-medium mb-1">Akreditasi</label>
            <input type="text" name="akreditasi" id="akreditasi" value="{{ old('akreditasi') }}" required
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                   placeholder="Contoh: SINTA 2">
            @error('akreditasi')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Skor --}}
        <div>
            <label for="skor" class="block text-sm font-medium mb-1">Skor</label>
            <input type="number" name="skor" id="skor" value="{{ old('skor') }}" required step="0.01" min="0"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                   placeholder="Contoh: 85.5">
            @error('skor')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

       {{-- Tombol Simpan dan Batal --}}
<div class="pt-2 flex gap-3">
    <button type="submit"
            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
        Simpan
    </button>

    <a href="{{ route('admin.jurnal-ptkis.index') }}"
       class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition text-center">
        Batal
    </a>
</div>

    </form>
</div>
@endsection
