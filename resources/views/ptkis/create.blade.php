@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Tambah PTKIS</h1>

    <!-- Tambahkan enctype untuk bisa upload file -->
    <form action="{{ route('ptkis.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium">Nama</label>
            <input type="text" name="nama" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-medium">Akreditasi</label>
            <input type="text" name="akreditasi" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-medium">Alamat</label>
            <textarea name="alamat" class="w-full border rounded px-3 py-2" required></textarea>
        </div>

       <div>
        <label class="block font-medium">Website (Opsional)</label>
        <input type="url" name="website" class="w-full border rounded px-3 py-2">
       </div>


        <!-- Tambahkan input file untuk logo -->
        <div>
            <label class="block font-medium">Logo (Opsional)</label>
            <input type="file" name="logo" class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
