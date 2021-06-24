<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title>Laporan Kegiatan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
	<style type="text/css">
		table {
			border-collapse: collapse;
        width: 100%;
        padding: 10px 10px;
		}
        .table th {
        padding: 8px 8px;
        border:1px solid #000000;
        text-align: center;
         }
        .table td {
            padding: 3px 3px;
            border:1px solid #000000;
            text-align: center;
        }

        .text-center {
            text-align: center;
        }
        img {
        position: left;
        width: 50px;
        }
		table tr .text2 {
			text-align: right;
			font-size: 13px;
		}
        table tr .text3 {
			text-align: left;
			font-size: 13px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}

	</style>
</head>
<body>
	<center>
		<table>
			<tr>
				<td><img src="{{ public_path('/dist/img/logo.png')}}"></td>
				<td>
				<center>
					<font size="4">LAPORAN KEGIATAN</font><br>
					<font size="5"><b>KECAMATAN CILEBAR</b></font><br>
					<font size="2"><i>Jl. Cilebar No.1993, Kertamukti, Cilebar, Kabupaten Karawang, Jawa Barat 41353, Indonesia</i></font>
				</center>
				</td>
			</tr>

            <tr>
				<td colspan="2"><hr></td>
			</tr>

		</table>
		<br>
		<table class="table table-bordered table-striped">
        <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Judul</th>
                  <!-- <th>Deskripsi</th> -->
                  <th>Tanggal Pelaksanaan</th>
                  <th>Status</th>
                  <th>Diajukan Oleh</th>
                </tr>
                </thead>
                <tbody>
                @php
                $no= 1;
                @endphp
                @foreach ($search as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>{{ $row->judul }}</td>
                    <!-- <td>{{ $row->deskripsi }}</td> -->
                    <td>{{ $row->tanggal }}</td>
                    <td>{{ $row->status }}</td>
                    <td>{{ $row->user->name }}</td>
                </tr>
                @endforeach
                </tbody>
		</table>
		<br>
		<table>
			<tr>
				<td class="text" align="center">Petugas Kecamatan<br><br><br><br><br><br><p style="text-decoration: underline">{{ Auth::user()->name }}</p></td>
                <td class="text" align="center">Camat<br><br><br><br><br><br><p style="text-decoration: underline">Achmad Kartiwa S.Sos., M.Si</p></td>
			</tr>
	     </table>
	</center>
</body>
</html>
