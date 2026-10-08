<nav id="mainNavbar" class="fixed top-0 left-0 w-full z-50 bg-[#172744] transition-all duration-500 ease-in-out">

    <div class="px-5 sm:px-6 lg:px-8">

        <div class="h-[72px] flex items-center justify-between">

            {{-- LOGO --}}
            <a href="{{ url('/') }}" class="flex items-center gap-3 shrink-0">
                <div class="w-11 h-11 bg-white rounded-xl flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/logo.png') }}" alt="SolusiProperti" class="w-9 h-9 object-contain">
                </div>
                <div class="leading-tight">
                    <div class="text-white font-bold text-lg tracking-wide">SolusiProperti</div>
                    <div class="text-[#38A89D] text-[10px] font-semibold tracking-[0.18em]">PROPERTY & LIVING</div>
                </div>
            </a>

            {{-- MENU DESKTOP --}}
            <div class="hidden lg:flex items-center gap-1">
                <a href="{{ url('/') }}"
                    class="px-5 py-3 rounded-xl transition-all duration-300 {{ request()->is('/') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white hover:bg-white/10' }}">
                    Beranda
                </a>
                <a href="{{ url('/perumahan') }}"
                    class="px-5 py-3 rounded-xl transition-all duration-300 {{ request()->is('perumahan*') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white hover:bg-white/10' }}">
                    Perumahan
                </a>
                <a href="{{ url('/tentang-kami') }}"
                    class="px-5 py-3 rounded-xl transition-all duration-300 {{ request()->is('tentang-kami*') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white hover:bg-white/10' }}">
                    Tentang Kami
                </a>
                <a href="{{ url('/kontak') }}"
                    class="px-5 py-3 rounded-xl transition-all duration-300 {{ request()->is('kontak*') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white hover:bg-white/10' }}">
                    Kontak
                </a>
            </div>

            {{-- SEARCH DESKTOP --}}
            <div class="hidden lg:flex items-center">
                <form action="{{ url('/perumahan') }}" method="GET" class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari perumahan..."
                        class="w-52 xl:w-60 h-11 pl-11 pr-4 rounded-xl bg-white/10 border border-white/10 text-white placeholder:text-white/50 outline-none focus:bg-white/15 focus:border-[#38A89D]/60 transition-all duration-300">
                    <button type="submit" class="absolute left-0 top-0 w-11 h-11 flex items-center justify-center">
                        <svg class="w-5 h-5 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m21 21-4.35-4.35m2.1-5.4a7.5 7.5 0 1 1-15 0 7.5 7.5 0 0 1 15 0Z" />
                        </svg>
                    </button>
                </form>
            </div>

            {{-- HAMBURGER MOBILE --}}
            <button id="mobileMenuButton" type="button"
                class="lg:hidden w-11 h-11 rounded-xl bg-white/10 hover:bg-white/15 flex items-center justify-center text-white transition-all duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

        </div>

        {{-- MENU MOBILE --}}
        <div id="mobileMenu" class="lg:hidden max-h-0 opacity-0 overflow-hidden transition-all duration-500 ease-in-out">
            <div class="pb-5 pt-2 space-y-2">
                <a href="{{ url('/') }}" class="block px-4 py-3 rounded-xl text-white/80 hover:text-white hover:bg-white/10 transition">Beranda</a>
                <a href="{{ url('/perumahan') }}" class="block px-4 py-3 rounded-xl text-white/80 hover:text-white hover:bg-white/10 transition">Perumahan</a>
                <a href="{{ url('/tentang-kami') }}" class="block px-4 py-3 rounded-xl text-white/80 hover:text-white hover:bg-white/10 transition">Tentang Kami</a>
                <a href="{{ url('/kontak') }}" class="block px-4 py-3 rounded-xl transition {{ request()->is('kontak*') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white hover:bg-white/10' }}">Kontak</a>

                {{-- SEARCH MOBILE --}}
                <form action="{{ url('/perumahan') }}" method="GET" class="relative pt-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari perumahan..."
                        class="w-full h-11 pl-11 pr-4 rounded-xl bg-white/10 border border-white/10 text-white placeholder:text-white/50 outline-none focus:border-[#38A89D]/60">
                    <button type="submit" class="absolute left-0 top-2 w-11 h-11 flex items-center justify-center">
                        <svg class="w-5 h-5 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m21 21-4.35-4.35m2.1-5.4a7.5 7.5 0 1 1-15 0 7.5 7.5 0 0 1 15 0Z" />
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
                navbar.classList.add('bg-[#172744]/80', 'backdrop-blur-xl', 'shadow-2xl', 'border-white/20');
                navbar.classList.remove('bg-[#172744]');
            } else {
                navbar.classList.remove('bg-[#172744]/80', 'backdrop-blur-xl', 'shadow-2xl', 'border-white/20');
                navbar.classList.add('bg-[#172744]');
            }
        });

        let menuOpen = false;
        mobileButton.addEventListener('click', function () {
            menuOpen = !menuOpen;
            if (menuOpen) {
                mobileMenu.classList.remove('max-h-0', 'opacity-0');
                mobileMenu.classList.add('max-h-[500px]', 'opacity-100');
            } else {
                mobileMenu.classList.remove('max-h-[500px]', 'opacity-100');
                mobileMenu.classList.add('max-h-0', 'opacity-0');
            }
        });
    });
</script>