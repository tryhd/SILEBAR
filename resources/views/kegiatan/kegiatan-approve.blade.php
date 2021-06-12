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
                        <h4 class="header-title mb-2">Form Edit Kegiatan</h4>
                      </div>
                    <!-- form start -->
                    <form action="{{ route('updateapprove',$data->id) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="card-body">
                                <div class="form-group col-md-12">
                                    <label>Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option selected disabled>Status</option>
                                        <option name="status" value="Posting" {{ $data->status == 'Posting' ? 'selected' : '' }} >Posting</option>
                                        <option name="status" value="Tinjau" {{$data->status == 'Tinjau' ? 'selected' : '' }} >Tinjau</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="text-danger">{{ $errors->first('status') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary">Setujui</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
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
