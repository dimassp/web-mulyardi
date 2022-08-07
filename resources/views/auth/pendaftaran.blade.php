@extends('layouts.app_pendaftaran')
@section('page', 'Pendaftaran Siswa Baru')
@section('content')
    <div class="card-body login-card-body">
        
        <h3 class="login-box-msg">PPDB Tahun Ajaran {{$ajaran->tahun_ajaran}}</h3>
        <form action="{{ route('pendaftaran.store') }}" method="post" enctype="multipart/form-data">
            @csrf
           
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input id="email" type="email" placeholder="{{ __('Alamat email') }}"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="nik_wali" type="text" placeholder="{{ __('NIK Wali') }}" maxlength="16" required
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            class="form-control @error('nik_wali') is-invalid @enderror" name="nik_wali"
                            value="{{ old('nik_wali') }}" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('nik_wali')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input id="nama_wali" type="text" placeholder="{{ __('Nama Wali') }}"
                            class="form-control @error('nama_wali') is-invalid @enderror" name="nama_wali"
                            value="{{ old('nama_wali') }}" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('nama_wali')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input id="nama_calon" type="text" placeholder="{{ __('Nama Calon Peserta Didik') }}"
                            class="form-control @error('nama_calon') is-invalid @enderror" name="nama_calon"
                            value="{{ old('nama_calon') }}" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('nama_calon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="tempat_lahir" type="text" placeholder="{{ __('Tempat Lahir Peserta didik') }}"
                            class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
                            value="{{ old('tempat_lahir') }}" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-landmark"></span>
                            </div>
                        </div>
                        @error('tempat_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <select id="jenis_kelamin" type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror"
                            name="jenis_kelamin" value="{{ old('jenis_kelamin') }}" autocomplete="jenis_kelamin">
                            <option value="">-- Select {{ __('jenis_kelamin') }} --</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-tag"></span>
                            </div>
                        </div>
                        @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div id="pesan"></div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="tanggal_lahir" type="date" placeholder="{{ __('Tanggal Lahir Peserta didik') }}"
                            class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir') }}" autocomplete="off">

                        @error('tanggal_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <select id="pekerjaan" type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                            name="pekerjaan" value="{{ old('pekerjaan') }}" autocomplete="pekerjaan">
                            <option value="">-- Select {{ __('Pekerjaan Wali') }} --</option>
                            <option value="PNS">PNS</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Swasta">Pegawai Swasta</option>
                            <option value="Pekerja Lepas">Pekerja Lepas</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-tag"></span>
                            </div>
                        </div>
                        @error('pekerjaan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div id="pesan"></div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="anak_ke" type="text" placeholder="{{ __('Anak ke') }}"
                            class="form-control @error('anak_ke') is-invalid @enderror" name="anak_ke"
                            value="{{ old('anak_ke') }}" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa-solid fa-people-group"></i>
                            </div>
                        </div>
                        @error('anak_ke')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="jumlah_saudara" type="text" placeholder="{{ __('Jumlah Saudara') }}"
                            class="form-control @error('jumlah_saudara') is-invalid @enderror" name="jumlah_saudara"
                            value="{{ old('jumlah_saudara') }}" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa-solid fa-people-group"></i>
                            </div>
                        </div>
                        @error('jumlah_saudara')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input id="rt_rw" type="text" placeholder="{{ __('RT/RW') }}"
                            class="form-control @error('rt_rw') is-invalid @enderror" name="rt_rw"
                            value="{{ old('rt_rw') }}" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-house"></span>
                            </div>
                        </div>
                        @error('rt_rw')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <select id="agama" type="text" class="form-control @error('agama') is-invalid @enderror"
                            name="agama" value="{{ old('agama') }}" autocomplete="agama">
                            <option value="">-- Select {{ __('Agama') }} --</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-tag"></span>
                            </div>
                        </div>
                        @error('agama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div id="pesan"></div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="alamat" type="text" placeholder="{{ __('alamat lengkap') }}"
                            class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                            value="{{ old('alamat') }}" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa-solid fa-house"></i>
                            </div>
                        </div>
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="telepon" type="text" placeholder="{{ __('Telepon/No HP') }}"
                            class="form-control @error('telepon') is-invalid @enderror" name="telepon"
                            value="{{ old('telepon') }}" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                        </div>
                        @error('telepon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input id="desa_kelurahan" type="text" placeholder="{{ __('Desa/Kelurahan') }}"
                            class="form-control @error('desa_kelurahan') is-invalid @enderror" name="desa_kelurahan"
                            value="{{ old('desa_kelurahan') }}" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa-solid fa-house"></i>
                            </div>
                        </div>
                        @error('desa_kelurahan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input id="kecamatan" type="text" placeholder="{{ __('Kecamatan') }}"
                            class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan"
                            value="{{ old('kecamatan') }}" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa-solid fa-house"></i>
                            </div>
                        </div>
                        @error('kecamatan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input id="kabupaten_kota" type="text" placeholder="{{ __('Kabupaten/Kota') }}"
                            class="form-control @error('kabupaten_kota') is-invalid @enderror" name="kabupaten_kota"
                            value="{{ old('kabupaten_kota') }}" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa-solid fa-building"></i>
                            </div>
                        </div>
                        @error('kabupaten_kota')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input id="provinsi" type="text" placeholder="{{ __('Provinsi') }}"
                            class="form-control @error('provinsi') is-invalid @enderror" name="provinsi"
                            value="{{ old('provinsi') }}" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa-solid fa-house"></i>
                            </div>
                        </div>
                        @error('provinsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input id="kode_pos" type="text" placeholder="{{ __('Kode Pos') }}"
                            class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos"
                            value="{{ old('kode_pos') }}" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-mobile"></span>
                            </div>
                        </div>
                        @error('kode_pos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="jarak" type="text" readonly
                            placeholder="{{ __('Jarak Rumah Dari Sekolah dalam (KM)') }}"
                            class="form-control @error('jarak') is-invalid @enderror" name="jarak"
                            value="{{ old('jarak') }}" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <a onclick="getLocation()"><span class="fas fa-map-marker-alt"></span></a>
                            </div>
                        </div>
                        @error('jarak')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="row">
                        <div class="col-md-3 mt-2">
                            <label for="file_ktp">Unggah Akta calon siswa</label>
                        </div>
                        <div class="col-md-9">
                            <div class="input-group mb-3">

                                <input id="file_akta" type="file" placeholder="{{ __('File Akta') }}"
                                    class="form-control @error('file_akta') is-invalid @enderror" name="file_akta"
                                    value="{{ old('file_akta') }}" autocomplete="off">

                                @error('file_akta')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-3 mt-2">
                            <label for="file_ktp">Unggah KK</label>
                        </div>
                        <div class="col-md-9">
                            <div class="input-group mb-3">
                                <input id="file_kk" type="file" placeholder="{{ __('File KK') }}"
                                    class="form-control @error('file_kk') is-invalid @enderror" name="file_kk"
                                    value="{{ old('file_kk') }}" autocomplete="off">

                                @error('file_kk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-3 mt-2">
                            <label for="file_ktp">Unggah KTP</label>
                        </div>
                        <div class="col-md-9">
                            <div class="input-group mb-3">
                                <input id="file_ktp" type="file" placeholder="{{ __('File KTP') }}"
                                    class="form-control @error('file_ktp') is-invalid @enderror" name="file_ktp"
                                    value="{{ old('file_ktp') }}" autocomplete="off">

                                @error('file_ktp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="text-center">
                <div class="row mb-3">
                    <div class="col-6">
                        <a href="/" class="text-center btn btn-light text-blue">Ke Halaman Beranda</a>
                    </div>
                    <!-- /.col -->
                    <div class="col-6 justify-content-end">
                        <input type="submit" class="btn btn-primary btn-block" onclick="this.form.submit();this.disabled = true;" value="Daftar"/>
                    </div>
                    <!-- /.col -->
                </div>
            </div>


        </form>
    </div>
@endsection
@section('script')
    <script>
        var jarak = document.getElementById("jarak")

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                jarak.innerHTML = "Geolocation is not supported by this browser.";
            }

        }

        function showPosition(position) {
            var calculate = calcCrow(-6.9000677,107.6274001, position.coords.latitude, position.coords.longitude).toFixed(
                1);
            alert('Jarak tempat anda saat ini ke sekolah adalah ' + calculate + ' KM');
            jarak.value = calculate;
        }

        function calcCrow(lat1, lon1, lat2, lon2) {
            var R = 6371; // km
            var dLat = toRad(lat2 - lat1);
            var dLon = toRad(lon2 - lon1);
            var lat1 = toRad(lat1);
            var lat2 = toRad(lat2);

            var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.sin(dLon / 2) * Math.sin(dLon / 2) * Math.cos(lat1) * Math.cos(lat2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            var d = R * c;
            return d;
        }

        // Converts numeric degrees to radians
        function toRad(Value) {
            return Value * Math.PI / 180;
        }
    </script>
@endsection
