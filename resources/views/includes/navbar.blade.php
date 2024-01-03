<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <a href="{{ route('home') }}" class="logo me-auto">
            <img src="/assets/img/logo-prodev.png" alt="Logo Prodev" class="img-fluid">
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="#hero">Beranda</a></li>
                <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
                <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
                <li><a class="nav-link scrollto" href="#portfolio">Portofolio</a></li>
                <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                <li><a class="getstarted scrollto" href="{{ route('auth.login') }}">Masuk</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
