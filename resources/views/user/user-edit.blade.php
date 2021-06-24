@extends('layouts.master')
@extends('layouts.header')
@extends('layouts.sider')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kelola User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-default">
                    <div class="card-header with-border">
                        <h4 class="header-title mb-2">Form Edit User</h4>
                      </div>
                    <!-- form start -->
                    <form action="{{ route('user.update',$data->id) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Nama</label>
                                    <input type="text" class="form-control" placeholder="Masukan nama" name="name" value="{{ $data->name }}">
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan email" name="email" value="{{ $data->email }}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <option selected disabled>Pilih Role</option>
                                        <option name="role" value="Admin">Admin</option>
                                        <option name="role" value="Camat">Camat</option>
                                        <option name="role" value="pegawai">Pegawai Kecamatan</option>
                                    </select>
                                    @if ($errors->has('role'))
                                        <span class="text-danger">{{ $errors->first('role') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option selected disabled>Pilih Status</option>
                                        <option name="status" value="Aktif">Aktif</option>
                                        <option name="status" value="NonAktif">Non Aktif</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="text-danger">{{ $errors->first('status') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Foto User</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="foto_user" value="{{ $data->foto_user }}">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    @if ($errors->has('foto_user'))
                                        <span class="text-danger">{{ $errors->first('foto_user') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection
@extends('layouts.footer')
