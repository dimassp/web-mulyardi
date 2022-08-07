<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sistem Informasi Akademik Sekolah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="shrotcut icon" href="{{ asset('img/favicon.png') }}">
</head>

<body class="hold-transition container"
    style="background-image: url('{{ asset('img/wallup.jpg') }}'); background-size: cover; background-attachment: fixed;">
    <div class="text-center">
        <img src="/img/logo.png" width="20%" alt="">
    </div>

    <div class="login-logo" style="color: white;">
        @yield('page')
    </div>

    <div class="card">
        @yield('content')
    </div>

    <footer style="color: white;">
        <marquee>
            <strong>Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> &diams; <a target="_blank" style="color: white;">SDN 185 Cihaurgeulis</a>.
            </strong>
        </marquee>
    </footer>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <!-- page script -->

    @yield('script')

    @error('id_card')
        <script>
            toastr.error("Maaf User ini tidak terdaftar sebagai Guru SD Negeri Cihaurgeulis!");
        </script>
    @enderror
    @error('guru')
        <script>
            toastr.error("Maaf Guru ini sudah terdaftar sebagai User!");
        </script>
    @enderror
    @error('no_induk')
        <script>
            toastr.error("Maaf User ini tidak terdaftar sebagai Siswa SD Negeri Cihaurgeulis!");
        </script>
    @enderror
    @error('siswa')
        <script>
            toastr.error("Maaf Siswa ini sudah terdaftar sebagai User!");
        </script>
    @enderror
    @if (session('status'))
        <script>
            toastr.success("{{ Session('success') }}");
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            toastr.error("{{ Session('error') }}");
        </script>
    @endif

</body>

</html>
