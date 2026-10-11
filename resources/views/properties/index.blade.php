@extends('layouts.app')

@section('content')
    <div class="min-h-screen pt-24 pb-20 bg-[#FAFAF8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Katalog -->
            <div class="mb-8 border-b border-[#C9A227]/25 pb-5">
                <p class="text-xs font-bold tracking-[0.22em] uppercase text-[#A88724] mb-2">
                    PropertiLoka
                </p>
                <h2 class="text-3xl font-extrabold text-[#171717] tracking-tight">
                    Katalog Perumahan
                </h2>
                <p class="text-[#777777] mt-2 text-sm sm:text-base">
                    Temukan hunian yang sesuai dengan kebutuhan dan pilihan Anda.
                </p>
            </div>

            <!-- Box Filter -->
            <div
                class="bg-white p-5 sm:p-6 rounded-2xl border border-[#E8E5DC] shadow-[0_3px_12px_rgba(25,25,25,0.035)] mb-12">
                <div class="flex items-center gap-2 mb-5">
                    <span class="w-1 h-5 bg-[#C9A227] rounded-full"></span>
                    <h3 class="text-sm font-bold text-[#252525]">
                        Temukan Hunian
                    </h3>
                </div>

                <form action="{{ url()->current() }}" method="GET"
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">

                    <select name="Jenis" onchange="this.form.submit()"
                        class="w-full min-w-0 bg-[#FAFAF8] border border-[#E5E2D9] rounded-lg px-3 py-3 text-sm text-[#333333] focus:bg-white focus:border-[#C9A227] focus:ring-2 focus:ring-[#C9A227]/15 transition-colors">
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
                        class="w-full min-w-0 bg-[#FAFAF8] border border-[#E5E2D9] rounded-lg px-3 py-3 text-sm text-[#333333] focus:bg-white focus:border-[#C9A227] focus:ring-2 focus:ring-[#C9A227]/15 transition-colors">
                        <option value="">Pilih Kabupaten/Kota</option>
                        <option value="Batang" {{ request('kota') == 'Batang' ? 'selected' : '' }}>
                            Batang
                        </option>
                        <option value="Pekalongan" {{ request('kota') == 'Pekalongan' ? 'selected' : '' }}>
                            Pekalongan
                        </option>
                    </select>

                    <select name="kecamatan" onchange="this.form.submit()"
                        class="w-full min-w-0 bg-[#FAFAF8] border border-[#E5E2D9] rounded-lg px-3 py-3 text-sm text-[#333333] focus:bg-white focus:border-[#C9A227] focus:ring-2 focus:ring-[#C9A227]/15 transition-colors">
                        <option value="">Pilih Kecamatan</option>
                        <option value="Lebo-Candiareng" {{ request('daerah') == 'Lebo-Candiareng' ? 'selected' : '' }}>
                            Lebo - Candiareng
                        </option>
                        <option value="Tragung-Lawangaji" {{ request('daerah') == 'Tragung-Lawangaji' ? 'selected' : '' }}>
                            Tragung - Lawangaji
                        </option>
                        <option value="Kandeman-Tulis" {{ request('daerah') == 'Kandeman-Tulis' ? 'selected' : '' }}>
                            Kandeman - Tulis
                        </option>
                        <option value="Bandar-Wonotunggal" {{ request('daerah') == 'Bandar-Wonotunggal' ? 'selected' : '' }}>
                            Bandar - Wonotunggal
                        </option>
                    </select>

                    <select name="developer" onchange="this.form.submit()"
                        class="w-full min-w-0 bg-[#FAFAF8] border border-[#E5E2D9] rounded-lg px-3 py-3 text-sm text-[#333333] focus:bg-white focus:border-[#C9A227] focus:ring-2 focus:ring-[#C9A227]/15 transition-colors">
                        <option value="">Nama Perumahan</option>
                        <option value="The Royal Calista" {{ request('developer') == 'The Royal Calista' ? 'selected' : '' }}>
                            The Royal Calista
                        </option>
                        <option value="Marison Regency Batang" {{ request('developer') == 'Marison Regency Batang' ? 'selected' : '' }}>
                            Marison Regency Batang
                        </option>
                    </select>

                    <a href="{{ url('/perumahan') }}"
                        class="flex items-center justify-center gap-2 bg-[#171717] hover:bg-[#C9A227] text-white hover:text-[#171717] px-5 py-3 rounded-lg font-bold text-sm transition-colors duration-200">
                        RESET
                    </a>

                </form>
            </div>

            <!-- Grid Properti -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">

                @forelse($properties as $prop)

                    <!-- Card Perumahan -->
                    <div
                        class="group bg-white rounded-2xl overflow-hidden flex flex-col border border-[#E8E5DC] shadow-[0_2px_10px_rgba(25,25,25,0.035)] hover:border-[#C9A227]/60 hover:shadow-[0_8px_24px_rgba(25,25,25,0.075)] transition-all duration-300">

                        <!-- Foto Perumahan -->
                        <div class="relative h-56 bg-[#F0EFEA] overflow-hidden">

                            @if ($prop->image)
                                <img src="{{ Storage::disk('s3')->url($prop->image) }}" alt="{{ $prop->name }}"
                                    class="w-full h-full object-cover group-hover:scale-[1.025] transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-[#999999] text-sm">
                                    Tidak ada gambar
                                </div>
                            @endif

                            <!-- Badge Lokasi -->
                            <div
                                class="absolute top-3 left-3 bg-white/95 text-[#715A16] border border-[#C9A227]/40 text-[10px] font-bold px-3 py-1.5 rounded-md">
                                Lokasi Aktif
                            </div>

                            <!-- Badge Tipe Rumah -->
                            <div
                                class="absolute top-3 right-3 bg-[#171717]/90 text-white text-[10px] font-bold px-3 py-1.5 rounded-md">
                                Rumah Tapak
                            </div>

                        </div>

                        <!-- Informasi Perumahan -->
                        <div class="p-5 flex-grow">

                            <h3
                                class="text-lg font-bold text-[#202020] mb-2 uppercase leading-snug group-hover:text-[#A88724] transition-colors">
                                {{ $prop->name }}
                            </h3>

                            <p class="text-sm font-semibold text-[#555555] mb-2">
                                {{ $prop->developer }}
                            </p>

                            <p class="text-xs text-[#888888] mb-5 leading-relaxed uppercase">
                                {{ $prop->location }}
                            </p>

                            <!-- Jumlah Unit -->
                            <div class="flex flex-wrap gap-2">

                                <span
                                    class="bg-[#FBF6E6] text-[#80651A] border border-[#E9DCA9] text-[10px] font-bold px-2.5 py-1.5 rounded-md">
                                    {{ $prop->subsidi_unit }} Unit subsidi
                                </span>

                                <span
                                    class="bg-[#F5F5F3] text-[#555555] border border-[#E5E2D9] text-[10px] font-bold px-2.5 py-1.5 rounded-md">
                                    {{ $prop->menengah_unit }} Unit menengah
                                </span>

                                <span
                                    class="bg-[#F5F5F3] text-[#555555] border border-[#E5E2D9] text-[10px] font-bold px-2.5 py-1.5 rounded-md">
                                    {{ $prop->premium_unit }} Unit premium
                                </span>

                                <span
                                    class="bg-white text-[#777777] border border-[#E5E2D9] text-[10px] font-semibold px-2.5 py-1.5 rounded-md">
                                    {{ $prop->id_lokasi ?? '-' }}
                                </span>

                            </div>

                        </div>

                        <!-- Tombol Detail -->
                        <div class="px-5 pb-5 pt-3 border-t border-[#F0EEE8]">
                            <a href="/perumahan/{{ $prop->id }}"
                                class="flex items-center justify-center gap-2 w-full text-center bg-[#171717] hover:bg-[#C9A227] text-white hover:text-[#171717] text-sm font-bold py-3 px-4 rounded-lg transition-colors duration-200">
                                Lihat Detail Lokasi
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>

                    </div>

                @empty

                    <!-- Kondisi Data Kosong -->
                    <div
                        class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-16 bg-white rounded-2xl border border-[#E8E5DC]">
                        <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-[#FBF6E6] flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#A88724]" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 10.5L12 3l9 7.5M5.25 9v11.25h13.5V9M9 20.25v-6h6v6" />
                            </svg>
                        </div>

                        <p class="text-[#333333] text-lg font-bold">
                            Perumahan tidak ditemukan
                        </p>
                        <p class="text-[#888888] text-sm mt-2">
                            Coba ubah filter untuk melihat pilihan hunian lainnya.
                        </p>
                        <a href="{{ url('/perumahan') }}"
                            class="inline-flex mt-5 items-center justify-center bg-[#171717] hover:bg-[#C9A227] text-white hover:text-[#171717] text-sm font-bold px-5 py-2.5 rounded-lg transition-colors">
                            Lihat Semua Perumahan
                        </a>
                    </div>

                @endforelse

            </div>
        </div>
    </div>
@endsection