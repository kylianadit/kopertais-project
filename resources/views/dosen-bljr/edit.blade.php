@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Edit Dosen Tugas Belajar</h2>
    <form action="{{ route('dosen-bljr.update', $item->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <input type="text" name="nama" value="{{ $item->nama }}" class="w-full border p-2" required>
        <input type="text" name="jabatan" value="{{ $item->jabatan }}" class="w-full border p-2" required>
        <input type="text" name="tempat_tugas" value="{{ $item->tempat }}" class="w-full border p-2" required>
        <input type="number" name="tahun" value="{{ $item->tahun }}" class="w-full border p-2" required>
        <input type="text" name="ptkis" value="{{ $item->ptkis }}" class="w-full border p-2" required>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
