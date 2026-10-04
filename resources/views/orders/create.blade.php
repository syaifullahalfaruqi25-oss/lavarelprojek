@extends('layouts.app')

@section('content')
<div class="bg-[#F8F9FA] min-h-screen pt-24 pb-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">

        <nav class="text-sm text-gray-500 mb-6 font-medium">
            <a href="/perumahan" class="hover:text-teal">Perumahan</a> <span class="mx-2">&gt;</span>
            <a href="/perumahan/{{ $property->id }}" class="hover:text-teal">{{ $property->name }}</a>
            <span class="mx-2">&gt;</span> <span class="text-navy">Pre-order</span>
        </nav>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 lg:p-8">
            <h1 class="text-2xl font-extrabold text-navy uppercase">Pre-order {{ $property->name }}</h1>
            <p class="text-sm text-gray-500 mt-1 mb-6">
                Isi data berikut. Tim pemasaran akan menghubungi Anda untuk proses selanjutnya.
                Pembayaran dilakukan langsung bersama tim pemasaran.
            </p>

            @if ($errors->any())
                <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-sm text-red-700">
                    Mohon periksa kembali isian yang ditandai merah di bawah.
                </div>
            @endif

            <form action="{{ route('order.store', $property->id) }}" method="POST" class="space-y-5">
                @csrf

                {{-- honeypot: disembunyikan, bot biasanya mengisinya --}}
                <div style="display:none" aria-hidden="true">
                    <input type="text" name="website" tabindex="-1" autocomplete="off">
                </div>

                <h2 class="font-bold text-navy border-b border-gray-100 pb-2">Data Pembeli</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="w-full border {{ $errors->has('name') ? 'border-red-400' : 'border-gray-300' }} rounded-md px-3 py-2.5 text-sm">
                        @error('name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NIK (16 digit) *</label>
                        <input type="text" name="nik" value="{{ old('nik') }}" inputmode="numeric" maxlength="16" required
                            class="w-full border {{ $errors->has('nik') ? 'border-red-400' : 'border-gray-300' }} rounded-md px-3 py-2.5 text-sm">
                        @error('nik') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">No. WhatsApp *</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="081234567890" required
                            class="w-full border {{ $errors->has('phone') ? 'border-red-400' : 'border-gray-300' }} rounded-md px-3 py-2.5 text-sm">
                        @error('phone') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full border {{ $errors->has('email') ? 'border-red-400' : 'border-gray-300' }} rounded-md px-3 py-2.5 text-sm">
                        @error('email') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan</label>
                        <input type="text" name="job" value="{{ old('job') }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2.5 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Penghasilan per Bulan (Rp)</label>
                        <input type="number" name="income" value="{{ old('income') }}" min="0"
                            class="w-full border border-gray-300 rounded-md px-3 py-2.5 text-sm">
                        @error('income') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat *</label>
                    <textarea name="address" rows="2" required
                        class="w-full border {{ $errors->has('address') ? 'border-red-400' : 'border-gray-300' }} rounded-md px-3 py-2.5 text-sm">{{ old('address') }}</textarea>
                    @error('address') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <h2 class="font-bold text-navy border-b border-gray-100 pb-2 pt-2">Pilihan Unit</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tipe Rumah</label>
                        <select name="property_type_id" class="w-full border border-gray-300 rounded-md px-3 py-2.5 text-sm">
                            <option value="">Belum memilih</option>
                            @foreach ($property->types as $type)
                                <option value="{{ $type->id }}" {{ old('property_type_id') == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}{{ $type->price ? ' - Rp ' . number_format($type->price, 0, ',', '.') : '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kavling</label>
                        <select name="unit_code" class="w-full border {{ $errors->has('unit_code') ? 'border-red-400' : 'border-gray-300' }} rounded-md px-3 py-2.5 text-sm">
                            <option value="">Belum memilih</option>
                            @foreach ($property->units->where('status', 'tersedia')->sortBy('code') as $unit)
                                <option value="{{ $unit->code }}"
                                    {{ old('unit_code', request('unit')) == $unit->code ? 'selected' : '' }}>
                                    {{ $unit->code }}
                                </option>
                            @endforeach
                        </select>
                        @error('unit_code') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Rencana Pembayaran *</label>
                    <select name="payment_method" required class="w-full border {{ $errors->has('payment_method') ? 'border-red-400' : 'border-gray-300' }} rounded-md px-3 py-2.5 text-sm">
                        <option value="">Pilih</option>
                        <option value="kpr_subsidi" {{ old('payment_method') == 'kpr_subsidi' ? 'selected' : '' }}>KPR Subsidi</option>
                        <option value="kpr_komersial" {{ old('payment_method') == 'kpr_komersial' ? 'selected' : '' }}>KPR Komersial</option>
                        <option value="tunai" {{ old('payment_method') == 'tunai' ? 'selected' : '' }}>Tunai</option>
                    </select>
                    @error('payment_method') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Catatan</label>
                    <textarea name="notes" rows="2" class="w-full border border-gray-300 rounded-md px-3 py-2.5 text-sm">{{ old('notes') }}</textarea>
                </div>

                <label class="flex items-start gap-2 text-sm text-gray-600">
                    <input type="checkbox" name="consent" value="1" class="mt-1" {{ old('consent') ? 'checked' : '' }}>
                    <span>Saya menyetujui data pribadi saya digunakan oleh pihak pemasaran untuk keperluan pemesanan ini.</span>
                </label>
                @error('consent') <p class="text-xs text-red-600">{{ $message }}</p> @enderror

                <button type="submit"
                    class="w-full bg-teal hover:bg-darkteal text-white font-bold py-3 rounded-lg transition-colors">
                    Kirim Pre-order
                </button>
            </form>
        </div>
    </div>
</div>
@endsection