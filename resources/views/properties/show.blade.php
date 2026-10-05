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
                        <div class="bg-darknavy py-1.5 rounded">Menengah: {{ $property->komersil_unit }} Unit</div>
                        <div class="bg-gray-400 py-1.5 rounded">Terjual: 0 Unit</div>
                        <div class="bg-purple-600 py-1.5 rounded">Premium: {{ $property->premium_unit }} Unit</div>
                        <div class="bg-gray-400 py-1.5 rounded">Terjual: 0 Unit</div>
                    </div>
                    
                    <a href="#siteplan" class="block w-full text-center bg-teal hover:bg-darkteal text-white font-bold py-2.5 rounded-lg transition-colors shadow-sm">
                        Lihat Siteplan Digital
                    </a>
                    <a href="{{ route('order.create', $property->id) }}"
                        class="block w-full text-center mt-2 bg-orange hover:opacity-90 text-white font-bold py-2.5 rounded-lg transition-colors shadow-sm">
                        Pre-order Sekarang
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
                                <span class="text-sm font-medium text-gray-500">
                                    ({{ ['subsidi' => 'Subsidi', 'komersil' => 'Menengah', 'premium' => 'Premium'][$type->category] ?? $type->category }})
                                </span>
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
                                    <ul class="text-sm text-gray-700 space-y-3 font-medium pt-2">
                                        <li class="flex justify-between border-b border-gray-200 pb-2"><span>Luas Bangunan</span><span>{{ $type->building_area ?? '-' }} m²</span></li>
                                        <li class="flex justify-between border-b border-gray-200 pb-2"><span>Luas Lahan</span><span>{{ $type->land_area ?? '-' }} m²</span></li>
                                        <li class="flex justify-between border-b border-gray-200 pb-2"><span>Kamar Tidur</span><span>{{ $type->bedrooms ?? '-' }}</span></li>
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
                        <p class="text-gray-400 text-sm">Belum ada tipe rumah.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- 3. SITEPLAN INTERAKTIF ALA SIKUMBANG -->
        @php
            $statusLabel = [
                'tersedia' => 'Kavling', 'pembangunan' => 'Pembangunan', 'ready' => 'Ready Stock',
                'dipesan' => 'Dipesan', 'proses_bank' => 'Proses Bank', 'terjual' => 'Terjual',
            ];
            $statusColor = [
                'pembangunan' => '#F97316', 'ready' => '#16A34A', 'dipesan' => '#7E22CE',
                'proses_bank' => '#2563EB', 'terjual' => '#DC2626',
            ];
            $tersediaColor = ['subsidi' => '#FACC15', 'menengah' => '#6B7280', 'premium' => '#14B8A6'];
            $catLabel = ['subsidi' => 'Subsidi', 'menengah' => 'Menengah', 'premium' => 'Premium'];

            $unitsJson = $property->units->mapWithKeys(fn ($u) => [$u->code => [
                'raw_status' => strtolower(trim($u->status ?? 'tersedia')),
                'category' => $catLabel[$u->category] ?? $u->category,
                'status' => $statusLabel[$u->status] ?? ucfirst($u->status),
                'type' => $u->type_name ?? '-',
            ]]);
            
            $bloks = $property->units->map(fn ($u) => preg_replace('/\d+/', '', $u->code))->unique()->sort()->values();
        @endphp

        <div id="siteplan" class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden relative">
            <div class="bg-navy px-6 py-4 flex justify-between items-center">
                <h2 class="text-xl font-extrabold text-white">Siteplan & Ketersediaan Unit</h2>
                <span class="text-xs text-gray-300 bg-black/20 px-3 py-1 rounded-full">Arahkan kursor atau klik kavling</span>
            </div>

            <!-- KOTAK HOVER TOOLTIP -->
            <div id="siteplan-tooltip" class="absolute z-50 hidden bg-white/95 backdrop-blur-sm p-4 rounded-xl shadow-2xl border border-gray-200 text-xs pointer-events-none transition-all duration-75 w-56">
                <p class="text-[10px] text-gray-400 uppercase tracking-wider font-bold">Informasi Kavling</p>
                <p id="tip-code" class="text-base font-extrabold text-navy mb-2"></p>
                <div class="space-y-1 text-gray-600 border-t border-gray-100 pt-2">
                    <div class="flex justify-between"><span>Kategori:</span> <strong id="tip-cat" class="text-gray-800"></strong></div>
                    <div class="flex justify-between"><span>Tipe:</span> <strong id="tip-type" class="text-gray-800"></strong></div>
                    <div class="flex justify-between"><span>Status:</span> <strong id="tip-status" class="text-teal"></strong></div>
                </div>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-4">
                <!-- Panel Kiri (Legenda & Filter Blok) -->
                <div class="xl:col-span-1 border-r border-gray-200 p-6 bg-[#FCFCFA] space-y-4">
                    @foreach ($catLabel as $cat => $label)
                        @php $list = $property->units->where('category', $cat); @endphp
                        @if ($list->count())
                            <div class="rounded-lg border border-gray-200 p-3 bg-white shadow-xs">
                                <p class="text-xs font-bold text-center text-gray-600 uppercase mb-2">{{ $label }}</p>
                                <div class="space-y-1 text-[11px] font-bold text-white text-center">
                                    @foreach ($statusLabel as $key => $text)
                                        @php $count = $list->where('status', $key)->count(); @endphp
                                        @if($count > 0)
                                            <div class="py-1 rounded px-2 flex justify-between items-center"
                                                 style="background: {{ $key === 'tersedia' ? $tersediaColor[$cat] : $statusColor[$key] }};
                                                        {{ $key === 'tersedia' && $cat === 'subsidi' ? 'color:#713F12' : '' }}">
                                                <span>{{ $text }}</span>
                                                <span class="bg-black/20 px-1.5 py-0.5 rounded text-[10px]">{{ $count }}</span>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach

                    @if ($bloks->count() > 0)
                        <div class="bg-white p-3 rounded-lg border border-gray-200 shadow-xs">
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Filter Berdasarkan Blok</label>
                            <select id="blok-filter" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-teal focus:border-teal">
                                <option value="">Tampilkan Semua Blok</option>
                                @foreach ($bloks as $b)
                                    <option value="{{ $b }}">Blok {{ $b }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </div>

                <!-- Area Peta SVG -->
                <div class="xl:col-span-3 p-4 bg-white relative">
                    @if ($property->siteplan_image)
                        <div id="siteplan-box" class="w-full overflow-auto max-h-[600px] rounded-lg border border-gray-100 bg-gray-50/50 p-2"></div>

                        <!-- Kotak Detail Info di Bawah (Saat diklik) -->
                        <div id="unit-info" class="hidden mt-4 p-4 rounded-xl border border-teal/30 bg-[#FDFBF7] shadow-xs flex justify-between items-center">
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-bold">Kavling Terpilih</p>
                                <p id="u-code" class="text-lg font-extrabold text-navy"></p>
                                <div class="text-xs text-gray-600 space-x-3 mt-1">
                                    <span>Jenis: <b id="u-cat" class="text-gray-800"></b></span>
                                    <span>Status: <b id="u-status" class="text-teal"></b></span>
                                    <span>Tipe: <b id="u-type" class="text-gray-800"></b></span>
                                </div>
                            </div>
                            <div class="text-right">
                                <a id="u-order" href="#"
                                    class="hidden mt-2 inline-block bg-teal hover:bg-darkteal text-white text-sm font-bold px-4 py-2 rounded-lg transition-colors shadow-sm">
                                    Pesan kavling ini
                                </a>
                            </div>
                        </div>

                        <!-- SCRIPT INTERAKTIF SITEPLAN -->
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                var units = @json($unitsJson);
                                var statusColor = @json($statusColor);
                                var tersediaColor = @json($tersediaColor);
                                var catLabel = @json($catLabel);
                                var box = document.getElementById('siteplan-box');
                                var tooltip = document.getElementById('siteplan-tooltip');

                                function paint(el, color) {
                                    var shapes = el.matches('path,rect,polygon,circle,ellipse')
                                        ? [el] : el.querySelectorAll('path,rect,polygon,circle,ellipse');
                                    shapes.forEach(function (s) { 
                                        s.style.setProperty('fill', color, 'important'); 
                                        s.style.setProperty('fill-opacity', '0.9', 'important'); 
                                    });
                                }

                                fetch(@json(Storage::disk('s3')->url($property->siteplan_image)))
                                    .then(function (r) { return r.text(); })
                                    .then(function (svg) {
                                        box.innerHTML = svg;
                                        var root = box.querySelector('svg');
                                        if (root) { 
                                            root.style.width = '100%'; 
                                            root.style.height = 'auto'; 
                                        }

                                        Object.keys(units).forEach(function (code) {
                                            var el = box.querySelector('[id="' + code + '"]');
                                            if (!el) return;
                                            
                                            var u = units[code];
                                            var rawCategory = Object.keys(catLabel).find(key => catLabel[key] === u.category) || 'subsidi';
                                            
                                            var color = '#6B7280';
                                            if (u.raw_status === 'tersedia' || u.raw_status === 'kavling') {
                                                color = tersediaColor[rawCategory] || '#14B8A6';
                                            } else if (statusColor[u.raw_status]) {
                                                color = statusColor[u.raw_status];
                                            }

                                            paint(el, color);
                                            el.style.cursor = 'pointer';
                                            el.style.transition = 'all 0.2s ease';
                                            el.dataset.blok = code.replace(/\d+/g, '');

                                            el.addEventListener('mouseenter', function (e) {
                                                document.getElementById('tip-code').textContent = 'Kavling ' + code;
                                                document.getElementById('tip-cat').textContent = u.category;
                                                document.getElementById('tip-type').textContent = u.type;
                                                document.getElementById('tip-status').textContent = u.status;
                                                
                                                tooltip.classList.remove('hidden');
                                                el.style.stroke = '#0F172A';
                                                el.style.strokeWidth = '2';
                                            });

                                            el.addEventListener('mousemove', function (e) {
                                                var rect = box.getBoundingClientRect();
                                                var x = e.clientX - rect.left + 15;
                                                var y = e.clientY - rect.top - 60;
                                                tooltip.style.left = x + 'px';
                                                tooltip.style.top = y + 'px';
                                            });

                                            el.addEventListener('mouseleave', function () {
                                                tooltip.classList.add('hidden');
                                                el.style.stroke = 'none';
                                            });

                                            el.addEventListener('click', function () {
                                                document.getElementById('u-code').textContent = 'Kavling ' + code;
                                                document.getElementById('u-cat').textContent = u.category;
                                                document.getElementById('u-status').textContent = u.status;
                                                document.getElementById('u-type').textContent = u.type;
                                                
                                                var orderBtn = document.getElementById('u-order');
                                                if (u.raw_status === 'tersedia' || u.raw_status === 'kavling') {
                                                    orderBtn.href = @json(route('order.create', $property->id)) + '?unit=' + encodeURIComponent(code);
                                                    orderBtn.classList.remove('hidden');
                                                } else {
                                                    orderBtn.classList.add('hidden');
                                                }

                                                document.getElementById('unit-info').classList.remove('hidden');
                                            });
                                        });
                                    })
                                    .catch(function () {
                                        box.innerHTML = '<p class="text-red-500 text-sm p-4">Siteplan gagal dimuat.</p>';
                                    });

                                var filter = document.getElementById('blok-filter');
                                if (filter) {
                                    filter.addEventListener('change', function () {
                                        var selectedBlok = filter.value;
                                        box.querySelectorAll('[data-blok]').forEach(function (el) {
                                            if (!selectedBlok || el.dataset.blok === selectedBlok) {
                                                el.style.display = 'block';
                                            } else {
                                                el.style.display = 'none';
                                            }
                                        });
                                    });
                                }
                            });
                        </script>
                    @else
                        <div class="min-h-[300px] flex items-center justify-center border-4 border-dashed border-gray-200 rounded-xl bg-gray-50">
                            <p class="text-gray-400 font-bold">Siteplan belum diunggah untuk perumahan ini.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection