<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            {{-- <span class="navbar-toggler-icon"></span> --}}Wetlook Carwash
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('home') || isset($active) ? 'active': '' }}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('about') ? 'active': '' }}" href="/about">About</a>
                </li>

            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome Back, {{ auth()->user()->nama }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> My Account</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Log Out</a></button>
                            </form>
                            {{-- <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i> Log Out</a></li> --}}
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{ Request::is('login') ? 'active': '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>
                    <li>
                        <a href="/register" class="nav-link {{ Request::is('registrasi') ? 'active': '' }}"><i class="bi bi-box-arrow-in-right"></i> Registrasi</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
