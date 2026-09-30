@extends('layouts.app')

@section('content')
<!-- Padding top (pt-32) untuk menghindari tertutup floating navbar -->
<div class="bg-[#F8F9FA] min-h-screen pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Section -->
        <div class="mb-12 border-b border-gray-200 pb-6 flex justify-between items-end">
            <div>
                <h1 class="text-3xl font-extrabold text-[#1A2639] tracking-tight">Katalog Perumahan</h1>
                <p class="text-gray-500 mt-2">Daftar hunian eksklusif yang tersedia untuk Anda.</p>
            </div>
            <!-- Bisa ditambahkan filter dropdown di sini nantinya -->
        </div>

        <!-- Grid Properti -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Card 1: GRAND CASAHEERA -->
            <div class="bg-[#FDFBF7] rounded-xl shadow-[0_4px_20px_rgb(0,0,0,0.05)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.1)] transition-all duration-300 overflow-hidden flex flex-col border border-gray-100">
                <!-- Gambar & Top Badges -->
                <div class="relative h-56 bg-gray-200 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Rumah" class="w-full h-full object-cover">
                    <!-- Badge Kiri Atas -->
                    <div class="absolute top-3 left-3 bg-[#2E8B57] text-white text-[10px] font-bold px-2.5 py-1 rounded shadow-sm">
                        Lokasi Aktif
                    </div>
                    <!-- Badge Kanan Atas -->
                    <div class="absolute top-3 right-3 bg-[#1E90FF] text-white text-[10px] font-bold px-2.5 py-1 rounded shadow-sm">
                        Rumah Tapak
                    </div>
                </div>

                <!-- Informasi Properti -->
                <div class="p-5 flex-grow">
                    <h2 class="text-lg font-bold text-[#1A2639] mb-1">GRAND CASAHEERA</h2>
                    <p class="text-xs font-semibold text-gray-700 mb-2">PT INTI TIGA BERLIAN (PERWIRANUSA)</p>
                    <p class="text-[11px] text-gray-500 mb-4 leading-relaxed uppercase">
                        JAWA TENGAH, KAB BATANG, BANYUPUTIH, KALIBALIK
                    </p>
                    
                    <!-- Ketersediaan Unit & ID -->
                    <div class="flex flex-wrap gap-1.5">
                        <span class="bg-[#D98A2C] text-white text-[10px] font-bold px-2 py-1 rounded">79 Unit subsidi</span>
                        <span class="bg-[#2D3748] text-white text-[10px] font-bold px-2 py-1 rounded">0 Unit komersil</span>
                        <span class="bg-[#3A8F84] text-white text-[10px] font-bold px-2 py-1 rounded">BTG1520022026T001</span>
                    </div>
                </div>

                <!-- Tombol Full Width di Bawah -->
                <div class="p-4 bg-white border-t border-gray-100">
                    <a href="/perumahan/1" class="block w-full text-center bg-[#357B70] hover:bg-[#2A635A] text-white text-sm font-semibold py-2.5 rounded-lg transition-colors">
                        Lihat detail lokasi
                    </a>
                </div>
            </div>

            <!-- Card 2: PERUM GRIYA ANDALAN SEJAHTERA -->
            <div class="bg-[#FDFBF7] rounded-xl shadow-[0_4px_20px_rgb(0,0,0,0.05)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.1)] transition-all duration-300 overflow-hidden flex flex-col border border-gray-100">
                <div class="relative h-56 bg-gray-200 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Rumah" class="w-full h-full object-cover">
                    <div class="absolute top-3 left-3 bg-[#2E8B57] text-white text-[10px] font-bold px-2.5 py-1 rounded shadow-sm">Lokasi Aktif</div>
                    <div class="absolute top-3 right-3 bg-[#1E90FF] text-white text-[10px] font-bold px-2.5 py-1 rounded shadow-sm">Rumah Tapak</div>
                </div>
                <div class="p-5 flex-grow">
                    <h2 class="text-lg font-bold text-[#1A2639] mb-1">PERUM GRIYA ANDALAN SEJAHTERA</h2>
                    <p class="text-xs font-semibold text-gray-700 mb-2">PT MAKRO ARTHA HUTAMA (REI)</p>
                    <p class="text-[11px] text-gray-500 mb-4 leading-relaxed uppercase">
                        JAWA TENGAH, KAB PEMALANG, PEMALANG, WANAMULYA
                    </p>
                    <div class="flex flex-wrap gap-1.5">
                        <span class="bg-[#D98A2C] text-white text-[10px] font-bold px-2 py-1 rounded">1 Unit subsidi</span>
                        <span class="bg-[#2D3748] text-white text-[10px] font-bold px-2 py-1 rounded">0 Unit komersil</span>
                        <span class="bg-[#3A8F84] text-white text-[10px] font-bold px-2 py-1 rounded">PML0820102026T002</span>
                    </div>
                </div>
                <div class="p-4 bg-white border-t border-gray-100">
                    <a href="/perumahan/2" class="block w-full text-center bg-[#357B70] hover:bg-[#2A635A] text-white text-sm font-semibold py-2.5 rounded-lg transition-colors">
                        Lihat detail lokasi
                    </a>
                </div>
            </div>

            <!-- Card 3: SIERRA PRIMANA RESIDENCE -->
            <div class="bg-[#FDFBF7] rounded-xl shadow-[0_4px_20px_rgb(0,0,0,0.05)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.1)] transition-all duration-300 overflow-hidden flex flex-col border border-gray-100">
                <div class="relative h-56 bg-gray-200 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Rumah" class="w-full h-full object-cover">
                    <div class="absolute top-3 left-3 bg-[#2E8B57] text-white text-[10px] font-bold px-2.5 py-1 rounded shadow-sm">Lokasi Aktif</div>
                    <div class="absolute top-3 right-3 bg-[#1E90FF] text-white text-[10px] font-bold px-2.5 py-1 rounded shadow-sm">Rumah Tapak</div>
                </div>
                <div class="p-5 flex-grow">
                    <h2 class="text-lg font-bold text-[#1A2639] mb-1 uppercase">Sierra Primana Residence</h2>
                    <p class="text-xs font-semibold text-gray-700 mb-2">PT WAHYU PRATAMA MAHAKARYA (REI)</p>
                    <p class="text-[11px] text-gray-500 mb-4 leading-relaxed uppercase">
                        SULAWESI BARAT, KAB MAMUJU, MAMUJU, KAREMA
                    </p>
                    <div class="flex flex-wrap gap-1.5">
                        <span class="bg-[#D98A2C] text-white text-[10px] font-bold px-2 py-1 rounded">117 Unit subsidi</span>
                        <span class="bg-[#2D3748] text-white text-[10px] font-bold px-2 py-1 rounded">0 Unit komersil</span>
                        <span class="bg-[#3A8F84] text-white text-[10px] font-bold px-2 py-1 rounded">MAM0110122026T005</span>
                    </div>
                </div>
                <div class="p-4 bg-white border-t border-gray-100">
                    <a href="/perumahan/3" class="block w-full text-center bg-[#357B70] hover:bg-[#2A635A] text-white text-sm font-semibold py-2.5 rounded-lg transition-colors">
                        Lihat detail lokasi
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection