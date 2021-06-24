@extends('layouts.master')
@extends('layouts.header')
@extends('layouts.sider')
@section('content')
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="fas fa-folder-open"> Kelola User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data User</h3>
        </div>
        @include('layouts.alerts')
        <div class="card-body">
            <td>
                <a href="{{ route('user.create') }}"  type="button" class="btn btn-primary">Tambah User  <i class="fas fa-plus"></i></button></a>
            </td>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php
                $no= 1;
                @endphp
                @foreach ($data as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->role }}</td>
                    <td>{{ $row->status }}</td>
                    <td> @if ($row->foto_user !=null)
                        <img src="{{ asset('img/images/'.$row->foto_user) }}" alt="user image" class="" width="30">
                            @else
                            <img src="{{ asset('img/images/default.png') }}" alt="user image" class="" width="30">
                        @endif</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('user.edit',$row->id) }}"> <i class="fas fa-pencil-alt">
                        </i>Edit</a>
                        <form action="{{route('user.destroy',$row->id)}}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Hapus</button></form>
                    </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
@endsection
@extends('layouts.footer')
