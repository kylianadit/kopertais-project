<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gallery</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-6">

    <h1 class="text-2xl font-bold mb-6 text-center">Galeri Dosen Tersertifikasi</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($images as $image)
            <div class="bg-white rounded shadow p-2 hover:shadow-lg transition cursor-pointer">
                <img src="{{ asset('storage/' . $image->file_path) }}"
                     alt="{{ $image->title }}"
                     class="rounded w-full object-cover h-48"
                     data-id="{{ $image->id }}"
                     onclick="showImageModal(this)">
                <p class="text-center mt-2 font-medium">{{ $image->title }}</p>
            </div>
        @endforeach
    </div>

    <!-- Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg max-w-2xl w-full p-6 relative">
            <button onclick="closeModal()" class="absolute top-2 right-4 text-2xl text-gray-600 hover:text-black">&times;</button>
            <img id="modalImage" src="" alt="Gambar Detail" class="w-full max-h-[400px] object-contain rounded mb-4">
            <h2 id="modalTitle" class="text-xl font-semibold mb-2"></h2>
            <p id="modalDescription" class="text-gray-700 text-sm"></p>
        </div>
    </div>

    <script>
        function showImageModal(element) {
            const id = element.dataset.id;
            fetch(`/images/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('modalImage').src = `/storage/${data.file_path}`;
                    document.getElementById('modalTitle').textContent = data.title;
                    document.getElementById('modalDescription').textContent = data.description ?? 'Tidak ada deskripsi.';
                    document.getElementById('imageModal').classList.remove('hidden');
                });
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }
    </script>

</body>
</html>
