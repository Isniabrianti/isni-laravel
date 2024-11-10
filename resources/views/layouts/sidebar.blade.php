<div class="custom-sidebar bg-white border-right">
    <div class="sidebar-header">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ secure_asset('argon/assets/img/ff.png') }}" class="navbar-brand-img" alt="main_logo">
        </a>
    </div> 
    <!-- item pada sidebar -->
    <ul class="nav flex-column">
        <!-- dashboard -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
            <i class="fas fa-home text-primary"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- data buku -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('buku*') ? 'active' : '' }}" href="{{ route('buku.index') }}">
                <i class="fas fa-book text-warning"></i>
                <span>Books</span>
            </a>
       </li>
        <!-- profil -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="{{ route('profile') }}">
            <i class="ni ni-single-02 text-primary"></i>
                <span>Profile</span>
            </a>
        </li>
        <!-- pengaturan -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('settings') ? 'active' : '' }}" href="{{ route('settings') }}">
            <i class="fas fa-cog text-info"></i>
                <span>Settings</span>
            </a>
        </li>
    </ul>
</div> 