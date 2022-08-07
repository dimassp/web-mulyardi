@extends('template_backend.home')
@section('heading', 'Edit Ajaran')
@section('page')
  <li class="breadcrumb-item active"><a href="{{ route('verifikasi.ajaran.index') }}">Ajaran</a></li>
  <li class="breadcrumb-item active">Edit Ajaran</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Ajaran</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('verifikasi.ajaran.update', Crypt::encrypt($ajaran->id)) }}" method="post">
        @csrf
        @method('put')
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tahun_ajaran">Nama ajaran</label>
                    <input type="text" id="tahun_ajaran" name="tahun_ajaran" value="{{ $ajaran->tahun_ajaran }}" class="form-control @error('tahun_ajaran') is-invalid @enderror">
                </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <a href="#" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</a> &nbsp;
          <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Update</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#back').click(function() {
        window.location="{{ route('verifikasi.ajaran.index') }}";
        });
    });
    $("#VerifikasiIndex").addClass("active");

</script>
@endsection