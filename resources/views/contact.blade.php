@extends('layouts.app')

@section('title', 'Hubungi Kami | SolusiProperti')

@section('content')
    <div class="min-h-screen bg-[#F8F9FA]">
        <section class="relative overflow-hidden bg-gradient-to-br from-[#172744] via-[#1B2A47] to-[#23466F] pb-28 pt-36">
            <div class="absolute -right-24 -top-24 h-96 w-96 rounded-full bg-[#38A89D]/10 blur-3xl"></div>
            <div class="absolute -bottom-32 -left-24 h-96 w-96 rounded-full bg-white/5 blur-3xl"></div>

            <div class="relative mx-auto max-w-5xl px-4 text-center sm:px-6 lg:px-8">
                <span class="mb-4 inline-block text-xs font-semibold uppercase tracking-[0.25em] text-[#4FD1C5]">
                    Kontak
                </span>
                <h1 class="mb-5 text-4xl font-extrabold leading-tight text-white md:text-5xl">Hubungi Kami</h1>
                <p class="mx-auto max-w-2xl text-lg leading-relaxed text-gray-300">
                    Ada pertanyaan atau membutuhkan informasi lebih lanjut? Kami siap membantu Anda.
                </p>
            </div>
        </section>

        <section class="relative mx-auto -mt-14 max-w-6xl px-4 pb-20 sm:px-6 lg:px-8">
            @if (session('success'))
                <div role="status" class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-5 text-sm font-medium text-green-800 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 items-start gap-6 lg:grid-cols-5">
                <aside class="space-y-5 lg:col-span-2">
                    <div class="rounded-2xl border border-gray-100 bg-white p-7 shadow-xl">
                        <span class="text-xs font-semibold uppercase tracking-[0.2em] text-[#2A8575]">Informasi Kontak</span>
                        <h2 class="mb-6 mt-2 text-2xl font-extrabold text-[#1A2639]">Kami siap membantu</h2>

                        <dl class="space-y-5">
                            <div>
                                <dt class="text-sm font-semibold text-[#23466F]">Alamat</dt>
                                <dd class="mt-1 whitespace-pre-line text-sm leading-relaxed text-gray-600">Perumahan The Royale Calista Blok B30, Kauman, Batang</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-semibold text-[#23466F]">Telepon</dt>
                                <dd class="mt-1 text-sm text-gray-600">
                                    <a href="tel:+6289665918077" class="hover:text-[#23466F]">+62 896-6591-8077</a>
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-semibold text-[#23466F]">Email</dt>
                                <dd class="mt-1 break-words text-sm text-gray-600">{{ $contact?->marketing_email ?: 'Belum tersedia' }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-semibold text-[#23466F]">Jam Layanan</dt>
                                <dd class="mt-1 text-sm leading-relaxed text-gray-600">Senin–Jumat, 08.00–17.00 WIB<br>Sabtu, 08.00–12.00 WIB</dd>
                            </div>
                        </dl>

                        @if ($whatsappNumber !== '')
                            <a
                                href="https://wa.me/6289665918077"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="mt-7 inline-flex w-full items-center justify-center rounded-xl bg-[#2A8575] px-5 py-3 text-sm font-bold text-white transition-colors hover:bg-[#226C60]"
                            >
                                Hubungi via WhatsApp
                            </a>
                        @endif
                    </div>

                    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                        <h3 class="font-bold text-[#23466F]">Sampaikan kebutuhan Anda</h3>
                        <p class="mt-2 text-sm leading-relaxed text-gray-600">
                            Kirim pesan melalui formulir dan tim kami akan menindaklanjutinya pada jam layanan.
                        </p>
                    </div>
                </aside>

                <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-xl sm:p-8 lg:col-span-3">
                    <div class="mb-7">
                        <span class="text-xs font-semibold uppercase tracking-[0.2em] text-[#2A8575]">Formulir Pesan</span>
                        <h2 class="mt-2 text-2xl font-extrabold text-[#1A2639]">Kirim pesan kepada kami</h2>
                        <p class="mt-2 text-sm text-gray-500">Kolom bertanda * wajib diisi.</p>
                    </div>

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf

                        <div aria-hidden="true" class="absolute -left-[9999px] top-auto h-px w-px overflow-hidden">
                            <label for="website">Jangan isi kolom ini</label>
                            <input id="website" type="text" name="website" tabindex="-1" autocomplete="off">
                        </div>

                        <div>
                            <label for="name" class="mb-2 block text-sm font-semibold text-gray-700">Nama <span class="text-red-600">*</span></label>
                            <input
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name') }}"
                                autocomplete="name"
                                required
                                maxlength="255"
                                aria-invalid="@error('name') true @else false @enderror"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-[#2A8575] focus:ring-2 focus:ring-[#2A8575]/20"
                            >
                            @error('name') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <div>
                                <label for="phone" class="mb-2 block text-sm font-semibold text-gray-700">No. WhatsApp <span class="text-red-600">*</span></label>
                                <input
                                    id="phone"
                                    name="phone"
                                    type="tel"
                                    value="{{ old('phone') }}"
                                    autocomplete="tel"
                                    required
                                    maxlength="30"
                                    aria-invalid="@error('phone') true @else false @enderror"
                                    class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-[#2A8575] focus:ring-2 focus:ring-[#2A8575]/20"
                                >
                                @error('phone') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="email" class="mb-2 block text-sm font-semibold text-gray-700">Email <span class="font-normal text-gray-400">(opsional)</span></label>
                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    autocomplete="email"
                                    maxlength="255"
                                    aria-invalid="@error('email') true @else false @enderror"
                                    class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-[#2A8575] focus:ring-2 focus:ring-[#2A8575]/20"
                                >
                                @error('email') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label for="message" class="mb-2 block text-sm font-semibold text-gray-700">Pesan <span class="text-red-600">*</span></label>
                            <textarea
                                id="message"
                                name="message"
                                rows="6"
                                required
                                maxlength="5000"
                                aria-invalid="@error('message') true @else false @enderror"
                                class="w-full resize-y rounded-xl border border-gray-300 px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-[#2A8575] focus:ring-2 focus:ring-[#2A8575]/20"
                            >{{ old('message') }}</textarea>
                            @error('message') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <button
                            type="submit"
                            class="inline-flex w-full items-center justify-center rounded-xl bg-[#23466F] px-6 py-3.5 text-sm font-bold text-white transition-colors hover:bg-[#172744] sm:w-auto"
                        >
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
