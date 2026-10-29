
@extends('layouts.app')

@section('title', 'Hubungi Kami | Solusi Properti')

@section('content')
    <div class="min-h-screen bg-[#FAFAF8]">

        {{-- HERO --}}
        <section class="relative overflow-hidden bg-[#171717] pb-28 pt-36">
            <div class="absolute -right-24 -top-24 h-96 w-96 rounded-full bg-[#C9A227]/[0.07] blur-3xl"></div>
            <div class="absolute -bottom-32 -left-24 h-96 w-96 rounded-full bg-white/[0.025] blur-3xl"></div>

            <div class="relative mx-auto max-w-5xl px-4 text-center sm:px-6 lg:px-8">
                <span class="mb-4 inline-block text-xs font-bold uppercase tracking-[0.25em] text-[#D8B64C]">
                    Kontak
                </span>

                <h1 class="mb-5 text-4xl font-extrabold leading-tight text-white md:text-5xl">
                    Hubungi Kami
                </h1>

                <p class="mx-auto max-w-2xl text-base leading-relaxed text-white/65 md:text-lg">
                    Ada pertanyaan atau membutuhkan informasi lebih lanjut?
                    Kami siap membantu Anda menemukan hunian yang tepat.
                </p>

                <div class="mx-auto mt-8 h-1 w-16 rounded-full bg-[#C9A227]"></div>
            </div>
        </section>

        {{-- INFORMASI KONTAK DAN FORMULIR --}}
        <section class="relative mx-auto -mt-14 max-w-6xl px-4 pb-20 sm:px-6 lg:px-8">

            {{-- Pesan Sukses --}}
            @if (session('success'))
                <div role="status"
                    class="mb-6 rounded-xl border border-[#D9C783] bg-[#FBF6E6] p-5 text-sm font-medium text-[#715A16]">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 items-start gap-6 lg:grid-cols-5">

                {{-- Informasi Kontak --}}
                <aside class="space-y-5 lg:col-span-2">
                    <div class="rounded-2xl border border-[#E8E5DC] bg-white p-6 sm:p-7 shadow-[0_3px_15px_rgba(25,25,25,0.04)]">
                        <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#A88724]">
                            Informasi Kontak
                        </span>

                        <h2 class="mb-6 mt-2 text-2xl font-extrabold text-[#171717]">
                            Kami siap membantu
                        </h2>

                        <div class="mb-6 h-px bg-[#EAE7DF]"></div>

                        <dl class="space-y-6">
                            {{-- Alamat --}}
                            <div class="flex gap-3">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#FBF6E6] text-[#A88724]">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                            d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>

                                <div>
                                    <dt class="text-sm font-bold text-[#222222]">Alamat</dt>
                                    <dd class="mt-1 whitespace-pre-line text-sm leading-relaxed text-[#777777]">
                                        Perumahan The Royal Calista Blok B30, Kauman, Batang
                                    </dd>
                                </div>
                            </div>

                            {{-- Telepon --}}
                            <div class="flex gap-3">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#FBF6E6] text-[#A88724]">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                            d="M3 5a2 2 0 012-2h3l2 5-2 1.5a11 11 0 005.5 5.5L15 13l5 2v3a2 2 0 01-2 2A17 17 0 013 5z"/>
                                    </svg>
                                </div>

                                <div>
                                    <dt class="text-sm font-bold text-[#222222]">Telepon</dt>
                                    <dd class="mt-1 text-sm text-[#777777]">
                                        <a href="tel:+6289665918077"
                                            class="transition-colors hover:text-[#A88724]">
                                            +62 896-6591-8077
                                        </a>
                                    </dd>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="flex gap-3">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#FBF6E6] text-[#A88724]">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                            d="M3 7l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                                    </svg>
                                </div>

                                <div class="min-w-0">
                                    <dt class="text-sm font-bold text-[#222222]">Email</dt>
                                    <dd class="mt-1 break-words text-sm text-[#777777]">
                                        {{ $contact?->marketing_email ?: 'Belum tersedia' }}
                                    </dd>
                                </div>
                            </div>

                            {{-- Jam Layanan --}}
                            <div class="flex gap-3">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#FBF6E6] text-[#A88724]">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="9" stroke-width="1.8"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                            d="M12 7v5l3 2"/>
                                    </svg>
                                </div>

                                <div>
                                    <dt class="text-sm font-bold text-[#222222]">Jam Layanan</dt>
                                    <dd class="mt-1 text-sm leading-relaxed text-[#777777]">
                                        Senin–Jumat, 08.00–17.00 WIB<br>
                                        Sabtu, 08.00–12.00 WIB
                                    </dd>
                                </div>
                            </div>
                        </dl>

                        {{-- WhatsApp --}}
                        @if ($whatsappNumber !== '')
                            <a href="https://wa.me/6289665918077"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="mt-7 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-[#171717] px-5 py-3.5 text-sm font-bold text-white transition-colors hover:bg-[#C9A227] hover:text-[#171717]">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.04 2a9.9 9.9 0 00-8.5 15l-1.3 4.7 4.8-1.25A10 10 0 1012.04 2zm0 18.2a8.2 8.2 0 01-4.18-1.14l-.3-.18-2.85.75.76-2.78-.2-.3A8.2 8.2 0 1112.04 20.2zm4.5-6.15c-.25-.12-1.47-.72-1.7-.8-.23-.08-.4-.12-.56.12-.17.25-.65.8-.8.96-.15.16-.3.18-.56.06-.25-.12-1.05-.39-2-1.23-.73-.65-1.23-1.46-1.38-1.7-.14-.25-.01-.38.11-.5.11-.1.25-.28.37-.42.12-.14.16-.25.25-.41.08-.17.04-.31-.02-.43-.06-.12-.56-1.35-.77-1.85-.2-.48-.4-.42-.56-.43h-.48c-.17 0-.43.06-.66.31-.23.25-.87.85-.87 2.08s.9 2.41 1.02 2.58c.12.17 1.76 2.69 4.27 3.77.6.26 1.06.42 1.43.54.6.19 1.15.16 1.58.1.48-.07 1.47-.6 1.68-1.18.2-.58.2-1.08.14-1.18-.06-.1-.23-.16-.48-.29z"/>
                                </svg>
                                Hubungi via WhatsApp
                            </a>
                        @endif
                    </div>

                    <div class="rounded-2xl border border-[#E8E5DC] bg-white p-6 shadow-[0_2px_10px_rgba(25,25,25,0.025)]">
                        <div class="mb-3 h-1 w-10 rounded-full bg-[#C9A227]"></div>

                        <h3 class="font-bold text-[#222222]">
                            Sampaikan kebutuhan Anda
                        </h3>

                        <p class="mt-2 text-sm leading-relaxed text-[#777777]">
                            Kirim pesan melalui formulir dan tim kami akan menindaklanjutinya pada jam layanan.
                        </p>
                    </div>
                </aside>

                {{-- Formulir Pesan --}}
                <div class="rounded-2xl border border-[#E8E5DC] bg-white p-6 shadow-[0_3px_15px_rgba(25,25,25,0.04)] sm:p-8 lg:col-span-3">
                    <div class="mb-7">
                        <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#A88724]">
                            Formulir Pesan
                        </span>

                        <h2 class="mt-2 text-2xl font-extrabold text-[#171717]">
                            Kirim pesan kepada kami
                        </h2>

                        <p class="mt-2 text-sm text-[#888888]">
                            Kolom bertanda <span class="text-red-600">*</span> wajib diisi.
                        </p>

                        <div class="mt-5 h-px bg-[#EAE7DF]"></div>
                    </div>

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf

                        {{-- Honeypot Antispam --}}
                        <div aria-hidden="true" class="absolute -left-[9999px] top-auto h-px w-px overflow-hidden">
                            <label for="website">Jangan isi kolom ini</label>
                            <input id="website" type="text" name="website" tabindex="-1" autocomplete="off">
                        </div>

                        {{-- Nama --}}
                        <div>
                            <label for="name" class="mb-2 block text-sm font-semibold text-[#333333]">
                                Nama <span class="text-red-600">*</span>
                            </label>

                            <input
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name') }}"
                                autocomplete="name"
                                required
                                maxlength="255"
                                aria-invalid="@error('name') true @else false @enderror"
                                placeholder="Masukkan nama lengkap"
                                class="w-full rounded-xl border border-[#DEDAD0] bg-[#FAFAF8] px-4 py-3 text-sm text-[#222222] outline-none transition focus:border-[#C9A227] focus:bg-white focus:ring-2 focus:ring-[#C9A227]/15"
                            >

                            @error('name')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- WhatsApp dan Email --}}
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <div>
                                <label for="phone" class="mb-2 block text-sm font-semibold text-[#333333]">
                                    No. WhatsApp <span class="text-red-600">*</span>
                                </label>

                                <input
                                    id="phone"
                                    name="phone"
                                    type="tel"
                                    value="{{ old('phone') }}"
                                    autocomplete="tel"
                                    required
                                    maxlength="30"
                                    aria-invalid="@error('phone') true @else false @enderror"
                                    placeholder="Contoh: 08xxxxxxxxxx"
                                    class="w-full rounded-xl border border-[#DEDAD0] bg-[#FAFAF8] px-4 py-3 text-sm text-[#222222] outline-none transition focus:border-[#C9A227] focus:bg-white focus:ring-2 focus:ring-[#C9A227]/15"
                                >

                                @error('phone')
                                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="mb-2 block text-sm font-semibold text-[#333333]">
                                    Email <span class="font-normal text-[#999999]">(opsional)</span>
                                </label>

                                <input
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    autocomplete="email"
                                    maxlength="255"
                                    aria-invalid="@error('email') true @else false @enderror"
                                    placeholder="nama@email.com"
                                    class="w-full rounded-xl border border-[#DEDAD0] bg-[#FAFAF8] px-4 py-3 text-sm text-[#222222] outline-none transition focus:border-[#C9A227] focus:bg-white focus:ring-2 focus:ring-[#C9A227]/15"
                                >

                                @error('email')
                                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Pesan --}}
                        <div>
                            <label for="message" class="mb-2 block text-sm font-semibold text-[#333333]">
                                Pesan <span class="text-red-600">*</span>
                            </label>

                            <textarea
                                id="message"
                                name="message"
                                rows="6"
                                required
                                maxlength="5000"
                                aria-invalid="@error('message') true @else false @enderror"
                                placeholder="Tuliskan pertanyaan atau kebutuhan Anda..."
                                class="w-full resize-y rounded-xl border border-[#DEDAD0] bg-[#FAFAF8] px-4 py-3 text-sm text-[#222222] outline-none transition focus:border-[#C9A227] focus:bg-white focus:ring-2 focus:ring-[#C9A227]/15"
                            >{{ old('message') }}</textarea>

                            @error('message')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tombol Kirim --}}
                        <button
                            type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-[#171717] px-6 py-3.5 text-sm font-bold text-white transition-colors hover:bg-[#C9A227] hover:text-[#171717] sm:w-auto"
                        >
                            Kirim Pesan

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5 12h14m-7-7l7 7-7 7"/>
                            </svg>
                        </button>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection
