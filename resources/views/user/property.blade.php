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
                            <li><a href="/property" class="active">Properties</a></li>
                            {{-- <li><a href="/details-property">Property Details</a></li> --}}
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
                    <span class="breadcrumb"><a href="#">Home</a> / Properties</span>
                    <h3>Properties</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="section properties">
        <div class="container">
            <ul class="properties-filter">
                <li>
                    <a class="is_active" href="#!" data-filter="*">Show All</a>
                </li>
                @foreach ($types as $type)
                    <li>
                        <a href="#!" data-filter=".{{ $type->name }}">{{ $type->name }}</a>
                    </li>
                @endforeach
            </ul>
            <!-- Search Bar -->
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="search-container">
                        <form action="{{ route('user.propertyIndex') }}" method="GET" class="search-form">
                            <div class="elegant-search-group">
                                <div class="search-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65">
                                        </line>
                                    </svg>
                                </div>
                                <input type="text" class="elegant-search-input" name="search"
                                    placeholder="Temukan properti impian Anda..." value="{{ request('search') }}">
                                <button class="elegant-search-button" type="submit">
                                    <span class="button-text">Cari Properti</span>
                                    <span class="button-icon">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65">
                                            </line>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row properties-box">
                @foreach ($property as $user)
                    <div
                        class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 adv {{ $user->categoryType->name }}">
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
                                <li>Bedrooms: <span>{{ $user->bedrooms }}</span></li>
                                <li>Bathrooms: <span>{{ $user->bathrooms }}</span></li>
                                <li>Area: <span>{{ $user->area }}m²</span></li>
                                <li>Floor: <span>{{ $user->floor }}</span></li>
                                <li>Parking: <span>{{ $user->parking ?? 'N/A' }}</span></li>
                            </ul>
                            <div class="main-button">
                                <a href="/show-link">Contact Admin</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- <div class="row">
                <div class="col-lg-12">
                    <ul class="pagination">
                        <li><a class="is_active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">>></a></li>
                    </ul>
                </div>
            </div> --}}

            <div class="row">
                <div class="col-lg-12">
                    @if ($property->hasPages())
                        <div class="pagination-wrapper">
                            <ul class="pagination">
                                {{-- Previous Page Link --}}
                                @if ($property->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $property->previousPageUrl() }}">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($property->getUrlRange(1, $property->lastPage()) as $page => $url)
                                    @if ($page == $property->currentPage())
                                        <li class="page-item active">
                                            <span class="page-link">{{ $page }}</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($property->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $property->nextPageUrl() }}">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
    <style>
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin: 40px 0;
        }

        .pagination {
            display: inline-flex;
            align-items: center;
            background: #ffffff;
            padding: 8px;
            border-radius: 100px;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            gap: 4px;
        }

        .page-item {
            display: inline-flex;
            margin: 0;
        }

        .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            padding: 0;
            font-size: 14px;
            font-weight: 500;
            color: #4b5563;
            background: transparent;
            border: none;
            border-radius: 100px;
            transition: all 0.2s ease;
        }

        .page-item:not(.active):not(.disabled) .page-link:hover {
            background-color: #f3f4f6;
            color: #111827;
        }

        .page-item.active .page-link {
            background-color: #354dbd;
            color: white;
        }

        .page-item.disabled .page-link {
            color: #9ca3af;
            cursor: not-allowed;
            opacity: 0.5;
        }

        /* SVG icons styling */
        .page-link svg {
            width: 18px;
            height: 18px;
        }

        /* Mobile Styles */
        @media (max-width: 768px) {
            .pagination {
                padding: 6px;
            }

            .page-link {
                width: 32px;
                height: 32px;
                font-size: 13px;
            }

            .page-link svg {
                width: 16px;
                height: 16px;
            }
        }

        /* Touch Device Optimization */
        @media (hover: none) {
            .page-link {
                padding: 0;
            }
        }

        /* Focus States */
        .page-link:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.1);
        }
    </style>
    <style>
        /* Base Styles */
        .search-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .elegant-search-group {
            position: relative;
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.98);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08),
                0 1px 3px rgba(0, 0, 0, 0.02);
            padding: 6px;
            border: 1px solid rgba(229, 231, 235, 0.5);
            backdrop-filter: blur(10px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .elegant-search-group:focus-within {
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.12),
                0 2px 5px rgba(0, 0, 0, 0.02);
            transform: translateY(-1px);
            border-color: rgba(229, 231, 235, 0.8);
        }

        .search-icon {
            position: absolute;
            left: 20px;
            color: #64748b;
            display: flex;
            align-items: center;
            pointer-events: none;
            transition: color 0.3s ease;
        }

        .elegant-search-input {
            width: 100%;
            height: 54px;
            padding: 0 30px 0 55px;
            border: none;
            background: transparent;
            font-size: 16px;
            color: #1e293b;
            font-weight: 400;
            letter-spacing: 0.2px;
        }

        .elegant-search-input::placeholder {
            color: #94a3b8;
            font-weight: 300;
        }

        .elegant-search-input:focus {
            outline: none;
        }

        .elegant-search-button {
            min-width: 120px;
            height: 44px;
            margin-right: 6px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 500;
            font-size: 15px;
            letter-spacing: 0.3px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(37, 99, 235, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .elegant-search-button:hover {
            background: linear-gradient(135deg, #1d4ed8, #1e40af);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .elegant-search-button:active {
            transform: translateY(1px);
        }

        .button-icon {
            display: none;
        }

        /* Tablet Styles */
        @media (max-width: 992px) {
            .search-container {
                padding: 25px 15px;
            }

            .elegant-search-input {
                height: 50px;
                font-size: 15px;
            }

            .elegant-search-button {
                min-width: 100px;
            }
        }

        /* Mobile Styles */
        @media (max-width: 768px) {
            .search-container {
                padding: 15px 10px;
            }

            .elegant-search-group {
                flex-direction: column;
                padding: 10px;
                border-radius: 12px;
            }

            .elegant-search-input {
                height: 44px;
                font-size: 14px;
                padding: 0 15px;
                text-align: left;
                border-radius: 8px;
                background: #f8fafc;
                margin-bottom: 8px;
            }

            .search-icon {
                display: none;
            }

            .elegant-search-button {
                width: 100%;
                margin: 0;
                height: 40px;
                border-radius: 8px;
                font-size: 14px;
            }

            .button-text {
                display: none;
            }

            .button-icon {
                display: block;
            }
        }

        /* Small Mobile Styles */
        @media (max-width: 480px) {
            .search-container {
                padding: 10px;
            }

            .elegant-search-group {
                padding: 8px;
            }

            .elegant-search-input {
                height: 40px;
                font-size: 13px;
            }

            .elegant-search-input::placeholder {
                font-size: 13px;
            }

            .elegant-search-button {
                height: 38px;
            }
        }

        /* Optional: Add touch-friendly tap targets for mobile */
        @media (hover: none) and (pointer: coarse) {
            .elegant-search-button {
                min-height: 44px;
                /* Ensure minimum tap target size */
            }
        }

        /* Optional: Add a subtle animation for loading state */
        .elegant-search-button.loading {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            background-size: 200% 200%;
            animation: gradient 1.5s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>

</x-layout_user>
