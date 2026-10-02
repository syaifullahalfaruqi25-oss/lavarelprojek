@extends('layouts.app')

@section('content')
    <div class="min-h-screen pt-24 pb-20 bg-[#F8F9FA]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Section -->
            <div class="mb-8 border-b border-gray-200 pb-4">
                <h2 class="text-3xl font-extrabold text-[#1A2639] tracking-tight">Katalog Perumahan</h2>
                <p class="text-gray-500 mt-2">Daftar hunian eksklusif yang tersedia untuk Anda.</p>
            </div>

            <!-- Box Filter -->
            <div class="bg-white p-6 rounded-xl shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100 mb-12">
                <form action="{{ url()->current() }}" method="GET" class="flex flex-col md:flex-row gap-4">

                    <select name="Jenis" onchange="this.form.submit()"
                        class="flex-1 border border-gray-300 rounded-md px-4 py-2.5 text-sm text-gray-600 focus:ring-[#1877F2]">
                        <option value="">Jenis Perumahan</option>
                        <option value="Subsidi" {{ request('Jenis') == 'Subsidi' ? 'selected' : '' }}>Subsidi</option>
                        <option value="Komersil" {{ request('Jenis') == 'Komersil' ? 'selected' : '' }}>Komersil</option>
                    </select>

                    <select name="kota" onchange="this.form.submit()"
                        class="flex-1 border border-gray-300 rounded-md px-4 py-2.5 text-sm text-gray-600 focus:ring-[#1877F2]">
                        <option value="">Pilih Kabupaten/Kota</option>
                        <option value="Batang" {{ request('kota') == 'Batang' ? 'selected' : '' }}>Batang</option>
                        <option value="Pekalongan" {{ request('kota') == 'Pekalongan' ? 'selected' : '' }}>Pekalongan</option>
                    </select>

                    <select name="kecamatan" onchange="this.form.submit()"
                        class="flex-1 border border-gray-300 rounded-md px-4 py-2.5 text-sm text-gray-600 focus:ring-[#1877F2]">
                        <option value="">Pilih Kecamatan</option>
                        <option value="Banyuputih" {{ request('kecamatan') == 'Banyuputih' ? 'selected' : '' }}>Banyuputih
                        </option>
                        <option value="Kandeman" {{ request('kecamatan') == 'Kandeman' ? 'selected' : '' }}>Kandeman</option>
                        <option value="Blado" {{ request('kecamatan') == 'Blado' ? 'selected' : '' }}>Blado</option>
                    </select>

                    <select name="developer" onchange="this.form.submit()"
                        class="flex-1 border border-gray-300 rounded-md px-4 py-2.5 text-sm text-gray-600 focus:ring-[#1877F2]">
                        <option value="">Pilih Developer</option>
                        <option value="PT Anugrah Bungsu Mandiri" {{ request('developer') == 'PT Anugrah Bungsu Mandiri' ? 'selected' : '' }}>PT Anugrah Bungsu Mandiri</option>
                        <option value="Gepenk dev" {{ request('developer') == 'Gepenk dev' ? 'selected' : '' }}>Gepenk dev</option>
                            <!-- Tambahkan option nama developer lainnya di sini sesuai data di database-mu -->
                    </select>

                    <a href="{{ url('/perumahan') }}"
        class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-2.5 rounded-md font-bold text-sm transition-colors flex items-center justify-center">
        RESET
    </a>
                </form>
            </div>

            <!-- Grid Properti -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse($properties as $prop)
                    <!-- Card Looping Dinamis -->
                    <div
                        class="bg-[#FDFBF7] rounded-xl shadow-[0_4px_20px_rgb(0,0,0,0.05)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.1)] transition-all duration-300 overflow-hidden flex flex-col border border-gray-100">

                        <div class="relative h-56 bg-gray-200 overflow-hidden">
                            @if ($prop->image)
    <img src="{{ Storage::disk('s3')->url($prop->image) }}" alt="{{ $prop->name }}"
        class="w-full h-full object-cover">
@else
    <div class="w-full h-full flex items-center justify-center text-gray-400 text-sm">
        Tidak ada gambar
    </div>
@endif
                            <div
                                class="absolute top-3 left-3 bg-[#2E8B57] text-white text-[10px] font-bold px-2.5 py-1 rounded shadow-sm">
                                Lokasi Aktif
                            </div>
                            <div
                                class="absolute top-3 right-3 bg-[#1E90FF] text-white text-[10px] font-bold px-2.5 py-1 rounded shadow-sm">
                                Rumah Tapak
                            </div>
                        </div>


                        <div class="p-5 flex-grow">
                            <h3 class="text-lg font-bold text-[#1A2639] mb-1 uppercase">{{ $prop->name }}</h3>
                            <p class="text-xs font-semibold text-gray-700 mb-2">{{ $prop->developer }}</p>
                            <p class="text-[11px] text-gray-500 mb-4 leading-relaxed uppercase">
                                {{ $prop->location }}
                            </p>
                            <div class="flex flex-wrap gap-1.5">
                                <span
                                    class="bg-[#D98A2C] text-white text-[10px] font-bold px-2 py-1 rounded">{{ $prop->subsidi_unit }}
                                    Unit subsidi</span>
                                <span
                                    class="bg-[#2D3748] text-white text-[10px] font-bold px-2 py-1 rounded">{{ $prop->komersil_unit }}
                                    Unit komersil</span>
                                <span
                                    class="bg-[#3A8F84] text-white text-[10px] font-bold px-2 py-1 rounded">{{ $prop->id_lokasi ?? '-' }}</span>
                            </div>
                        </div>
                        <div class="p-4 bg-white border-t border-gray-100">
                            <a href="/perumahan/{{ $prop->id }}"
                                class="block w-full text-center bg-[#357B70] hover:bg-[#2A635A] text-white text-sm font-semibold py-2.5 rounded-lg transition-colors">Lihat
                                detail lokasi</a>
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