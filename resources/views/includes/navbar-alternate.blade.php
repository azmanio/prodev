<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">
        <a href="{{ route('home') }}" class="logo me-auto">
            <img src="/assets/img/logo-prodev.png" alt="Logo Prodev" class="img-fluid">
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto @if (Route::currentRouteName() == 'home') active @endif"
                        href="{{ route('home') }}">Beranda</a>
                </li>
                <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
                <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
                <li><a class="nav-link scrollto" href="#portfolio">Portofolio</a></li>
                <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                <li><a class="getstarted scrollto" href="{{ route('auth.register') }}">Daftar Sekarang</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
