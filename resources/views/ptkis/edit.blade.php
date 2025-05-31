@extends('layouts.app')

@section('content')
<div class="p-4">
    <h2 class="text-2xl font-bold mb-4">Edit Data PTKIS</h2>

    <form action="{{ route('ptkis.update', $ptki->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-semibold">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $ptki->nama) }}" class="w-full border px-4 py-2 rounded" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Akreditasi</label>
            <input type="text" name="akreditasi" value="{{ old('akreditasi', $ptki->akreditasi) }}" class="w-full border px-4 py-2 rounded" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Alamat</label>
            <textarea name="alamat" class="w-full border px-4 py-2 rounded" required>{{ old('alamat', $ptki->alamat) }}</textarea>
        </div>

        <div>
        <label class="block mb-1 font-semibold">Website (Opsional)</label>
        <input type="url" name="website" value="{{ old('website', $ptki->website) }}" class="w-full border px-4 py-2 rounded">
        </div>


        <div>
            <label class="block mb-1 font-semibold">Logo (Opsional)</label>
            <input type="file" name="logo" class="w-full border px-4 py-2 rounded">
            @if($ptki->logo)
                <img src="{{ asset('storage/' . $ptki->logo) }}" alt="Logo {{ $ptki->nama }}" class="w-20 mt-2">
            @endif
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection
