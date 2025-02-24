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
                            <li><a href="/">Home</a></li>
                            <li><a href="/property">Properties</a></li>
                            {{-- <li><a href="/details-property" class="active">Property Details</a></li> --}}
                            <li><a href="/contact">Contact Us</a></li>
                            <li><a href="/show-link"><i class="fab fa-whatsapp fa-lg"></i> Contact Admin</a></li>
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
                    <span class="breadcrumb"><a href="#">Home</a> / Single Property</span>
                    <h3>{{ $property->title }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="single-property section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @php
                        $images = json_decode($property->images, true);
                        $imageSrc =
                            $images && count($images) > 0
                                ? asset('storage/' . $images[0])
                                : asset('user/assets/images/default-images.png');
                    @endphp
                    <div class="main-image">
                        <img src="{{ $imageSrc }}" alt="">
                    </div>
                    <br>
                    <br>
                    <div class="main-content">
                        <span class="category">{{ $property->categoryType->name }}</span>
                        <h4>{{ $property->title }}<br>
                            <p>{{ $property->address }}</p>
                        </h4>
                        <p>{{ $property->description }}
                        </p>
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Interesting?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body p-4 shadow rounded"
                                    style="background-color: #f9f9f9; border-left: 5px solid #354dbd;">

                                    <!-- Harga -->
                                    <div class="mb-3 text-center">
                                        <h3 class="fw-bold text-primary">Rp {{ number_format($property->price, 2) }}</h3>
                                        <p class="text-danger small">*Harga dapat berubah sewaktu-waktu</p>
                                    </div>

                                    <!-- Metode Pembayaran -->
                                    <div class="mb-4">
                                        <h5 class="fw-semibold mb-3"><i class="fas fa-credit-card me-2"></i> Metode
                                            Pembayaran:</h5>
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> KPR
                                                (Kredit Pemilikan Rumah) dari berbagai Bank</li>
                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>
                                                Cash Keras</li>
                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>
                                                Cash Bertahap (6-12 bulan)</li>
                                        </ul>
                                    </div>

                                    <!-- Bank Partner KPR -->
                                    <div class="mb-3">
                                        <h5 class="fw-semibold mb-3"><i class="fas fa-university me-2"></i> Bank Partner
                                            KPR:</h5>
                                        <div class="d-flex flex-wrap gap-3">
                                            <span class="badge bg-primary p-2">Bank Mandiri</span>
                                            <span class="badge bg-secondary p-2">BCA</span>
                                            <span class="badge bg-warning p-2">BNI</span>
                                            <span class="badge bg-danger p-2">BTN</span>
                                        </div>
                                    </div>

                                    <!-- Tombol CTA -->
                                    <div class="mt-4 text-center">
                                        <a href="/show-link"
                                            class="btn btn-lg fw-bold d-flex align-items-center justify-content-center"
                                            style="background-color: #354dbd; color: white; font-size: 1.2rem; border-radius: 10px; padding: 12px 20px; transition: all 0.3s ease-in-out;"
                                            onmouseover="this.style.backgroundColor='#1e1e1e'"
                                            onmouseout="this.style.backgroundColor='#354dbd'">
                                            <i class="fab fa-whatsapp fa-lg me-2"></i> Hubungi Kami
                                        </a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info-table">
                        <ul>
                            <li>
                                <img src="{{ asset('user/assets/images/blueprint.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>Area<br><span>{{ $property->area }} m2</span></h4>
                            </li>
                            <li>
                                <img src="{{ asset('user/assets/images/sofa-bed.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>Bedrooms<br><span>{{ $property->bedrooms }} room</span></h4>
                            </li>
                            <li>
                                <img src="{{ asset('user/assets/images/bathtub.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>Bathrooms<br><span>{{ $property->bathrooms }} room</span></h4>
                            </li>
                            <li>
                                <img src="{{ asset('user/assets/images/stairs.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>Floor<br><span>{{ $property->floor }} floor</span></h4>
                            </li>
                            <li>
                                <img src="{{ asset('user/assets/images/parking.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>Parking<br><span>24/7 Under Control</span></h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout_user>
