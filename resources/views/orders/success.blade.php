@extends('layouts.app')

@section('content')
@php
    $wa = preg_replace('/\D/', '', $order->property->marketing_whatsapp ?? '');
    $pesan = urlencode("Halo, saya {$order->name}. Saya sudah mengisi pre-order {$order->property->name} dengan kode {$order->code}.");
@endphp
<div class="bg-[#F8F9FA] min-h-screen pt-24 pb-20">
    <div class="max-w-xl mx-auto px-4 text-center">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
            <h1 class="text-2xl font-extrabold text-navy">Pre-order Berhasil Dikirim</h1>
            <p class="text-sm text-gray-500 mt-2">Simpan kode pesanan Anda:</p>
            <p class="text-3xl font-extrabold text-teal my-4">{{ $order->code }}</p>
            <p class="text-sm text-gray-600 mb-6">
                Perumahan: <b>{{ $order->property->name }}</b>
                @if ($order->unit_code) <br>Kavling: <b>{{ $order->unit_code }}</b> @endif
                <br>Tim pemasaran akan menghubungi Anda melalui WhatsApp.
            </p>

            @if ($wa)
                <a href="https://wa.me/{{ $wa }}?text={{ $pesan }}" target="_blank" rel="noopener"
                    class="block w-full bg-[#25D366] hover:bg-[#1EBE5D] text-white font-bold py-2.5 rounded-lg mb-3">
                    Hubungi Pemasaran via WhatsApp
                </a>
            @endif
            <a href="/perumahan" class="block text-sm text-gray-500 hover:text-teal">Kembali ke katalog</a>
        </div>
    </div>
</div>
@endsection