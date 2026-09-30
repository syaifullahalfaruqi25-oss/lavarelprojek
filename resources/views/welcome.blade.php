@extends('layouts.app')

@section('content')
<!-- Bikin efek scroll jadi halus -->
<style>
    html { scroll-behavior: smooth; }
</style>

<!-- 1. BERANDA (Kode asli buatanmu, tidak diubah isinya) -->
<div id="beranda" class="flex flex-col items-center justify-center min-h-screen text-center pt-20">
    <h1 class="text-4xl font-extrabold text-navy mb-4">Selamat Datang di Nusantara Property</h1>
    <p class="text-lg text-gray-600 mb-8">Temukan hunian impian Anda dengan mudah dan aman.</p>
    
    <a href="/perumahan" class="bg-teal hover:bg-darkteal text-white font-bold py-3 px-8 rounded-lg transition-colors shadow-md">
        Lihat Katalog Perumahan
    </a>
</div>

<!-- 2. PERUMAHAN (Ruang kosong siap diisi) -->
<div id="perumahan" class="min-h-screen pt-20">
    <!-- Nanti kodingan isi perumahan lu taruh di sini -->
</div>

<!-- 3. TENTANG KAMI (Ruang kosong siap diisi) -->
<div id="tentang" class="min-h-screen pt-20">
    <!-- Nanti kodingan isi tentang kami lu taruh di sini -->
</div>

<!-- 4. GALERI (Ruang kosong siap diisi) -->
<div id="galeri" class="min-h-screen pt-20">
    <!-- Nanti kodingan isi galeri lu taruh di sini -->
</div>

@endsection