<!-- Default box -->
<div class="card">
    <div class="card-header">
        @if (Auth()->user()->role=='Admin')
        <h3 class="card-title">Dashboard {{ Auth::user()->role }}</h3>
            @else
            <h3 class="card-title">Dashboard {{ Auth::user()->role }}</h3>
            @endif
    </div>
    @include('layouts.alerts')
    <div class="card-body">
        <center>
            <h3>Selamat Datang Di Sistem Pelayanan Kecamatan Cilebar</h3>
            <br>
            <br>
            <img src="{{ asset('Remember/ico/logo.png') }}" height="300" width="300">
        </center>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
