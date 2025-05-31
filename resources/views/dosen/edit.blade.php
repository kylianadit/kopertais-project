@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-4">Edit Data Dosen</h2>

    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST" class="bg-white shadow-md rounded p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama" class="block text-gray-700">Nama:</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $dosen->nama) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-green-500">
        </div>

        <div class="mb-4">
            <label for="jabatan" class="block text-gray-700">Jabatan:</label>
            <input type="text" id="jabatan" name="jabatan" value="{{ old('jabatan', $dosen->jabatan) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-green-500">
        </div>

        <div class="mb-4">
            <label for="ptkis" class="block text-gray-700">PTKIS:</label>
            <input type="text" id="ptkis" name="ptkis" value="{{ old('ptkis', $dosen->ptkis) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-green-500">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('dosen.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition">
                Batal
            </a>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
