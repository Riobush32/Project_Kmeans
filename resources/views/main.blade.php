<!doctype html>
<html data-theme="garden">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clustering</title>
    <link rel="icon" href="{{ asset('img/kabasahan.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="font-poppins">

    @include('components.alert')

    <div class="bg-primary-focus w-full h-32 md:h-[40vh] -z-50 fixed left-0 top-0">
        <div class="absolute top-7 right-5 lg:hidden">
            {{-- toogle --}}
            <label class="btn btn-circle swap swap-rotate bg-transparent border-none">

                <!-- this hidden checkbox controls the state -->
                <input type="checkbox" onclick="hideSidebar()" />

                <!-- hamburger icon -->
                <svg class="swap-off fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                    viewBox="0 0 512 512">
                    <path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z" />
                </svg>

                <!-- close icon -->
                <svg class="swap-on fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                    viewBox="0 0 512 512">
                    <polygon
                        points="400 145.49 366.51 112 256 222.51 145.49 112 112 145.49 222.51 256 112 366.51 145.49 400 256 289.49 366.51 400 400 366.51 289.49 256 400 145.49" />
                </svg>

            </label>
        </div>


    </div>


    <div class="z-10">

        <div class="hidden lg:block z-20" id="sidebar">
            @include('layouts.sidebar')
        </div>

        <div class="bg-transparent fixed w-[70%]">

            <div
                class="w-[90%] ml-3 lg:ml-[30vw] laptop:ml-[25vw] ds:ml-[23vw] xl:ml-[20wh] lg:w-[80vw] h-full mt-[3vh]">
                @include('layouts.navbar')

                @yield('content')

            </div>
        </div>

        <script>
            let sidebar = document.getElementById('sidebar');

            function hideSidebar() {
                sidebar.classList.toggle('hidden')
            }

        </script>
</body>

</html>