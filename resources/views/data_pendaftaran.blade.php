<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Siswa Periode {{ $tahun->ajaran->tahun_ajaran }}</title>
</head>
<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
    }
    .text{
        font-size: 12px;
    }
    table {
    border-collapse: collapse;
}
    td, th {
    border: 1px solid black;
    padding: 2px;
}
table.ttd{
    margin-top: 20px;
}
td.noborder{
    border: none;
}

tr.ttdKepsek td {
    padding-top: 60px; 
    }

</style>
<body>
    <center>
        <h3>
            LAPORAN PENDAFTARAN SISWA BARU
            <BR>PERIODE {{ $tahun->ajaran->tahun_ajaran }}
        </h3>
    </center>
    <div class="text">
        <table border="isi" align="center" width=100%>
            <thead>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>E-mail</th>
                <th>Jarak Dari Rumah Ke Sekolah</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Umur</th>
                <th>Agama</th>
                <th>RT/RW</th>
                <th>Desa</th>
                <th>Kecamatan</th>
                <th>Kabupaten</th>
                <th>Provinsi</th>
                <th>Telepon</th>
                <th>Pekerjaan</th>
                <th>Status</th>
            </thead>
            <tbody>
                @foreach ($data as $lolos)
                <tr>
                    <td align="center">{{ $loop->iteration }}</td>
                    <td>{{ $lolos->nama_calon }}</td>
                    <td>{{ $lolos->email }}</td>
                    <td align="center">{{ $lolos->jarak }} km</td>
                    <td>{{ $lolos->tempat_lahir }}, {{ $lolos->tanggal_lahir }}</td>
                    <td>{{ \Carbon\Carbon::parse($lolos->tanggal_lahir)->diff(\Carbon\Carbon::now())->format('%y Tahun %m Bulan %d Hari')
                    }}</td>
                    <td>{{ $lolos->agama }}</td>
                    <td align="center">{{ $lolos->rt_rw }}</td>
                    <td>{{ $lolos->desa_kelurahan }}</td>
                    <td>{{ $lolos->kecamatan }}</td>
                    <td>{{ $lolos->kabupaten_kota }}</td>
                    <td>{{ $lolos->provinsi }}</td>
                    <td>{{ $lolos->telepon }}</td>
                    <td>{{ $lolos->pekerjaan }}</td>
                    <td>
                        @switch($lolos->status)
                            @case(1)
                                Lolos
                                @break
                        @endswitch
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <table align="right" class="ttd">
            <tr>
                <td class="noborder">
                    Bandung, {{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('j F Y') }}
                </td>
            </tr>
            <tr>
                <td class="noborder">
                    Mengetahui,
                </td>
            </tr>
            <tr>
                <td class="noborder">
                    Kepala Sekolah
                </td>
            </tr>
            <tr class="noborder ttdKepsek">
                <td class="noborder">
                    <u><b>Lisnawati Kanianingsih, S.Pd., M.M.Pd</b></u>
                    <br>
                    NIP. 197411051998032003
                </td>
            </tr>
        </table>
    </div>
</body>
</html>