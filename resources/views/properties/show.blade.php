@extends('layouts.app')

@section('content')
<!-- Padding top pt-24 agar tidak tertutup fixed navbar -->
<div class="bg-[#F8F9FA] min-h-screen pt-24 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- BREADCRUMB -->
        <nav class="text-sm text-gray-500 mb-6 font-medium">
            <a href="/" class="hover:text-teal transition-colors">Beranda</a> <span class="mx-2">&gt;</span> 
            <a href="/perumahan" class="hover:text-teal transition-colors">Perumahan</a> <span class="mx-2">&gt;</span> 
            <span class="text-navy">Perum Griya Andalan Sejahtera</span>
        </nav>

        <!-- 1. HERO SECTION (Referensi Gambar 3) -->
        <div class="relative bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden mb-12">
            <!-- Background Image -->
            <div class="h-80 w-full bg-gray-300 relative">
                <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Cover Perumahan" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
            </div>
            
            <!-- Floating Info Card -->
            <div class="relative -mt-24 mx-6 mb-6 bg-white rounded-xl shadow-lg p-6 flex flex-col md:flex-row justify-between items-start md:items-center border-t-4 border-teal">
                <div class="mb-6 md:mb-0">
                    <h1 class="text-2xl md:text-3xl font-extrabold text-navy uppercase mb-2">Perum Griya Andalan Sejahtera</h1>
                    <div class="text-sm text-gray-600 space-y-1">
                        <p><span class="font-semibold">ID Lokasi:</span> PML0820102026T002</p>
                        <p class="uppercase">JAWA TENGAH, KAB PEMALANG, PEMALANG, WANAMULYA</p>
                        <p class="font-bold text-darkteal mt-2">PT MAKRO ARTHA HUTAMA | REAL ESTATE INDONESIA (REI)</p>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100 min-w-[250px]">
                    <h3 class="text-xs font-bold text-gray-500 uppercase mb-3 text-center">Status Rumah</h3>
                    <div class="grid grid-cols-2 gap-2 text-xs font-bold text-white text-center mb-4">
                        <div class="bg-orange py-1.5 rounded">Subsidi: 1 Unit</div>
                        <div class="bg-gray-400 py-1.5 rounded">Terjual: 0 Unit</div>
                        <div class="bg-darknavy py-1.5 rounded">Komersil: 0 Unit</div>
                        <div class="bg-gray-400 py-1.5 rounded">Terjual: 0 Unit</div>
                    </div>
                    <a href="#siteplan" class="block w-full text-center bg-teal hover:bg-darkteal text-white font-bold py-2.5 rounded-lg transition-colors shadow-sm">
                        Lihat Siteplan Digital
                    </a>
                </div>
            </div>
        </div>

        <!-- 2. SPESIFIKASI & KONTAK (Referensi Gambar 2) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">
            
            <!-- Kolom Kiri: Kontak & Peta -->
            <div class="space-y-8">
                <!-- Kantor Pemasaran -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-navy border-b border-gray-100 pb-3 mb-4">Kantor Pemasaran</h2>
                    <div class="text-sm text-gray-600 space-y-3 mb-6">
                        <p class="uppercase leading-relaxed">JL. SULAWESI NO. 41 JAWA TENGAH, KAB PEMALANG, PEMALANG, MULYOHARJO</p>
                        <p><span class="font-semibold text-gray-800">Telp:</span> 08156533080</p>
                        <p><span class="font-semibold text-gray-800">Email:</span> ptmakroarthahutama@gmail.com</p>
                    </div>
                    <a href="#" class="flex items-center justify-center gap-2 w-full bg-[#25D366] hover:bg-[#1EBE5D] text-white font-bold py-2.5 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 21.045h-.005l-3.328-.88-3.084 1.58.58-3.385-.88-3.332A9.957 9.957 0 012.015 12C2.015 6.486 6.501 2 12.015 2s10.015 4.486 10.015 10-4.485 10-10.015 10m-5.46-3.805l1.968-.992.56 1.874a7.973 7.973 0 002.916.55c4.411 0 8.015-3.604 8.015-8.015S16.426 4 12.015 4 4.015 7.604 4.015 12.015c0 1.346.335 2.658.97 3.805l.556 1.884z"></path></svg>
                        WhatsApp Kantor Pemasaran
                    </a>
                </div>

                <!-- Peta Lokasi -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-navy border-b border-gray-100 pb-3 mb-4">Peta Lokasi</h2>
                    <!-- Placeholder Map -->
                    <div class="w-full h-48 bg-gray-200 rounded-lg overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Map Placeholder" class="w-full h-full object-cover opacity-60">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="bg-navy text-white px-3 py-1 rounded text-xs font-bold shadow">Google Maps Area</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Tipe Rumah & Spesifikasi -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Tipe Rumah -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 lg:p-8">
                    <h2 class="text-xl font-extrabold text-navy border-b border-gray-100 pb-3 mb-6">Tipe Rumah</h2>
                    
                    <div class="mb-8">
                        <h3 class="text-lg font-bold text-darkteal mb-4">1. Tipe 36/71 (Subsidi)</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Foto & Denah -->
                            <div class="md:col-span-2 grid grid-cols-2 gap-4">
                                <div class="bg-gray-100 rounded-lg overflow-hidden h-40 border border-gray-200">
                                    <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Foto Rumah" class="w-full h-full object-cover">
                                </div>
                                <div class="bg-gray-100 rounded-lg overflow-hidden h-40 border border-gray-200 flex items-center justify-center">
                                    <span class="text-gray-400 font-bold text-sm">Denah Rumah</span>
                                </div>
                            </div>
                            
                            <!-- Rincian -->
                            <div class="bg-[#FDFBF7] p-4 rounded-lg border border-orange/20">
                                <p class="text-xs text-gray-500 uppercase mb-1">Harga</p>
                                <p class="text-xl font-bold text-orange mb-4">Rp 160.340.000</p>
                                <ul class="text-sm text-gray-700 space-y-2 font-medium">
                                    <li class="flex justify-between border-b border-gray-200 pb-1"><span>Luas Bangunan:</span> <span>36m²</span></li>
                                    <li class="flex justify-between border-b border-gray-200 pb-1"><span>Luas Lahan:</span> <span>71m²</span></li>
                                    <li class="flex justify-between border-b border-gray-200 pb-1"><span>Kamar Tidur:</span> <span>2</span></li>
                                    <li class="flex justify-between border-b border-gray-200 pb-1"><span>Kamar Mandi:</span> <span>1</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Spesifikasi Teknis -->
                    <div class="pt-6 border-t border-gray-100">
                        <h3 class="text-lg font-bold text-navy mb-4">Spesifikasi Teknis</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                            <div>
                                <p class="font-bold text-gray-800 mb-1">a. Atap</p>
                                <p class="text-gray-600">Rangka Hollow Besi Penutup Genteng Multiroof Pasir</p>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800 mb-1">b. Dinding</p>
                                <p class="text-gray-600">Dinding Beton</p>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800 mb-1">c. Lantai & Pondasi</p>
                                <p class="text-gray-600">Keramik Motif Teraso & Foot Plat Batu Belah</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. SITEPLAN & KETERSEDIAAN (Referensi Gambar 1) -->
        <div id="siteplan" class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-navy px-6 py-4">
                <h2 class="text-xl font-extrabold text-white">Siteplan & Ketersediaan Unit</h2>
            </div>
            
            <div class="grid grid-cols-1 xl:grid-cols-4">
                
                <!-- Sidebar Status & Filter -->
                <div class="xl:col-span-1 border-r border-gray-200 p-6 bg-[#FCFCFA]">
                    
                    <h3 class="font-bold text-navy uppercase text-sm mb-4 border-b border-gray-200 pb-2">Status Unit</h3>
                    
                    <!-- Grid Legend Status -->
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <!-- Komersil -->
                        <div>
                            <div class="text-[10px] font-bold text-center text-gray-500 uppercase mb-2">Komersil</div>
                            <div class="space-y-1.5 text-[10px] text-white font-bold text-center">
                                <div class="bg-gray-500 py-1.5 rounded shadow-sm">0 Kavling</div>
                                <div class="bg-yellow-700 py-1.5 rounded shadow-sm">0 Pembangunan</div>
                                <div class="bg-gray-800 py-1.5 rounded shadow-sm">0 Ready Stock</div>
                                <div class="bg-purple-700 py-1.5 rounded shadow-sm">0 Dipesan</div>
                                <div class="bg-gray-600 py-1.5 rounded shadow-sm">0 Terjual</div>
                            </div>
                        </div>
                        
                        <!-- Subsidi -->
                        <div>
                            <div class="text-[10px] font-bold text-center text-gray-500 uppercase mb-2">Subsidi</div>
                            <div class="space-y-1.5 text-[10px] text-white font-bold text-center">
                                <div class="bg-yellow-400 py-1.5 rounded shadow-sm text-yellow-900">1 Kavling</div>
                                <div class="bg-orange py-1.5 rounded shadow-sm">0 Pembangunan</div>
                                <div class="bg-green-600 py-1.5 rounded shadow-sm">0 Ready Stock</div>
                                <div class="bg-blue-600 py-1.5 rounded shadow-sm">0 Proses Bank</div>
                                <div class="bg-red-600 py-1.5 rounded shadow-sm">0 Terjual</div>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Dropdowns -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1">Blok:</label>
                            <select class="w-full border border-gray-300 rounded p-2 text-sm text-gray-600 focus:outline-none focus:border-teal">
                                <option>Semua blok</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1">Tipe Rumah:</label>
                            <select class="w-full border border-gray-300 rounded p-2 text-sm text-gray-600 focus:outline-none focus:border-teal">
                                <option>Filter tipe rumah</option>
                            </select>
                        </div>
                    </div>

                </div>

                <!-- Area Gambar Siteplan -->
                <div class="xl:col-span-3 p-8 flex items-center justify-center min-h-[500px] bg-white relative">
                    <!-- Placeholder untuk Canvas/SVG Siteplan -->
                    <div class="absolute inset-0 border-4 border-dashed border-gray-200 m-8 flex items-center justify-center rounded-xl bg-gray-50">
                        <div class="text-center">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                            <p class="text-gray-400 font-bold text-lg">Area Digital Siteplan</p>
                            <p class="text-gray-400 text-sm mt-2">Gambar SVG kavling interaktif akan dirender di sini.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection