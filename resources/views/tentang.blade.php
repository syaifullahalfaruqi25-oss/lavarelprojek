@extends('layouts.app')

@section('content')
    @php
        $totalPerumahan = \App\Models\Property::count();

        $totalUnit = \App\Models\Property::sum('subsidi_unit')
            + \App\Models\Property::sum('komersil_unit')
            + \App\Models\Property::sum('premium_unit');

        $totalDeveloper = \App\Models\Property::distinct('developer')->count('developer');
    @endphp

    <div class="bg-[#FAFAF8] min-h-screen">

        {{-- HERO --}}
        <section class="relative bg-[#171717] pt-36 pb-28 overflow-hidden">
            <div class="absolute top-0 right-0 w-80 h-80 rounded-full bg-[#C9A227]/[0.07] blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 rounded-full bg-white/[0.025] blur-3xl"></div>

            <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <span class="inline-block text-[#D8B64C] text-xs font-bold tracking-[0.25em] uppercase mb-4">
                    Tentang Kami
                </span>

                <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight mb-5">
                    Platform Informasi Properti<br class="hidden md:block">
                    yang Terpercaya
                </h1>

                <p class="text-base md:text-lg text-white/65 max-w-2xl mx-auto leading-relaxed">
                    Solusi Properti membantu masyarakat menemukan hunian yang sesuai melalui informasi
                    perumahan yang lengkap, transparan, dan mudah diakses.
                </p>

                <div class="w-16 h-1 bg-[#C9A227] rounded-full mx-auto mt-8"></div>
            </div>
        </section>

        {{-- STATISTIK --}}
        <section class="relative -mt-14 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="bg-white rounded-2xl border border-[#E8E5DC] shadow-[0_4px_20px_rgba(25,25,25,0.05)] grid grid-cols-1 sm:grid-cols-3 divide-y sm:divide-y-0 sm:divide-x divide-[#EEECE6]">
                <div class="p-8 text-center">
                    <p class="text-4xl font-extrabold text-[#A88724]">
                        {{ number_format($totalPerumahan) }}
                    </p>
                    <p class="text-sm text-[#777777] mt-2 font-medium">Perumahan Terdaftar</p>
                </div>

                <div class="p-8 text-center">
                    <p class="text-4xl font-extrabold text-[#A88724]">
                        {{ number_format($totalUnit) }}
                    </p>
                    <p class="text-sm text-[#777777] mt-2 font-medium">Unit Hunian</p>
                </div>

                <div class="p-8 text-center">
                    <p class="text-4xl font-extrabold text-[#A88724]">
                        {{ number_format($totalDeveloper) }}
                    </p>
                    <p class="text-sm text-[#777777] mt-2 font-medium">Developer Mitra</p>
                </div>
            </div>
        </section>

        {{-- PROFIL --}}
        <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="text-[#A88724] text-xs font-bold tracking-[0.2em] uppercase">
                        Siapa Kami
                    </span>

                    <h2 class="text-3xl font-extrabold text-[#171717] mt-2 mb-5">
                        Solusi Properti
                    </h2>

                    <div class="w-12 h-1 bg-[#C9A227] rounded-full mb-6"></div>

                    <p class="text-[#666666] leading-relaxed mb-4">
                        Solusi Properti adalah platform informasi properti yang dirancang untuk memudahkan
                        masyarakat dalam mencari dan memperoleh informasi mengenai hunian.
                    </p>

                    <p class="text-[#666666] leading-relaxed">
                        Kami menyajikan data perumahan, tipe rumah, spesifikasi, lokasi, ketersediaan unit,
                        hingga siteplan digital secara terstruktur, sehingga calon pembeli dapat mengambil
                        keputusan dengan lebih yakin.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-4">
                    <div
                        class="bg-white rounded-2xl border border-[#E8E5DC] p-6 shadow-[0_2px_10px_rgba(25,25,25,0.025)] hover:border-[#C9A227]/50 transition-colors">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-xl bg-[#FBF6E6] text-[#A88724] flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                        d="M12 3l7 4v5c0 4.5-3 7-7 9-4-2-7-4.5-7-9V7l7-4z" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-[#171717]">Visi</h3>
                        </div>

                        <p class="text-sm text-[#666666] leading-relaxed">
                            Menjadi platform informasi hunian yang menjadi rujukan utama masyarakat dalam
                            menemukan rumah impian.
                        </p>
                    </div>

                    <div
                        class="bg-white rounded-2xl border border-[#E8E5DC] p-6 shadow-[0_2px_10px_rgba(25,25,25,0.025)] hover:border-[#C9A227]/50 transition-colors">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-xl bg-[#FBF6E6] text-[#A88724] flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 12l4 4L19 6" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-[#171717]">Misi</h3>
                        </div>

                        <ul class="text-sm text-[#666666] space-y-3 leading-relaxed">
                            <li class="flex gap-2">
                                <span class="text-[#A88724] font-bold">✓</span>
                                <span>Menyajikan informasi perumahan yang akurat dan terbarui.</span>
                            </li>
                            <li class="flex gap-2">
                                <span class="text-[#A88724] font-bold">✓</span>
                                <span>Mempermudah proses pencarian dan pemesanan unit.</span>
                            </li>
                            <li class="flex gap-2">
                                <span class="text-[#A88724] font-bold">✓</span>
                                <span>Menghubungkan calon pembeli dengan pihak pemasaran secara langsung.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        {{-- LAYANAN --}}
        <section class="bg-white border-y border-[#EAE7DF] py-20">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <span class="text-[#A88724] text-xs font-bold tracking-[0.2em] uppercase">
                        Layanan
                    </span>

                    <h2 class="text-3xl font-extrabold text-[#171717] mt-2">
                        Apa yang Kami Tawarkan
                    </h2>

                    <p class="text-sm text-[#777777] mt-3 max-w-xl mx-auto">
                        Informasi dan fitur untuk membantu Anda menemukan hunian dengan lebih mudah.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div
                        class="bg-[#FAFAF8] rounded-2xl border border-[#E8E5DC] p-7 hover:border-[#C9A227]/60 hover:-translate-y-1 transition-all duration-300">
                        <div class="w-12 h-12 rounded-xl bg-[#FBF6E6] text-[#A88724] flex items-center justify-center mb-5">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l9-9 9 9M5 10v10h5v-6h4v6h5V10" />
                            </svg>
                        </div>

                        <h3 class="font-bold text-[#171717] mb-2">Pilihan Hunian</h3>
                        <p class="text-sm text-[#666666] leading-relaxed">
                            Beragam perumahan dan tipe rumah dengan kategori Subsidi, Menengah, dan Premium.
                        </p>
                    </div>

                    <div
                        class="bg-[#FAFAF8] rounded-2xl border border-[#E8E5DC] p-7 hover:border-[#C9A227]/60 hover:-translate-y-1 transition-all duration-300">
                        <div class="w-12 h-12 rounded-xl bg-[#FBF6E6] text-[#A88724] flex items-center justify-center mb-5">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>

                        <h3 class="font-bold text-[#171717] mb-2">Lokasi & Peta</h3>
                        <p class="text-sm text-[#666666] leading-relaxed">
                            Informasi lokasi lengkap dengan peta interaktif yang terhubung ke Google Maps.
                        </p>
                    </div>

                    <div
                        class="bg-[#FAFAF8] rounded-2xl border border-[#E8E5DC] p-7 hover:border-[#C9A227]/60 hover:-translate-y-1 transition-all duration-300">
                        <div class="w-12 h-12 rounded-xl bg-[#FBF6E6] text-[#A88724] flex items-center justify-center mb-5">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4" />
                            </svg>
                        </div>

                        <h3 class="font-bold text-[#171717] mb-2">Siteplan Digital</h3>
                        <p class="text-sm text-[#666666] leading-relaxed">
                            Lihat ketersediaan kavling secara visual dan pesan unit yang Anda minati.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- ALUR --}}
        <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center mb-12">
                <span class="text-[#A88724] text-xs font-bold tracking-[0.2em] uppercase">
                    Cara Kerja
                </span>

                <h2 class="text-3xl font-extrabold text-[#171717] mt-2">
                    Mudah dalam 4 Langkah
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ([
                        ['1', 'Cari Perumahan', 'Gunakan filter jenis, lokasi, dan developer.'],
                        ['2', 'Lihat Detail', 'Pelajari tipe rumah, spesifikasi, dan siteplan.'],
                        ['3', 'Pre-order', 'Isi formulir dan pilih kavling yang tersedia.'],
                        ['4', 'Dihubungi Tim', 'Tim pemasaran menghubungi Anda untuk proses lanjut.'],
                    ] as [$no, $judul, $isi])
                    <div
                        class="bg-white border border-[#E8E5DC] rounded-2xl p-6 text-center hover:border-[#C9A227]/60 transition-colors">
                        <div
                            class="w-14 h-14 mx-auto rounded-2xl bg-[#171717] text-[#D8B64C] text-xl font-extrabold flex items-center justify-center mb-4">
                            {{ $no }}
                        </div>

                        <h3 class="font-bold text-[#171717] mb-2">{{ $judul }}</h3>
                        <p class="text-sm text-[#777777] leading-relaxed">{{ $isi }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- CTA --}}
        <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
            <div
                class="relative overflow-hidden rounded-3xl bg-[#171717] border border-[#C9A227]/25 px-8 py-12 md:py-14 text-center">
                <div class="absolute -top-20 -right-10 w-56 h-56 rounded-full bg-[#C9A227]/[0.07] blur-3xl"></div>

                <div class="relative">
                    <span class="text-[#D8B64C] text-xs font-bold tracking-[0.2em] uppercase">
                        Mulai Sekarang
                    </span>

                    <h2 class="text-2xl md:text-3xl font-extrabold text-white mt-3 mb-3">
                        Siap Menemukan Hunian Impian Anda?
                    </h2>

                    <p class="text-white/60 mb-8">
                        Jelajahi pilihan perumahan kami dan temukan yang paling sesuai.
                    </p>

                    <a href="{{ url('/perumahan') }}"
                        class="inline-flex items-center justify-center gap-2 bg-[#C9A227] hover:bg-[#D8B64C] text-[#171717] font-bold px-8 py-3.5 rounded-xl transition-colors duration-200">
                        Lihat Katalog Perumahan

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>

    </div>
@endsection