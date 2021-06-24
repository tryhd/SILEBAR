@section('sider')
<!-- Brand Logo -->
<a href="{{ route('home') }}" class="brand-link">
    <img src="{{ asset('/dist/img/logo.png') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">SILEBAR</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @if (Auth::user()->foto_user !=null)
            <img src="{{ asset('img/images/'.auth()->user()->foto_user)}}" class="img-circle elevation-2" alt="User Image">
            @else
            <img src="/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            @endif
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::User()->name }}</a>
        </div>
    </div>
    @php
    $user = Auth::user();
    @endphp
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
            <li class="nav-item ">
                <a href="{{ route('home') }}" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            @if(Auth()->user()->role=='Admin')
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                        Data Master
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    {{-- <li class="nav-item">
                        <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Desa</p>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{route('user.index')  }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User</p>
                        </a>
                    </li>
                </ul>
            </li>
            @elseif (Auth::user()->role=='Warga')
            <li class="nav-header">PELAYANAN</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-id-card"></i>
                    <p>
                        Pengajuan KTP
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('ktppemula') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pembuatan KTP Pemula</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ Route('ajukanubah') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Perubahan Data KTP</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('carihilang') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kehilangan KTP</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ Route('formpendatang') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>KTP Pendatang</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-id-card"></i>
                    <p>
                        Pengajuan KK
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('kk-form') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pembuatan KK</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-header">KEGIATAN</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Kegiatan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{Route('kegiatan.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pengajuan Kegiatan</p>
                        </a>
                    </li>
                </ul>
            </li>
            @elseif(Auth()->user()->role=='Kecamatan')
            <li class="nav-header">PELAYANAN</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-id-card"></i>
                    <p>
                        Konfirmasi Pelayanan
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('pelayanan.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Konfirmasi Pelayanan</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-header">KEGIATAN</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Kegiatan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{Route('kegiatan.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Konfirmasi Kegiatan</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-header">LAPORAN</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Laporan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{Route('laporanpelayanan')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Laporan Pelayanan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('laporan.index')  }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Laporan Kegiatan</p>
                        </a>
                    </li>
                </ul>
            </li>
            @elseif (Auth::user()->role="Camat")
            <li class="nav-header">LAPORAN</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Laporan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{Route('laporanpelayanan')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Laporan Pelayanan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('laporan.index')  }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Laporan Kegiatan</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
@endsection
