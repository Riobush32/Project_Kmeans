<!doctype html>
<html data-theme="cupcake">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    @vite('resources/css/app.css')
</head>

<body>
    <div class="w-11/12 mx-auto">
        @include('components.navbar')

        <img src="{{ asset('img/dataAnalist.jpg') }}" alt="dataAnalist">
    </div>
</body>

</html>
