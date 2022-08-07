<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Raport Siswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<style>
    body{
        font-size: 12px;
        font-family: Arial, Helvetica, sans-serif;
    }
    h5{
        font-family: Arial, Helvetica, sans-serif
    }
    .ttd{
        font-size: 12px;
    }
    .ttdBawah{
        margin-top: 60px;
    }
    /* .ttdKepsek{
        padding-top: 60px;
    } */
    tr.ttdKepsek td {
    padding-top: 60px; 
    padding-bottom:10px
    }
</style>

<body>
    <div class="row">
        <div class="col-md-12">
            @php
                $bulan = date('m');
                $tahun = date('Y');
            @endphp
            <h5 class="text-center">RAPOR PESERTA DIDIK DAN PROFIL PESERTA DIDIK
                {{-- {{ $kelas->nama_kelas }} /
                @if ($bulan > 6)
                    {{ 'Semester Ganjil' }}
                @else
                    {{ 'Semester Genap' }}
                @endif --}}
            </h5>
                <table class="table">
                    <tr>
                        <td>No Induk Siswa</td>
                        <td>:</td>
                        <td>{{ $siswa->no_induk }}</td>
                    </tr>
                    <tr>
                        <td>Nama Siswa</td>
                        <td>:</td>
                        <td>{{ $siswa->nama_siswa }}</td>
                    </tr>
                    <tr>
                        <td>Nama Kelas</td>
                        <td>:</td>
                        <td>{{ $kelas->nama_kelas }}</td>
                    </tr>
                    <tr>
                        <td>Wali Kelas</td>
                        <td>:</td>
                        <td>{{ $kelas->guru->nama_guru }}</td>
                    </tr>

                    <tr>
                        <td>Semester</td>
                        <td>:</td>
                        <td>
                            @if ($bulan > 6)
                                {{ 'Semester Ganjil' }}
                            @else
                                {{ 'Semester Genap' }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Tahun Pelajaran</td>
                        <td>:</td>
                        <td>
                            @if ($bulan > 6)
                                {{ $tahun }}/{{ $tahun + 1 }}
                            @else
                                {{ $tahun - 1 }}/{{ $tahun }}
                            @endif
                        </td>
                    </tr>
                </table>
                <hr>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="ctr text-center" rowspan="2">No.</th>
                        <th rowspan="2" class="text-center">Mata Pelajaran</th>
                        <th class="ctr text-center" colspan="3">Pengetahuan</th>
                        <th class="ctr text-center" colspan="3">Keterampilan</th>
                    </tr>
                    <tr>
                        <th class="ctr">Nilai</th>
                        <th class="ctr">Predikat</th>
                        <th class="ctr">Deskripsi</th>
                        <th class="ctr">Nilai</th>
                        <th class="ctr">Predikat</th>
                        <th class="ctr">Deskripsi</th>
                    </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                <tbody>
                    @foreach ($mapel as $val => $data)
                        @php
                            $data = $data[0];
                        @endphp
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->mapel->nama_mapel }}</td>
                            @php
                                $array = ['mapel' => $val, 'siswa' => $siswa->id];
                                $jsonData = json_encode($array);
                            @endphp
                            <td class="ctr">
                                {{ $data->cekRapot($jsonData)['p_nilai'] }}
                            </td>
                            <td class="ctr">
                                {{ $data->cekRapot($jsonData)['p_predikat'] }}
                            </td>
                            <td class="ctr">
                                {{ $data->cekRapot($jsonData)['p_deskripsi'] }}</td>
                            <td class="ctr">
                                {{ $data->cekRapot($jsonData)['k_nilai'] }}
                            </td>
                            <td class="ctr">
                                {{ $data->cekRapot($jsonData)['k_predikat'] }}
                            </td>
                            <td class="ctr">
                                {{ $data->cekRapot($jsonData)['k_deskripsi'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row ttd">
        <div class="col">
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
                    Orang Tua/Wali
                </td>
                <td align="left">
                    Wali Kelas
                </td>
            </tr>
        </table>
        <table class="ttdBawah" width=100%>
            <tr>
                <td>
                    ...........................
                </td>
                <td width=35%>
                    <u><b>{{ $kelas->guru->nama_guru }}</b></u>
                    <br>NIP. {{ $kelas->guru->nip }}
                </td>
            </tr>
        </table>
        <table align="center">
            <tr>
                <td>
                    Mengetahui,
                </td>
            </tr>
            <tr>
                <td>
                    Kepala Sekolah
                </td>
            </tr>
            <tr class="ttdKepsek">
                <td>
                    <u><b>Lisnawati Kanianingsih, S.Pd., M.M.Pd</b></u>
                    <br>
                    NIP. 197411051998032003
                </td>
            </tr>
        </table>
        </div>
    </div>
</body>

</html>
