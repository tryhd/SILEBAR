@extends('layouts.master')
@extends('layouts.header')
@extends('layouts.sider')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengajuan Pembuatan KTP Pemula</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pengajuan KTP</a></li>
                    <li class="breadcrumb-item active">Pembuatan KTP Pemula</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <form action="" method="POST">
                @csrf
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Pengajuan</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>NIK</label>
                                <input type="text" id="inputName" class="form-control"
                                    placeholder="Nomor Induk Kependudukan">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">No Kartu Keluarga</label>
                                <input type="text" id="inputName" class="form-control"
                                    placeholder="Nomor Kartu Keluarga">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Nama Lengkap</label>
                                <input type="text" id="inputName" class="form-control"
                                    placeholder="Nama lengkap sesuai akta kelahiran">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputName">Tempat Lahir</label>
                                <input type="text" id="inputName" class="form-control"
                                    placeholder="Tempat Lahir">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputName">Tanggal Lahir</label>
                                <input type="date" id="inputName" class="form-control"
                                    placeholder="Nama lengkap sesuai akta kelahiran">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputName">Jenis Kelamin</label>
                                <select id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>- Pilih -</option>
                                    <option>LAKI-LAKI</option>
                                    <option>PEREMPUAN</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Alamat Lengkap</label>
                                <textarea type="text" id="inputName" class="form-control"
                                    placeholder="Alamat" rows="2"></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputName">RT</label>
                                <input type="text" id="inputName" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputName">RW</label>
                                <input type="text" id="inputName" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputName">Kelurahan</label>
                                <select id="inputStatus" class="form-control custom-select">
                                <option selected disabled>- Pilih -</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Agama</label>
                                <input type="text" id="inputName" class="form-control"
                                    placeholder="Nama lengkap sesuai akta kelahiran">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Pendidikan</label>
                                <input type="text" id="inputName" class="form-control"
                                    placeholder="Nama lengkap sesuai akta kelahiran">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Pekerjaan</label>
                                <input type="text" id="inputName" class="form-control"
                                    placeholder="Nama lengkap sesuai akta kelahiran">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Status Perkawinan</label>
                                <input type="text" id="inputName" class="form-control"
                                    placeholder="Nama lengkap sesuai akta kelahiran">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Golongan Darah</label>
                                <input type="text" id="inputName" class="form-control"
                                    placeholder="Nama lengkap sesuai akta kelahiran">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Kewarganegaraan</label>
                                <input type="text" id="inputName" class="form-control"
                                    placeholder="Nama lengkap sesuai akta kelahiran">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-6">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Upload Persyaratan</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputEstimatedBudget">Estimated budget</label>
                        <input type="number" id="inputEstimatedBudget" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputSpentBudget">Total amount spent</label>
                        <input type="number" id="inputSpentBudget" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputEstimatedDuration">Estimated project duration</label>
                        <input type="number" id="inputEstimatedDuration" class="form-control">
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Simpan Pengajuan</button>
        </div>
    </div>
    </form>
</section>
@endsection
@extends('layouts.footer')
