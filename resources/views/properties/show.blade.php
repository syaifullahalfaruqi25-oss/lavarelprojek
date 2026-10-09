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
                        <div class="bg-darknavy py-1.5 rounded">Menengah: {{ $property->menengah_unit }} Unit</div>
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

    @if ($property->latitude && $property->longitude)
        <div class="rounded-lg overflow-hidden border border-gray-200">
            <iframe
                src="https://maps.google.com/maps?q={{ $property->latitude }},{{ $property->longitude }}&z=16&output=embed"
                width="100%" height="260" style="border:0" loading="lazy" allowfullscreen
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    @else
        <p class="text-sm text-gray-400">Koordinat lokasi belum diisi.</p>
    @endif

    @if ($property->google_maps_url)
        <a href="{{ $property->google_maps_url }}" target="_blank" rel="noopener"
            class="block mt-3 text-center bg-navy hover:opacity-90 text-white text-sm font-bold py-2.5 rounded-lg transition">
            Buka di Google Maps
        </a>
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
                'cat_key' => $u->category,
                'status' => $statusLabel[$u->status] ?? ucfirst($u->status),
                'type' => $u->type_name ?? '-',
            ]]);

            $bloks = $property->units->map(function ($u) {
                preg_match('/^[A-Za-z]+/', $u->code, $m);
                return $m[0] ?? '';
            })->filter()->unique()->sort()->values();
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
                            <div class="legend-card rounded-lg border border-gray-200 p-3 bg-white shadow-xs" data-cat="{{ $cat }}">
                                <p class="text-xs font-bold text-center text-gray-600 uppercase mb-2">{{ $label }}</p>
                                <div class="space-y-1 text-[11px] font-bold text-white text-center">
                                    @foreach ($statusLabel as $key => $text)
                                        @php $count = $list->where('status', $key)->count(); @endphp
                                        <div class="legend-row py-1 rounded px-2 flex justify-between items-center" data-cat="{{ $cat }}" data-status="{{ $key }}"
                                             style="background: {{ $key === 'tersedia' ? $tersediaColor[$cat] : $statusColor[$key] }};
                                                    {{ $key === 'tersedia' && $cat === 'subsidi' ? 'color:#713F12' : '' }}
                                                    {{ $count === 0 ? 'display:none;' : '' }}">
                                            <span>{{ $text }}</span>
                                            <span class="legend-count bg-black/20 px-1.5 py-0.5 rounded text-[10px]">{{ $count }}</span>
                                        </div>
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
                                var box = document.getElementById('siteplan-box');
                                var siteplan = document.getElementById('siteplan');
                                var tooltip = document.getElementById('siteplan-tooltip');
                                var unitInfo = document.getElementById('unit-info');
                                var filter = document.getElementById('blok-filter');
                                var selectedCode = null;
                                var root = null;
                                var originalViewBox = null;
                                var animationFrame = null;

                                if (!box || !siteplan) return;

                                function paint(el, color) {
                                    var shapes = el.matches('path,rect,polygon,circle,ellipse')
                                        ? [el] : el.querySelectorAll('path,rect,polygon,circle,ellipse');
                                    shapes.forEach(function (s) { 
                                        s.style.setProperty('fill', color, 'important'); 
                                        s.style.setProperty('fill-opacity', '0.9', 'important'); 
                                    });
                                }

                                function updateLegend(block) {
                                    // Hitung ulang legenda sesuai blok yang sedang dipilih.
                                    var counts = {};
                                    Object.keys(units).forEach(function (code) {
                                        var unit = units[code];
                                        var blockMatch = code.match(/^[A-Za-z]+/);
                                        if (!blockMatch || (block && blockMatch[0] !== block)) return;

                                        var key = unit.cat_key + '|' + unit.raw_status;
                                        counts[key] = (counts[key] || 0) + 1;
                                    });

                                    siteplan.querySelectorAll('.legend-row').forEach(function (row) {
                                        var key = row.dataset.cat + '|' + row.dataset.status;
                                        var count = counts[key] || 0;
                                        var countElement = row.querySelector('.legend-count');
                                        if (countElement) countElement.textContent = count;
                                        row.style.display = count > 0 ? '' : 'none';
                                    });

                                    siteplan.querySelectorAll('.legend-card').forEach(function (card) {
                                        var total = 0;
                                        Object.keys(counts).forEach(function (key) {
                                            if (key.indexOf(card.dataset.cat + '|') === 0) total += counts[key];
                                        });
                                        card.style.display = total > 0 ? '' : 'none';
                                    });
                                }

                                function animateViewBox(target) {
                                    if (!root || !originalViewBox || !root.viewBox || !root.viewBox.baseVal) return;
                                    // Hentikan animasi lama agar zoom mengikuti pilihan terbaru.
                                    if (animationFrame !== null) cancelAnimationFrame(animationFrame);

                                    var current = root.viewBox.baseVal;
                                    var start = { x: current.x, y: current.y, width: current.width, height: current.height };
                                    var startedAt = null;
                                    var duration = 350;

                                    function step(timestamp) {
                                        if (startedAt === null) startedAt = timestamp;
                                        var progress = Math.min((timestamp - startedAt) / duration, 1);
                                        var eased = progress < 0.5
                                            ? 2 * progress * progress
                                            : 1 - Math.pow(-2 * progress + 2, 2) / 2;
                                        var values = ['x', 'y', 'width', 'height'].map(function (key) {
                                            return start[key] + (target[key] - start[key]) * eased;
                                        });

                                        root.setAttribute('viewBox', values.join(' '));
                                        if (progress < 1) {
                                            animationFrame = requestAnimationFrame(step);
                                        } else {
                                            animationFrame = null;
                                        }
                                    }

                                    animationFrame = requestAnimationFrame(step);
                                }

                                function zoomToBlock(block) {
                                    if (!root || !originalViewBox) return;
                                    if (!block) {
                                        animateViewBox(originalViewBox);
                                        return;
                                    }

                                    var bounds = null;
                                    Object.keys(units).forEach(function (code) {
                                        var blockMatch = code.match(/^[A-Za-z]+/);
                                        if (!blockMatch || blockMatch[0] !== block) return;
                                        var el = root.querySelector('rect[id="' + code + '"]');
                                        if (!el) return;

                                        var boxBounds = el.getBBox();
                                        var right = boxBounds.x + boxBounds.width;
                                        var bottom = boxBounds.y + boxBounds.height;
                                        if (!bounds) {
                                            bounds = { x: boxBounds.x, y: boxBounds.y, right: right, bottom: bottom };
                                        } else {
                                            bounds.x = Math.min(bounds.x, boxBounds.x);
                                            bounds.y = Math.min(bounds.y, boxBounds.y);
                                            bounds.right = Math.max(bounds.right, right);
                                            bounds.bottom = Math.max(bounds.bottom, bottom);
                                        }
                                    });

                                    if (bounds) {
                                        var padding = 20;
                                        animateViewBox({
                                            x: bounds.x - padding,
                                            y: bounds.y - padding,
                                            width: bounds.right - bounds.x + padding * 2,
                                            height: bounds.bottom - bounds.y + padding * 2,
                                        });
                                    }
                                }

                                function applyBlockFilter(block) {
                                    if (tooltip) tooltip.classList.add('hidden');
                                    box.querySelectorAll('rect[data-blok]').forEach(function (el) {
                                        var isSelected = !block || el.dataset.blok === block;
                                        el.style.opacity = isSelected ? '1' : '0.12';
                                        el.style.pointerEvents = isSelected ? 'auto' : 'none';
                                    });

                                    if (selectedCode) {
                                        var selected = root ? root.querySelector('rect[id="' + selectedCode + '"]') : null;
                                        if (block && selected && selected.dataset.blok !== block) {
                                            if (unitInfo) unitInfo.classList.add('hidden');
                                            selectedCode = null;
                                        }
                                    }

                                    updateLegend(block);
                                    zoomToBlock(block);
                                }

                                fetch(@json(Storage::disk('s3')->url($property->siteplan_image)))
                                    .then(function (r) { return r.text(); })
                                    .then(function (svg) {
                                        box.innerHTML = svg;
                                        root = box.querySelector('svg');
                                        if (!root) return;

                                        root.style.width = '100%';
                                        root.style.height = 'auto';
                                        if (root.viewBox && root.viewBox.baseVal) {
                                            var viewBox = root.viewBox.baseVal;
                                            originalViewBox = {
                                                x: viewBox.x,
                                                y: viewBox.y,
                                                width: viewBox.width,
                                                height: viewBox.height,
                                            };
                                        }

                                        var missingCodes = [];
                                        var extraIds = [];

                                        Object.keys(units).forEach(function (code) {
                                            var el = root.querySelector('rect[id="' + code + '"]');
                                            if (!el) {
                                                missingCodes.push(code);
                                                return;
                                            }
                                            
                                            var u = units[code];
                                            var rawCategory = u.cat_key;
                                            
                                            var color = '#6B7280';
                                            if (u.raw_status === 'tersedia' || u.raw_status === 'kavling') {
                                                color = tersediaColor[rawCategory] || '#14B8A6';
                                            } else if (statusColor[u.raw_status]) {
                                                color = statusColor[u.raw_status];
                                            }

                                            paint(el, color);
                                            el.style.cursor = 'pointer';
                                            el.style.transition = 'opacity 0.25s ease';
                                            el.style.opacity = '1';
                                            el.style.pointerEvents = 'auto';
                                            el.dataset.blok = code.match(/^[A-Za-z]+/)[0];

                                            el.addEventListener('mouseenter', function (e) {
                                                var tipCode = document.getElementById('tip-code');
                                                var tipCategory = document.getElementById('tip-cat');
                                                var tipType = document.getElementById('tip-type');
                                                var tipStatus = document.getElementById('tip-status');
                                                if (tipCode) tipCode.textContent = 'Kavling ' + code;
                                                if (tipCategory) tipCategory.textContent = u.category;
                                                if (tipType) tipType.textContent = u.type;
                                                if (tipStatus) tipStatus.textContent = u.status;
                                                
                                                if (tooltip) tooltip.classList.remove('hidden');
                                                el.style.stroke = '#0F172A';
                                                el.style.strokeWidth = '2';
                                            });

                                            el.addEventListener('mousemove', function (e) {
                                                if (!tooltip) return;
                                                var rect = siteplan.getBoundingClientRect();
                                                var x = Math.min(Math.max(0, e.clientX - rect.left + 15), rect.width - tooltip.offsetWidth);
                                                var y = Math.min(Math.max(0, e.clientY - rect.top - 60), rect.height - tooltip.offsetHeight);
                                                tooltip.style.left = Math.max(0, x) + 'px';
                                                tooltip.style.top = Math.max(0, y) + 'px';
                                            });

                                            el.addEventListener('mouseleave', function () {
                                                if (tooltip) tooltip.classList.add('hidden');
                                                el.style.stroke = 'none';
                                            });

                                            el.addEventListener('click', function () {
                                                selectedCode = code;
                                                var unitCode = document.getElementById('u-code');
                                                var unitCategory = document.getElementById('u-cat');
                                                var unitStatus = document.getElementById('u-status');
                                                var unitType = document.getElementById('u-type');
                                                if (unitCode) unitCode.textContent = 'Kavling ' + code;
                                                if (unitCategory) unitCategory.textContent = u.category;
                                                if (unitStatus) unitStatus.textContent = u.status;
                                                if (unitType) unitType.textContent = u.type;
                                                
                                                var orderBtn = document.getElementById('u-order');
                                                if (orderBtn && (u.raw_status === 'tersedia' || u.raw_status === 'kavling')) {
                                                    orderBtn.href = @json(route('order.create', $property->id)) + '?unit=' + encodeURIComponent(code);
                                                    orderBtn.classList.remove('hidden');
                                                } else if (orderBtn) {
                                                    orderBtn.classList.add('hidden');
                                                }

                                                if (unitInfo) unitInfo.classList.remove('hidden');
                                            });
                                        });

                                        root.querySelectorAll('[id]').forEach(function (el) {
                                            if (/^[A-Za-z]+\d+$/.test(el.id) && !Object.prototype.hasOwnProperty.call(units, el.id)) {
                                                extraIds.push(el.id);
                                            }
                                        });

                                        if (missingCodes.length || extraIds.length) {
                                            console.warn('Siteplan: code unit tidak ditemukan di SVG', missingCodes);
                                            console.warn('Siteplan: ID SVG tidak ada di units', extraIds);
                                        } else {
                                            console.info('Siteplan: semua ID cocok');
                                        }

                                        updateLegend('');
                                        if (filter && filter.value) applyBlockFilter(filter.value);
                                    })
                                    .catch(function () {
                                        box.innerHTML = '<p class="text-red-500 text-sm p-4">Siteplan gagal dimuat.</p>';
                                    });

                                if (filter) {
                                    filter.addEventListener('change', function () {
                                        applyBlockFilter(filter.value);
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