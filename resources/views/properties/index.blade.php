@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-[#F8F9FA] pb-20 pt-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8 border-b border-gray-200 pb-4">
                <h2 class="text-3xl font-extrabold tracking-tight text-[#1A2639]">Katalog Perumahan</h2>
                <p class="mt-2 text-gray-500">Daftar hunian eksklusif yang tersedia untuk Anda.</p>
            </div>

            <!-- Box Filter -->
            <div class="mb-12 rounded-xl border border-gray-100 bg-white p-6 shadow-[0_4px_20px_rgb(0,0,0,0.03)]">
                <form action="{{ url()->current() }}" method="GET" class="flex flex-col gap-4 md:flex-row">
                    <select
                        name="Jenis"
                        onchange="this.form.submit()"
                        class="flex-1 rounded-md border border-gray-300 px-4 py-2.5 text-sm text-gray-600 focus:ring-[#1877F2]"
                    >
                        <option value="">Jenis Perumahan</option>
                        <option value="Subsidi" {{ request('Jenis') == 'Subsidi' ? 'selected' : '' }}>Subsidi</option>
                        <option value="Menengah" {{ request('Jenis') == 'Menengah' ? 'selected' : '' }}>Menengah</option>
                        <option value="Premium" {{ request('Jenis') == 'Premium' ? 'selected' : '' }}>Premium</option>
                    </select>

                    <select
                        name="kota"
                        onchange="this.form.submit()"
                        class="flex-1 rounded-md border border-gray-300 px-4 py-2.5 text-sm text-gray-600 focus:ring-[#1877F2]"
                    >
                        <option value="">Pilih Kabupaten/Kota</option>
                        <option value="Batang" {{ request('kota') == 'Batang' ? 'selected' : '' }}>Batang</option>
                        <option value="Pekalongan" {{ request('kota') == 'Pekalongan' ? 'selected' : '' }}>Pekalongan</option>
                    </select>

                    <select
                        name="daerah"
                        onchange="this.form.submit()"
                        class="flex-1 rounded-md border border-gray-300 px-4 py-2.5 text-sm text-gray-600 focus:ring-[#1877F2]"
                    >
                        <option value="">Pilih Daerah</option>
                        <option value="Lebo-Candiareng" {{ request('daerah') == 'Lebo-Candiareng' ? 'selected' : '' }}>Lebo - Candiareng</option>
                        <option value="Tragung-Lawangaji" {{ request('daerah') == 'Tragung-Lawangaji' ? 'selected' : '' }}>Tragung - Lawangaji</option>
                        <option value="Kandeman-Tulis" {{ request('daerah') == 'Kandeman-Tulis' ? 'selected' : '' }}>Kandeman - Tulis</option>
                        <option value="Bandar-Wonotunggal" {{ request('daerah') == 'Bandar-Wonotunggal' ? 'selected' : '' }}>Bandar - Wonotunggal</option>
                    </select>

                    <select
                        name="developer"
                        onchange="this.form.submit()"
                        class="flex-1 rounded-md border border-gray-300 px-4 py-2.5 text-sm text-gray-600 focus:ring-[#1877F2]"
                    >
                        <option value="">Pilih Developer</option>
                        <option value="PT ROYAL CALISTA" {{ request('developer') == 'PT ROYAL CALISTA' ? 'selected' : '' }}>PT ROYAL CALISTA</option>
                        <option value="PT MARISON" {{ request('developer') == 'PT MARISON' ? 'selected' : '' }}>PT MARISON</option>
                        <!-- Tambahkan option nama developer lainnya di sini sesuai data di database-mu -->
                    </select>

                    <a
                        href="{{ url('/perumahan') }}"
                        class="flex items-center justify-center rounded-md bg-gray-200 px-6 py-2.5 text-sm font-bold text-gray-700 transition-colors hover:bg-gray-300"
                    >
                        RESET
                    </a>
                </form>
            </div>

            <!-- Grid Properti -->
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($properties as $prop)
                    <div class="flex flex-col overflow-hidden rounded-xl border border-gray-100 bg-[#FDFBF7] shadow-[0_4px_20px_rgb(0,0,0,0.05)] transition-all duration-300 hover:shadow-[0_8px_30px_rgb(0,0,0,0.1)]">
                        <div class="relative h-56 overflow-hidden bg-gray-200">
                            @if ($prop->image)
                                <img src="{{ Storage::disk('s3')->url($prop->image) }}" alt="{{ $prop->name ?? 'Properti' }}" class="h-full w-full object-cover">
                            @else
                                <div class="flex h-full w-full items-center justify-center text-sm text-gray-400">
                                    Tidak ada gambar
                                </div>
                            @endif

                            <div class="absolute left-3 top-3 rounded bg-[#2E8B57] px-2.5 py-1 text-[10px] font-bold text-white shadow-sm">
                                Lokasi Aktif
                            </div>
                            <div class="absolute right-3 top-3 rounded bg-[#1E90FF] px-2.5 py-1 text-[10px] font-bold text-white shadow-sm">
                                Rumah Tapak
                            </div>
                        </div>

                        <div class="flex-grow p-5">
                            <h3 class="mb-1 text-lg font-bold uppercase text-[#1A2639]">{{ $prop->name ?? '-' }}</h3>
                            <p class="mb-2 text-xs font-semibold text-gray-700">{{ $prop->developer ?? '-' }}</p>
                            <p class="mb-4 text-[11px] uppercase leading-relaxed text-gray-500">
                                {{ $prop->location ?? '-' }}
                            </p>

                            <div class="flex flex-wrap gap-1.5">
                                <span class="rounded bg-[#D98A2C] px-2 py-1 text-[10px] font-bold text-white">{{ $prop->subsidi_unit ?? 0 }} Unit subsidi</span>
                                <span class="rounded bg-[#2D3748] px-2 py-1 text-[10px] font-bold text-white">{{ $prop->menengah_unit ?? 0 }} Unit menengah</span>
                                <span class="rounded bg-[#7C3AED] px-2 py-1 text-[10px] font-bold text-white">{{ $prop->premium_unit ?? 0 }} Unit premium</span>
                                <span class="rounded bg-[#3A8F84] px-2 py-1 text-[10px] font-bold text-white">{{ $prop->id_lokasi ?? '-' }}</span>
                            </div>
                        </div>

                        <div class="border-t border-gray-100 bg-white p-4">
                            <a
                                href="/perumahan/{{ $prop->id }}"
                                class="block w-full rounded-lg bg-[#357B70] px-4 py-2.5 text-center text-sm font-semibold text-white transition-colors hover:bg-[#2A635A]"
                            >
                                Lihat detail lokasi
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 py-12 text-center md:col-span-2 lg:col-span-3">
                        <p class="text-lg text-gray-500">Perumahan dengan kriteria tersebut tidak ditemukan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection