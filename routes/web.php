<?php

use Illuminate\Support\Facades\Route;

// Route untuk Halaman Beranda
Route::get('/', function () {
    return view('welcome');
});

// Route untuk Halaman Katalog (Daftar Perumahan)
Route::get('/perumahan', function () {
    return view('properties.index');
});

// Route untuk Halaman Detail Perumahan (Jalur Baru)
Route::get('/perumahan/{id}', function ($id) {
    return view('properties.show');
});