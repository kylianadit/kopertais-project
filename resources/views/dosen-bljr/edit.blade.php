@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Edit Dosen Tugas Belajar</h2>
    <form action="{{ route('dosen-bljr.update', $item->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="nama" class="block font-medium text-gray-700 mb-1">Nama</label>
            <input type="text" id="nama" name="nama" value="{{ $item->nama }}" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label for="jabatan" class="block font-medium text-gray-700 mb-1">Jabatan</label>
            <input type="text" id="jabatan" name="jabatan" value="{{ $item->jabatan }}" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label for="tempat_tugas" class="block font-medium text-gray-700 mb-1">Tempat Tugas</label>
            <input type="text" id="tempat_tugas" name="tempat_tugas" value="{{ $item->tempat }}" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label for="tahun" class="block font-medium text-gray-700 mb-1">Tahun</label>
            <input type="number" id="tahun" name="tahun" value="{{ $item->tahun }}" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label for="ptkis" class="block font-medium text-gray-700 mb-1">PTKIS</label>
            <input type="text" id="ptkis" name="ptkis" value="{{ $item->ptkis }}" class="w-full border p-2 rounded" required>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
