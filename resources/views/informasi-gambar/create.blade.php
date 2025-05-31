<!-- resources/views/informasi-gambar/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto py-10">
    <h2 class="text-xl font-bold mb-4">Upload Gambar Baru</h2>

    @if ($errors->any())
        <div class="text-red-600 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('informasi-gambar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="gambar" class="mb-4 block w-full border p-2">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Upload</button>
    </form>
</div>
@endsection
