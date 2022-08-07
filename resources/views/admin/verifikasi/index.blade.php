@extends('template_backend.home')
@section('heading', 'Data Verifikasi')
@section('page')
    <li class="breadcrumb-item active">Data Verifikasi</li>
@endsection
@section('content')


    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    {{-- <button type="button" class="btn btn-default btn-sm" data-toggle="modal"
                        data-target=".bd-example-modal-lg">
                        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Guru
                    </button> --}}

                    {{-- <a href="{{ route('verifikasi.export_excel') }}" class="btn btn-success btn-sm my-3" target="_blank"><i
                            class="nav-icon fas fa-file-export"></i> &nbsp; EXPORT EXCEL</a> --}}

                        <a href="{{ route('verifikasi.pdf', Crypt::encrypt($id)) }}" class="btn btn-danger btn-sm my-3" target="_blank">Export PDF</a>


                    {{-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#importExcel">
                        <i class="nav-icon fas fa-file-import"></i> &nbsp; IMPORT EXCEL
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dropTable">
                        <i class="nav-icon fas fa-minus-circle"></i> &nbsp; Drop
                    </button> --}}
                </h3>
            </div>
            {{-- <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{ route('guru.import_excel') }}" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                            </div>
                            <div class="modal-body">
                                @csrf
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <h5 class="modal-title">Petunjuk :</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul>
                                            <li>rows 1 = nama guru</li>
                                            <li>rows 2 = nip guru</li>
                                            <li>rows 3 = jenis kelamin</li>
                                            <li>rows 4 = mata pelajaran</li>
                                        </ul>
                                    </div>
                                </div>
                                <label>Pilih file excel</label>
                                <div class="form-group">
                                    <input type="file" name="file" required="required">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}
            {{-- <div class="modal fade" id="dropTable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="{{ route('guru.deleteAll') }}">
                        @csrf
                        @method('delete')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Sure you drop all data?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cencel</button>
                                <button type="submit" class="btn btn-danger">Drop</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Calon Siswa</th>
                            <th>Email</th>
                            <th>Tempat/Tanggal Lahir</th>
                            <th>Umur</th>
                            <th>NIK Wali Calon Siswa</th>
                            <th>Nama Wali Calon Siswa</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Anak Ke</th>
                            <th>Jumlah Saudara</th>
                            <th>Rt Rw</th>
                            <th>Desa Kelurahan</th>
                            <th>Kecamatan</th>
                            <th>Kabupaten Kota</th>
                            <th>Provinsi</th>
                            <th>Telepon</th>
                            <th>Kode Pos</th>
                            <th>Pekerjaan</th>
                            <th>Jarak ke sekolah</th>
                            <th>File Akta</th>
                            <th>File KK</th>
                            <th>File KTP</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($arr_baru as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data['nama_calon'] }}</td>
                                <td>{{ $data['email'] }}</td>
                                <td>{{ $data['tempat_lahir'] }} , {{ $data['tanggal_lahir'] }}</td>
                                <td>{{ $data['tahun'] }} tahun, {{ $data['bulan'] }} bulan, {{ $data['hari'] }} hari,
                                </td>
                                <td>{{ $data['nik_wali'] }}</td>
                                <td>{{ $data['nama_wali'] }}</td>
                                <td>{{ $data['agama'] }}</td>
                                <td>{{ $data['alamat'] }}</td>
                                <td>{{ $data['anak_ke'] }}</td>
                                <td>{{ $data['jumlah_saudara'] }}</td>
                                <td>{{ $data['rt_rw'] }}</td>
                                <td>{{ $data['desa_kelurahan'] }}</td>
                                <td>{{ $data['kecamatan'] }}</td>
                                <td>{{ $data['kabupaten_kota'] }}</td>
                                <td>{{ $data['provinsi'] }}</td>
                                <td>{{ $data['telepon'] }}</td>
                                <td>{{ $data['pekerjaan'] }}</td>
                                <td>{{ $data['kode_pos'] }}</td>
                                <td>{{ $data['jarak'] }} Km</td>
                                <td><a href="{{ asset($data['file_akta']) }}" target="__blank"
                                        class="btn btn-warning btn-sm mt-2">Lihat</a>
                                </td>
                                <td><a href="{{ asset($data['file_kk']) }}" target="__blank"
                                        class="btn btn-warning btn-sm mt-2">Lihat</a>
                                </td>
                                <td><a href="{{ asset($data['file_ktp']) }}"target="__blank"
                                        class="btn btn-warning btn-sm mt-2">Lihat</a>
                                </td>

                                <td>
                                    @if (empty($data['status']))
                                        <a href="{{ route('verifikasi.send_email', Crypt::encrypt($data['id'])) }}"
                                            class="btn btn-success btn-sm mt-2" onclick="if (confirm('Apakah siswa ini diterima?')){return true;}else{event.stopPropagation(); event.preventDefault();};"><i class="nav-icon fa fa-check"></i> &nbsp;
                                            Verfifikasi</a>
                                        <a href="{{ route('verifikasi.send_email_gagal', Crypt::encrypt($data['id'])) }}"
                                            class="btn btn-danger btn-sm mt-2" onclick="if (confirm('Apakah siswa ini ditolak?')){return true;}else{event.stopPropagation(); event.preventDefault();};"><i class="nav-icon fa fa-times"></i> &nbsp;
                                            Tolak</a>
                                    @else
                                        @if ($data['status'] == 1)
                                            <div class="btn btn-success btn-sm mt-2">Lolos</div>
                                        @else
                                            <div class="btn btn-danger btn-sm mt-2">Gagal</div>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            <?php $no++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- <!-- Extra large modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Guru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('guru.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_guru">Nama Guru</label>
                                    <input type="text" id="nama_guru" name="nama_guru"
                                        class="form-control @error('nama_guru') is-invalid @enderror">
                                </div>
                                <div class="form-group">
                                    <label for="tmp_lahir">Tempat Lahir</label>
                                    <input type="text" id="tmp_lahir" name="tmp_lahir"
                                        class="form-control @error('tmp_lahir') is-invalid @enderror">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" id="tgl_lahir" name="tgl_lahir"
                                        class="form-control @error('tgl_lahir') is-invalid @enderror">
                                </div>
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select id="jk" name="jk"
                                        class="select2bs4 form-control @error('jk') is-invalid @enderror">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tipe">Tipe Guru</label>
                                    <select id="tipe" name="tipe"
                                        class="select2bs4 form-control @error('tipe') is-invalid @enderror">
                                        <option value="">-- Pilih Tipe Guru --</option>
                                        <option value="kelas">Guru Kelas</option>
                                        <option value="khusus">Guru Khusus</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="telp">Nomor Telpon/HP</label>
                                    <input type="text" id="telp" name="telp"
                                        onkeypress="return inputAngka(event)"
                                        class="form-control @error('telp') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" id="nip" name="nip"
                                        onkeypress="return inputAngka(event)"
                                        class="form-control @error('nip') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="mapel_id">Mapel</label>
                                    <select id="mapel_id" name="mapel_id"
                                        class="select2bs4 form-control @error('mapel_id') is-invalid @enderror">
                                        <option value="">-- Pilih Mapel --</option>
                                        @foreach ($mapel as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_mapel }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @php
                                    $kode = $max + 1;
                                    if (strlen($kode) == 1) {
                                        $id_card = '0000' . $kode;
                                    } elseif (strlen($kode) == 2) {
                                        $id_card = '000' . $kode;
                                    } elseif (strlen($kode) == 3) {
                                        $id_card = '00' . $kode;
                                    } elseif (strlen($kode) == 4) {
                                        $id_card = '0' . $kode;
                                    } else {
                                        $id_card = $kode;
                                    }
                                @endphp
                                <div class="form-group">
                                    <label for="id_card">Nomor ID Card</label>
                                    <input type="text" id="id_card" name="id_card" maxlength="5"
                                        onkeypress="return inputAngka(event)" value="{{ $id_card }}"
                                        class="form-control @error('id_card') is-invalid @enderror" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="foto">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="foto"
                                                class="custom-file-input @error('foto') is-invalid @enderror"
                                                id="foto">
                                            <label class="custom-file-label" for="foto">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i
                            class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
                    <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                        Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@section('script')
    <script>
        $('.confirmation').on('click', function () {
            return confirm('Are you sure?');
        });
        // var elems = document.getElementsByClassName('confirmation');
        // var confirmIt = function (e) {
        //     if (!confirm('Are you sure?')) e.preventDefault();
        // };
        // for (var i = 0, l = elems.length; i < l; i++) {
        //     elems[i].addEventListener('click', confirmIt, false);
        // };

        function terima() {
        confirm("Diterima?");
        }

        function tolak() {
        confirm("Ditolak?");
        }
    
        
        // $("#MasterData").addClass("active");
        // $("#liMasterData").addClass("menu-open");
        $("#VerifikasiIndex").addClass("active");
    </script>

@endsection
