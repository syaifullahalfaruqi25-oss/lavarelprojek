<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/properti', function () {

    $properties = [

        [
            'id' => 1,
            'name' => 'Grand Casheera',
            'location' => 'Banyuputih, Kabupaten Batang',
            'developer' => 'PT Inti Tiga Berlian',
        ],

        [
            'id' => 2,
            'name' => 'Griya Harmoni Residence',
            'location' => 'Mertoyudan, Kabupaten Magelang',
            'developer' => 'PT Griya Harmoni Indonesia',
        ],

        [
            'id' => 3,
            'name' => 'Taman Sejahtera Residence',
            'location' => 'Tembalang, Kota Semarang',
            'developer' => 'PT Sejahtera Nusantara',
        ],

    ];

    return view('properties.index', [
        'properties' => $properties
    ]);

});