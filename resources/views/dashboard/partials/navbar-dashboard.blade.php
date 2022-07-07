<center>
    <div class="py-3">
        <a href="/">
            <!-- ========   change your logo hear   ============ -->
            <img src="{{ asset('assets-dashboard/assets/images/logo/logo-lptp.png') }}" height="38" alt=""
                class="logo" />
            <img src="{{ asset('assets-dashboard/assets/images/logo/User-Manual.png') }}" alt="" />
        </a>
    </div>
</center>
<ul class="nav pcoded-inner-navbar ">
    <li class="nav-item pcoded-menu-caption">
        <label>Navigation</label>
    </li>
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="/dashboard" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span
                class="pcoded-mtext">Dashboard</span></a>
    </li>
    <li class="nav-item pcoded-hasmenu">
        <a class="nav-link {{ Request::is('dashboard/sirkulasi*') ? 'active' : '' }}"><span
                class="pcoded-micon"><i class="feather icon-layout"></i></span><span
                class="pcoded-mtext">Sirkulasi</span></a>
        <ul class="pcoded-submenu">
            <li><a href="/dashboard/peminjamans" target="_blank">Peminjaman Buku</a></li>
            <li><a href="/dashboard/sirkulasi/pengembalians" target="_blank">Pengembalian Buku</a></li>
            <li><a href="/dashboard/sirkulasi/penelusuran-katalog" target="_blank">Penelusuran Katalog</a></li>
            {{-- <li><a href="/dashboard/sirkulasi/katalogs" target="_blank">Penelusuran Katalog</a></li> --}}
            <li><a href="/dashboard/sirkulasi/bebaspustaka" target="_blank">Bebas Pustaka</a></li>
        </ul>
    </li>
    <li class="nav-item pcoded-hasmenu">
        <a class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span
                class="pcoded-mtext">Layanan</span></a>
        <ul class="pcoded-submenu {{ Request::is('/dashboard/layanan*/') ? 'active' : '' }}">
            <li><a href="/dashboard/layanan/keanggotaan" target="_blank">Keanggotaan</a></li>
            <li><a href="/dashboard/layanan/bibliography" target="_blank">Bibliography</a></li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="/dashboard/koleksidigitals"
            class="nav-link {{ Request::is('/dashboard/koleksidigitals*') ? 'active' : '' }}"><span
                class="pcoded-micon"><i class="feather icon-book"></i></span><span class="pcoded-mtext">Koleksi
                Digital</span></a>
    </li>
    <li class="nav-item pcoded-menu-caption">
        <label>Transaction</label>
    </li>
    <li class="nav-item">
        <a href="/dashboard/peminjamans"
            class="nav-link {{ Request::is('/dashboard/peminjamans') ? 'active' : '' }}"><span
                class="pcoded-micon"><i class="feather icon-file"></i></span><span class="pcoded-mtext">Transaksi Peminjaman</span></a>
    </li>
    <li class="nav-item">
        <a href="/dashboard/bookcollection"
            class="nav-link {{ Request::is('dashboard/bookcollection') ? 'active' : '' }}"><span
                class="pcoded-micon"><i class="feather icon-book"></i></span><span class="pcoded-mtext">Koleksi Buku</span></a>
    </li>
    <li class="nav-item">
        <a href="/dashboard/ajuan-perpanjangan"
            class="nav-link {{ Request::is('dashboard/ajuan-perpanjangan') ? 'active' : '' }}"><span
                class="pcoded-micon"><i class="feather icon-file-plus"></i></span><span class="pcoded-mtext">Ajuan Perpanjangan</span></a>
    </li>
    <li class="nav-item pcoded-menu-caption">
        <label>Forms</label>
    </li>
    <li class="nav-item">
        <a href="/dashboard/authors"
            class="nav-link {{ Request::is('/dashboard/authors') ? 'active' : '' }}"><span
                class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Penulis</span></a>
    </li>
    <li class="nav-item">
        <a href="/dashboard/heroes"
            class="nav-link {{ Request::is('/dashboard/heroes') ? 'active' : '' }}"><span
                class="pcoded-micon"><i class="feather icon-image"></i></span><span class="pcoded-mtext">Header</span></a>
    </li>
    <li class="nav-item">
        <a href="/dashboard/informasi"
            class="nav-link {{ Request::is('/dashboard/informasi') ? 'active' : '' }}"><span
                class="pcoded-micon"><i class="feather icon-info"></i></span><span class="pcoded-mtext">Informasi</span></a>
    </li>
    <li class="nav-item">
        <a href="/dashboard/categories"
            class="nav-link {{ Request::is('/dashboard/categories') ? 'active' : '' }}"><span
                class="pcoded-micon"><i class="feather icon-copy"></i></span><span class="pcoded-mtext">Category</span></a>
    </li>
    <li class="nav-item pcoded-menu-caption">
        <label>Pages</label>
    </li>
    <li class="nav-item pcoded-hasmenu">
        <a class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span
                class="pcoded-mtext">Authentication</span></a>
        <ul class="pcoded-submenu">
            <li><a href="/sign-up" target="_blank">Sign up</a></li>
            <li><a href="/sign-in" target="_blank">Sign in</a></li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="/dashboard/users"
            class="nav-link {{ Request::is('/dashboard/users') ? 'active' : '' }}"><span
                class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">User</span></a>
    </li>
    <li class="nav-item">
        <a href="/dashboard/contact-us"
            class="nav-link {{ Request::is('/dashboard/koleksi-digital') ? 'active' : '' }}"><span
                class="pcoded-micon"><i class="feather icon-message-square"></i></span><span class="pcoded-mtext">Contact Us</span></a>
    </li>
    {{-- <li class="nav-item">
        <a href="/dashboard/anggota"
            class="nav-link {{ Request::is('/dashboard/anggota') ? 'active' : '' }}"><span
                class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Angota</span></a>
    </li> --}}
</ul>
