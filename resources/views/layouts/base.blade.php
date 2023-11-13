<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'ABIB SOFT Sass v1.0')</title>
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>

    @include('partials.navbar')

    <div @class(['container', "mt-5"])>
        @yield('content')
    </div>

    <div class="footer">
        Provide By ABIB copyrights 2023
    </div>

    <!-- Bootstrap Bundle with Popper -->
<!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>-->
<!--    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>-->

</body>

</html>
