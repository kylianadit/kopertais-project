@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Tambah Dosen Tugas Belajar</h2>
    <form action="{{ route('dosen-bljr.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="nama" placeholder="Nama" class="w-full border p-2" required>
        <input type="text" name="jabatan" placeholder="Jabatan" class="w-full border p-2" required>
        <input type="text" name="tempat_tugas" placeholder="Tempat Tugas Belajar" class="w-full border p-2" required>
        <input type="number" name="tahun" placeholder="Tahun" class="w-full border p-2" required>
        <input type="text" name="ptkis" placeholder="PTKIS" class="w-full border p-2" required>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
