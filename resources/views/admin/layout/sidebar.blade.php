        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('') }}images/icons/logo2.png" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Admin Morfeen</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">Selamat Datang {{ Auth::user()->nama }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        @if (Session::get('page') == 'dashboard')
                            <?php $active = 'active'; ?>
                        @else
                            <?php $active = ''; ?>
                        @endif
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link {{ $active }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        @if (Session::get('page') == 'penjualan')
                            <?php $active = 'active'; ?>
                        @else
                            <?php $active = ''; ?>
                        @endif
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link {{ $active }}">
                                <i class="nav-icon fas fa-book-open"></i>
                                <p>
                                    Setting Penjualan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ">
                                @if (Session::get('page') == 'penjualan')
                                    <?php $active = 'active'; ?>
                                @else
                                    <?php $active = ''; ?>
                                @endif
                                <li class="nav-item">
                                    <a href="/penjualan" class="nav-link {{ $active }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Penjualan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        @if (Session::get('page') == 'user' || Session::get('page') == 'admin')
                            <?php $active = 'active'; ?>
                        @else
                            <?php $active = ''; ?>
                        @endif
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link {{ $active }}">
                                <i class="nav-icon fas fa-tag"></i>
                                <p>
                                    Setting User
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if (Session::get('page') == 'user')
                                    <?php $active = 'active'; ?>
                                @else
                                    <?php $active = ''; ?>
                                @endif
                                <li class="nav-item">
                                    <a href="{{ url('/user') }}" class="nav-link {{ $active }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Customer</p>
                                    </a>
                                </li>
                                @if (Session::get('page') == 'admin')
                                    <?php $active = 'active'; ?>
                                @else
                                    <?php $active = ''; ?>
                                @endif
                                <li class="nav-item">
                                    <a href="{{ url('/admin') }}" class="nav-link {{ $active }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Admin</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        @if (Session::get('page') == 'article' || Session::get('page') == 'catarticle')
                        <?php $active = 'active'; ?>
                    @else
                        <?php $active = ''; ?>
                    @endif
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link {{ $active }}">
                            <i class="nav-icon fas fa-book-open"></i>
                            <p>
                                Setting Artikel
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ">
                            @if (Session::get('page') == 'article')
                                <?php $active = 'active'; ?>
                            @else
                                <?php $active = ''; ?>
                            @endif
                            <li class="nav-item">
                                <a href="/article" class="nav-link {{ $active }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Artikel</p>
                                </a>
                            </li>
                            @if (Session::get('page') == 'catarticle')
                                <?php $active = 'active'; ?>
                            @else
                                <?php $active = ''; ?>
                            @endif
                            <li class="nav-item">
                                <a href="/catarticle" class="nav-link {{ $active }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kategori Artikel</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                        @if (Session::get('page') == 'barang' || Session::get('page') == 'kategori')
                            <?php $active = 'active'; ?>
                        @else
                            <?php $active = ''; ?>
                        @endif
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link {{ $active }}">
                                <i class="nav-icon fas fa-tag"></i>
                                <p>
                                    Setting Produk
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if (Session::get('page') == 'barang')
                                    <?php $active = 'active'; ?>
                                @else
                                    <?php $active = ''; ?>
                                @endif
                                <li class="nav-item">
                                    <a href="{{ url('/barang') }}" class="nav-link {{ $active }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Produk</p>
                                    </a>
                                </li>
                                @if (Session::get('page') == 'kategori')
                                    <?php $active = 'active'; ?>
                                @else
                                    <?php $active = ''; ?>
                                @endif
                                <li class="nav-item">
                                    <a href="{{ url('/kategori') }}" class="nav-link {{ $active }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kategori Produk</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        @if (Session::get('page') == 'faq' || Session::get('page') == 'refund' || Session::get('page') == 'banner' || Session::get('page') == 'ongkir')
                            <?php $active = 'active'; ?>
                        @else
                            <?php $active = ''; ?>
                        @endif

                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link {{ $active }}">
                                <i class="nav-icon fas fa-book-open"></i>
                                <p>
                                    Setting Tambahan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ">
                                @if (Session::get('page') == 'faq')
                                    <?php $active = 'active'; ?>
                                @else
                                    <?php $active = ''; ?>
                                @endif
                                <li class="nav-item">
                                    <a href="/faq" class="nav-link {{ $active }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Faq</p>
                                    </a>
                                </li>
                                @if (Session::get('page') == 'refund')
                                    <?php $active = 'active'; ?>
                                @else
                                    <?php $active = ''; ?>
                                @endif
                                <li class="nav-item">
                                    <a href="/refund" class="nav-link {{ $active }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Refund</p>
                                    </a>
                                </li>
                                @if (Session::get('page') == 'banner')
                                    <?php $active = 'active'; ?>
                                @else
                                    <?php $active = ''; ?>
                                @endif
                                <li class="nav-item">
                                    <a href="{{ url('/banner') }}" class="nav-link {{ $active }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Banner</p>
                                    </a>
                                </li>
                                @if (Session::get('page') == 'ongkir')
                                    <?php $active = 'active'; ?>
                                @else
                                    <?php $active = ''; ?>
                                @endif
                                <li class="nav-item">
                                    <a href="{{ url('/ongkir') }}" class="nav-link {{ $active }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ongkir</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
