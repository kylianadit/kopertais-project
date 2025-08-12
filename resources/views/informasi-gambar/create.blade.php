<!-- resources/views/informasi-gambar/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto py-10 px-6 bg-white shadow-md rounded-xl border border-gray-200">
    <h2 class="text-2xl font-bold text-black mb-6 border-b pb-2">Upload Informasi Gambar</h2>

    {{-- Error Validation --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-300 rounded-lg text-red-700">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Upload --}}
    <form action="{{ route('informasi-gambar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Pilih Gambar</label>
            <input 
                type="file" 
                name="gambar" 
                id="gambar"
                accept="image/*"
                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-400 file:text-white hover:file:bg-gray-500 transition">
        </div>

        <div class="flex justify-end">
            <button 
                type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg transition">
                Upload
            </button>
        </div>
    </form>
</div>
@endsection
