<x-layout_user>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <ul class="info">
                        <li><i class="fa fa-envelope"></i> {{ $landingPage->email ?? 'info@company.com' }}</li>
                        <li><i class="fa fa-map"></i> {{ $landingPage->address ?? 'No Address Added' }}</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4">
                    <ul class="social-links">
                        {{-- <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="https://x.com/minthu" target="_blank"><i class="fab fa-twitter"></i></a></li> --}}
                        <li><a href="{{ $landingPage->url }}"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="{{ $landingPage->url_ig }}"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/" class="logo">
                            <h1>Opendoorz</h1>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="/" class="active">Beranda</a></li>
                            <li><a href="/property">Properti</a></li>
                            {{-- <li><a href="/details-property">Property Details</a></li> --}}
                            <li><a href="/contact">Kontak Kami</a></li>
                            <li><a href="/show-link"><i class="fab fa-whatsapp fa-lg"></i> Hubungi Admin</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner">
        <div class="owl-carousel owl-banner">
            <div class="item item-1">
                <div class="header-text">
                    <span class="category">Beachfront Villa, <em>Malang</em></span>
                    <h2>Hurry!<br>Get the Best Villa for you</h2>
                </div>
            </div>
            <div class="item item-2">
                <div class="header-text">
                    <span class="category">Luxury Villa, <em>Malang</em></span>
                    <h2>Be Quick!<br>Get the best villa in town</h2>
                </div>
            </div>
            <div class="item item-3">
                <div class="header-text">
                    <span class="category">Elegant Townhouse, <em>Blitar</em></span>
                    <h2>Act Now!<br>Get the highest level penthouse</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="featured section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-image">
                        <img src="user/assets/images/featured.jpg" alt="">
                        <a href="#"><img src="user/assets/images/featured-icon.png" alt=""
                                style="max-width: 60px; padding: 0px;"></a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="section-heading">
                        <h6>| Tentang kami</h6>
                        <h2>Opendoorz Real Estate</h2>
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Apa visi dan misi kami?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Visi kami adalah menjadi <strong>agen real estate terpercaya</strong> yang
                                    menghubungkan pelanggan
                                    dengan properti terbaik sesuai kebutuhan mereka. Misi kami adalah memberikan layanan
                                    profesional, transparan, dan inovatif untuk memastikan setiap transaksi properti
                                    berjalan lancar dan menguntungkan bagi semua pihak.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Keunggulan perusahaan ini?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Kami <strong>mengutamakan kualitas layanan</strong> dengan pendekatan personal, tim
                                    ahli yang
                                    berpengalaman, serta akses ke berbagai properti eksklusif. Dengan teknologi terkini
                                    dan jaringan luas, kami memastikan pelanggan mendapatkan pilihan properti terbaik
                                    dengan proses yang cepat dan mudah.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Tim dan pengalaman kami?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Tim kami terdiri dari <strong>profesional real estate dengan pengalaman
                                        bertahun-tahun</strong> dalam
                                    industri properti. Dengan keahlian dalam negosiasi, analisis pasar, dan layanan
                                    pelanggan, kami siap membantu pelanggan menemukan, membeli, atau menjual properti
                                    dengan strategi yang tepat.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info-table">
                        <ul>
                            <li>
                                <h3>Pelayanan</h3>
                            </li>
                            <li>
                                <img src="user/assets/images/home-insurance.png" alt=""
                                    style="max-width: 52px;">
                                <h4>Secure Area<br><span>24/7 Pos Satpam</span></h4>
                            </li>
                            <li>
                                <img src="user/assets/images/house-clean.png" alt=""
                                    style="max-width: 52px;">
                                <h4>Clean Area<br><span>Pengelolaan Sampah</span></h4>
                            </li>
                            <li>
                                <img src="user/assets/images/type.png" alt="" style="max-width: 52px;">
                                <h4>Type Property<br><span>Tersedia {{ $categoryCounts }} Tipe</span></h4>
                            </li>
                            <li>
                                <img src="user/assets/images/online-payment.png" alt=""
                                    style="max-width: 52px;">
                                <h4>Payments<br><span>KPR, Bank, Tunai</span></h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="video section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading text-center">
                        <h6 style="background-color: white; padding: 10px; display: inline-block; border-radius: 3px;">
                            | Video Preview</h6>

                        <h2>Sekilas tentang property kami</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="video-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="video-frame">
                        @php
                            $images = !empty($landingPage->thumbnails)
                                ? json_decode($landingPage->thumbnails, true)
                                : [];
                            $imagePath =
                                !empty($images) && isset($images[0])
                                    ? asset('storage/' . $images[0])
                                    : asset('user/assets/images/video-frame.jpg');
                        @endphp
                        <img src="{{ $imagePath }}" alt="">
                        <a href="{{ $landingPage->url }}" target="_blank"><i class="fa fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fun-facts">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="counter">
                                    <h2 class="timer count-title count-number"
                                        data-to="{{ $propertyCounts['total'] }}" data-speed="1000"></h2>
                                    <p class="count-text ">Total<br>Properti</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="counter">
                                    <h2 class="timer count-title count-number"
                                        data-to="{{ $landingPage->experience }}" data-speed="1000"></h2>
                                    <p class="count-text ">Tahun<br> Pengalaman</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="counter">
                                    <h2 class="timer count-title count-number"
                                        data-to="{{ $propertyCounts['sold'] }}" data-speed="1000"></h2>
                                    <p class="count-text ">Properti<br>Terjual</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="properties section">
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading text-center">
                        <h6>| Properti</h6>
                        <h2>Cek Property terbaru dari kami</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($property as $user)
                    <div class="col-lg-4 col-md-6">
                        <div class="item">
                            @php
                                $images = json_decode($user->images, true);
                                $imageSrc =
                                    $images && count($images) > 0
                                        ? asset('storage/' . $images[0])
                                        : 'user/assets/images/default-images.png';
                            @endphp
                            <a href="{{ route('user.show', $user->id) }}">
                                <img src="{{ $imageSrc }}" alt="Property Image" width="350" height="260">
                            </a>
                            <span class="category">{{ $user->categoryType->name }}</span>
                            <h6>Rp. {{ number_format($user->price, 2) }}</h6>
                            <h4>
                                <a href="{{ route('user.show', $user->id) }}">{{ $user->title }}</a>
                            </h4>
                            <ul>
                                <li>Kamar tidur: <span>{{ $user->bedrooms }}</span></li>
                                <li>Kamar mandi: <span>{{ $user->bathrooms }}</span></li>
                                <li>Area: <span>{{ $user->area }}m²</span></li>
                                <li>Lantai: <span>{{ $user->floor }}</span></li>
                                <li>Garasi: <span>{{ $user->parking ?? 'N/A' }}</span></li>
                            </ul>
                            <div class="main-button">
                                <a href="{{ route('user.show', $user->id) }}">Detail Properti</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="contact section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading text-center">
                        <h6 style="background-color: white; padding: 10px; display: inline-block; border-radius: 3px;">
                            | Hubungi kami</h6>

                        {{-- <h6>| Hubungi kami</h6> --}}
                        <h2>Hubungi konsultan kami untuk informasi lengkap</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div id="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2989.9181495592356!2d112.60476565245528!3d-7.944156799745218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78826c66a7e6df%3A0x2b4c8886fafaca5b!2sTaman%20Singha%20Merjosari!5e0!3m2!1sid!2sid!4v1740618102852!5m2!1sid!2sid"
                            width="100%" height="500px" frameborder="0"
                            style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);"
                            allowfullscreen=""></iframe>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="item phone">
                                <img src="user/assets/images/icons8-phone-100.png" alt=""
                                    style="max-width: 55px;">
                                <h6 style="font-size: 14pt">{{ $landingPage->number ?? '0000-0000-0000' }}<br><span>Phone Number</span>
                                </h6>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="item email">
                                <img src="user/assets/images/icons8-email-100.png" alt=""
                                    style="max-width: 55px;">
                                <h6 style="font-size: 12pt">{{ $landingPage->email ?? 'info@company.com' }}<br><span>Business Email</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif --}}
                <div class="col-lg-5">
                    <form id="contact-form" action="{{ route('review.store') }}" method="POST">
                        @csrf
                        <h3>Ulas Pelayanan Kami</h3><br>
                        <div class="row">
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Nama Anda..." autocomplete="on" required
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="email">Alamat Email</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Email Anda..." required value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="nomor">Nomor Handphone</label>
                                    <input type="number" name="nomor" id="nomor"
                                        class="form-control @error('nomor') is-invalid @enderror"
                                        placeholder="Nomer Anda..." autocomplete="on" required
                                        value="{{ old('nomor') }}">
                                    @error('nomor')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="deskripsi">Ulasan</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"
                                        placeholder="Ulasan Anda...">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </fieldset>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button> --}}
                                </div>
                            @endif

                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="btn btn-primary">Send
                                        Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <style>
        hr {
            border: none;
            height: 2px;
            background: linear-gradient(to right, rgba(128, 128, 128, 0) 0%, rgba(128, 128, 128, 0.5) 50%, rgba(128, 128, 128, 0) 100%);
            margin: 20px 0;
        }
    </style>
</x-layout_user>
