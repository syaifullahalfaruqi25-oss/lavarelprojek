@extends('layouts.app')

@section('content')
<style>
    html { scroll-behavior: smooth; }
</style>

<!-- 1. BERANDA (Header dari lu) -->
<div class="flex flex-col items-center justify-center min-h-[60vh] text-center pt-20">
    <h1 class="text-4xl font-extrabold text-navy mb-4">Selamat Datang di Nusantara Property</h1>
    <p class="text-lg text-gray-600 mb-8">Temukan hunian impian Anda dengan mudah dan aman.</p>
    
    <a href="#katalog-beranda" class="bg-teal hover:bg-darkteal text-white font-bold py-3 px-8 rounded-lg transition-colors shadow-md">
        Lihat Katalog Perumahan
    </a>
</div>

<!-- 2. FILTER & GRID (Udah Konek Database) -->
<div id="katalog-beranda" class="min-h-screen pt-12 pb-20 bg-[#F8F9FA]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Box Filter -->
        <div class="bg-white p-6 rounded-xl shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100 mb-12">
            <form action="{{ url()->current() }}" method="GET" class="flex flex-col md:flex-row gap-4">
                
                <select name="provinsi" onchange="this.form.submit()" class="flex-1 border border-gray-300 rounded-md px-4 py-2.5 text-sm text-gray-600 focus:ring-[#1877F2]">
                    <option value="">Pilih Provinsi</option>
                    <option value="Jawa Tengah" {{ request('provinsi') == 'Jawa Tengah' ? 'selected' : '' }}>Jawa Tengah</option>
                    <option value="Sulawesi Barat" {{ request('provinsi') == 'Sulawesi Barat' ? 'selected' : '' }}>Sulawesi Barat</option>
                </select>

                <select name="kota" onchange="this.form.submit()" class="flex-1 border border-gray-300 rounded-md px-4 py-2.5 text-sm text-gray-600 focus:ring-[#1877F2]">
                    <option value="">Pilih Kabupaten/Kota</option>
                    <option value="Batang" {{ request('kota') == 'Batang' ? 'selected' : '' }}>Batang</option>
                    <option value="Pemalang" {{ request('kota') == 'Pemalang' ? 'selected' : '' }}>Pemalang</option>
                    <option value="Mamuju" {{ request('kota') == 'Mamuju' ? 'selected' : '' }}>Mamuju</option>
                </select>

                <select name="kecamatan" onchange="this.form.submit()" class="flex-1 border border-gray-300 rounded-md px-4 py-2.5 text-sm text-gray-600 focus:ring-[#1877F2]">
                    <option value="">Pilih Kecamatan</option>
                    <option value="Banyuputih" {{ request('kecamatan') == 'Banyuputih' ? 'selected' : '' }}>Banyuputih</option>
                    <option value="Pemalang" {{ request('kecamatan') == 'Pemalang' ? 'selected' : '' }}>Pemalang</option>
                    <option value="Mamuju" {{ request('kecamatan') == 'Mamuju' ? 'selected' : '' }}>Mamuju</option>
                </select>

                <input type="text" name="developer" placeholder="Ketik nama Developer (Lalu tekan Enter)..." value="{{ request('developer') }}" 
                       class="flex-1 border border-gray-300 rounded-md px-4 py-2.5 text-sm text-gray-600 focus:ring-[#1877F2]">
                
                <a href="{{ url()->current() }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-2.5 rounded-md font-bold text-sm transition-colors flex items-center justify-center">
                    RESET
                </a>
            </form>
        </div>

        <!-- Grid Properti -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @forelse($properties as $prop)
            <div class="bg-[#FDFBF7] rounded-xl shadow-[0_4px_20px_rgb(0,0,0,0.05)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.1)] transition-all duration-300 overflow-hidden flex flex-col border border-gray-100">
                <div class="relative h-56 bg-gray-200 overflow-hidden">
                    <img src="{{ Storage::disk('s3')->url($prop->image) }}" alt="{{ $prop->name }}" class="w-full h-full object-cover">
                    <div class="absolute top-3 left-3 bg-[#2E8B57] text-white text-[10px] font-bold px-2.5 py-1 rounded shadow-sm">Lokasi Aktif</div>
                    <div class="absolute top-3 right-3 bg-[#1E90FF] text-white text-[10px] font-bold px-2.5 py-1 rounded shadow-sm">Rumah Tapak</div>
                </div>
                <div class="p-5 flex-grow">
                    <h3 class="text-lg font-bold text-[#1A2639] mb-1 uppercase">{{ $prop->name }}</h3>
                    <p class="text-xs font-semibold text-gray-700 mb-2">{{ $prop->developer }}</p>
                    <p class="text-[11px] text-gray-500 mb-4 leading-relaxed uppercase">
                        {{ $prop->location }}
                    </p>
                    <div class="flex flex-wrap gap-1.5">
                        <span class="bg-[#D98A2C] text-white text-[10px] font-bold px-2 py-1 rounded">{{ $prop->subsidi_unit }} Unit subsidi</span>
                        <span class="bg-[#2D3748] text-white text-[10px] font-bold px-2 py-1 rounded">{{ $prop->komersil_unit }} Unit komersil</span>
                        <span class="bg-[#3A8F84] text-white text-[10px] font-bold px-2 py-1 rounded">{{ $prop->id_lokasi ?? '-' }}</span>
                    </div>
                </div>
                <div class="p-4 bg-white border-t border-gray-100">
                    <a href="/perumahan/{{ $prop->id }}" class="block w-full text-center bg-[#357B70] hover:bg-[#2A635A] text-white text-sm font-semibold py-2.5 rounded-lg transition-colors">Lihat detail lokasi</a>
                </div>
            </div>
            @empty
            <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12">
                <p class="text-gray-500 text-lg">Perumahan dengan kriteria tersebut tidak ditemukan.</p>
            </div>
            @endforelse

        </div>
    </div>
</div>
@endsection