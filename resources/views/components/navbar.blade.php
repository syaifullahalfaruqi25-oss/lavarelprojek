<nav id="mainNavbar" class="fixed top-0 left-0 w-full z-50 bg-[#080808] transition-all duration-500 ease-in-out">

    <div class="px-5 sm:px-6 lg:px-8">

        <div class="h-[72px] flex items-center justify-between">

            {{-- LOGO --}}
            <a href="{{ url('/') }}" class="flex items-center gap-3 shrink-0">
                <div
                    class="w-11 h-11 bg-white rounded-xl flex items-center justify-center overflow-hidden border border-[#D4AF37]/60 shadow-[0_0_12px_rgba(212,175,55,0.18)]">
                    <img src="{{ asset('images/logo.png') }}" alt="SolusiProperti" class="w-9 h-9 object-contain">
                </div>

                <div class="leading-tight">
                    <div class="text-white font-bold text-lg tracking-wide">
                        SolusiProperti
                    </div>

                    <div class="text-[#D4AF37] text-[10px] font-semibold tracking-[0.18em]">
                        PROPERTY & LIVING
                    </div>
                </div>
            </a>

            {{-- MENU DESKTOP --}}
            <div class="hidden lg:flex items-center gap-1">

                <a href="{{ url('/') }}" class="px-5 py-3 rounded-xl transition-all duration-300
                    {{ request()->is('/')
    ? 'text-[#FFD700] bg-[#D4AF37]/10 shadow-[0_0_12px_rgba(212,175,55,0.10)]'
    : 'text-white/80 hover:text-[#FFD700] hover:bg-white/5' }}">
                    Beranda
                </a>

                <a href="{{ url('/perumahan') }}" class="px-5 py-3 rounded-xl transition-all duration-300
                    {{ request()->is('perumahan*')
    ? 'text-[#FFD700] bg-[#D4AF37]/10 shadow-[0_0_12px_rgba(212,175,55,0.10)]'
    : 'text-white/80 hover:text-[#FFD700] hover:bg-white/5' }}">
                    Perumahan
                </a>

                <a href="{{ url('/tentang-kami') }}" class="px-5 py-3 rounded-xl transition-all duration-300
                    {{ request()->is('tentang-kami*')
    ? 'text-[#FFD700] bg-[#D4AF37]/10 shadow-[0_0_12px_rgba(212,175,55,0.10)]'
    : 'text-white/80 hover:text-[#FFD700] hover:bg-white/5' }}">
                    Tentang Kami
                </a>

                <a href="{{ url('/kontak') }}"
                    class="px-5 py-3 rounded-xl text-white/80 hover:text-[#FFD700] hover:bg-white/5 transition-all duration-300">
                    Kontak
                </a>

            </div>

            {{-- SEARCH DESKTOP --}}
            <div class="hidden lg:flex items-center">

                <form action="{{ url('/perumahan') }}" method="GET" class="relative">

                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari perumahan..."
                        class="w-52 xl:w-60 h-11 pl-11 pr-4 rounded-xl
                        bg-white/5
                        border border-white/10
                        text-white
                        placeholder:text-white/40
                        outline-none
                        focus:bg-white/10
                        focus:border-[#D4AF37]/70
                        focus:shadow-[0_0_14px_rgba(212,175,55,0.18)]
                        transition-all duration-300">

                    <button type="submit" class="absolute left-0 top-0 w-11 h-11 flex items-center justify-center">

                        <svg class="w-5 h-5 text-[#D4AF37]/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m21 21-4.35-4.35m2.1-5.4a7.5 7.5 0 1 1-15 0Z" />

                        </svg>

                    </button>

                </form>

            </div>

            {{-- HAMBURGER MOBILE --}}
            <button id="mobileMenuButton" type="button" class="lg:hidden w-11 h-11 rounded-xl
                bg-white/5
                hover:bg-[#D4AF37]/10
                border border-white/10
                hover:border-[#D4AF37]/50
                flex items-center justify-center
                text-[#D4AF37]
                transition-all duration-300">

                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />

                </svg>

            </button>

        </div>

        {{-- MENU MOBILE --}}
        <div id="mobileMenu"
            class="lg:hidden max-h-0 opacity-0 overflow-hidden transition-all duration-500 ease-in-out">

            <div class="pb-5 pt-2 space-y-2">

                <a href="{{ url('/') }}" class="block px-4 py-3 rounded-xl
                    text-white/80
                    hover:text-[#FFD700]
                    hover:bg-[#D4AF37]/10
                    transition">
                    Beranda
                </a>

                <a href="{{ url('/perumahan') }}" class="block px-4 py-3 rounded-xl
                    text-white/80
                    hover:text-[#FFD700]
                    hover:bg-[#D4AF37]/10
                    transition">
                    Perumahan
                </a>

                <a href="{{ url('/tentang-kami') }}" class="block px-4 py-3 rounded-xl
                    text-white/80
                    hover:text-[#FFD700]
                    hover:bg-[#D4AF37]/10
                    transition">
                    Tentang Kami
                </a>

                <a href="{{ url('/kontak') }}" class="block px-4 py-3 rounded-xl
                    text-white/80
                    hover:text-[#FFD700]
                    hover:bg-[#D4AF37]/10
                    transition">
                    Kontak
                </a>

                {{-- SEARCH MOBILE --}}
                <form action="{{ url('/perumahan') }}" method="GET" class="relative pt-2">

                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari perumahan..."
                        class="w-full h-11 pl-11 pr-4 rounded-xl
                        bg-white/5
                        border border-white/10
                        text-white
                        placeholder:text-white/40
                        outline-none
                        focus:border-[#D4AF37]/70
                        focus:shadow-[0_0_14px_rgba(212,175,55,0.18)]">

                    <button type="submit" class="absolute left-0 top-2 w-11 h-11 flex items-center justify-center">

                        <svg class="w-5 h-5 text-[#D4AF37]/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m21 21-4.35-4.35m2.1-5.4a7.5 7.5 0 1 1-15 0Z" />

                        </svg>

                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const navbar = document.getElementById('mainNavbar');
        const mobileButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');

        window.addEventListener('scroll', function () {

            if (window.scrollY > 30) {

                navbar.classList.add(
                    'bg-[#080808]/80',
                    'backdrop-blur-xl',
                    'shadow-[0_8px_30px_rgba(0,0,0,0.45)]',
                    'border-white/10'
                );

                navbar.classList.remove('bg-[#080808]');

            } else {

                navbar.classList.remove(
                    'bg-[#080808]/80',
                    'backdrop-blur-xl',
                    'shadow-[0_8px_30px_rgba(0,0,0,0.45)]',
                    'border-white/10'
                );

                navbar.classList.add('bg-[#080808]');

            }

        });

        let menuOpen = false;

        mobileButton.addEventListener('click', function () {

            menuOpen = !menuOpen;

            if (menuOpen) {

                mobileMenu.classList.remove(
                    'max-h-0',
                    'opacity-0'
                );

                mobileMenu.classList.add(
                    'max-h-[500px]',
                    'opacity-100'
                );

            } else {

                mobileMenu.classList.remove(
                    'max-h-[500px]',
                    'opacity-100'
                );

                mobileMenu.classList.add(
                    'max-h-0',
                    'opacity-0'
                );

            }

        });

    });
</script>