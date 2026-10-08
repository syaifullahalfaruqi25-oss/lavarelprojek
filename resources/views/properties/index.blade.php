@extends('layouts.app')

@section('content')
    <div class="min-h-screen pt-24 pb-20 bg-[#080808]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Section -->
            <div class="mb-8 border-b border-[#D4AF37]/20 pb-4">
                <h2 class="text-3xl font-extrabold text-[#FFD700] tracking-tight">
                    Katalog Perumahan
                </h2>
                <p class="text-white/50 mt-2">
                    Daftar hunian eksklusif yang tersedia untuk Anda.
                </p>
            </div>

            <!-- Box Filter -->
            <div class="bg-[#111111] p-6 rounded-xl shadow-[0_4px_25px_rgba(0,0,0,0.4)] border border-white/10 mb-12">

                <form action="{{ url()->current() }}" method="GET" class="flex flex-col md:flex-row gap-4">

                    <select name="Jenis" onchange="this.form.submit()"
                        class="flex-1 bg-[#171717] border border-white/10 rounded-md px-4 py-2.5 text-sm text-white/80 focus:border-[#D4AF37] focus:ring-[#D4AF37]">
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

                    <select name="kota" onchange="this.form.submit()"
                        class="flex-1 bg-[#171717] border border-white/10 rounded-md px-4 py-2.5 text-sm text-white/80 focus:border-[#D4AF37] focus:ring-[#D4AF37]">
                        <option value="">Pilih Kabupaten/Kota</option>
                        <option value="Batang" {{ request('kota') == 'Batang' ? 'selected' : '' }}>
                            Batang
                        </option>
                        <option value="Pekalongan" {{ request('kota') == 'Pekalongan' ? 'selected' : '' }}>
                            Pekalongan
                        </option>
                    </select>

                    <select name="kecamatan" onchange="this.form.submit()"
                        class="flex-1 bg-[#171717] border border-white/10 rounded-md px-4 py-2.5 text-sm text-white/80 focus:border-[#D4AF37] focus:ring-[#D4AF37]">
                        <option value="">Pilih Kecamatan</option>
                        <option value="Banyuputih" {{ request('kecamatan') == 'Banyuputih' ? 'selected' : '' }}>
                            Banyuputih
                        </option>
                        <option value="Kandeman" {{ request('kecamatan') == 'Kandeman' ? 'selected' : '' }}>
                            Kandeman
                        </option>
                        <option value="Blado" {{ request('kecamatan') == 'Blado' ? 'selected' : '' }}>
                            Blado
                        </option>
                    </select>

                    <select name="developer" onchange="this.form.submit()"
                        class="flex-1 bg-[#171717] border border-white/10 rounded-md px-4 py-2.5 text-sm text-white/80 focus:border-[#D4AF37] focus:ring-[#D4AF37]">
                        <option value="">Pilih Developer</option>
                        <option value="PT Anugrah Bungsu Mandiri" {{ request('developer') == 'PT Anugrah Bungsu Mandiri' ? 'selected' : '' }}>
                            PT Anugrah Bungsu Mandiri
                        </option>
                        <option value="Gepenk dev" {{ request('developer') == 'Gepenk dev' ? 'selected' : '' }}>
                            Gepenk dev
                        </option>
                    </select>

                    <a href="{{ url('/perumahan') }}"
                        class="bg-[#222222] hover:bg-[#D4AF37] hover:text-black text-white/70 px-6 py-2.5 rounded-md font-bold text-sm transition-all duration-300 flex items-center justify-center border border-white/10">
                        RESET
                    </a>

                </form>
            </div>

            <!-- Grid Properti -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse($properties as $prop)

                    <!-- Card Looping Dinamis -->
                    <div
                        class="bg-[#111111] rounded-xl shadow-[0_5px_25px_rgba(0,0,0,0.45)] hover:shadow-[0_8px_35px_rgba(212,175,55,0.12)] transition-all duration-300 overflow-hidden flex flex-col border border-white/10 hover:border-[#D4AF37]/40">

                        <div class="relative h-56 bg-[#171717] overflow-hidden">

                            @if ($prop->image)
                                <img src="{{ Storage::disk('s3')->url($prop->image) }}" alt="{{ $prop->name }}"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-white/30 text-sm">
                                    Tidak ada gambar
                                </div>
                            @endif

                            <!-- Badge Lokasi -->
                            <div
                                class="absolute top-3 left-3 bg-[#D4AF37] text-black text-[10px] font-bold px-2.5 py-1 rounded shadow-[0_0_12px_rgba(212,175,55,0.3)]">
                                Lokasi Aktif
                            </div>

                            <!-- Badge Rumah -->
                            <div
                                class="absolute top-3 right-3 bg-[#080808]/90 text-[#FFD700] border border-[#D4AF37]/50 text-[10px] font-bold px-2.5 py-1 rounded shadow-sm">
                                Rumah Tapak
                            </div>

                        </div>

                        <div class="p-5 flex-grow">

                            <h3 class="text-lg font-bold text-[#FFD700] mb-1 uppercase">
                                {{ $prop->name }}
                            </h3>

                            <p class="text-xs font-semibold text-white/70 mb-2">
                                {{ $prop->developer }}
                            </p>

                            <p class="text-[11px] text-white/40 mb-4 leading-relaxed uppercase">
                                {{ $prop->location }}
                            </p>

                            <div class="flex flex-wrap gap-1.5">

                                <span class="bg-[#D4AF37] text-black text-[10px] font-bold px-2 py-1 rounded">
                                    {{ $prop->subsidi_unit }} Unit subsidi
                                </span>

                                <span
                                    class="bg-[#222222] text-[#FFD700] border border-[#D4AF37]/30 text-[10px] font-bold px-2 py-1 rounded">
                                    {{ $prop->menengah_unit }} Unit menengah
                                </span>

                                <span
                                    class="bg-[#333333] text-[#FFD700] border border-[#D4AF37]/30 text-[10px] font-bold px-2 py-1 rounded">
                                    {{ $prop->premium_unit }} Unit premium
                                </span>

                                <span
                                    class="bg-[#171717] text-white/60 border border-white/10 text-[10px] font-bold px-2 py-1 rounded">
                                    {{ $prop->id_lokasi ?? '-' }}
                                </span>

                            </div>

                        </div>

                        <div class="p-4 bg-[#0D0D0D] border-t border-white/10">

                            <a href="/perumahan/{{ $prop->id }}"
                                class="block w-full text-center bg-[#D4AF37] hover:bg-[#FFD700] text-black text-sm font-bold py-2.5 rounded-lg transition-all duration-300 shadow-[0_0_12px_rgba(212,175,55,0.15)] hover:shadow-[0_0_18px_rgba(255,215,0,0.3)]">
                                Lihat detail lokasi
                            </a>

                        </div>

                    </div>

                @empty

                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12">

                        <p class="text-white/40 text-lg">
                            Perumahan dengan kriteria tersebut tidak ditemukan.
                        </p>

                    </div>

                @endforelse

            </div>
        </div>
    </div>
@endsection