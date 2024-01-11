<header id="header" class="fixed-top
@if (str_contains(Route::currentRouteName(), 'auth.')) header-inner-pages @endif">
    <div class="container d-flex align-items-center">
        <a href="{{ route('home') }}" class="logo me-auto">
            <img src="/assets/img/logo-prodev.png" alt="Logo Prodev" class="img-fluid">
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="{{ url('/#hero') }}">Beranda</a></li>
                <li><a class="nav-link scrollto" href="{{ url('/#about') }}">Tentang</a></li>
                <li><a class="nav-link scrollto" href="{{ url('/#services') }}">Layanan</a></li>
                <li><a class="nav-link scrollto" href="{{ url('/#package') }}">Paket Layanan</a></li>
                <li><a class="nav-link scrollto" href="{{ url('/#portfolio') }}">Portofolio</a></li>
                <li><a class="nav-link scrollto" href="{{ url('/#faq') }}">FAQ</a></li>
                <li><a class="nav-link scrollto" href="{{ url('/#contact') }}">Kontak</a></li>
                @auth
                    <li class="dropdown">
                        <a href="#">
                            <span class="d-none d-lg-inline text-gray-600">Hi, {{ auth()->user()->nama }}! </span>
                            @if (auth()->user()->image_path)
                                <img src="/storage/{{ auth()->user()->image_path }}" alt="Foto"
                                    class="img-profile rounded-circle mx-1" style="width: 30px; height: 30px">
                            @else
                                <img src="{{ asset('assets/img/user.png') }}" alt="Foto"
                                    class="img-profile rounded-circle">
                            @endif
                            <i class="m-0 bi bi-chevron-down"></i>
                        </a>
                        <ul>
                            @if (@auth()->user()->role == 'admin')
                                <li>
                                    <a href="{{ route('dashboard') }}">
                                        Dashboard Admin
                                        <i class="fas fa-tachometer-alt"></i>
                                    </a>
                                </li>
                            @elseif (@auth()->user()->role == 'customer')
                                <li>
                                    <a href="#">
                                        Profil
                                        <i class="fa fa-cog"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Pesanan
                                        <i class="fas fa-shopping-bag"></i>
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('auth.logout') }}">
                                    Keluar
                                    <i class="fas fa-sign-out-alt"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    @if (!str_contains(Route::currentRouteName(), 'auth.'))
                        <li><a class="getstarted scrollto" href="{{ route('auth.login') }}">Masuk</a></li>
                    @elseif (Route::currentRouteName() == 'auth.login')
                        <li><a class="getstarted scrollto" href="{{ route('auth.register') }}">Daftar Sekarang</a></li>
                    @elseif (Route::currentRouteName() == 'auth.register')
                        <li><a class="getstarted scrollto" href="{{ route('auth.login') }}">Masuk</a></li>
                    @endif
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
