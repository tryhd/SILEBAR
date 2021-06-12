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
                    <li class="breadcrumb-item active">Tambah User</li>
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
                        <h4 class="header-title mb-2">Form Tambah User</h4>
                      </div>
                    <!-- form start -->
                    <form action="{{ route('kegiatan.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label >Judul</label>
                                    <input type="text" class="form-control" placeholder="Judul" name="judul" value="{{ old('judul') }}">
                                    @if ($errors->has('judul'))
                                    <span class="text-danger">{{ $errors->first('judul') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label >Deskripsi</label>
                                    <input type="text" class="form-control" placeholder="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}">
                                    @if ($errors->has('deskripsi'))
                                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label >Tanggal</label>
                                    <input type="date" class="form-control" placeholder="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                                    @if ($errors->has('tanggal'))
                                    <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option name="status" value="Tinjau" selected>Tinjau</option>
                                        <!-- <option name="status" value="Posting">Posting</option> -->
                                        <!-- <option name="status" value="Tinjau">Tinjau</option> -->
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="text-danger">{{ $errors->first('status') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>User</label>
                                    <select name="user_id" id="user_id" class="form-control">
                                        <option selected disabled>Pilih User</option>
                                        @foreach ($user as $row)
                                        <option option name="user_id"
                                                value="{{ $row->id }}">
                                            {{ $row->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('user_id'))
                                        <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="foto" value="{{ old('foto') }}">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    @if ($errors->has('foto'))
                                        <span class="text-danger">{{ $errors->first('foto') }}</span>
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
