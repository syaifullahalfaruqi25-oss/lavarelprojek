@extends('layouts.app')

@section('content')
@php
    $totalPerumahan = \App\Models\Property::count();
    $totalUnit = \App\Models\Property::sum('subsidi_unit')
               + \App\Models\Property::sum('komersil_unit')
               + \App\Models\Property::sum('premium_unit');
    $totalDeveloper = \App\Models\Property::distinct('developer')->count('developer');
@endphp

<div class="bg-[#F8F9FA] min-h-screen">

    {{-- HERO --}}
    <section class="relative bg-gradient-to-br from-[#172744] via-[#1B2A47] to-[#23466F] pt-36 pb-28 overflow-hidden">
        <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-[#38A89D]/10 blur-3xl"></div>
        <div class="absolute -bottom-32 -left-24 w-96 h-96 rounded-full bg-white/5 blur-3xl"></div>

        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block text-[#4FD1C5] text-xs font-semibold tracking-[0.25em] uppercase mb-4">
                Tentang Kami
            </span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight mb-5">
                Platform Informasi Properti<br class="hidden md:block"> yang Terpercaya
            </h1>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto leading-relaxed">
                SolusiProperti membantu masyarakat menemukan hunian yang sesuai melalui informasi
                perumahan yang lengkap, transparan, dan mudah diakses.
            </p>
        </div>
    </section>

    {{-- STATISTIK (menumpuk di atas hero) --}}
    <section class="relative -mt-14 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 grid grid-cols-1 sm:grid-cols-3 divide-y sm:divide-y-0 sm:divide-x divide-gray-100">
            <div class="p-8 text-center">
                <p class="text-4xl font-extrabold text-[#23466F]">{{ number_format($totalPerumahan) }}</p>
                <p class="text-sm text-gray-500 mt-1 font-medium">Perumahan Terdaftar</p>
            </div>
            <div class="p-8 text-center">
                <p class="text-4xl font-extrabold text-[#23466F]">{{ number_format($totalUnit) }}</p>
                <p class="text-sm text-gray-500 mt-1 font-medium">Unit Hunian</p>
            </div>
            <div class="p-8 text-center">
                <p class="text-4xl font-extrabold text-[#23466F]">{{ number_format($totalDeveloper) }}</p>
                <p class="text-sm text-gray-500 mt-1 font-medium">Developer Mitra</p>
            </div>
        </div>
    </section>

    {{-- PROFIL --}}
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-[#2A8575] text-xs font-semibold tracking-[0.2em] uppercase">Siapa Kami</span>
                <h2 class="text-3xl font-extrabold text-[#1A2639] mt-2 mb-5">SolusiProperti</h2>
                <p class="text-gray-600 leading-relaxed mb-4">
                    SolusiProperti adalah platform informasi properti yang dirancang untuk memudahkan
                    masyarakat dalam mencari dan memperoleh informasi mengenai hunian.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Kami menyajikan data perumahan, tipe rumah, spesifikasi, lokasi, ketersediaan unit,
                    hingga siteplan digital secara terstruktur, sehingga calon pembeli dapat mengambil
                    keputusan dengan lebih yakin.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-4">
                <div class="bg-white rounded-2xl border border-gray-200 p-6 shadow-sm">
                    <h3 class="font-bold text-[#23466F] mb-2">Visi</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Menjadi platform informasi hunian yang menjadi rujukan utama masyarakat dalam
                        menemukan rumah impian.
                    </p>
                </div>
                <div class="bg-white rounded-2xl border border-gray-200 p-6 shadow-sm">
                    <h3 class="font-bold text-[#23466F] mb-2">Misi</h3>
                    <ul class="text-sm text-gray-600 space-y-2 leading-relaxed">
                        <li class="flex gap-2"><span class="text-[#2A8575] font-bold">&#10003;</span> Menyajikan informasi perumahan yang akurat dan terbarui.</li>
                        <li class="flex gap-2"><span class="text-[#2A8575] font-bold">&#10003;</span> Mempermudah proses pencarian dan pemesanan unit.</li>
                        <li class="flex gap-2"><span class="text-[#2A8575] font-bold">&#10003;</span> Menghubungkan calon pembeli dengan pihak pemasaran secara langsung.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- LAYANAN --}}
    <section class="bg-white border-y border-gray-200 py-20">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-[#2A8575] text-xs font-semibold tracking-[0.2em] uppercase">Layanan</span>
                <h2 class="text-3xl font-extrabold text-[#1A2639] mt-2">Apa yang Kami Tawarkan</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="rounded-2xl border border-gray-200 p-7 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-[#23466F]/10 text-[#23466F] flex items-center justify-center mb-5">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M5 10v10h5v-6h4v6h5V10"/></svg>
                    </div>
                    <h3 class="font-bold text-[#1A2639] mb-2">Pilihan Hunian</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Beragam perumahan dan tipe rumah dengan kategori Subsidi, Menengah, dan Premium.</p>
                </div>

                <div class="rounded-2xl border border-gray-200 p-7 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-[#2A8575]/10 text-[#2A8575] flex items-center justify-center mb-5">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <h3 class="font-bold text-[#1A2639] mb-2">Lokasi & Peta</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Informasi lokasi lengkap dengan peta interaktif yang terhubung ke Google Maps.</p>
                </div>

                <div class="rounded-2xl border border-gray-200 p-7 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-[#D98A2C]/10 text-[#D98A2C] flex items-center justify-center mb-5">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4"/></svg>
                    </div>
                    <h3 class="font-bold text-[#1A2639] mb-2">Siteplan Digital</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Lihat ketersediaan kavling secara visual dan pesan unit yang Anda minati.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ALUR --}}
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center mb-12">
            <span class="text-[#2A8575] text-xs font-semibold tracking-[0.2em] uppercase">Cara Kerja</span>
            <h2 class="text-3xl font-extrabold text-[#1A2639] mt-2">Mudah dalam 4 Langkah</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ([
                ['1', 'Cari Perumahan', 'Gunakan filter jenis, lokasi, dan developer.'],
                ['2', 'Lihat Detail', 'Pelajari tipe rumah, spesifikasi, dan siteplan.'],
                ['3', 'Pre-order', 'Isi formulir dan pilih kavling yang tersedia.'],
                ['4', 'Dihubungi Tim', 'Tim pemasaran menghubungi Anda untuk proses lanjut.'],
            ] as [$no, $judul, $isi])
                <div class="text-center">
                    <div class="w-14 h-14 mx-auto rounded-full bg-[#23466F] text-white text-xl font-extrabold flex items-center justify-center mb-4 shadow-lg">
                        {{ $no }}
                    </div>
                    <h3 class="font-bold text-[#1A2639] mb-1">{{ $judul }}</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">{{ $isi }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- CTA --}}
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <div class="rounded-3xl bg-gradient-to-r from-[#172744] to-[#23466F] px-8 py-12 text-center shadow-xl">
            <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-3">Siap Menemukan Hunian Impian Anda?</h2>
            <p class="text-gray-300 mb-8">Jelajahi pilihan perumahan kami dan temukan yang paling sesuai.</p>
            <a href="{{ url('/perumahan') }}"
                class="inline-block bg-[#2A8575] hover:bg-[#1f6b5d] text-white font-semibold px-8 py-3 rounded-xl transition-all duration-300 hover:-translate-y-0.5 shadow-lg">
                Lihat Katalog Perumahan
            </a>
        </div>
    </section>

</div>
@endsection