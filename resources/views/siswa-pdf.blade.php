<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cetak Laporan Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shrotcut icon" href="{{ asset('img/favicon.ico') }}">
</head>

<body>
            <b>
            <table align="center" width=90%>
                
                <tr align="center">
                    <td rowspan="4">
                        <img src="{{ asset('img/logobandung.jpg') }}" alt="" width="90px">
                    </td>
                    <td>PEMERINTAH KOTA BANDUNG</td>
                    <td rowspan="4">
                        <img src="{{ asset('img/logo.jpg') }}" width="90px" alt="">
                    </td>
                </tr>
                <tr align="center">
                    <td>DINAS PENDIDIKAN</td>
                </tr>
                <tr align="center">
                    <td><span style="color: rgb(103, 90, 18)">SD NEGERI 185 CIHAURGEULIS</span></td>
                </tr>
                <tr align="center">
                    <td><span style="font-size: 12px">Terakresitasi A (Amat Baik) BAP-S/M: 02.00/150/BAP-SM/SK/XI/2015</span></td>
                </tr>
                <tr align="center">
                    <td colspan="3"><span style="font-size: 9px">Alamat : Jalan Surapati Nomor 82, Cihaurgeulis-Cibeunying Kaler, KP.40122, 022-70778575 Email : sdncihaurgeulis2@gmail.com</span></td>
                </tr>
            
            </table>
            <hr style="background-color: black">
        </b>
        Tanggal : {{ \Carbon\Carbon::now() }}
            <table class="table table-bordered table-striped table-hover mt-2" align="center" width="100%">
                <thead>
                    <tr>
                        <th colspan="3" class="text-center">Daftar Murid Kelas {{ $kelas->nama_kelas }}</th>
                    </tr>
                    <tr>
                        <th>No. Induk</th>
                        <th>Nama Siswa</th>
                        <th>L/P</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $data)
                        <tr>
                            <td>{{ $data->no_induk }}</td>
                            <td>{{ $data->nama_siswa }}</td>
                            <td>{{ $data->jk }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
</body>

</html>
