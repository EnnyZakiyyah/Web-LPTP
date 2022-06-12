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
            <li><a href="/dashboard/sirkulasi/peminjaman-buku" target="_blank">Peminjaman Buku</a></li>
            <li><a href="/dashboard/sirkulasi/pengembalian-buku" target="_blank">Pengembalian Buku</a></li>
            <li><a href="/dashboard/sirkulasi/katalog" target="_blank">Penelusuran Katalog</a></li>
            <li><a href="/dashboard/sirkulasi/bebas-pustaka" target="_blank">Bebas Pustaka</a></li>
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
        <a href="/dashboard/koleksi-digital"
            class="nav-link {{ Request::is('/dashboard/koleksi-digital') ? 'active' : '' }}"><span
                class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Koleksi
                Digital</span></a>
    </li>
    <li class="nav-item pcoded-menu-caption">
        <label>Pages</label>
    </li>
    <li class="nav-item pcoded-hasmenu">
        <a class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span
                class="pcoded-mtext">Authentication</span></a>
        <ul class="pcoded-submenu">
            <li><a href="/sign-in" target="_blank">Sign up</a></li>
            <li><a href="/sign-up" target="_blank">Sign in</a></li>
        </ul>
    </li>
</ul>
