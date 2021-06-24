@extends('layouts.master')
@extends('layouts.header')
@extends('layouts.sider')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="fas fa-folder-open"> Pengajuan Pelayanan KTP </h1>
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
            <h3 class="card-title">Data Pengajuan Pelayanan KTP </h3>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nik</th>
                        <td>{{ $data->warga->nik }}</td>
                    </tr>
                    <tr>
                        <th>No Kartu Keluarga</th>
                        <td>{{ $data->warga->no_kk }}</td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $data->warga->nama }}</td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $data->warga->nama }}</td>
                    </tr>
                    <tr>
                        <th>Tempat Lahir</th>
                        <td>{{ $data->warga->tempat_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal_lahir</th>
                        <td>{{ $data->warga->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $data->warga->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $data->warga->alamat }}</td>
                    </tr>
                    <tr>
                        <th>RT</th>
                        <td>{{ $data->warga->rt }}</td>
                    </tr>
                    <tr>
                        <th>RW</th>
                        <td>{{ $data->warga->rw }}</td>
                    </tr>
                    <tr>
                        <th>Kelurahan</th>
                        <td>{{ $data->warga->kelurahan }}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>{{ $data->warga->agama }}</td>
                    </tr>
                    <tr>
                        <th>Pendidikan</th>
                        <td>{{ $data->warga->pendidikan }}</td>
                    </tr>
                    <tr>
                        <th>Status Perkawinan</th>
                        <td>{{ $data->warga->status_perkawinan }}</td>
                    </tr>
                    <tr>
                        <th>Golongan Darah</th>
                        <td>{{ $data->warga->gol_darah}}</td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td>{{ $data->warga->pekerjaan->nama_pekerjaan }}</td>
                    </tr>
                    <tr>
                        <th>Kewarganegaraan</th>
                        <td>{{ $data->warga->kewarganegaraan }}</td>
                    </tr>
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
