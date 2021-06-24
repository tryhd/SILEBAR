<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Pengajuan Pelayanan</h3>
    </div>
    @include('layouts.alerts')
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Pengajuan</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no= 1;
                @endphp
                @foreach ($pelayanan as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->jenis_permohonan }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>{{ $row->status }}</td>
                </tr>
                @endforeach
                </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
