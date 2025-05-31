@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow">
    <h1 class="text-2xl font-bold text-green-700 mb-6 text-center">Tambah Akreditasi</h1>

    <form action="{{ route('akreditasi.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold mb-1">PTKIS</label>
            <input type="text" name="ptkis" class="w-full border border-gray-300 rounded p-2" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Jenjang</label>
            <input type="text" name="jenjang" class="w-full border border-gray-300 rounded p-2" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Program Studi</label>
            <input type="text" name="prodi" class="w-full border border-gray-300 rounded p-2" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Akreditasi</label>
            <input type="text" name="akreditasi" class="w-full border border-gray-300 rounded p-2" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Tanggal Expired</label>
            <input type="date" name="exp" class="w-full border border-gray-300 rounded p-2" required>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
