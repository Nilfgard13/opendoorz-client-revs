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

    {{-- <footer>
        <div class="container">
            <div class="col-lg-6">
                <p>Copyright © 2048 Villa Agency Co., Ltd. All rights reserved.
                    Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a>
                </p>
            </div>
        </div>
    </footer> --}}

    <footer class="bg-dark py-5">
        <div class="container">
            <div class="row mb-4">
                <!-- Contact Info -->
                <h2 class="text-white mb-5">Opendoorz Real Estate</h2>
                <div class="col-md-4 mb-4">
                    <h3 class="h5 text-white mb-3">Contact Us</h3>
                    <address class="text-light mb-0">
                        <x-email>{{ $email }}</x-email>
                        <x-address>{{ $address }}</x-address>
                        <x-phone-number>{{ $number }}</x-phone-number>
                    </address>
                </div>

                <!-- Category Writing -->
                <div class="col-md-4 mb-4">
                    <h3 class="h5 text-white mb-3">Category Writing</h3>
                    <ul class="list-unstyled text-light">
                        <li class="mb-2">
                            <a href="#" class="text-light">Real Estate</a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="text-light">Properti</a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="text-light">Perumahan</a>
                        </li>
                    </ul>
                </div>

                <!-- Links -->
                <div class="col-md-4 mb-4">
                    <h3 class="h5 text-white mb-3">Link Page</h3>
                    <ul class="list-unstyled text-light">
                        <li class="mb-2">
                            <a href="/" class="text-light">Home</a>
                        </li>
                        <li class="mb-2">
                            <a href="/property" class="text-light">Properti</a>
                        </li>
                        <li class="mb-2">
                            <a href="/contact" class="text-light">Kontak Kami</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Social Media and Copyright -->
            <div class="border-top border-secondary pt-4">
                <p>Copyright © 2048 Villa Agency Co., Ltd. All rights reserved.
                    Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a>
                </p>    
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
