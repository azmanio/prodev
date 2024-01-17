<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" style="background: #4682a9" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <img src="/assets/img/logo-prodev.png" width="75px">
        <div class="sidebar-brand-text">CV PRODEV MEDIA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if (Route::currentRouteName() == 'dashboard') active @endif">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <li class="nav-item @if (str_contains(Route::currentRouteName(), 'admin.') || str_contains(Route::currentRouteName(), 'customer.')) active @endif">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-users"></i>
            <span>User</span>
        </a>
        <div id="collapseTwo" class="collapse @if (str_contains(Route::currentRouteName(), 'admin.') || str_contains(Route::currentRouteName(), 'customer.')) show @endif"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item @if (str_contains(Route::currentRouteName(), 'admin.')) active bg-info text-white @endif"
                    href="{{ route('admin.index') }}">Admin</a>
                <a class="collapse-item @if (str_contains(Route::currentRouteName(), 'customer.')) active bg-info text-white @endif"
                    href="{{ route('customer.index') }}">Customer</a>
            </div>
        </div>
    </li>
    <li class="nav-item @if (Route::currentRouteName() == 'jenis-layanan.index') active @endif">
        <a class="nav-link" href="{{ route('jenis-layanan.index') }}">
            <i class="fas fa-list-ul"></i>
            <span>Jenis Layanan</span>
        </a>
    </li>
    <li class="nav-item @if (Route::currentRouteName() == 'layanan.index') active @endif">
        <a class="nav-link" href="{{ route('layanan.index') }}">
            <i class="fas fa-tag"></i>
            <span>Layanan</span>
        </a>
    </li>
    <li class="nav-item @if (Route::currentRouteName() == 'paket-layanan.index') active @endif">
        <a class="nav-link" href="{{ route('paket-layanan.index') }}">
            <i class="fas fa-tags"></i>
            <span>Paket Layanan</span>
        </a>
    </li>
    <li class="nav-item @if (Route::currentRouteName() == 'order.index') active @endif">
        <a class="nav-link" href="{{ route('order.index') }}">
            <i class="fas fa-money-check-alt"></i>
            <span>Order</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
