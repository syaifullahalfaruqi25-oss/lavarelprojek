<?php

use Illuminate\Support\Facades\Route;
use App\Models\Property;

Route::get('/', function (\Illuminate\Http\Request $request) {
    $query = Property::query();

    // Karena di database digabung di kolom 'location', kita nyarinya pakai 'like'
    if ($request->filled('provinsi')) {
        $query->where('location', 'like', '%' . $request->provinsi . '%');
    }
    
    if ($request->filled('kota')) {
        $query->where('location', 'like', '%' . $request->kota . '%');
    }
    
    if ($request->filled('kecamatan')) {
        $query->where('location', 'like', '%' . $request->kecamatan . '%');
    }
    
    if ($request->filled('developer')) {
        $query->where('developer', 'like', '%' . $request->developer . '%');
    }

    $properties = $query->get();

    return view('welcome', compact('properties'));
});

// 1. Route untuk Halaman Katalog (Menampilkan Semua Data + Filter)
Route::get('/perumahan', function (\Illuminate\Http\Request $request) {
    $query = App\Models\Property::query();

    // Logika filternya sama persis kayak di beranda
    if ($request->filled('provinsi')) {
        $query->where('location', 'like', '%' . $request->provinsi . '%');
    }
    
    if ($request->filled('kota')) {
        $query->where('location', 'like', '%' . $request->kota . '%');
    }
    
    if ($request->filled('kecamatan')) {
        $query->where('location', 'like', '%' . $request->kecamatan . '%');
    }
    
    if ($request->filled('developer')) {
        $query->where('developer', 'like', '%' . $request->developer . '%');
    }

    $properties = $query->get();
    
    return view('properties.index', compact('properties'));
});

// 2. Route untuk Halaman Detail (Menampilkan Data Berdasarkan ID yang diklik)
Route::get('/perumahan/{id}', function ($id) {
    $property = Property::findOrFail($id);
    return view('properties.show', compact('property'));
});