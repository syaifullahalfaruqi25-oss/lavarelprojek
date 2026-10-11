<nav id="mainNavbar" class="fixed top-0 left-0 w-full z-50 bg-[#080808] transition-all duration-500 ease-in-out">
    <div class="px-5 sm:px-6 lg:px-8">
        <div class="h-[72px] flex items-center justify-between gap-3">
            {{-- LOGO --}}
            <a href="{{ url('/') }}" class="flex items-center gap-3 shrink-0">
                <img src="{{ asset('images/logo1.png') }}" alt="PropertiLoka"
                    class="w-12 h-12 sm:w-14 sm:h-14 object-contain">
                <div class="leading-tight">
                    <div class="text-white font-bold text-base sm:text-lg tracking-wide">PropertiLoka</div>
                    <div class="text-[#D4AF37] text-[9px] sm:text-[10px] font-semibold tracking-[0.14em]">PROPERTY &
                        LIVING</div>
                </div>
            </a>

            {{-- MENU DESKTOP --}}
            <div class="hidden lg:flex items-center gap-1">
                <a href="{{ url('/') }}"
                    class="px-5 py-3 rounded-xl transition-all duration-300 {{ request()->is('/') ? 'text-[#FFD700] bg-[#D4AF37]/10 shadow-[0_0_12px_rgba(212,175,55,0.10)]' : 'text-white/80 hover:text-[#FFD700] hover:bg-white/5' }}">Beranda</a>
                <a href="{{ url('/perumahan') }}"
                    class="px-5 py-3 rounded-xl transition-all duration-300 {{ request()->is('perumahan*') ? 'text-[#FFD700] bg-[#D4AF37]/10 shadow-[0_0_12px_rgba(212,175,55,0.10)]' : 'text-white/80 hover:text-[#FFD700] hover:bg-white/5' }}">Perumahan</a>
                <a href="{{ url('/tentang-kami') }}"
                    class="px-5 py-3 rounded-xl transition-all duration-300 {{ request()->is('tentang-kami*') ? 'text-[#FFD700] bg-[#D4AF37]/10 shadow-[0_0_12px_rgba(212,175,55,0.10)]' : 'text-white/80 hover:text-[#FFD700] hover:bg-white/5' }}">Tentang
                    Kami</a>
                <a href="{{ url('/kontak') }}"
                    class="px-5 py-3 rounded-xl text-white/80 hover:text-[#FFD700] hover:bg-white/5 transition-all duration-300">Kontak</a>
            </div>

            {{-- SEARCH DESKTOP --}}
            <form action="{{ url('/perumahan') }}" method="GET" class="hidden lg:block relative shrink-0">
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Cari perumahan..."
                    class="w-52 xl:w-60 h-11 pl-11 pr-4 rounded-xl bg-white/5 border border-white/10 text-white placeholder:text-white/40 outline-none focus:bg-white/10 focus:border-[#D4AF37]/70 focus:shadow-[0_0_14px_rgba(212,175,55,0.18)] transition-all duration-300">
                <button type="submit" aria-label="Cari perumahan"
                    class="absolute left-0 top-0 w-11 h-11 flex items-center justify-center">
                    <svg class="w-5 h-5 text-[#D4AF37]/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m21 21-4.35-4.35m2.1-5.4a7.5 7.5 0 1 1-15 0Z" />
                    </svg>
                </button>
            </form>

            {{-- TOMBOL MOBILE --}}
            <div class="lg:hidden flex items-center gap-2 shrink-0">
                <button id="mobileSearchButton" type="button" aria-label="Buka pencarian" aria-expanded="false"
                    class="w-11 h-11 rounded-xl bg-white/5 hover:bg-[#D4AF37]/10 border border-white/10 hover:border-[#D4AF37]/50 flex items-center justify-center text-[#D4AF37] transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m21 21-4.35-4.35m2.1-5.4a7.5 7.5 0 1 1-15 0Z" />
                    </svg>
                </button>
                <button id="mobileMenuButton" type="button" aria-label="Buka menu" aria-expanded="false"
                    class="w-11 h-11 rounded-xl bg-white/5 hover:bg-[#D4AF37]/10 border border-white/10 hover:border-[#D4AF37]/50 flex items-center justify-center text-[#D4AF37] transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- MENU MOBILE --}}
        <div id="mobileMenu" class="lg:hidden hidden border-t border-white/10">
            <div class="py-3 space-y-1">
                <a href="{{ url('/') }}"
                    class="block px-4 py-3 rounded-xl text-white/80 hover:text-[#FFD700] hover:bg-[#D4AF37]/10 transition-all duration-300">Beranda</a>
                <a href="{{ url('/perumahan') }}"
                    class="block px-4 py-3 rounded-xl text-white/80 hover:text-[#FFD700] hover:bg-[#D4AF37]/10 transition-all duration-300">Perumahan</a>
                <a href="{{ url('/tentang-kami') }}"
                    class="block px-4 py-3 rounded-xl text-white/80 hover:text-[#FFD700] hover:bg-[#D4AF37]/10 transition-all duration-300">Tentang
                    Kami</a>
                <a href="{{ url('/kontak') }}"
                    class="block px-4 py-3 rounded-xl text-white/80 hover:text-[#FFD700] hover:bg-[#D4AF37]/10 transition-all duration-300">Kontak</a>
            </div>
        </div>

        {{-- PENCARIAN MOBILE --}}
        <div id="mobileSearch" class="lg:hidden hidden border-t border-white/10">
            <form action="{{ url('/perumahan') }}" method="GET" class="relative py-4">
                <input id="mobileSearchInput" type="search" name="search" value="{{ request('search') }}"
                    placeholder="Cari perumahan..."
                    class="w-full h-12 pl-11 pr-4 rounded-xl bg-white/5 border border-white/10 text-white placeholder:text-white/40 outline-none focus:border-[#D4AF37]/70 focus:bg-white/10 focus:shadow-[0_0_14px_rgba(212,175,55,0.18)] transition-all duration-300">
                <button type="submit" aria-label="Cari perumahan"
                    class="absolute left-0 top-4 w-11 h-12 flex items-center justify-center">
                    <svg class="w-5 h-5 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m21 21-4.35-4.35m2.1-5.4a7.5 7.5 0 1 1-15 0Z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navbar = document.getElementById('mainNavbar');
        const menuButton = document.getElementById('mobileMenuButton');
        const menuPanel = document.getElementById('mobileMenu');
        const searchButton = document.getElementById('mobileSearchButton');
        const searchPanel = document.getElementById('mobileSearch');
        const searchInput = document.getElementById('mobileSearchInput');

        if (!navbar || !menuButton || !menuPanel || !searchButton || !searchPanel) return;

        function closeMenu() {
            menuPanel.classList.add('hidden');
            menuButton.setAttribute('aria-expanded', 'false');
        }

        function closeSearch() {
            searchPanel.classList.add('hidden');
            searchButton.setAttribute('aria-expanded', 'false');
        }

        menuButton.addEventListener('click', function () {
            const shouldOpen = menuPanel.classList.contains('hidden');
            closeSearch();
            if (shouldOpen) {
                menuPanel.classList.remove('hidden');
                menuButton.setAttribute('aria-expanded', 'true');
            } else {
                closeMenu();
            }
        });

        searchButton.addEventListener('click', function () {
            const shouldOpen = searchPanel.classList.contains('hidden');
            closeMenu();
            if (shouldOpen) {
                searchPanel.classList.remove('hidden');
                searchButton.setAttribute('aria-expanded', 'true');
                if (searchInput) setTimeout(function () { searchInput.focus(); }, 100);
            } else {
                closeSearch();
            }
        });

        function updateNavbar() {
            if (window.scrollY > 30) {
                navbar.classList.add('backdrop-blur-xl', 'shadow-[0_8px_30px_rgba(0,0,0,0.45)]', 'border-b', 'border-white/10');
                navbar.style.backgroundColor = 'rgba(8, 8, 8, 0.88)';
            } else {
                navbar.classList.remove('backdrop-blur-xl', 'shadow-[0_8px_30px_rgba(0,0,0,0.45)]', 'border-b', 'border-white/10');
                navbar.style.backgroundColor = '#080808';
            }
        }

        window.addEventListener('scroll', updateNavbar);
        updateNavbar();

        window.addEventListener('resize', function () {
            if (window.innerWidth >= 1024) {
                closeMenu();
                closeSearch();
            }
        });
    });
</script>