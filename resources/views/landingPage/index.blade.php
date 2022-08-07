<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>Sistem Informasi Akademik SDN 185 Cihaurgeulis</title>
    <style>
        .school{
            border-bottom-left-radius: 15px;
        }

        #tatacara{
            transition: 0.5s;
        }
    </style>
</head>
<body>
    {{-- <header class="sticky top-0 opacity-80">
        <div class="py-3 px-16 bg-slate-100 flex justify-between bg-blue-500 text-white">
            <div class="inline-flex">
                <img src="https://yt3.ggpht.com/ytc/AKedOLQYlt6mu8CHwCJr5LSe9gP9CaqKZPk-VEYtzlGDFw=s900-c-k-c0x00ffffff-no-rj" alt="Logo SDN 185 Cihaurgeulis" class="h-14">
                <span class="mt-[13px] ml-3 font-semibold text-lg">SDN 185 Cihaurgeulis</span>
            </div>
            <div class="inline-flex mt-4 font-semibold">
       			<a href="/"><span class="mr-9 hover:text-gray-800 duration-250">Beranda</span></a>
                <a href="#tatacara"><span class="mr-9 hover:text-gray-800 duration-250">Tata Cara PPDB</span></a>
              <a href="#lokasi"><span class="mr-9 hover:text-gray-800 duration-250">Lokasi</span></a>
                <a href="#about"><span class="mr-9 hover:text-gray-800 duration-250">Tentang Sekolah</span></a>
             
                @auth
                <a href="/img/sman2.png"><span class="mr-9 hover:text-gray-800 duration-250">Dashboard</span></a>
                <form action="" method="POST">
                    @csrf
                    <button class="submit"><span class="hover:text-gray-800 duration-250">Logout</span></button>
                </form>
             
                @else
                <a href="{{ route('home') }}"><span class="hover:text-gray-800 duration-250">Login</span></a>
                @endauth
            
            </div>
        </div>
    </header> --}}
  <header class="sticky top-0 opacity-90">
    <nav class="p-5 bg-blue-500 shadow md:flex md:items-center md:justify-between">
        <div class="flex justify-between items-center ">
          <span class="text-2xl font-[Poppins] cursor-pointer">
            <img class="h-10 inline"
              src="/img/logo.png">
              <span class=" ml-3 font-semibold text-lg">SDN 185 Cihaurgeulis</span>
          </span>
    
          <span class="text-3xl cursor-pointer mx-2 md:hidden block">
            <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
          </span>
        </div>
    
        <ul class="md:flex md:items-center md:z-auto md:static absolute w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500 bg-blue-500">
          <li class="mx-4 my-6 md:my-0">
            <a href="/" class="text-white hover:text-gray-900 duration-500">Beranda</a>
          </li>
            <li class="mx-4 my-6 md:my-0">
            <a href="#about" class="text-white hover:text-gray-900 duration-500">Tentang Sekolah</a>
          </li>
          <li class="mx-4 my-6 md:my-0">
            <a href="#tatacara" class="text-white hover:text-gray-900 duration-500">Tata Cara PPDB</a>
          </li>
          <li class="mx-4 my-6 md:my-0">
            <a href="#lokasi" class="text-white hover:text-gray-900 duration-500">Lokasi</a>
          </li>
          
          @auth
          <a href="{{ route('home') }}"><span class="mr-9 hover:text-gray-800 duration-250"><span class="mr-9 hover:text-gray-800 duration-250">Dashboard</span></a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-cyan-400 text-white font-[Poppins] duration-500 px-6 py-2 mx-4 hover:bg-cyan-500 rounded ">Logout</button>
                </form>
          @else
            <a href="{{ route('home') }}"><button class="bg-cyan-400 text-white font-[Poppins] duration-500 px-6 py-2 mx-4 hover:bg-cyan-500 rounded ">Login</button></a>
            <h2 class=""></h2>
          @endauth
        </ul>
      </nav>
      </header>
    
    <section>
        <div class="lg:grid lg:grid-cols-2 gap-4 bg-slate-100">
            <div class="w-full px-4 lg:px-[75px] lg:mt-36 mt-10">
                <p class="text-5xl font-base tracking-wider">Sistem Informasi</p>
                <p class="text-6xl font-bold tracking-wider uppercase text-blue-500">Akademik</p>
                <p class="text-2xl font-bold">SDN 185 Cihaurgeulis</p>
                <p class="mt-5 mb-5">Jl. Surapati No.82, Cihaurgeulis, Kec. Cibeunying Kaler, Kota Bandung, Jawa Barat.</p>
                <a href="/pendaftaran">
                    <button class="px-5 py-2 bg-blue-500 rounded text-white font-semibold shadow-md hover:bg-blue-600 duration-300" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">Daftar Sekarang</button>
                </a>
            </div>
            <div class="w-full px-4 lg:px-0 mt-5 lg:mt-0">
                <img src="/img/gurusd.jpg" alt="" class="school">
            </div>
        </div>
    </section>

    <section class="lg:mx-[75px] mx-4" id="about">
        <div class="lg:grid lg:grid-cols-2 gap-4 mt-20">
            <div class="w-full">
                <img src="/img/sd185.jpg" alt="" class="rounded-xl">
            </div>
            <div class="w-full lg:ml-7 lg:mt-28 mt-12">
                <h1 class="text-4xl font-semibold text-blue-500">Tentang Sekolah</h1>
                <p class="mt-5">Pada awal pembentukannya SDN 185 Cihaurgeulis merupakan Sekolah Dasar yang menginduk ke SDN 132 Cihaurgeulis.SDN 185 Cihaurgeullis merupakan sekolah terletak di wilayah Kecamatan Cibeunying Kaler Kota Bandung, lebih tepatnya berada di Jl. Surapati No.82, Cihaur Geulis, Kec. Cibeunying Kaler, Kota Bandung, Jawa Barat. SDN 185 Cihaurgeulis sudah ter Akreditasi A, dan memiliki 12 ruang kelas untuk belajar. </p>
            </div>
        </div>
    </section>
      
    <section class="lg:mx-[75px] mt-20" id="tatacara">
        <h1 class="text-4xl font-bold text-center">Tata Cara PPDB</h1>
        <div class="h-1 bg-blue-700 w-72 mx-auto mt-5"></div>
        <div class="px-10 py-10 bg-blue-500 mx-4 lg:mx-[18rem] mt-12">
            <div class="px-5 py-5 bg-white rounded">
                <p>1. Calon siswa/orang tua/wali siswa mengakses situs SDN 185 Cihaurgeulis yaitu : www.sdn185cihaurgeulis.online</p>
            </div>
            <div class="px-5 py-5 bg-white rounded mt-5">
                <p>2. Lalu tekan tombol "daftar sekarang" untuk melakukan pendaftaran menjadi siswa</p>
            </div>
            <div class="px-5 py-5 bg-white rounded mt-5">
                <p>3. Mengisi formulir pendaftaran dan mengunggah persyaratan(Akta Lahir Calon siswa, Kartu Keluarga dan KTP orang tua/wali)</p>
            </div>
            <div class="px-5 py-5 bg-white rounded mt-5">
                <p>4. Setelah selesai melakukan pendaftaran, calon siswa, diharapkan menunggu pemberitahuan melalui email terkait hasil pendaftaran</p>
            </div>
            <div class="px-5 py-5 bg-white rounded mt-5">
                <p>5. Jika dinyatakan lolos, maka siswa diharapkan untuk melakukan daftar ulang ke sekolah, dengan membawa persyaratan (Akta lahir calon siswa, Kartu Keluarga, Ktp orang tua/wali)</p>
            </div>
        </div>
    </section>
      
      <section class="lg:mx-[75px] mt-20" id="lokasi">
        <h1 class="text-4xl font-bold text-center">Lokasi</h1>
        <div class="h-1 bg-blue-700 w-72 mx-auto mt-5"></div>
        <div class="px-10 py-10 bg-blue-500 mx-4 lg:mx-[18rem] mt-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.920864160576!2d107.6274001145926!3d-6.900067695014137!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7b110b8525b%3A0x64d7d12988ecdc88!2sSDN%20Cihaurgeulis!5e0!3m2!1sid!2sid!4v1658667877024!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <script>
        function Menu(e){
          let list = document.querySelector('ul');
          e.name === 'menu' ? (e.name = "close",list.classList.add('top-[80px]') , list.classList.add('opacity-100')) :( e.name = "menu" ,list.classList.remove('top-[80px]'),list.classList.remove('opacity-100'))
        }
    </script>
    

</body>
</html>