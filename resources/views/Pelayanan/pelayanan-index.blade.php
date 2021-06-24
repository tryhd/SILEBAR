@extends('layouts.master')
@extends('layouts.header')
@extends('layouts.sider')
@section('content')
     <!-- Content Header (Page header) -->
     <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="fas fa-folder-open"> Kelola Pelayanan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Pelayanan KTP</li>
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
            <h3 class="card-title">Data Pengajuan Pelayanan </h3>
          </div>
          @include('layouts.alerts')
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nik</th>
                  <th>Nama</th>
                  <th>Jenis Permohonan</th>
                  <th>Status Pengajuan</th>
                  <th><center>Konfirmasi</center></th>
                </tr>
                </thead>
                <tbody>
                @php
                $no= 1;
                @endphp
                @foreach ($data as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->warga->nik }}</td>
                    <td>{{ $row->warga->nama }}</td>
                    <td>{{ $row->jenis_permohonan }}</td>
                    <td>{{ $row->status }}</td>
                    <td>
                    <center>
                    @if (Auth::user()->role == 'Kecamatan')
                        {{-- <a href="{{ route('pelayanan.show',$row->id) }}"  type="button" class="btn btn-primary">Detail Pengajuan</button></a> --}}
                        @if($row->status == null OR $row->status == 'Diproses')
                        <a href="{{ route('pelayanan-konfirmasi',$row->id) }}"  type="button" class="btn btn-primary">Konfirmasi</a>
                        @else
                       <button class="btn btn-primary" disabled>Konfirmasi</button></a>
                        @endif
                    @endif
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
