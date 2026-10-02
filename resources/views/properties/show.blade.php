@extends('layouts.app')

@section('content')
<div class="bg-[#F8F9FA] min-h-screen pt-24 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- BREADCRUMB -->
        <nav class="text-sm text-gray-500 mb-6 font-medium">
            <a href="/" class="hover:text-teal transition-colors">Beranda</a> <span class="mx-2">&gt;</span>
            <a href="/perumahan" class="hover:text-teal transition-colors">Perumahan</a> <span class="mx-2">&gt;</span>
            <span class="text-navy">{{ $property->name }}</span>
        </nav>

        <!-- 1. HERO -->
        <div class="relative bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden mb-12">
            <div class="h-80 w-full bg-gray-300 relative">
                @if ($property->image)
                    <img src="{{ Storage::disk('s3')->url($property->image) }}" alt="Cover {{ $property->name }}"
                        class="w-full h-full object-cover">
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
            </div>

            <div class="relative -mt-24 mx-6 mb-6 bg-white rounded-xl shadow-lg p-6 flex flex-col md:flex-row justify-between items-start md:items-center border-t-4 border-teal">
                <div class="mb-6 md:mb-0">
                    <h1 class="text-2xl md:text-3xl font-extrabold text-navy uppercase mb-2">{{ $property->name }}</h1>
                    <div class="text-sm text-gray-600 space-y-1">
                        <p><span class="font-semibold">ID Lokasi:</span> {{ $property->id_lokasi ?? '-' }}</p>
                        <p class="uppercase">{{ $property->location }}</p>
                        <p class="font-bold text-darkteal mt-2">{{ $property->developer }}</p>
                    </div>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100 min-w-[250px]">
                    <h3 class="text-xs font-bold text-gray-500 uppercase mb-3 text-center">Status Rumah</h3>
                    <div class="grid grid-cols-2 gap-2 text-xs font-bold text-white text-center mb-4">
                        <div class="bg-orange py-1.5 rounded">Subsidi: {{ $property->subsidi_unit }} Unit</div>
                        <div class="bg-gray-400 py-1.5 rounded">Terjual: 0 Unit</div>
                        <div class="bg-darknavy py-1.5 rounded">Komersil: {{ $property->komersil_unit }} Unit</div>
                        <div class="bg-gray-400 py-1.5 rounded">Terjual: 0 Unit</div>
                    </div>
                    <a href="#siteplan" class="block w-full text-center bg-teal hover:bg-darkteal text-white font-bold py-2.5 rounded-lg transition-colors shadow-sm">
                        Lihat Siteplan Digital
                    </a>
                </div>
            </div>
        </div>

        <!-- 2. KONTAK, PETA, FOTO, TIPE -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">

            <!-- Kolom Kiri -->
            <div class="space-y-8">
                <!-- Kantor Pemasaran -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-navy border-b border-gray-100 pb-3 mb-4">Kantor Pemasaran</h2>
                    <div class="text-sm text-gray-600 space-y-2 mb-6">
                        <p class="uppercase leading-relaxed">{{ $property->marketing_address ?: $property->location }}</p>
                        <p><span class="font-semibold text-gray-800">Developer:</span> {{ $property->developer }}</p>
                        @if ($property->marketing_phone)
                            <p><span class="font-semibold text-gray-800">Telp:</span> {{ $property->marketing_phone }}</p>
                        @endif
                        @if ($property->marketing_email)
                            <p><span class="font-semibold text-gray-800">Email:</span> {{ $property->marketing_email }}</p>
                        @endif
                        @if ($property->marketing_whatsapp)
                            <p><span class="font-semibold text-gray-800">WhatsApp:</span> {{ $property->marketing_whatsapp }}</p>
                        @endif
                    </div>

                    @if ($property->marketing_whatsapp)
                        <a href="https://wa.me/{{ preg_replace('/\D/', '', $property->marketing_whatsapp) }}"
                            target="_blank" rel="noopener"
                            class="flex items-center justify-center gap-2 w-full bg-[#25D366] hover:bg-[#1EBE5D] text-white font-bold py-2.5 rounded-lg transition-colors">
                            WhatsApp Kantor Pemasaran
                        </a>
                    @endif
                </div>

                <!-- Peta Lokasi -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-navy border-b border-gray-100 pb-3 mb-4">Peta Lokasi</h2>
                    @if ($property->google_maps_url)
                        <a href="{{ $property->google_maps_url }}" target="_blank" rel="noopener"
                            class="block w-full h-48 bg-gray-200 rounded-lg overflow-hidden relative group">
                            <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&w=600&q=80"
                                alt="Peta" class="w-full h-full object-cover opacity-60 group-hover:opacity-80 transition">
                            <span class="absolute inset-0 flex items-center justify-center">
                                <span class="bg-navy text-white px-4 py-2 rounded text-sm font-bold shadow">Buka di Google Maps</span>
                            </span>
                        </a>
                    @else
                        <p class="text-sm text-gray-400">Link peta belum diisi.</p>
                    @endif
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="lg:col-span-2 space-y-8">

                <!-- Foto Lokasi -->
                @if ($property->photos->count())
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 lg:p-8">
                        <h2 class="text-xl font-extrabold text-navy border-b border-gray-100 pb-3 mb-6">Foto Lokasi</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
                            @foreach ($property->photos as $photo)
                                <div class="border border-gray-200 rounded-lg overflow-hidden bg-white">
                                    <img src="{{ Storage::disk('s3')->url($photo->image) }}" alt="{{ $photo->title }}"
                                        class="w-full h-40 object-cover">
                                    <p class="p-3 text-sm font-medium text-gray-700">{{ $photo->title }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Tipe Rumah -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 lg:p-8">
                    <h2 class="text-xl font-extrabold text-navy border-b border-gray-100 pb-3 mb-6">Tipe Rumah</h2>

                    @forelse ($property->types as $i => $type)
                        <div class="{{ ! $loop->last ? 'border-b border-gray-100 pb-8 mb-8' : '' }}">
                            <h3 class="text-lg font-bold text-darkteal mb-4">
                                {{ $i + 1 }}. {{ $type->name }}
                                <span class="text-sm font-medium text-gray-500">({{ $type->category }})</span>
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="md:col-span-2 grid grid-cols-2 gap-4">
                                    @forelse ($type->images ?? [] as $img)
                                        <div class="bg-gray-100 rounded-lg overflow-hidden h-40 border border-gray-200">
                                            <img src="{{ Storage::disk('s3')->url($img) }}" alt="{{ $type->name }}"
                                                class="w-full h-full object-cover">
                                        </div>
                                    @empty
                                        <div class="col-span-2 bg-gray-100 rounded-lg h-40 border border-gray-200 flex items-center justify-center">
                                            <span class="text-gray-400 text-sm">Belum ada foto</span>
                                        </div>
                                    @endforelse
                                </div>

                                <div class="bg-[#FDFBF7] p-4 rounded-lg border border-teal/20">
                                    <p class="text-xs text-gray-500 uppercase mb-1">Harga</p>
                                    <p class="text-lg font-bold text-teal mb-4">
                                        {{ $type->price ? 'Rp ' . number_format($type->price, 0, ',', '.') : 'Hubungi Developer' }}
                                    </p>
                                    <ul class="text-sm text-gray-700 space-y-2 font-medium">
                                        <li class="flex justify-between border-b border-gray-200 pb-1"><span>Luas Bangunan</span><span>{{ $type->building_area ?? '-' }} m²</span></li>
                                        <li class="flex justify-between border-b border-gray-200 pb-1"><span>Luas Lahan</span><span>{{ $type->land_area ?? '-' }} m²</span></li>
                                        <li class="flex justify-between border-b border-gray-200 pb-1"><span>Kamar Tidur</span><span>{{ $type->bedrooms ?? '-' }}</span></li>
                                        <li class="flex justify-between"><span>Kamar Mandi</span><span>{{ $type->bathrooms ?? '-' }}</span></li>
                                    </ul>
                                </div>
                            </div>

                            @if (! empty($type->specs))
                                <div class="mt-6">
                                    <h4 class="font-bold text-navy mb-2">Spesifikasi Teknis</h4>
                                    <ul class="text-sm text-gray-700 space-y-1">
                                        @foreach ($type->specs as $spec)
                                            <li><span class="font-semibold">{{ $spec['judul'] ?? '' }}:</span> {{ $spec['isi'] ?? '' }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    @empty
                        <p class="text-gray-400 text-sm">Belum ada tipe rumah. Total unit: {{ $property->subsidi_unit + $property->komersil_unit }}.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- 3. SITEPLAN (tidak diubah) -->
        <div id="siteplan" class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-navy px-6 py-4">
                <h2 class="text-xl font-extrabold text-white">Siteplan & Ketersediaan Unit</h2>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-4">
                <div class="xl:col-span-1 border-r border-gray-200 p-6 bg-[#FCFCFA]">
                    <h3 class="font-bold text-navy uppercase text-sm mb-4 border-b border-gray-200 pb-2">Status Unit</h3>
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div>
                            <div class="text-[10px] font-bold text-center text-gray-500 uppercase mb-2">Komersil</div>
                            <div class="space-y-1.5 text-[10px] text-white font-bold text-center">
                                <div class="bg-gray-500 py-1.5 rounded shadow-sm">{{ $property->komersil_unit }} Kavling</div>
                                <div class="bg-gray-600 py-1.5 rounded shadow-sm">0 Terjual</div>
                            </div>
                        </div>
                        <div>
                            <div class="text-[10px] font-bold text-center text-gray-500 uppercase mb-2">Subsidi</div>
                            <div class="space-y-1.5 text-[10px] text-white font-bold text-center">
                                <div class="bg-yellow-400 py-1.5 rounded shadow-sm text-yellow-900">{{ $property->subsidi_unit }} Kavling</div>
                                <div class="bg-red-600 py-1.5 rounded shadow-sm">0 Terjual</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="xl:col-span-3 p-8 flex items-center justify-center min-h-[500px] bg-white relative">
                    <div class="absolute inset-0 border-4 border-dashed border-gray-200 m-8 flex items-center justify-center rounded-xl bg-gray-50">
                        <div class="text-center">
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