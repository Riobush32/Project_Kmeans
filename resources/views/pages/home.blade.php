@extends('auth')

@section('auth')
<div class="flex w-[100vw] justify-center items-center">
    <div class="navbar bg-base-100 absolute z-20 rounded-lg w-[97vw] top-5">
        <div class="flex-1">
            <div class="dropdown md:hidden">
                <label tabindex="0" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </label>
                <ul tabindex="0"
                    class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    @guest
                    <li><a href="{{ route('login') }}">Sign-In</a></li>
                    {{-- <li><a href="{{ route('register') }}">Sign-Up</a></li> --}}

                    @else
                    @if (Auth::user()->role == 'superadmin')
                    {{-- <li><a href="{{ url('/user') }}">User Data</a></li> --}}
                    <li><a href="{{ url('/data/industri') }}">Proses</a></li>

                    @elseif (Auth::user()->role == 'admin')
                    <li><a href="{{ url('/data/industri') }}">Proses</a></li>
                    @endif

                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                            document.getElementById('logout-form').submit();">
                            {{ Auth::user()->name }}
                        </a>
                    </li>

                    @endguest

                </ul>
            </div>

            <a class="btn btn-ghost normal-case text-xl">Dinas  Koperasi Perdagangan dan Perindustrian</a>
        </div>


        <div class="flex-none">

            @guest
            <a href="{{ route('login') }}"
                class="btn btn-outline btn-primary border-none mx-1 hidden md:flex">Sign-In</a>
            {{-- <a href="{{ route('register') }}"
                class="btn btn-outline btn-primary border-none mx-1 hidden md:flex">Sign-Up</a> --}}

            @else
            @if (Auth::user()->role == 'superadmin')
            {{-- <a href="{{ url('/user') }}" class="btn btn-outline btn-primary border-none mx-1 hidden md:flex">User
                Data</a> --}}
            <a href="{{ url('/data/industri') }}" class="btn btn-outline btn-primary border-none mx-1 hidden md:flex">Proses</a>
            @elseif (Auth::user()->role == 'admin')
            <a href="{{ url('/data/industri') }}" class="btn btn-outline btn-primary border-none mx-1 hidden md:flex">Proses</a>
            @endif

            <a href="" class="btn btn-outline btn-primary border-none mx-1 hidden md:flex">{{ Auth::user()->name }}</a>
            <a href="{{ route('logout') }}" class="btn btn-outline btn-primary border-none mx-1" onclick="event.preventDefault(); 
                document.getElementById('logout-form').submit();">
                Log-Out
            </a>

            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
            </form>

            @endguest
        </div>





    </div>
</div>

<div class="hero min-h-screen bg-base-200 bg-[url('../../../public/img/industri.png')]">
    <div class="hero-content text-center bg-slate-900 bg-opacity-30 rounded-2xl">
        <div class="w-[90vw] p-10">
            <h1 class="text-5xl font-bold text-slate-100">Profil Instansi</h1>
            <p class="py-6 text-slate-200">
                Terhitung mulai 2 Januari 2014 Dinas Koperasi dan UMKM Kabupaten Asahan merger dengan Dinas Perindustrian dan
                Perdagangan Kabupaten Asahan Menjadi Dinas Koperasi Perindustrian dan Perdagangan Kabupaten Asahan.
                Dengan Terbinya Perda Nomor 8 tahun 2013 tanggal 2 september 2013 tentang organisasi dan tata kerja dinas-dinas daerah
                Kabupaten Asahan.
                Dan pada januari 2017 Dinas Koperasi Perindustrian dan Perdagangan berubah menjadi Dinas Koperasi Perdagangan, dimana
                bidang Perindustrian beralih ke Dinas Ketenagakerjaan dengan dasar hukum peraturan daerah Kabupaten Asahan Nomor 7 tahun
                2016 tentang pembekuan perangkat daerah Kabupaten Asahan.
                Dan pada Oktober 2022 Dinas Koperasi dan Peragangan berubah menjadi Dinas Koperasi, Perdagangan dan Perindustrian yang
                sesuai dengan peraturan daerah Kabupaten Asahan Nomor 2 tahun 2022 tentang perubahan atas peraturan daerah Kabupaten
                Asahan Nomor 7 tahun 2016 tentang pembekuan perangkat daerah Kabupaten, dimana bidang perindustrian beralih kembali ke
                Dinas Koperasi, Perdagangan dan Perindustrian Kabupaten Asahan.
            </p>
        </div>
    </div>
</div>



@endsection