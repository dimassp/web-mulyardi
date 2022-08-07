<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shrotcut icon" href="{{ asset('img/favicon.ico') }}">
    <style>
        tr.ttdBawah td {
    padding-top: 60px; 
    }
    .ttd{
        font-size: 12px;
    }
    </style>
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
            <table class="table table-bordered table-striped table-hover mt-2">
                <thead>
                    <tr>
                        <th colspan="4" class="text-center">Jadwal Pelajaran Kelas {{ $kelas->nama_kelas }}</th>
                    </tr>
                    <tr>
                        <th>Hari</th>
                        <th>Jadwal</th>
                        <th>Jam</th>
                        <th>Ruang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal as $data)
                        <tr>
                            <td>{{ $data->hari->nama_hari }}</td>
                            <td>
                                <h5 class="card-title">{{ $data->mapel->nama_mapel }}</h5>
                                <p class="card-text"><small class="text-muted">{{ $data->guru->nama_guru }}</small>
                                </p>
                            </td>
                            <td>{{ $data->jam_mulai . ' - ' . $data->jam_selesai }}</td>
                            <td>{{ $data->ruang->nama_ruang }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="ttd">
            <table width=100%>
                <tr>
                    <td>
                        Mengetahui,
                    </td>
                    <td align="left" width=35%>
                        Bandung, {{ \Carbon\Carbon::now()->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('j F Y') }}
                    </td>
                </tr>
                <tr >
                    <td>
                        Kepala Sekolah
                    </td>
                    <td align="left">
                        Wali Kelas
                    </td>
                </tr>
            </table>
            <table class="ttdBawah" width=100%>
                <tr class="ttdBawah">
                    <td>
                        <u><b>Lisnawati Kanianingsih, S.Pd., M.M.Pd</b></u>
                        <br>NIP. 197411051998032003
                    </td>
                    <td width=35%>
                        <u><b>{{ $kelas->guru->nama_guru }}</b></u>
                        <br>NIP. {{ $kelas->guru->nip }}
                    </td>
                </tr>
            </table>
        </div>
</body>

</html>
