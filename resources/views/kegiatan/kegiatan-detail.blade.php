@extends('layouts.master')
@extends('layouts.header')
@extends('layouts.sider')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="fas fa-folder-open"> Konfirmasi Pengajuan Kegiatan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Konfirmasi Kegiatan</li>
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
            <h3 class="card-title">Detail Pengajuan Kegiatan </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Judul Kegiatan</th>
                        <td>{{ $data->judul}}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td style=" text-align: justify">{{ $data->deskripsi }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pelaksanaan Kegiatan</th>
                        <td>{{ $data->tanggal }}</td>
                    </tr>
                    <tr>
                        <th>Foto Kegiatan</th>
                        <td><a href="{{ asset('img/images/'.$data->foto) }}" alt="user-image" class="avatar avatar-sm" target="_blank">
                            {{ $data->foto }}</a></td>
                    </tr>
                </table>
        </div>
        <div class="card-footer">
            <a href="{{ route('kegiatan-konfirmasi',$data->id) }}"  type="button" class="btn btn-primary">Konfirmasi Kegiatan</a>
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
@endsection
@extends('layouts.footer')
