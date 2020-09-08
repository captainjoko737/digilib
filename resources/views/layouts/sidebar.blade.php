<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li><a href="{{ route('dashboard') }}" ><i class="mdi mdi-book-open"></i><span class="hide-menu"> Katalog</span></a></li>
                @if(Session::get('users'))
                    <li><a href="{{ route('logout') }}" ><i class="mdi mdi-key"></i><span class="hide-menu">Logout </span></a></li>
                @else
                    <li><a href="{{ route('login_pengguna') }}" ><i class="mdi mdi-account"></i><span class="hide-menu">Login </span></a></li>
                    <li><a href="{{ route('login_pengguna') }}" ><i class="mdi mdi-key"></i><span class="hide-menu">Registrasi </span></a></li>
                @endif
                
            </ul>
        </nav>
        <!-- End Sidebar navigation --> 
    </div>
    <!-- End Sidebar scroll-->
</aside>