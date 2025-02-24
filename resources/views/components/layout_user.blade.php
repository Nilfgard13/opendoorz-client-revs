<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <x-title>{{ $title }}</x-title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="shortcut icon" type="image/png"
        href="{{ asset('admin/assets/images/logos/Artboard 11 copy 4@300x.png') }}" />
    <link rel="stylesheet" href="{{ asset('user/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!--

TemplateMo 591 villa agency

https://templatemo.com/tm-591-villa-agency

-->
</head>

<body>

    {{-- content --}}
    {{ $slot }}

    <footer>
        <div class="container">
            <div class="col-lg-8">
                <p>Copyright © 2048 Villa Agency Co., Ltd. All rights reserved.

                    Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('user/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('user/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('user/assets/js/counter.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom.js') }}"></script>

</body>

</html>
