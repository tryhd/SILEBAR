@extends('layouts.master')
@extends('layouts.header')
@extends('layouts.sider')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengajuan Pembuatan KK</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pelayanan</a></li>
                    <li class="breadcrumb-item"><a href="#">Pengajuan KK</a></li>
                    <li class="breadcrumb-item active">Pembuatan KK</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('post-kk') }}" method="POST" autocomplete="off"
                enctype="multipart/form-data">
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
                    <br>
                    @include('layouts.alerts')
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>NIK Suami</label>
                                <input type="text" id="inputName" class="form-control"
                                    placeholder="Nomor Induk Kependudukan Suami" name="suami" value="{{ old('suami') }}">
                                @if ($errors->has('suami'))
                                <span class="text-danger">{{ $errors->first('suami') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputName">NIK Istri</label>
                                <input type="text" id="inputName" class="form-control"
                                    placeholder="Nomor Induk Kependudukan Istri" name="istri" value="{{ old('istri') }}">
                                @if ($errors->has('suami'))
                                <span class="text-danger">{{ $errors->first('istri') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Alamat Lengkap</label>
                                <textarea type="text" id="inputName" class="form-control" placeholder="Alamat" rows="2"
                                    name="alamat">{{ old('alamat') }}</textarea>
                                @if ($errors->has('alamat'))
                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputName">RT</label>
                                <input type="number" id="inputName" class="form-control" name="rt"
                                   value="{{ old('rt') }}" >
                                @if ($errors->has('rt'))
                                <span class="text-danger">{{ $errors->first('rt') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputName">RW</label>
                                <input type="number" id="inputName" class="form-control" name="rw"
                                    value="{{ old('rw') }}">
                                @if ($errors->has('rw'))
                                <span class="text-danger">{{ $errors->first('rw') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputName">Kelurahan</label>
                                <select id="inputStatus" name="kelurahan" class="form-control custom-select">
                                    <option name="kelurahan" selected disabled>- Pilih -</option>
                                    @foreach ($kelurahans as $row)
                                    <option name="kelurahan" value="{{ $row->id }}" {{'kelurahan' == $row->id ? 'selected' : '' }}>{{ $row->nama_kelurahan }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('kelurahan'))
                                <span class="text-danger">{{ $errors->first('kelurahan') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <h5 class="col-md-12">Data Orang Tua Suami</h5>
                            <div class="form-group col-md-6">
                                <label for="inputName">Nama Ayah Suami</label>
                                <input type="text" id="inputName" class="form-control"
                                placeholder="Nama ayah suami" name="ayah_suami" value="{{ old('ayah_suami') }}">
                                @if ($errors->has('ayah_suami'))
                                <span class="text-danger">{{ $errors->first('ayah_suami') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputName">Nama Ibu Suami</label>
                                <input type="text" id="inputName" class="form-control"
                                placeholder="Nama ibu suami" name="ibu_suami" value="{{ old('ibu_suami') }}">
                                @if ($errors->has('ibu_suami'))
                                <span class="text-danger">{{ $errors->first('ibu_suami') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <h5 class="col-md-12">Data Orang Tua Istri</h5>
                            <div class="form-group col-md-6">
                                <label for="inputName">Nama Ayah Istri</label>
                                <input type="text" id="inputName" class="form-control"
                                placeholder="Nama ayah istri" name="ayah_istri" value="{{ old('ayah_istri') }}">
                                @if ($errors->has('ayah_istri'))
                                <span class="text-danger">{{ $errors->first('ayah_istri') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputName">Nama Ibu Istri</label>
                                <input type="text" id="inputName" class="form-control"
                                placeholder="Nama ibu istri" name="ibu_istri" value="{{ old('ibu_istri') }}">
                                @if ($errors->has('ibu_istri'))
                                <span class="text-danger">{{ $errors->first('ibu_istri') }}</span>
                                @endif
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
                        <label for="inputEstimatedBudget">Surat Pengantar</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                    name="surat_pengantar" value="{{ old('surat_pengantar') }}">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        @if ($errors->has('surat_pengantar'))
                        <span class="text-danger">{{ $errors->first('surat_pengantar') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputSpentBudget">Akta Nikah</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="akta_nikah"
                                    value="{{ old('akta_nikah') }}">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        @if ($errors->has('akta_nikah'))
                        <span class="text-danger">{{ $errors->first('akta_nikah') }}</span>
                        @endif
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
