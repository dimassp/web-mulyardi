@extends('template_backend.home')
@section('heading', 'Data Ajaran')
@section('page')
    <li class="breadcrumb-item active">Data Ajaran</li>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".tambah-ajaran">
                        <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Ajaran
                    </button>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun Ajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>@php
                        $no = 1;
                    @endphp
                        @foreach ($ajaran as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->tahun_ajaran }}</td>
                                <td>

                                    <a href="{{ route('verifikasi.index', Crypt::encrypt($data->id)) }}"
                                        class="btn btn-info btn-sm"><i class="nav-icon fas fa-search-plus"></i> &nbsp;
                                        Details</a>
                                    <a href="{{ route('verifikasi.ajaran.edit', Crypt::encrypt($data->id)) }}"
                                        class="btn btn-warning btn-sm"><i class="nav-icon fas fa-edit"></i> &nbsp;
                                        Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Extra large modal -->
    <div class="modal fade bd-example-modal-md tambah-ajaran" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Ajaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('verifikasi.ajaran.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tahun_ajaran">Tahun Ajaran</label>
                                    <input id="tahun_ajaran" type="text" placeholder="{{ __('Tahun Ajaran') }}"
                                        class="form-control @error('tahun_ajaran') is-invalid @enderror" name="tahun_ajaran"
                                        value="{{ old('tahun_ajaran') }}" autocomplete="tahun_ajaran">
                                    @error('tahun_ajaran')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
    </div>
@endsection
@section('script')
    <script>
        $("#VerifikasiIndex").addClass("active");
    </script>
@endsection
