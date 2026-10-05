<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Controllers\OrderController;

// Route untuk Beranda (Welcome) + Filter Lengkap
Route::get('/', function (Request $request) {
    $query = Property::query();

    // Filter Jenis: Subsidi / Menengah (Komersil) / Premium
    if ($request->filled('Jenis')) {
        $jenis = $request->Jenis;

        if ($jenis == 'Subsidi') {
            $query->where('subsidi_unit', '>', 0);
        } elseif ($jenis == 'Menengah') {
            $query->where('menengah_unit', '>', 0);
        } elseif ($jenis == 'Premium') {
            $query->where('premium_unit', '>', 0);
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

// Route untuk Halaman Katalog
Route::get('/perumahan', function (Request $request) {
    $query = Property::query();

    // Filter Jenis: Subsidi / Menengah (Komersil) / Premium
    if ($request->filled('Jenis')) {
        $jenis = $request->Jenis;

        if ($jenis == 'Subsidi') {
            $query->where('subsidi_unit', '>', 0);
        } elseif ($jenis == 'Menengah') {
            $query->where('menengah_unit', '>', 0);
        } elseif ($jenis == 'Premium') {
            $query->where('premium_unit', '>', 0);
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

    // Search dari Navbar
    if ($request->filled('search')) {

        $search = trim($request->search);

        $query->where(function ($q) use ($search) {
            $q->where('name', 'Ilike', '%' . $search . '%')
                ->orWhere('location', 'Ilike', '%' . $search . '%')
                ->orWhere('developer', 'Ilike', '%' . $search . '%');
        });
    }

    $properties = $query->get();

    return view('properties.index', compact('properties'));
});

// Route untuk Halaman Detail
Route::get('/perumahan/{id}', function ($id) {
   $property = Property::with(['photos', 'types', 'units'])->findOrFail($id);

    return view('properties.show', compact('property'));
})->whereNumber('id');
Route::get('/perumahan/{id}/pesan', [OrderController::class, 'create'])->name('order.create');
Route::post('/perumahan/{id}/pesan', [OrderController::class, 'store'])
    ->middleware('throttle:5,10')   // maksimal 5 kiriman per 10 menit per pengguna
    ->name('order.store');
Route::get('/pesanan/{code}', [OrderController::class, 'success'])->name('order.success');

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

// JALUR VIP: Hapus aja kode /bikin-admin sebelumnya, ganti sama yang ini wok!
Route::get('/masuk-paksa', function () {
    // 1. Bersihkan dulu email admin yang nyangkut/error
    User::where('email', 'admin@admin.com')->delete();

    // 2. Bikin akun baru dengan paksa
    $admin = User::create([
        'name' => 'Bos Nusantara',
        'email' => 'admin@admin.com',
        'password' => Hash::make('admin123')
    ]);

    // 3. INI KUNCINYA: Langsung login-kan ke sistem (Bypass form login!)
    Auth::login($admin);

    // 4. Langsung lemparkan ke dalam Dasbor Filament
    return redirect('/admin');
});