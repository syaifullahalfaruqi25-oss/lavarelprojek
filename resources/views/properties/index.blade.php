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
        </div>

        <!-- PEMBUNGKUS GRID PROPERTI MULAI DI SINI -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- DATA DINAMIS DARI DATABASE -->
            @foreach ($properties as $property)
            <div class="bg-[#FDFBF7] rounded-xl shadow-[0_4px_20px_rgb(0,0,0,0.05)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.1)] transition-all duration-300 overflow-hidden flex flex-col border border-gray-100">
                <div class="relative h-56 bg-gray-200 overflow-hidden">
                    <img src="{{ asset('images/' . $property->image) }}" alt="{{ $property->name }}" class="w-full h-full object-cover">
                </div>
                
                <div class="p-5 flex-grow">
                    <h2 class="text-lg font-bold text-[#1A2639] mb-1 uppercase">{{ $property->name }}</h2>
                    <p class="text-xs font-semibold text-gray-700 mb-2">{{ $property->developer }}</p>
                    <p class="text-[11px] text-gray-500 mb-4 leading-relaxed uppercase">
                        {{ $property->location }}
                    </p>
                    
                    <div class="flex flex-wrap gap-1.5">
                        <span class="bg-[#D98A2C] text-white text-[10px] font-bold px-2 py-1 rounded">{{ $property->subsidi_unit }} Unit subsidi</span>
                        <span class="bg-[#2D3748] text-white text-[10px] font-bold px-2 py-1 rounded">{{ $property->komersil_unit }} Unit komersil</span>
                    </div>
                </div>

                <div class="p-4 bg-white border-t border-gray-100">
                    <a href="/perumahan/{{ $property->id }}" class="block w-full text-center bg-[#357B70] hover:bg-[#2A635A] text-white text-sm font-semibold py-2.5 rounded-lg transition-colors">
                        Lihat detail lokasi
                    </a>
                </div>
            </div>
            @endforeach

            <!-- Card 1: GRAND CASAHEERA -->

            <!-- Card 2: PERUM GRIYA ANDALAN SEJAHTERA -->
           

            <!-- Card 3: SIERRA PRIMANA RESIDENCE -->
            

            <!-- Card 4: THE ROYAL CALISTA (Data Statis) -->
            

        </div> <!-- PENUTUP GRID DIPINDAH KE SINI -->

    </div>
</div>
@endsection
