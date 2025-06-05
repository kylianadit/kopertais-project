<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\DosenBljrController;
use App\Http\Controllers\PtkisController;
use App\Models\Dosen;
use App\Models\DosenBljr;
use App\Models\Ptkis;
use App\Http\Controllers\AkreditasiController;
use App\Http\Controllers\Admin\InformasiAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfografisController;
use App\Http\Controllers\InformasiGambarController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PtkisJurnalController;
use App\Http\Controllers\Admin\JurnalPtkisController;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::get('/reset-admin', function () {
    $emailBaru = 'kopertais@admin.com'; // email baru
    $passwordBaru = 'kopertais123';     // password baru

    // Hapus semua user lama dulu (opsional)
    \App\Models\User::truncate();

    // Buat user baru
    $baru = \App\Models\User::create([
        'name' => 'Super Admin',
        'email' => $emailBaru,
        'password' => Hash::make($passwordBaru),
    ]);

    return response()->json([
        'message' => '✅ Admin baru berhasil dibuat.',
        'email' => $baru->email,
        'password' => $passwordBaru,
    ]);
});




// Route publik (tanpa login)
Route::get('/jurnal-ptkis', [JurnalPtkisController::class, 'publicView'])->name('jurnal-ptkis');

// Route admin (dengan middleware auth)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('jurnal-ptkis', JurnalPtkisController::class)
        ->parameters(['jurnal-ptkis' => 'jurnal']) // Ubah parameter jadi {jurnal} agar sesuai dengan model
        ->names([
            'index'   => 'jurnal-ptkis.index',
            'create'  => 'jurnal-ptkis.create',
            'store'   => 'jurnal-ptkis.store',
            'show'    => 'jurnal-ptkis.show',
            'edit'    => 'jurnal-ptkis.edit',
            'update'  => 'jurnal-ptkis.update',
            'destroy' => 'jurnal-ptkis.destroy',
        ]);
});







// Halaman publik



Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::delete('/admin/kontak/{id}', [KontakController::class, 'destroy'])->name('kontak.destroy');
});


Route::get('/pengajuan-rekomendasi', function () {
    return view('pengajuan-rekomendasi');
});
Route::get('/pengajuan-sktp', function () {
    return view('pengajuan-sktp');
});
Route::get('/pengajuan-inpassing', function () {
    return view('pengajuan-inpassing');
});
Route::get('/pengajuan-fungsional', function () {
    return view('pengajuan-fungsional');
});
Route::get('/pengajuan-tugas-belajar', function () {
    return view('pengajuan-tugas-belajar');
});
Route::get('/pengumuman', function () {
    return view('pengumuman');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('informasi-gambar', InformasiGambarController::class);
});

Route::resource('infografis', InfografisController::class);
Route::get('/infografis', [InfografisController::class, 'index']);
Route::post('/infografis', [InfografisController::class, 'store']);


Route::get('/', [HomeController::class, 'index']);

Route::get('/informasi', function () {
    return view('informasi');
});
// Halaman publik (frontend)
Route::get('/informasi', [InformasiAdminController::class, 'indexPublic'])->name('informasi.public');

// Admin CRUD routes
Route::get('/informasi-admin', [InformasiAdminController::class, 'index'])->name('informasi-admin.index');
Route::get('/informasi-admin/create', [InformasiAdminController::class, 'create'])->name('informasi-admin.create');
Route::post('/informasi-admin', [InformasiAdminController::class, 'store'])->name('informasi-admin.store');
Route::get('/informasi-admin/{id}/edit', [InformasiAdminController::class, 'edit'])->name('informasi-admin.edit');
Route::put('/informasi-admin/{id}', [InformasiAdminController::class, 'update'])->name('informasi-admin.update');
Route::delete('/informasi-admin/{id}', [InformasiAdminController::class, 'destroy'])->name('informasi-admin.destroy');




// Halaman akreditasi untuk user (publik)

// Halaman Jelajahi
Route::get('/jelajahi', function () {
    return view('jelajahi');
});



















Route::get('/akreditasi-user', [AkreditasiController::class, 'userIndex'])->name('akreditasi.user');

// ROUTE UNTUK CRUD AKREDITASI
Route::resource('akreditasi', \App\Http\Controllers\AkreditasiController::class);


// ROUTE UNTUK HALAMAN PUBLIK (TIDAK BUTUH LOGIN)

// Halaman landing
Route::get('/', fn() => view('welcome'));

// Halaman informasi umum


// Halaman profil PTKIS untuk pengguna umum
Route::get('/profile-ptkis-user', function () {
    $ptkis = Ptkis::all();
    return view('profile-ptkis-user', compact('ptkis'));
});


// ✅ Halaman Admin
Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
// Halaman dosen biasa (dosen1) – publik
Route::get('/dosen1', [DosenController::class, 'dosen1'])->name('dosen1');

// Halaman dosen tugas belajar (dosen2) – publik
Route::get('/dosen2', [DosenBljrController::class, 'dosen2'])->name('dosen2');


// ROUTE YANG DILINDUNGI LOGIN
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    // Manajemen profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD dosen dan dosen tugas belajar
    Route::resource('/dosen', DosenController::class);
    Route::resource('/dosen-bljr', DosenBljrController::class);

    // CRUD PTKIS
    Route::resource('/ptkis', PtkisController::class);

    // Halaman admin daftar PTKIS
    Route::get('/profile-ptkis', function () {
        $ptkis = Ptkis::all();
        return view('ptkis.index', compact('ptkis'));
    });
});

// ROUTE AUTENTIKASI (dari Laravel Breeze / Fortify / Jetstream)
require __DIR__.'/auth.php';
