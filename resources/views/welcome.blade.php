@extends('layouts.app')

@section('content')
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

    <!-- 1. HERO -->
    <section class="relative min-h-screen overflow-hidden bg-[#172744]">

        <!-- FOTO RUMAH -->
        <div class="absolute inset-0">
            <img src="{{ asset('images/rumah.png') }}" alt="Rumah SolusiProperti" class="w-full h-full object-cover">
        </div>

        <!-- GRADIENT OVERLAY
                     KIRI = FOTO SAMAR
                     KANAN = FOTO LEBIH TERLIHAT -->
        <div class="absolute inset-0 bg-gradient-to-r
                            from-[#172744] 
                            via-[#172744]/75 
                            to-[#172744]/10">
        </div>

        <!-- OVERLAY TIPIS AGAR WARNA FOTO TETAP SELARAS -->
        <div class="absolute inset-0 bg-[#172744]/10"></div>

        <!-- KONTEN HERO -->
        <div class="relative z-10 min-h-screen flex items-center">

            <div class="w-full max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

                <!-- DITURUNKAN SEDIKIT -->
                <div class="max-w-3xl translate-y-12">

                    <!-- JUDUL -->
                    <h1 class="text-xl sm:text-6xl lg:text-6xl
                                       font-bold
                                       leading-[1.05]
                                       tracking-tight
                                       text-white
                                       mb-6">

                        Beli properti hanya dengan

                        <span class="block text-[#3A8F84]">
                            Sekali klik.
                        </span>

                    </h1>

                    <!-- DESKRIPSI -->
                    <p class="text-lg sm:text-xl
                                      text-gray-200
                                      leading-relaxed
                                      max-w-2xl
                                      mb-9">

                        Jelajahi berbagai pilihan properti dengan informasi
                        lokasi, developer, dan tipe hunian yang mudah ditemukan
                        bersama
                        <strong class="text-white">
                            SolusiProperti.
                        </strong>

                    </p>

                    <!-- BUTTON -->
                    <a href="{{ url('/perumahan') }}" class="inline-flex items-center justify-center
                                       bg-[#3A8F84]
                                       hover:bg-[#2F756C]
                                       text-white
                                       font-bold
                                       px-8 py-4
                                       rounded-lg
                                       transition-colors duration-300">

                        Lihat Perumahan

                    </a>

                    <!-- GARIS + INFORMASI -->
                    <div class="mt-16 pt-8
                                        border-t border-white/20
                                        max-w-3xl">

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">

                            <!-- ITEM 1 -->
                            <div>
                                <h3 class="text-lg font-bold text-white mb-1">
                                    Pilihan Hunian
                                </h3>

                                <p class="text-sm text-gray-300">
                                    Beragam tipe hunian sesuai kebutuhan
                                </p>
                            </div>

                            <!-- ITEM 2 -->
                            <div>
                                <h3 class="text-lg font-bold text-white mb-1">
                                    Lokasi Strategis
                                </h3>

                                <p class="text-sm text-gray-300">
                                    Informasi lokasi yang mudah ditemukan
                                </p>
                            </div>

                            <!-- ITEM 3 -->
                            <div>
                                <h3 class="text-lg font-bold text-white mb-1">
                                    Mudah Dicari
                                </h3>

                                <p class="text-sm text-gray-300">
                                    Temukan hunian sesuai kebutuhanmu
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- 2. KENAPA PILIH KAMI -->
    <section class="bg-white py-24">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">

                <!-- BAGIAN KIRI -->
                <div>

                    <p class="text-[#3A8F84] font-bold text-sm uppercase tracking-[0.2em] mb-4">
                        Kenapa SolusiProperti?
                    </p>

                    <h2 class="text-4xl sm:text-5xl font-extrabold text-[#172744] leading-tight mb-6">
                        Temukan Rumah yang
                        <span class="text-[#3A8F84]">
                            Tepat untukmu.
                        </span>
                    </h2>

                    <p class="text-gray-600 text-lg leading-relaxed max-w-xl">
                        SolusiProperti membantu Anda menemukan berbagai pilihan
                        hunian dengan informasi yang lebih jelas, pencarian yang
                        mudah, dan pilihan lokasi yang dapat disesuaikan dengan
                        kebutuhan.
                    </p>

                </div>


                <!-- BAGIAN KANAN -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                    <!-- CARD 1 -->
                    <div class="bg-[#F5F7FA] border border-gray-100 rounded-2xl p-6
                                    hover:shadow-lg transition-shadow duration-300">

                        <div class="w-12 h-12 flex items-center justify-center mb-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#3A8F84]" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h4v-6h4v6h4a1 1 0 001-1V10" />

                            </svg>

                        </div>

                        <h3 class="text-lg font-bold text-[#172744] mb-2">
                            Pilihan Hunian
                        </h3>

                        <p class="text-sm text-gray-500 leading-relaxed">
                            Beragam pilihan perumahan untuk berbagai kebutuhan
                            dan preferensi.
                        </p>

                    </div>


                    <!-- CARD 2 -->
                    <div class="bg-[#F5F7FA] border border-gray-100 rounded-2xl p-6
                                    hover:shadow-lg transition-shadow duration-300">

                        <div class="w-12 h-12 flex items-center justify-center mb-5">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#3A8F84]" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 21s8-4.5 8-10V5l-8-3-8 3v6c0 5.5 8 10 8 10z" />

                            </svg>

                        </div>

                        <h3 class="text-lg font-bold text-[#172744] mb-2">
                            Informasi Jelas
                        </h3>

                        <p class="text-sm text-gray-500 leading-relaxed">
                            Informasi lokasi, developer, dan tipe hunian
                            tersedia dengan lebih mudah.
                        </p>

                    </div>


                    <!-- CARD 3 -->
                    <div class="bg-[#F5F7FA] border border-gray-100 rounded-2xl p-6
                                    hover:shadow-lg transition-shadow duration-300">

                        <div class="w-12 h-12 flex items-center justify-center mb-5">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#3A8F84]" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z" />

                            </svg>

                        </div>

                        <h3 class="text-lg font-bold text-[#172744] mb-2">
                            Mudah Dicari
                        </h3>

                        <p class="text-sm text-gray-500 leading-relaxed">
                            Gunakan fitur pencarian dan filter untuk menemukan
                            hunian yang sesuai.
                        </p>

                    </div>


                    <!-- CARD 4 -->
                    <div class="bg-[#F5F7FA] border border-gray-100 rounded-2xl p-6
                                    hover:shadow-lg transition-shadow duration-300">

                        <div class="w-12 h-12 flex items-center justify-center mb-5">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#3A8F84]" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 21l-4.243-4.343a8 8 0 1111.314 0z" />

                                <circle cx="12" cy="11" r="3" />

                            </svg>

                        </div>

                        <h3 class="text-lg font-bold text-[#172744] mb-2">
                            Lokasi Strategis
                        </h3>

                        <p class="text-sm text-gray-500 leading-relaxed">
                            Temukan informasi lokasi perumahan dengan lebih
                            terarah.
                        </p>

                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- 3. KATALOG PERUMAHAN -->
    <section id="katalog-beranda" class="bg-[#F8F9FA] py-24">

        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

            <!-- HEADER SECTION -->
            <div class="mb-12">

                <p class="text-[#3A8F84] font-bold text-sm uppercase tracking-[0.2em] mb-3">
                    Pilihan Hunian
                </p>

                <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-5">

                    <div>

                        <h2 class="text-4xl sm:text-5xl font-extrabold text-[#172744] leading-tight">
                            Temukan Perumahan
                            <span class="text-[#3A8F84]">
                                Pilihanmu.
                            </span>
                        </h2>

                        <p class="text-gray-500 mt-4 max-w-2xl text-base sm:text-lg leading-relaxed">
                            Gunakan filter untuk menemukan hunian berdasarkan
                            jenis, lokasi, kecamatan, dan developer.
                        </p>

                    </div>

                    <a href="{{ url('/perumahan') }}" class="inline-flex items-center justify-center
                               bg-[#172744]
                               hover:bg-[#24385D]
                               text-white
                               font-semibold
                               px-6 py-3
                               rounded-lg
                               transition-colors duration-300
                               whitespace-nowrap">

                        Lihat Semua Perumahan

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">

                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />

                        </svg>

                    </a>

                </div>

            </div>


            <!-- FILTER -->
            <div class="bg-white rounded-2xl border border-gray-100
                        shadow-[0_8px_30px_rgb(0,0,0,0.04)]
                        p-5 sm:p-6 mb-12">

                <div class="flex items-center gap-3 mb-5">

                    <div class="w-10 h-10 rounded-lg bg-[#EAF4F2]
                                flex items-center justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#3A8F84]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L15 12.414V19a1 1 0 01-.553.894l-4 2A1 1 0 019 21v-8.586L3.293 6.707A1 1 0 013 6V4z" />

                        </svg>

                    </div>

                    <div>

                        <h3 class="text-base font-bold text-[#172744]">
                            Cari Berdasarkan
                        </h3>

                        <p class="text-xs text-gray-400">
                            Sesuaikan pencarian dengan kebutuhanmu
                        </p>

                    </div>

                </div>


                <form action="{{ url('/') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">

                    <!-- JENIS -->
                    <select name="Jenis" onchange="this.form.submit()" class="w-full border border-gray-200
                               bg-[#F8F9FA]
                               rounded-lg
                               px-4 py-3
                               text-sm text-gray-600
                               outline-none
                               focus:border-[#3A8F84]
                               focus:ring-2
                               focus:ring-[#3A8F84]/10
                               transition">

                        <option value="">Jenis Perumahan</option>

                        <option value="Subsidi" {{ request('Jenis') == 'Subsidi' ? 'selected' : '' }}>
                            Subsidi
                        </option>

                        <option value="Menengah" {{ request('Jenis') == 'Menengah' ? 'selected' : '' }}>
                            Menengah
                        </option>

                        <option value="Premium" {{ request('Jenis') == 'Premium' ? 'selected' : '' }}>
                            Premium
                        </option>

                    </select>


                    <!-- KOTA -->
                    <select name="kota" onchange="this.form.submit()" class="w-full border border-gray-200
                               bg-[#F8F9FA]
                               rounded-lg
                               px-4 py-3
                               text-sm text-gray-600
                               outline-none
                               focus:border-[#3A8F84]
                               focus:ring-2
                               focus:ring-[#3A8F84]/10
                               transition">

                        <option value="">
                            Pilih Kabupaten/Kota
                        </option>

                        <option value="Batang" {{ request('kota') == 'Batang' ? 'selected' : '' }}>
                            Batang
                        </option>

                        <option value="Pemalang" {{ request('kota') == 'Pemalang' ? 'selected' : '' }}>
                            Pemalang
                        </option>

                        <option value="Mamuju" {{ request('kota') == 'Mamuju' ? 'selected' : '' }}>
                            Mamuju
                        </option>

                    </select>


                    <!-- KECAMATAN -->
                    <select name="kecamatan" onchange="this.form.submit()" class="w-full border border-gray-200
                               bg-[#F8F9FA]
                               rounded-lg
                               px-4 py-3
                               text-sm text-gray-600
                               outline-none
                               focus:border-[#3A8F84]
                               focus:ring-2
                               focus:ring-[#3A8F84]/10
                               transition">

                        <option value="">
                            Pilih Kecamatan
                        </option>

                        <option value="Banyuputih" {{ request('kecamatan') == 'Banyuputih' ? 'selected' : '' }}>
                            Banyuputih
                        </option>

                        <option value="Pemalang" {{ request('kecamatan') == 'Pemalang' ? 'selected' : '' }}>
                            Pemalang
                        </option>

                        <option value="Mamuju" {{ request('kecamatan') == 'Mamuju' ? 'selected' : '' }}>
                            Mamuju
                        </option>

                    </select>


                    <!-- DEVELOPER -->
                    <select name="developer" onchange="this.form.submit()" class="w-full border border-gray-200
                               bg-[#F8F9FA]
                               rounded-lg
                               px-4 py-3
                               text-sm text-gray-600
                               outline-none
                               focus:border-[#3A8F84]
                               focus:ring-2
                               focus:ring-[#3A8F84]/10
                               transition">

                        <option value="">
                            Pilih Developer
                        </option>

                        <option value="PT Anugrah Bungsu Mandiri" {{ request('developer') == 'PT Anugrah Bungsu Mandiri' ? 'selected' : '' }}>
                            PT Anugrah Bungsu Mandiri
                        </option>

                        <option value="Gepenk dev" {{ request('developer') == 'Gepenk dev' ? 'selected' : '' }}>
                            Gepenk dev
                        </option>

                    </select>


                    <!-- RESET -->
                    <a href="{{ url('/perumahan') }}" class="w-full
                               bg-[#172744]
                               hover:bg-[#24385D]
                               text-white
                               px-5 py-3
                               rounded-lg
                               font-semibold
                               text-sm
                               transition-colors
                               flex items-center justify-center">

                        Reset Filter

                    </a>

                </form>

            </div>


            <!-- GRID PROPERTI -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">

                @forelse($properties as $prop)

                    <div class="group
                                    bg-white
                                    rounded-2xl
                                    overflow-hidden
                                    border border-gray-100
                                    shadow-[0_6px_25px_rgb(0,0,0,0.04)]
                                    hover:shadow-[0_15px_40px_rgb(0,0,0,0.10)]
                                    transition-all duration-300
                                    flex flex-col">


                        <!-- GAMBAR -->
                        <div class="relative h-60 bg-gray-200 overflow-hidden">

                            @if ($prop->image)

                                <img src="{{ Storage::disk('s3')->url($prop->image) }}" alt="{{ $prop->name }}" class="w-full h-full object-cover
                                                   group-hover:scale-105
                                                   transition-transform duration-500">

                            @else

                                <div class="w-full h-full flex items-center justify-center
                                                    text-gray-400 text-sm">

                                    Tidak ada gambar

                                </div>

                            @endif


                            <!-- BADGE -->
                            <div class="absolute top-4 left-4
                                            bg-[#3A8F84]
                                            text-white
                                            text-[10px]
                                            font-bold
                                            uppercase
                                            tracking-wide
                                            px-3 py-1.5
                                            rounded-md
                                            shadow-sm">

                                Lokasi Aktif

                            </div>


                            <div class="absolute top-4 right-4
                                            bg-[#172744]
                                            text-white
                                            text-[10px]
                                            font-bold
                                            uppercase
                                            tracking-wide
                                            px-3 py-1.5
                                            rounded-md
                                            shadow-sm">

                                Rumah Tapak

                            </div>

                        </div>


                        <!-- INFORMASI -->
                        <div class="p-6 flex-grow">

                            <h3 class="text-lg font-bold text-[#172744]
                                           mb-1 uppercase">

                                {{ $prop->name }}

                            </h3>


                            <p class="text-sm font-semibold text-[#3A8F84] mb-2">

                                {{ $prop->developer }}

                            </p>


                            <div class="flex items-start gap-2 mb-5">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 mt-0.5 flex-shrink-0"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.657 16.657L13.414 21l-4.243-4.343a8 8 0 1111.314 0z" />

                                    <circle cx="12" cy="11" r="3" />

                                </svg>

                                <p class="text-xs text-gray-500 leading-relaxed uppercase">

                                    {{ $prop->location }}

                                </p>

                            </div>


                            <!-- UNIT -->
                            <div class="flex flex-wrap gap-2">

                                <span class="bg-[#FFF3E5]
                                                 text-[#C46F16]
                                                 text-[10px]
                                                 font-bold
                                                 px-2.5 py-1.5
                                                 rounded-md">

                                    {{ $prop->subsidi_unit }}
                                    Unit subsidi

                                </span>


                                <span class="bg-[#EEF1F5]
                                                 text-[#364152]
                                                 text-[10px]
                                                 font-bold
                                                 px-2.5 py-1.5
                                                 rounded-md">

                                    {{ $prop->komersil_unit }}
                                    Unit menengah

                                </span>


                                <span class="bg-[#F1EBFF]
                                                 text-[#6D3CC2]
                                                 text-[10px]
                                                 font-bold
                                                 px-2.5 py-1.5
                                                 rounded-md">

                                    {{ $prop->premium_unit }}
                                    Unit premium

                                </span>


                                <span class="bg-[#EAF4F2]
                                                 text-[#2F756C]
                                                 text-[10px]
                                                 font-bold
                                                 px-2.5 py-1.5
                                                 rounded-md">

                                    {{ $prop->id_lokasi ?? '-' }}

                                </span>

                            </div>

                        </div>


                        <!-- BUTTON -->
                        <div class="px-6 pb-6">

                            <a href="/perumahan/{{ $prop->id }}" class="flex items-center justify-center
                                           w-full
                                           bg-[#172744]
                                           hover:bg-[#3A8F84]
                                           text-white
                                           text-sm
                                           font-semibold
                                           py-3
                                           rounded-lg
                                           transition-colors duration-300">

                                Lihat Detail Lokasi

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">

                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />

                                </svg>

                            </a>

                        </div>

                    </div>

                @empty

                    <div class="col-span-1 md:col-span-2 lg:col-span-3
                                    text-center py-16">

                        <div class="max-w-md mx-auto">

                            <div class="w-14 h-14 mx-auto mb-5
                                            rounded-full
                                            bg-[#EAF4F2]
                                            flex items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#3A8F84]" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                                </svg>

                            </div>

                            <p class="text-gray-500 text-lg font-semibold">
                                Perumahan tidak ditemukan.
                            </p>

                            <p class="text-gray-400 text-sm mt-2">
                                Coba ubah filter pencarian untuk melihat pilihan lainnya.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </section>
@endsection