@section('sider')
<!-- Brand Logo -->
<a href="{{ route('home') }}" class="brand-link">
    <img src="/dist/img/logo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">SILEBAR</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @if (Auth::user()->foto_user !=null)
            <img src="{{ asset('images/'.auth()->user()->foto)}}" class="img-circle elevation-2" alt="User Image">
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
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                        Data Master
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Desa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user.index')  }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User</p>
                        </a>
                    </li>
                </ul>
            </li>
            @if (Auth::user()->role=='Warga')
            <li class="nav-header">PENGAJUAN</li>
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
                        <a href="{{ route('formpemula') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pembuatan KTP Pemula</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/charts/flot.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Perubahan Data KTP</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="pages/charts/flot.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kehilangan KTP</p>
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
                        <a href="pages/charts/chartjs.html" class="nav-link">
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
                      <li class="nav-item">
                        <a href="{{route('postingkegiatan')  }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Kegiatan</p>
                        </a>
                    </li>
                </ul>
            </li>
            @else
            <li class="nav-header">PELAYANAN</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-id-card"></i>
                    <p>
                        Pelayanan KTP
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/charts/chartjs.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pembuatan KTP</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/charts/flot.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Perubahan Data KTP</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/charts/flot.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kehilangan KTP</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-id-card"></i>
                    <p>
                        Pelayanan KK
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/charts/chartjs.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pembuatan KK</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Kegiatan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                </ul>
            </li>
            @endif
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
@endsection
