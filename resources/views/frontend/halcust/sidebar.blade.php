  <!-- Sidebar -->
  <aside class="sidebar trans-0-4">
    <!-- Button Hide sidebar -->
    <button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

    <!-- - -->
    <ul class="menu-sidebar p-t-100 p-b-20"></ul>
        <li class="t-center m-b-13">
            <h4 class="txt13 m-b-20" style="color: black">
                @if (Auth::user())
                    <header class="d-block p-b-1">Selamat Datang</header>
                    <small>{{ Auth::user()->nama }}</small>
                @endif
            </h4>
        </li>
        <li class="t-center m-b-13 pt-4">
            <h4 class="txt13 m-b-20" style="color: black">
                Menu
            </h4>
        </li>
        <li class="t-center m-b-13">
            <a href="/show-profil" class="txt19">Profil</a>
        </li>
        <li class="t-center m-b-13">
            <a href="/" class="txt19">Home</a>
        </li>

        <li class="t-center m-b-13">
            <a href="/product" class="txt19">Product</a>
        </li>

        <li class="t-center m-b-13">
            <a href="/store" class="txt19">Store</a>
        </li>

        <li class="t-center m-b-13">
            <a href="/artikel" class="txt19">Artikel</a>
        </li>

        <li class="t-center m-b-13">
            <a href="/about" class="txt19">About</a>
        </li>

        <li class="t-center m-b-33">
            <a href="/contact" class="txt19">Contact</a>
        </li>
        <li class="t-center m-b-33">
            <a href="">
                @if (Auth::user())
                    <form method='POST' action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-dark">
                            <link :href="route('logout')" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                @endif

            </a>
        </li>
    </ul>

</aside>
