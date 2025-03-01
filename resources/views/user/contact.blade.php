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
                        <li><i class="fa fa-envelope"></i> info@company.com</li>
                        <li><i class="fa fa-map"></i> Sunny Isles Beach, FL 33160</li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4">
                    <ul class="social-links">
                        {{-- <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="https://x.com/minthu" target="_blank"><i class="fab fa-twitter"></i></a></li> --}}
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
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
                            <li><a href="/">Beranda</a></li>
                            <li><a href="/property">Properti</a></li>
                            {{-- <li><a href="/details-property">Property Details</a></li> --}}
                            <li><a href="/contact" class="active">Kontak kami</a></li>
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

    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="breadcrumb"><a href="#">Home</a> / Kontak kami</span>
                    <h3>Kontak kami</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-page section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h6>| Hubungi Kami</h6>
                        <h2>Terhubung dengan Konsultan Kami</h2>
                    </div>
                    <p>Ketika Anda membutuhkan bantuan dari para ahli, jangan ragu untuk menghubungi konsultan kami. Tim
                        profesional kami siap memberikan solusi terbaik sesuai kebutuhan Anda. Hubungi kami sekarang
                        untuk konsultasi lebih lanjut dan dapatkan layanan terbaik dari kami.
                    </p>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="item phone">
                                <img src="user/assets/images/icons8-phone-100.png" alt=""
                                    style="max-width: 52px;">
                                <h6>0{{ $landingPage->number }}<br><span>Phone Number</span></h6>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="item email">
                                <img src="user/assets/images/icons8-email-100.png" alt=""
                                    style="max-width: 52px;">
                                <h6 style="font-size: 13pt">{{ $landingPage->email }}<br><span>Business Email</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="col-lg-6">
                    <form id="contact-form" action="{{ route('review.store') }}" method="POST">
                        @csrf
                        <h3>Ulas Pelayanan Kami</h3>
                        <br>
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
                                        class="form-control @error('nomor') is-invalid @enderror" placeholder="Nomer Anda..."
                                        autocomplete="on" required value="{{ old('nomor') }}">
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
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="btn btn-primary">Send
                                        Message</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-12">
                    <div id="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2989.9181495592356!2d112.60476565245528!3d-7.944156799745218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78826c66a7e6df%3A0x2b4c8886fafaca5b!2sTaman%20Singha%20Merjosari!5e0!3m2!1sid!2sid!4v1740618102852!5m2!1sid!2sid"
                            width="100%" height="500px" frameborder="0"
                            style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);"
                            allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout_user>
