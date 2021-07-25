@extends('layouts.master')
@extends('layouts.header')
@extends('layouts.sider')
@section('content')
     <!-- Content Header (Page header) -->
     <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="fas fa-folder-open">Kelola Kegiatan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Kegiatan</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        @include('layouts.alerts')
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Pengajuan Kegiatan</h3>
          </div>

          <div class="card-body">
          @if (Auth::user()->role == 'Warga')
            <td>
                <a href="{{ route('kegiatan.create') }}"  type="button" class="btn btn-primary">Tambah Kegiatan <i class="fas fa-plus"></i></button></a>
            </td>
            @endif
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Judul</th>
                  <th>Tanggal Pelaksanaan</th>
                  <!-- <th>Deskripsi</th> -->
                  <th>Status</th>
                  @if (Auth::user()->role == 'Kecamatan')
                  <th><center>Konfirmasi</center></th>
                  @endif
                </tr>
                </thead>
                <tbody>
                @php
                $no= 1;
                @endphp
                @foreach ($data as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>{{ $row->judul }}</td>
                    <td>{{ $row->tanggal }}</td>
                    <!-- <td>{{ $row->deskripsi }}</td> -->
                    <td>{{ $row->status }}</td>
                    @if (Auth::user()->role == 'Kecamatan')
                    <td>
                    <center>
                        {{-- <a  href="{{ route('kapprove',$row->id) }}"  type="button" class="btn btn-primary btn-sm">Detail Kegiatan</button></a> --}}
                        @if($row->status == 'Tinjau')
                        <a href="{{ route('kegiatan.show',$row->id) }}"  type="button" class="btn btn-primary">Konfirmasi</button></a>
                        @else
                       <button class="btn btn-primary" disabled>Konfirmasi</button></a>
                        @endif
                        {{-- <form action="{{route('kegiatan.destroy',$row->id)}}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Hapus</button>
                        </form> --}}
                        <center>
                        </td>
                        @endif
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
