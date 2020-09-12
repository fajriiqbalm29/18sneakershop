<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{route('dashboard')}}"><i class
                        ="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Barang</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{route('category.index')}}"> <i class="menu-icon fa fa-cube"></i>Kategori Produk</a>
                </li>
                <li class="">
                    <a href="{{route('product.index')}}"> <i class="menu-icon fa fa-cubes"></i>Lihat Produk</a>
                </li>
                <li class="menu-title">Transaksi</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{route('transaksi.index')}}"> <i class="menu-icon fa fa-money"></i>Lihat Transaksi</a>
                    <a href="{{route('lihatlaporan')}}"> <i class="menu-icon fa fa-file"></i>Report Transaksi</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>