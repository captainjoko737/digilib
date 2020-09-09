<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li><a href="{{ route('dashboard') }}" ><i class="mdi mdi-book-open"></i><span class="hide-menu"> Katalog Buku</span></a></li>
                @if(Session::get('users') || Session::get('adminUsers'))
                    @if(Session::get('users'))
                        <li><a href="{{ route('peminjaman_buku') }}" ><i class="mdi mdi-account"></i><span class="hide-menu">Peminjaman Buku </span></a></li>
                    @endif

                    @if(Session::get('adminUsers'))
                        <li><a href="{{ route('peminjaman_buku') }}" ><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu">List Peminjam Buku </span></a></li>
                        <li><a href="{{ route('peminjaman_buku') }}" ><i class="mdi mdi-account-multiple"></i><span class="hide-menu">List Pengguna </span></a></li>
                        <li><a href="{{ route('peminjaman_buku') }}" ><i class="mdi mdi-account-multiple"></i><span class="hide-menu">List Anggota </span></a></li>
                    @endif
                @else
                    <li><a href="{{ route('login_pengguna') }}" ><i class="mdi mdi-account"></i><span class="hide-menu">Login </span></a></li>
                    <li><a href="{{ route('login_pengguna') }}" ><i class="mdi mdi-key"></i><span class="hide-menu">Registrasi </span></a></li>
                @endif

                @if(Session::get('users') || Session::get('adminUsers'))
                    <li><a href="{{ route('logout') }}" ><i class="mdi mdi-key"></i><span class="hide-menu">Logout </span></a></li>
                @else

                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation --> 
    </div>
    <!-- End Sidebar scroll-->
</aside>