<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Property;

// Route untuk Halaman Beranda (Landing Page) + Logika Filter
Route::get('/', function (Request $request) {
    // 1. Data Dummy
    $semuaPerumahan = collect([
        [
            'id' => 1,
            'nama' => 'GRAND CASAHEERA',
            'developer' => 'PT INTI TIGA BERLIAN (PERWIRANUSA)',
            'provinsi' => 'Jawa Tengah',
            'kota' => 'Batang',
            'kecamatan' => 'Banyuputih',
            'gambar' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'subsidi' => 79, 'komersil' => 0, 'kode' => 'BTG1520022026T001'
        ],
        [
            'id' => 2,
            'nama' => 'PERUM GRIYA ANDALAN SEJAHTERA',
            'developer' => 'PT MAKRO ARTHA HUTAMA (REI)',
            'provinsi' => 'Jawa Tengah',
            'kota' => 'Pemalang',
            'kecamatan' => 'Pemalang',
            'gambar' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'subsidi' => 1, 'komersil' => 0, 'kode' => 'PML0820102026T002'
        ],
        [
            'id' => 3,
            'nama' => 'SIERRA PRIMANA RESIDENCE',
            'developer' => 'PT WAHYU PRATAMA MAHAKARYA (REI)',
            'provinsi' => 'Sulawesi Barat',
            'kota' => 'Mamuju',
            'kecamatan' => 'Mamuju',
            'gambar' => 'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'subsidi' => 117, 'komersil' => 0, 'kode' => 'MAM0110122026T005'
        ]
    ]);

    // 2. Logika Filternya (Kalau tombol CARI ditekan)
    if ($request->filled('provinsi')) {
        $semuaPerumahan = $semuaPerumahan->where('provinsi', $request->provinsi);
    }
    if ($request->filled('kota')) {
        $semuaPerumahan = $semuaPerumahan->where('kota', $request->kota);
    }
    if ($request->filled('kecamatan')) {
        $semuaPerumahan = $semuaPerumahan->where('kecamatan', $request->kecamatan);
    }
    if ($request->filled('developer')) {
        $semuaPerumahan = $semuaPerumahan->filter(function($item) use ($request) {
            return stripos($item['developer'], $request->developer) !== false;
        });
    }

    // 3. Kirim data ke view welcome
    return view('welcome', ['properties' => $semuaPerumahan]);
Route::get('/', function () {
    return view('welcome');
});

// 1. Route untuk Halaman Katalog (Menampilkan Semua Data)
Route::get('/perumahan', function () {
    $properties = Property::all();
    return view('properties.index', compact('properties'));
});

// 2. Route untuk Halaman Detail (Menampilkan Data Berdasarkan ID yang diklik)
Route::get('/perumahan/{id}', function ($id) {
    $property = Property::findOrFail($id);
    return view('properties.show', compact('property'));
});