<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Property;

// Route untuk Beranda (Welcome) + Filter Lengkap
Route::get('/', function (Request $request) {
    $query = Property::query();

    // 1. Filter Jenis Perumahan (Subsidi / Komersil)
    if ($request->filled('Jenis')) {
        $jenis = $request->Jenis;
        
        if ($jenis == 'Subsidi') {
            $query->where('subsidi_unit', '>', 0);
        } elseif ($jenis == 'Komersil') {
            $query->where('komersil_unit', '>', 0);
        }
    }
    
    if ($request->filled('kota')) {
        $query->where('location', 'Ilike', '%' . trim($request->kota) . '%');
    }
    
    if ($request->filled('kecamatan')) {
        $query->where('location', 'Ilike', '%' . trim($request->kecamatan) . '%');
    }
    
    if ($request->filled('developer')) {
        $query->where('developer', 'Ilike', '%' . trim($request->developer) . '%');
    }

    $properties = $query->get();

    return view('welcome', compact('properties'));
});

// Route untuk Halaman Katalog (Menampilkan Semua Data + Filter Lengkap)
Route::get('/perumahan', function (Request $request) {
    $query = Property::query();

    // 1. Filter Jenis Perumahan (Subsidi / Komersil)
    if ($request->filled('Jenis')) {
        $jenis = $request->Jenis;
        
        if ($jenis == 'Subsidi') {
            $query->where('subsidi_unit', '>', 0);
        } elseif ($jenis == 'Komersil') {
            $query->where('komersil_unit', '>', 0);
        }
    }
    
    if ($request->filled('kota')) {
        $query->where('location', 'Ilike', '%' . trim($request->kota) . '%');
    }
    
    if ($request->filled('kecamatan')) {
        $query->where('location', 'Ilike', '%' . trim($request->kecamatan) . '%');
    }
    
    if ($request->filled('developer')) {
        $query->where('developer', 'Ilike', '%' . trim($request->developer) . '%');
    }

    $properties = $query->get();
    
    return view('properties.index', compact('properties'));
});

// Route untuk Halaman Detail (Menampilkan Data Berdasarkan ID yang diklik)
Route::get('/perumahan/{id}', function ($id) {
    $property = Property::findOrFail($id);
    return view('properties.show', compact('property'));
});