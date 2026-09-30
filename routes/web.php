<?php

use Illuminate\Support\Facades\Route;
use App\Models\Property;

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