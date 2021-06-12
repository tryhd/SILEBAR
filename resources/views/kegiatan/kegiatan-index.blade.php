@extends('layouts.master')
@extends('layouts.header')
@extends('layouts.sider')
@section('content')
     <!-- Content Header (Page header) -->
     <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Kegiatan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Blank Page</li>
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
            <h3 class="card-title">Title</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
          @if (Auth::user()->role == 'Warga')
            <td>
                <a href="{{ route('kegiatan.create') }}"  type="button" class="btn btn-primary">Tambah Kegiatan<i class="fas fa-plus"></i></button></a>
            </td>
            @endif
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Judul</th>
                  <!-- <th>Deskripsi</th> -->
                  <th>Status</th>
                  <th>User</th>
                  <th><center>Detail</center></th>
                </tr>
                </thead>
                <tbody>
                @php
                $no= 1;
                @endphp
                @foreach ($data as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->tanggal }}</td>
                    <td>{{ $row->judul }}</td>
                    <!-- <td>{{ $row->deskripsi }}</td> -->
                    <td>{{ $row->status }}</td>
                    <td>{{ $row->user_id }}</td>
                    <td>
                    <center>
                    @if (Auth::user()->role == 'Warga')
                        <a href="{{ route('kegiatan.edit',$row->id) }}"> <button type="button" class="btn btn-warning"><i class="far fa-edit"></i></button></a>
                    @endif
                    @if (Auth::user()->role == 'Kecamatan')
                        <a href="{{ route('kapprove',$row->id) }}"  type="button" class="btn btn-primary">Detail Kegiatan</button></a>
                        @if($row->status == 'Tinjau')
                        <a href="{{ route('kapprove',$row->id) }}"  type="button" class="btn btn-primary">Setujui Kegiatan</button></a>
                        @endif
                    @endif
                        <a><form action="{{route('kegiatan.destroy',$row->id)}}" method="post" class="d-inline">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></form>
                        </a>
                    <center>
                    </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Footer
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
      </section>
      <!-- /.content -->
@endsection
@extends('layouts.footer')
