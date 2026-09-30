<!-- Nav Wrapper: Membuatnya mengambang (fixed) di posisi atas -->
<nav class="fixed top-4 left-1/2 transform -translate-x-1/2 w-[95%] max-w-7xl z-50">
    
    <!-- Navbar Background & Shape -->
    <div class="bg-[#1B2A47] rounded-2xl px-6 py-3 flex items-center justify-between shadow-2xl border border-white/10 backdrop-blur-md">
        
        {{-- BRAND --}}
        <a href="/" class="flex items-center gap-3 group">
            <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center overflow-hidden shadow-sm transition-transform group-hover:scale-105">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-full h-full object-contain" onerror="this.outerHTML='<span class=\'text-[#1B2A47] font-extrabold text-xl\'>N</span>'">
            </div>
            <div class="flex flex-col leading-none">
                <span class="text-white font-bold tracking-widest text-sm">NUSANTARA</span>
                <span class="text-[#4FD1C5] text-[9px] tracking-[0.2em] uppercase mt-1">Property & Living</span>
            </div>
        </a>

      {{-- DESKTOP NAVIGATION --}}
        <div class="hidden lg:flex items-center gap-2 bg-white/5 p-1 rounded-xl">
            
            <!-- Menu Beranda -->
            <a href="/" class="text-sm px-4 py-2 rounded-lg transition-all flex items-center gap-1.5 font-medium {{ request()->is('/') ? 'text-white bg-white/10 shadow-sm' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                Beranda
            </a>
            
            <!-- Menu Perumahan -->
            <a href="/perumahan" class="text-sm px-4 py-2 rounded-lg transition-all flex items-center gap-1.5 font-medium {{ request()->is('perumahan*') ? 'text-white bg-white/10 shadow-sm' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                Perumahan
            </a>
            
            <!-- Menu Tentang Kami -->
            <a href="#" class="text-sm px-4 py-2 rounded-lg transition-all flex items-center gap-1.5 font-medium {{ request()->is('tentang-kami*') ? 'text-white bg-white/10 shadow-sm' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                Tentang Kami
            </a>
            
            <!-- Menu Kontak -->
            <a href="#" class="text-sm px-4 py-2 rounded-lg transition-all flex items-center gap-1.5 font-medium {{ request()->is('kontak*') ? 'text-white bg-white/10 shadow-sm' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                Kontak
            </a>
            
        </div>

        {{-- RIGHT ACTION --}}
        <div class="hidden md:flex items-center gap-4">
            <a href="#" class="text-gray-300 text-sm hover:text-white transition-colors font-medium hover:underline decoration-[#4FD1C5] underline-offset-4">
                Masuk
            </a>
            <!-- Tombol CTA yang disesuaikan dengan tombol "Lihat Siteplan Digital" -->
            <a href="#" class="bg-[#2A8575] hover:bg-[#1f6b5d] text-white text-sm font-semibold px-5 py-2.5 rounded-xl flex items-center gap-2 transition-all duration-300 shadow-lg hover:shadow-[#2A8575]/40 hover:-translate-y-0.5">
                Temukan Hunian
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>

        {{-- MOBILE BUTTON (Hamburger Icon) --}}
        <button class="lg:hidden text-white hover:bg-white/10 p-2 rounded-lg transition-colors focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

    </div>
</nav>