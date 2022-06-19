<nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container"><a class="navbar-brand" href="/"><img src="{{asset('assets/img/logo/User-Manual.png')}}"
                height="47" alt="logo" /><img src="{{asset('assets/img/logo/logo-lptp.png')}}" height="38"
                alt="logo" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"> </span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ ($title === "Sirkulasi") ? 'active' : '' }}"
                        href="/sirkulasi id=" navbarDropdown" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Sirkulasi
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @can('admin')
                        <a class="dropdown-item" href="/home/sirkulasi/peminjaman-buku">Peminjaman Buku</a>
                        <a class="dropdown-item" href="/home/sirkulasi/pengembalian-buku">Pengembalian Buku</a>
                        @endcan
                        <a class="dropdown-item" href="/home/sirkulasi/penelusuran-katalog">Penelusuran Katalog</a>
                        @can('admin')
                        <a class="dropdown-item" href="/home/sirkulasi/bebas-pustaka">Bebas Pustaka</a>
                        @endcan
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ ($title === "Layanan") ? 'active' : '' }}" href="/layanan"
                        href="/sirkulasi" id=" navbarDropdown" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Layanan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @can('admin')
                        <a class="dropdown-item" href="/home/layanan/keanggotaan">Keanggotaan</a>
                        @endcan
                        <a class="dropdown-item" href="/home/layanan/bibliography">Bibliography</a>
                    </div>
                </li>
                <li class="nav-item"><a
                        class="nav-link {{ Request::is('home/koleksi-digital/koleksi-digital') ? 'active' : '' }}"
                        aria-current="page" href="/home/koleksi-digital">Koleksi Digital</a></li>
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ ($title === "Sign-in") ? 'active' : '' }}" href="/"
                        href="/sirkulasi id=" navbarDropdown" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Welcome back, {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/dashboard">My Dashboard</a>
                        <hr class="dropdown-divider">
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </div>
                </li>
                @else
                <div class="d-flex ms-lg-4">
                    <a class="btn btn-warning ms-3 {{ ($title === "Sign In") ? 'active' : '' }}" href="/sign-in">Sign
                        In</a>
                    {{-- <a class="btn btn-warning ms-3" href="/sign-up">Sign Up</a> --}}
                </div>
                @endauth
            </ul>
        </div>
    </div>
</nav>
