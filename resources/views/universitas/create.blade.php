@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4 text-green-800">Tambah Universitas</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('universitas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="nama" class="block font-medium text-sm text-gray-700">Nama Universitas</label>
            <input type="text" name="nama" id="nama" required class="w-full p-2 border rounded mt-1">
        </div>

        <div class="mb-4">
            <label for="logo" class="block font-medium text-sm text-gray-700">Logo Universitas</label>
            <input type="file" name="logo" id="logo" accept="image/*" required class="w-full p-2 border rounded mt-1">
        </div>

        <div class="mb-4">
            <label for="score" class="block font-medium text-sm text-gray-700">Score Overall</label>
            <input type="number" step="0.01" name="score" id="score" required class="w-full p-2 border rounded mt-1">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
            Simpan Universitas
        </button>
    </form>
</div>
@endsection
