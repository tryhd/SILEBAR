@extends('layouts.master')
@extends('layouts.header')
@extends('layouts.sider')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="fas fa-folder-open"> Laporan Pelayanan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                    <li class="breadcrumb-item active">Laporan Pelayanan</li>
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
            <h3 class="card-title">Data Pelayanan</h3>
        </div>

        <div class="card-body">
            @if (Auth::user()->role=="Kecamatan")
            <form action="{{ route('Pelayananpdf') }}" method="GET" autocomplete="on" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="">Jenis Pelayanan</label>
                        <select name="jenis" id="" class="form-control custom-select">
                            <option selected disabled>-- Pilih --</option>
                            <option name="jenis" value="KTP" {{ 'jenis' == 'KTP' ? 'selected' : '' }}>Pelayanan KTP
                            </option>
                            <option name="jenis" value="KK" {{ 'jenis' == 'KK' ? 'selected' : '' }}>Pelayanan KK
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control custom-select">
                            <option selected disabled>-- Pilih --</option>
                            <option name="status" value="Selesai" {{ 'status' == 'Selesai' ? 'selected' : '' }}>Sudah Selesai
                            </option>
                            <option name="status" value="Diproses" {{ 'status' == 'Diproses' ? 'selected' : '' }}>Sedang Diproses
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="mulai" value="{{ old('mulai') }}"
                            placeholder="Masukan tanggal mulai">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="akhir" value="{{ old('akhir') }}"
                            placeholder="Masukan tanggal akhir">
                    </div>
                    <div class="form-group col-md-3 ">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i>Print</button>
                        {{-- <a href="{{ route('Pelayananpdf') }}" type="button" class="btn btn-primary"> Cetak <i
                            class="fas fa-print"></i></button></a> --}}
                    </div>
                </div>
            </form>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nik</th>
                        <th>Nama</th>
                        <!-- <th>Deskripsi</th> -->
                        <th>Diajukan Oleh</th>
                        <th>Jenis Permohonan</th>
                        <th>Tanggal Permohonan</th>
                        <th>Status</th>
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
                        <!-- <td>{{ $row->deskripsi }}</td> -->
                        <td>{{ $row->user->name }}</td>
                        <td>{{ $row->jenis_permohonan }}</td>
                        <td>{{$row->created_at}}</td>
                        <td>{{ $row->status }}</td>
                    </tr>
                    @endforeach
                    </tfoot>
            </table>
            @else
            <form action="{{ route('laporanpelayanan') }}" method="GET" autocomplete="on" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="">Jenis Pelayanan</label>
                        <select name="jenis" id="" class="form-control custom-select">
                            <option selected disabled>-- Pilih --</option>
                            <option name="jenis" value="KTP" {{ 'jenis' == 'KTP' ? 'selected' : '' }}>Pelayanan KTP
                            </option>
                            <option name="jenis" value="KK" {{ 'jenis' == 'KK' ? 'selected' : '' }}>Pelayanan KK
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control custom-select">
                            <option selected disabled>-- Pilih --</option>
                            <option name="status" value="Selesai" {{ 'status' == 'Selesai' ? 'selected' : '' }}>Sudah Selesai
                            </option>
                            <option name="status" value="Diproses" {{ 'status' == 'Diproses' ? 'selected' : '' }}>Sedang Diproses
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" name="mulai" value="{{ old('mulai') }}"
                            placeholder="Masukan tanggal mulai">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="akhir" value="{{ old('akhir') }}"
                            placeholder="Masukan tanggal akhir">
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary right col-mb-12"><i class="fas fa-search"></i>Cari Data</button>
                        {{-- <a href="{{ route('Pelayananpdf') }}" type="button" class="btn btn-primary"> Cetak <i
                            class="fas fa-print"></i></button></a> --}}
                    </div>
                </div>
            </form>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nik</th>
                        <th>Nama</th>
                        <!-- <th>Deskripsi</th> -->
                        <th>Diajukan Oleh</th>
                        <th>Jenis Permohonan</th>
                        <th>Tanggal Permohonan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no= 1;
                    @endphp
                    @foreach ($search as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->warga->nik }}</td>
                        <td>{{ $row->warga->nama }}</td>
                        <!-- <td>{{ $row->deskripsi }}</td> -->
                        <td>{{ $row->user->name }}</td>
                        <td>{{ $row->jenis_permohonan }}</td>
                        <td>{{$row->created_at}}</td>
                        <td>{{ $row->status }}</td>
                    </tr>
                    @endforeach
                    </tfoot>
            </table>
            @endif

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
