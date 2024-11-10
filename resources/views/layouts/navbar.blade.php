<nav class="navbar navbar-expand-lg navbar-white bg-white" style="box-shadow: none;">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                @if (!Route::is('login') && !Route::is('register')) 
                    <!-- Search Form -->
                    <form class="d-flex ms-auto me-3" action="{{ route('search') }}" method="GET">
                        <input class="form-control form-control-sm me-2" type="search" name="query" placeholder="Search....." aria-label="Search" style="width: 300px; height: 40px; font-size: 15px;">
                    </form>
                    <!-- Settings Icon -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('settings') }}" role="button">
                            <i class="fas fa-cog text-info" style="font-size: 21px;"></i> <!-- Icon Pengaturan -->
                        </a>
                    </li>
                    <!-- User Icon -->
                    <li class="nav-item dropdown">
                        @if (Auth::check())
                            <a class="nav-link" href="{{ route('profile') }}" role="button" aria-haspopup="true" aria-expanded="false">
                                @if (Auth::user()->profile_picture)
                                    <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Foto Profil" width="30" height="30" class="rounded-circle">
                                @else
                                    <i class="ni ni-single-02 text-primary"></i>
                                @endif
                            </a>
                        @else
                            <a class="nav-link" href="{{ route('login') }}" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="ni ni-single-02 text-primary" style="font-size: 19px;"></i>
                            </a>
                        @endif
                    </li>
                @endif

                @guest
                    <!-- Login -->
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route('login') }}" role="button" style="font-size: 1.2rem;">
                            Login
                        </a>
                    </li>
                    <!-- Register -->
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-success" href="{{ route('register') }}" style="font-size: 1.2rem;">
                                Register
                            </a>
                        </li>
                    @endif
                @endguest
            </ul>
        </div>
    </div>
</nav>