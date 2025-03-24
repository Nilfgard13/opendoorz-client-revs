<x-layout_user>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
                            <li><a href="/">Beranda</a></li>
                            <li><a href="/property">Properti</a></li>
                            {{-- <li><a href="/details-property" class="active">Property Details</a></li> --}}
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

    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="breadcrumb"><a href="#">Home</a> / Detail Property</span>
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
                            <p>{{ $property->address }}, {{ $property->categoryLocation->name }}</p>
                        </h4>
                        <div class="container" style="max-width: 800px; word-wrap: break-word; padding: 16px;">
                            <p>{!! nl2br($property->description) !!}</p>
                        </div>
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Harga & Metode Pembayaran
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body p-4 shadow rounded"
                                    style="background-color: #f9f9f9; border-left: 5px solid #354dbd;">

                                    <!-- Harga -->
                                    <div class="mb-3 text-center">
                                        <h3 class="fw-bold text-primary">Rp {{ number_format($property->price, 2) }}
                                        </h3>
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
                                        <a href="{{ route('rotator.showLink', $property->id) }}"
                                            class="btn btn-lg fw-bold d-flex align-items-center justify-content-center"
                                            style="background-color: #1c1c1c; color: white; font-size: 1.2rem; border-radius: 10px; padding: 12px 20px; transition: all 0.3s ease-in-out;"
                                            onmouseover="this.style.backgroundColor='#354dbd'"
                                            onmouseout="this.style.backgroundColor='#1c1c1c'">
                                            <i class="fab fa-whatsapp fa-lg me-2"></i> Hubungi Agen Kami
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
                                <h4>Spesifikasi Properti</h4>
                            </li>
                            <li>
                                <img src="{{ asset('user/assets/images/blueprint.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>Area<br><span>{{ $property->area }} m2</span></h4>
                            </li>
                            <li>
                                <img src="{{ asset('user/assets/images/sofa-bed.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>Kamar tidur<br><span>{{ $property->bedrooms }} ruangan</span></h4>
                            </li>
                            <li>
                                <img src="{{ asset('user/assets/images/bathtub.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>Kamar mandi<br><span>{{ $property->bathrooms }} ruangan</span></h4>
                            </li>
                            <li>
                                <img src="{{ asset('user/assets/images/stairs.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>Lantai<br><span>{{ $property->floor }} lantai</span></h4>
                            </li>
                            <li>
                                <img src="{{ asset('user/assets/images/parking.png') }}" alt=""
                                    style="max-width: 52px;">
                                <h4>Garasi<br><span>{{ $property->parking ?? 'N/A' }} mobil</span></h4>
                            </li>
                        </ul>
                    </div>
                    <br>
                    <br>
                    <div class="info-table">
                        <ul>
                            <li>
                                <h4>Cek Properti Lainnya</h4>
                            </li>
                            @foreach ($otherProperties as $otherProperty)
                                <li class="border-b py-2">
                                    <a href="{{ route('user.show', $otherProperty->id) }}"
                                        class="flex items-center justify-between w-full">
                                        <div class="flex-1">
                                            <h5>{{ $otherProperty->title }}</h5>
                                            <span class="category">{{ $otherProperty->categoryType->name }}</span><br>
                                            <span class="category">{{ $otherProperty->address }},
                                                {{ $otherProperty->categoryLocation->name }}</span>
                                        </div>
                                        <i class="fa-solid fa-arrow-right text-gray-500 ml-4"></i>
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>


                </div>
            </div>
        </div>

    </div>

    <x-slot:email>{{ $landingPage->email }}</x-slot:email>
    <x-slot:address>{{ $landingPage->address }}</x-slot:address>
    <x-slot:number>{{ $landingPage->number }}</x-slot:number>

    {{-- <div class="section best-deal">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>| Our Sold</h6>
                        <h2>Find Your Best Deal Right Now!</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="tabs-content">
                        <div class="row">
                            <div class="nav-wrapper ">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab"
                                            data-bs-target="#appartment" type="button" role="tab"
                                            aria-controls="appartment" aria-selected="true">Appartment</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="villa-tab" data-bs-toggle="tab"
                                            data-bs-target="#villa" type="button" role="tab"
                                            aria-controls="villa" aria-selected="false" tabindex="-1">Villa
                                            House</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab"
                                            data-bs-target="#penthouse" type="button" role="tab"
                                            aria-controls="penthouse" aria-selected="false"
                                            tabindex="-1">Penthouse</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="appartment" role="tabpanel"
                                    aria-labelledby="appartment-tab">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="info-table">
                                                <ul>
                                                    <li>Total Flat Space <span>540 m2</span></li>
                                                    <li>Floor number <span>3</span></li>
                                                    <li>Number of rooms <span>8</span></li>
                                                    <li>Parking Available <span>Yes</span></li>
                                                    <li>Payment Process <span>Bank</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="{{ asset('user/assets/images/deal-01.jpg') }}" alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>All Info About Apartment</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod
                                                tempor pack incididunt ut labore et dolore magna aliqua quised ipsum
                                                suspendisse. <br><br>Swag fanny pack lyft blog twee. JOMO ethical copper
                                                mug, succulents typewriter shaman DIY kitsch twee taiyaki fixie hella
                                                venmo after messenger poutine next level humblebrag swag franzen.</p>
                                            <div class="icon-button">
                                                <a href="#"><i class="fa fa-calendar"></i> Schedule a visit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="villa" role="tabpanel"
                                    aria-labelledby="villa-tab">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="info-table">
                                                <ul>
                                                    <li>Total Flat Space <span>250 m2</span></li>
                                                    <li>Floor number <span>26th</span></li>
                                                    <li>Number of rooms <span>5</span></li>
                                                    <li>Parking Available <span>Yes</span></li>
                                                    <li>Payment Process <span>Bank</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="{{ asset('user/assets/images/deal-02.jpg') }}" alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>Detail Info About New Villa</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod
                                                tempor pack incididunt ut labore et dolore magna aliqua quised ipsum
                                                suspendisse. <br><br>Swag fanny pack lyft blog twee. JOMO ethical copper
                                                mug, succulents typewriter shaman DIY kitsch twee taiyaki fixie hella
                                                venmo after messenger poutine next level humblebrag swag franzen.</p>
                                            <div class="icon-button">
                                                <a href="#"><i class="fa fa-calendar"></i> Schedule a visit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="penthouse" role="tabpanel"
                                    aria-labelledby="penthouse-tab">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="info-table">
                                                <ul>
                                                    <li>Total Flat Space <span>320 m2</span></li>
                                                    <li>Floor number <span>34th</span></li>
                                                    <li>Number of rooms <span>6</span></li>
                                                    <li>Parking Available <span>Yes</span></li>
                                                    <li>Payment Process <span>Bank</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <img src="{{ asset('user/assets/images/deal-03.jpg') }}" alt="">
                                        </div>
                                        <div class="col-lg-3">
                                            <h4>Extra Info About Penthouse</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod
                                                tempor pack incididunt ut Kinfolk tonx seitan crucifix 3 wolf moon
                                                bicycle rights keffiyeh snackwave wolf same vice, chillwave
                                                vexillologistlabore et dolore magna aliqua quised ipsum suspendisse.
                                                <br><br>Swag fanny pack lyft blog twee. JOMO ethical copper mug,
                                                succulents typewriter shaman DIY kitsch twee taiyaki fixie hella venmo
                                                after messenger poutine next level humblebrag swag franzen.
                                            </p>
                                            <div class="icon-button">
                                                <a href="#"><i class="fa fa-calendar"></i> Schedule a visit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</x-layout_user>
