<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Fonts Family --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"rel="stylesheet">

    {{-- Swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- MDB -->
    <link href="https://cdn.jsdelivr.net/npm/mdb-ui-kit@8.2.0/css/mdb.min.css" rel="stylesheet" />
</head>

<body>
    <x-nav></x-nav>

    <div class="min-vh-100">
        {{ $slot }}
    </div>

    <x-footer></x-footer>

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/bbfbb37e6e.js" crossorigin="anonymous"></script>
    {{-- Swiper --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.2.0/mdb.umd.min.js"></script>
</body>

</html>
