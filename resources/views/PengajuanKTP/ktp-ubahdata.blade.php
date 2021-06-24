@extends('layouts.master')
@extends('layouts.header')
@extends('layouts.sider')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengajuan Perubahan Data KTP</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pengajuan KTP</a></li>
                    <li class="breadcrumb-item active">Perubahan Data KTP</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
        <form action="{{ route('postperubahanKTP',$wargas->id) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
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
                                    placeholder="Nomor Induk Kependudukan" name="nik" readonly value="{{ $wargas->nik }}">
                                @if ($errors->has('nik'))
                                <span class="text-danger">{{ $errors->first('nik') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">No Kartu Keluarga</label>
                                <input type="text" id="inputName" class="form-control"
                                    placeholder="Nomor Kartu Keluarga" name="no_kk" readonly value="{{ $wargas->no_kk }}">
                                @if ($errors->has('no_kk'))
                                <span class="text-danger">{{ $errors->first('no_kk') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Nama Lengkap</label>
                                <input type="text" id="inputName" class="form-control"
                                    placeholder="Nama lengkap sesuai akta kelahiran" name="nama" value="{{ $wargas->nama }}">
                                @if ($errors->has('nama'))
                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputName">Tempat Lahir</label>
                                <input type="text" id="inputName" class="form-control" placeholder="Tempat Lahir"
                                    name="tempat_lahir" value="{{ $wargas->tempat_lahir }}">
                                @if ($errors->has('tempat_lahir'))
                                <span class="text-danger">{{ $errors->first('tempat_lahir') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputName">Tanggal Lahir</label>
                                <input type="date" id="inputName" class="form-control"
                                    placeholder="Nama lengkap sesuai akta kelahiran" name="tanggal_lahir" value="{{ $wargas->tanggal_lahir }}">
                                @if ($errors->has('tanggal_lahir'))
                                <span class="text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputName">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="inputStatus" class="form-control custom-select">
                                    <option selected disabled>- Pilih -</option>
                                    <option name="jenis_kelamin" value="LAKI-LAKI" {{$wargas->jenis_kelamin == 'LAKI-LAKI' ? 'selected' : '' }} > Laki-Laki</option>
                                    <option name="jenis_kelamin" value="PEREMPUAN" {{$wargas->jenis_kelamin == 'PEREMPUAN' ? 'selected' : '' }}> Perempuan</option>
                                </select>
                                @if ($errors->has('jenis_kelamin'))
                                <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Alamat Lengkap</label>
                                <textarea type="text" id="inputName" class="form-control" placeholder="Alamat" rows="2"
                                    name="alamat">{{ $wargas->alamat }}</textarea>
                                @if ($errors->has('alamat'))
                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputName">RT</label>
                                <input type="number" id="inputName" class="form-control" name="rt" value="{{ $wargas->rt }}">
                                @if ($errors->has('rt'))
                                <span class="text-danger">{{ $errors->first('rt') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputName">RW</label>
                                <input type="number" id="inputName" class="form-control" name="rw" value="{{ $wargas->rw }}">
                                @if ($errors->has('rw'))
                                <span class="text-danger">{{ $errors->first('rw') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputName">Kelurahan</label>
                                <select id="inputStatus" name="kelurahan" class="form-control custom-select">
                                    <option name="kelurahan" selected disabled>- Pilih -</option>
                                    @foreach ($kelurahans as $row)
                                    <option name="kelurahan" value="{{ $row->id }}" {{$wargas->kelurahan == $row->id ? 'selected' : '' }}>{{ $row->nama_kelurahan }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('kelurahan'))
                                <span class="text-danger">{{ $errors->first('kelurahan') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Agama</label>
                                <select name="agama" id="" class="form-control custom-select">
                                    <option name="agama" value="Islam" {{$wargas->agama == 'Islam' ? 'selected' : '' }} >Islam</option>
                                    <option value="Kristen" {{$wargas->agama == 'Kristen' ? 'selected' : '' }} >Kristen</option>
                                    <option value="Katolik" {{$wargas->agama == 'Katolik' ? 'selected' : '' }} >Katolik</option>
                                    <option value="Hindu" {{$wargas->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{$wargas->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                    <option value="Konghucu" {{$wargas->agama == 'Konghucu' ? 'selected' : '' }} >Konghucu</option>
                                </select>
                                @if ($errors->has('agama'))
                                <span class="text-danger">{{ $errors->first('agama') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Pendidikan</label>
                                <select name="pendidikan" id="" class="form-control custom-select">
                                    <option selected disabled>- Pilih -</option>
                                    <option name="pendidikan" value="TAMAT SD / SEDERAJAT" {{$wargas->pendidikan == 'TAMAT SD / SEDERAJAT' ? 'selected' : '' }} >TAMAT SD / SEDERAJAT</option>
                                    <option name="pendidikan" value="STLP/SEDERAJAT" {{$wargas->pendidikan == 'STLP/SEDERAJAT' ? 'selected' : '' }}  >STLP/SEDERAJAT</option>
                                    <option name="pendidikan" value="TIDAK / BELUM SEKOLAH" {{$wargas->pendidikan == 'TIDAK / BELUM SEKOLAH' ? 'selected' : '' }} >TIDAK / BELUM SEKOLAH</option>
                                    <option name="pendidikan" value="SLTA/SEDERAJAT" {{$wargas->pendidikan == 'SLTA/SEDERAJAT' ? 'selected' : '' }}  >SLTA/SEDERAJAT</option>
                                    <option name="pendidikan" value="BELUM TAMAT SD/SEDERAJAT" {{$wargas->pendidikan == 'BELUM TAMAT SD/SEDERAJAT' ? 'selected' : '' }} >BELUM TAMAT SD/SEDERAJAT</option>
                                    <option name="pendidikan" value="DIPLOMA IV / STARTA 1" {{$wargas->pendidikan == 'DIPLOMA IV / STARTA 1' ? 'selected' : '' }} >DIPLOMA IV / STARTA 1</option>
                                    <option name="pendidikan" value="AKADEMI/DIPLOMA III/S.MUDA" {{$wargas->pendidikan == 'AKADEMI/DIPLOMA III/S.MUDA' ? 'selected' : '' }} >AKADEMI/DIPLOMAIII/S.MUDA</option>
                                    <option name="pendidikan" value="DIPLOMA I/II" {{$wargas->pendidikan == 'DIPLOMA I/II' ? 'selected' : '' }} >DIPLOMA I/II</option>
                                    <option name="pendidikan" value="STRATA II" {{$wargas->pendidikan == 'STRATA II' ? 'selected' : '' }} >STRATA II</option>
                                    <option name="pendidikan" value="STARTA III" {{$wargas->pendidikan == 'STARTA III' ? 'selected' : '' }} >STARTA III</option>
                                </select>
                                @if ($errors->has('pendidikan'))
                                <span class="text-danger">{{ $errors->first('pendidikan') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Pekerjaan</label>
                                <select name="pekerjaan" id="" class="form-control custom-select">
                                    <option selected disabled>- Pilih -</option>
                                    @foreach ($kerjas as $row)
                                    <option name="id_pekerjaan" value="{{ $row->id }}" {{$wargas->id_pekerjaan == $row->id ? 'selected' : '' }}>{{ $row->nama_pekerjaan }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('pekerjaan'))
                                <span class="text-danger">{{ $errors->first('pekerjaan') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Status Perkawinan</label>
                                <select name="status_perkawinan" id="" class="form-control custom-select">
                                    <option selected disabled>- Pilih -</option>
                                    <option name="status_perkawinan" value="BELUM KAWIN" {{$wargas->status_perkawinan
                                     == 'BELUM KAWIN' ? 'selected' : '' }} >Belum Kawin</option>
                                    <option name="status_perkawinan" value="KAWIN" {{$wargas->status_perkawinan
                                     == 'KAWIN' ? 'selected' : '' }} >Kawin</option>
                                    <option name="status_perkawinan" value="CERAI HIDUP" {{$wargas->status_perkawinan
                                     == 'CERAI HIDUP' ? 'selected' : '' }}>Cerai Hidup</option>
                                    <option name="status_perkawinan" value="CERAI MATI" {{$wargas->status_perkawinan
                                     == 'CERAI MATI' ? 'selected' : '' }} >Cerai Mati</option>
                                </select>
                                @if ($errors->has('status_perkawinan'))
                                <span class="text-danger">{{ $errors->first('status_perkawinan') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Golongan Darah</label>
                                <select name="gol_darah" id="" class="form-control custom-select">
                                    <option selected disabled>- Pilih -</option>
                                    <option name="gol_darah" value="A" {{$wargas->gol_darah
                                     == 'A' ? 'selected' : '' }}>A</option>
                                    <option name="gol_darah" value="B" {{$wargas->gol_darah
                                     == 'B' ? 'selected' : '' }}>B</option>
                                    <option name="gol_darah" value="AB" {{$wargas->gol_darah
                                     == 'AB' ? 'selected' : '' }}>AB</option>
                                    <option name="gol_darah" value="O"{{$wargas->gol_darah
                                     == 'O' ? 'selected' : '' }}>O</option>
                                </select>
                                @if ($errors->has('gol_darah'))
                                <span class="text-danger">{{ $errors->first('gol_darah') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputName">Kewarganegaraan</label>
                                <select name="kewarganegaraan" id="" class="form-control custom-select">
                                    <option selected disabled>- Pilih -</option>
                                    <option name="kewarganegaraan" value="WNI" {{$wargas->kewarganegaraan
                                     == 'WNI' ? 'selected' : '' }}>Warga Negara Indonesia</option>
                                    <option name="kewarganegaraan" value="WNA" {{$wargas->kewarganegaraan
                                     == 'WNA' ? 'selected' : '' }}>Warga Negara Asing</option>
                                </select>
                                @if ($errors->has('kewarganegaraan'))
                                <span class="text-danger">{{ $errors->first('kewarganegaraan') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Foto KTP Lama</label>
                                <div class="input-group">
                                    <img src="{{ asset('img/images/'.$wargas->foto_ktp) }}" width="100" alt="">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputFile">Upload Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile"
                                            name="foto_ktp" value="{{ asset('img/images/'.$wargas->foto_ktp) }}">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih file untuk ganti foto</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @if ($errors->has('foto_ktp'))
                                <span class="text-danger">{{ $errors->first('foto_ktp') }}</span>
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
                        <label for="inputSpentBudget">Kartu Keluarga</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="kk"
                                    value="{{ old('kk') }}">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        @if ($errors->has('kk'))
                        <span class="text-danger">{{ $errors->first('kk') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputEstimatedBudget">Scan KTP Lama</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                    name="ktp" value="{{ old('ktp') }}">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        @if ($errors->has('ktp'))
                        <span class="text-danger">{{ $errors->first('ktp') }}</span>
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
