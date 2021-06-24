@extends('layouts.master')
@extends('layouts.header')
@extends('layouts.sider')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengajuan Perubahan KTP</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pelayanan</a></li>
                    <li class="breadcrumb-item"><a href="#">Pengajuan KTP</a></li>
                    <li class="breadcrumb-item active">Perubahan Data KTP</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pengajuan Permohonan Perubahan Data KTP</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="container-fluid">
                        <div br>
                            <h3 class="text-center">NIK</h3>
                        </div>

                        <div class="row">
                            <div class="col-md-4 offset-md-4">
                                <form action="{{ route('ajukanubah') }} " method="GET">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control form-control-lg"
                                            placeholder="Masukan nomor induk kependudukan">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-lg btn-default">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>No Kartu Keluarga</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                <tr>
                                    <td>{{ $row->nik }}</td>
                                    <td>{{ $row->no_kk }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td class="text-center"><a class="btn btn-info btn-sm" href="{{ route('formperubahanKTP',$row->id) }}">Ajukan Permohonan</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

@endsection
@extends('layouts.footer')
