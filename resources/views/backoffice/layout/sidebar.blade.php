<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4" style="background-color: white; color: black;">
    <!-- Brand Logo -->
    <a class="brand-link d-flex align-items-center" style="background-color: #212529; color: white; padding: 10px;">
        <i class="fa-solid fa-dumpster" style="margin-right: 10px;"></i>
        <span class="brand-text font-weight-bold">KATERING</span>
        <div class="spinner-grow text-primary ml-auto" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- Tambahkan gambar profil di sini -->
                <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">
                <a class="d-block fa-solid fa-user">
                    @if (auth()->user())
                    {{ auth()->user()->name }}
                    @endif
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                <li class="nav-item">
                    <a href="/backoffice" class="nav-link {{ request()->is('backoffice') ? 'active' : '' }}"
                        style="color: black;">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/backoffice/menu"
                        class="nav-link {{ request()->is('backoffice/menu', 'backoffice/menu/*') ? 'active' : '' }}"
                        style="color: black;">
                        <i class="nav-icon fas fa-utensils"></i> <!-- Mengganti ikon untuk 'Menu' -->
                        <p>Menu</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/backoffice/detailorder/"
                        class="nav-link {{ request()->is('/backoffice/detailorder', '/backoffice/detailorder/') ? 'active' : '' }}"
                        style="color: black;">
                        <i class="nav-icon fas fa-receipt"></i> <!-- Ikon untuk 'Detail Order' -->
                        <p>Detail Order</p>
                    </a>
                </li>
                @endif
                @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 3)
                <li class="nav-item">
                    <a href="/frontoffice" class="nav-link {{ request()->is('/frontoffice') ? 'active' : '' }}"
                        style="color: black;">
                        <i class="nav-icon fas fa-cash-register"></i> <!-- Ikon untuk 'Penjualan' -->
                        <p>Penjualan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/keranjang" class="nav-link {{ request()->is('/keranjang') ? 'active' : '' }}"
                        style="color: black;">
                        <i class="nav-icon fas fa-shopping-cart"></i> <!-- Ikon untuk 'Keranjang' -->
                        <p>Keranjang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/keranjang/riwayat"
                        class="nav-link {{ request()->is('/keranjang/riwayat') ? 'active' : '' }}"
                        style="color: black;">
                        <i class="nav-icon fas fa-history"></i> <!-- Ikon untuk 'Riwayat' -->
                        <p>Riwayat</p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
