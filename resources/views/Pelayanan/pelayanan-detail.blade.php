@extends('layouts.master')
@extends('layouts.header')
@extends('layouts.sider')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="fas fa-folder-open"> Konfirmasi Pengajuan Pelayanan {{ $data->jenis_permohonan }}</h1>
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
            <h3 class="card-title">Detail Pengajuan Pelayanan </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    @if ($data->jenis_permohonan=="Pembuatan KK")

                    <tr><td style="text-align:center" colspan="2"><b>Data Suami</b> </td></tr>
                    @foreach ($suami as $item)
                    <tr>
                        <th>Nama Suami</th>
                        <td>{{ $item->warga->nama}}</td>
                    </tr>
                    <tr>
                        <th>Nama Ayah</th>
                        <td>{{ $item->ayah}}</td>
                    </tr>
                    <tr>
                        <th>Nama Ibu</th>
                        <td>{{ $item->ibu}}</td>
                    </tr>
                    @endforeach
                    <tr><td style="text-align:center" colspan="2"><b>Data Istri</b></td></tr>
                    @foreach ($istri as $item)
                    <tr>
                        <th>Nama Istri</th>
                        <td>{{ $item->warga->nama }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ayah</th>
                        <td>{{ $item->ayah}}</td>
                    </tr>
                    <tr>
                        <th>Nama Ibu</th>
                        <td>{{ $item->ibu}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <th>Alamat Lengkap</th>
                        <td>{{ $data->warga->alamat }} RT {{ $data->warga->rt }} RW {{ $data->warga->rw }} Kelurahan {{ $data->warga->Kelurahan->nama_kelurahan }}</td>
                    </tr>
                    <tr><td style="text-align:center" colspan="2"><b>Dokumen</b></td></tr>
                    <tr>
                        <th>Surat Pengantar</th>
                        <td><a href="{{ asset('Dokumen/pengantar/'.$data->surat_pengantar) }}" alt="user-image" class="avatar avatar-sm" target="_blank">
                            {{ $data->surat_pengantar }}</a></td>
                    </tr>
                    <tr>
                        <th>Akta Nikah</th>
                        <td><a href="{{ asset('Dokumen/akta nikah/'.$data->akta_nikah) }}" alt="user-image" class="avatar avatar-sm" target="_blank">
                            {{ $data->akta_nikah }}</a></td>
                    </tr>
                    @else
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
                        <th>Alamat Lengkap</th>
                        <td>{{ $data->warga->alamat }} RT {{ $data->warga->rt }} RW {{ $data->warga->rw }} Kelurahan {{ $data->warga->Kelurahan->nama_kelurahan }}</td>
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
                    <tr>
                        <th>Surat Pengantar</th>
                        <td><a href="{{ asset('Dokumen/pengantar/'.$data->surat_pengantar) }}" alt="user-image" class="avatar avatar-sm" target="_blank">
                            {{ $data->surat_pengantar }}</a></td>
                    </tr>
                    <tr>
                        <th>Scan Kartu Keluarga</th>
                        <td>
                        <a href="{{ asset('Dokumen/kk/'.$data->kk) }}" alt="user-image" class="avatar avatar-sm" target="_blank">
                                {{ $data->kk }}</a>
                        </td>
                    </tr>
                    @if ($data->jenis_permohonan=="Perubahan Data KTP" || $data->jenis_permohonan=="KTP Pendatang")
                    <tr>
                        <th>Scan KTP Lama</th>
                        <td>
                        <a href="{{ asset('Dokumen/ktp/'.$data->ktp) }}" alt="user-image" class="avatar avatar-sm" target="_blank">
                                {{ $data->ktp }}</a>
                        </td>
                    </tr>
                    @endif
                    @if ($data->jenis_permohonan=="Kehilangan KTP")
                    <tr>
                        <th>Surat Kehilangan</th>
                        <td>
                        <a href="{{ asset('Dokumen/kehilangan/'.$data->surat_kehilangan) }}" alt="user-image" class="avatar avatar-sm" target="_blank">
                                {{ $data->surat_kehilangan }}</a>
                        </td>
                    </tr>
                    @endif
                    @endif

                </table>
        </div>
        <div class="card-footer">
            <a href="{{ route('pelayanan-konfirmasi',$data->id) }}"  type="button" class="btn btn-primary">Konfirmasi Pelayanan</a>
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
@endsection
@extends('layouts.footer')
