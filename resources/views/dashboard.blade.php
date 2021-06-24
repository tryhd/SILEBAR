@extends('layouts.master')
@extends('layouts.header')
@extends('layouts.sider')
@section('content')
     <!-- Content Header (Page header) -->
     <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
          @if (Auth()->user()->role=='Warga')
          @include('dashboard.warga-dashboard')
          @elseif(Auth()->user()->role=='Kecamatan')
          @include('dashboard.kecamatan-dashboard')
          @else
          @include('dashboard.admin-dashboard')
          @endif
      </section>
      <!-- /.content -->
@endsection
@extends('layouts.footer')
