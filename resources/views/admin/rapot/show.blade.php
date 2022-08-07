@extends('template_backend.home')
@section('heading', 'Show Rapor')
@section('page')
    <li class="breadcrumb-item active">Show Rapor</li>

@endsection
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Show Rapor


                    {{-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#importExcel">
                        <i class="nav-icon fas fa-file-import"></i> &nbsp; IMPORT EXCEL
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dropTable">
                        <i class="nav-icon fas fa-minus-circle"></i> &nbsp; Drop
                    </button> --}}
                </h3>

            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table" style="margin-top: -10px;">
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
                            @php
                                $bulan = date('m');
                                $tahun = date('Y');
                            @endphp
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
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered  table-striped table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="ctr" rowspan="2">No.</th>
                                    <th rowspan="2">Mata Pelajaran</th>
                                    <th class="ctr" colspan="3">Pengetahuan</th>
                                    <th class="ctr" colspan="3">Keterampilan</th>
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
                            <tbody style="width:100%;">
                                @foreach ($mapel as $val => $data)
                                    <?php $data = $data[0]; ?>
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->mapel->nama_mapel }}</td>
                                        @php
                                            $array = ['mapel' => $val, 'siswa' => $siswa->id];
                                            $jsonData = json_encode($array);
                                        @endphp
                                        <td class="ctr">{{ $data->cekRapot($jsonData)['p_nilai'] }}</td>
                                        <td class="ctr">{{ $data->cekRapot($jsonData)['p_predikat'] }}</td>
                                        <td class="ctr">{{ $data->cekRapot($jsonData)['p_deskripsi'] }}</td>
                                        <td class="ctr">{{ $data->cekRapot($jsonData)['k_nilai'] }}</td>
                                        <td class="ctr">{{ $data->cekRapot($jsonData)['k_predikat'] }}</td>
                                        <td class="ctr">{{ $data->cekRapot($jsonData)['k_deskripsi'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
@section('script')
    <script>
        $("#Nilai").addClass("active");
        $("#liNilai").addClass("menu-open");
        $("#Rapot").addClass("active");
    </script>
@endsection
