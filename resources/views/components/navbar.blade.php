<nav class="navbar">

    <div class="navbar-inner">

        {{-- BRAND --}}
        <a href="/" class="brand">

            <div class="brand-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Property Logo">
            </div>

            <div class="brand-content">
                <span class="brand-name">NUSANTARA</span>
                <span class="brand-subtitle">PROPERTY & LIVING</span>
            </div>

        </a>


        {{-- DESKTOP NAVIGATION --}}
        <div class="nav-menu">

            <a href="/" class="nav-link active">
                <span>01</span>
                Beranda
            </a>

            <a href="#" class="nav-link">
                <span>02</span>
                Perumahan
            </a>

            <a href="#" class="nav-link">
                <span>03</span>
                Tentang Kami
            </a>

            <a href="#" class="nav-link">
                <span>04</span>
                Kontak
            </a>

        </div>


        {{-- RIGHT ACTION --}}
        <div class="nav-right">

            <a href="#" class="nav-login">
                Masuk
            </a>

            <a href="#" class="nav-button">

                <span class="nav-button-text">
                    Temukan Hunian
                </span>

                <span class="nav-button-icon">
                    ↗
                </span>

            </a>

        </div>


        {{-- MOBILE BUTTON --}}
        <input type="checkbox" id="menu-toggle" class="menu-toggle">

        <label for="menu-toggle" class="menu-button">

            <span></span>
            <span></span>

        </label>

    </div>


    {{-- MOBILE MENU --}}
    <div class="mobile-menu">

        <a href="/" class="mobile-link active">
            Beranda
        </a>

        <a href="#" class="mobile-link">
            Perumahan
        </a>

        <a href="#" class="mobile-link">
            Tentang Kami
        </a>

        <a href="#" class="mobile-link">
            Kontak
        </a>

        <div class="mobile-line"></div>

        <a href="#" class="mobile-login">
            Masuk
        </a>

        <a href="#" class="mobile-button">
            Temukan Hunian
            <span>↗</span>
        </a>

    </div>

</nav>