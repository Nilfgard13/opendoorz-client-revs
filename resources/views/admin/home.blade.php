<x-layout_admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!--  Row 1 -->
    <div class="alert alert-light text-center" role="alert">
        <h4>Dashboard Property Status</h4>
    </div>
    <div class="row g-4">
        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm text-center p-3">
                <div class="icon-circle bg-success">
                    <i class="fas fa-house-chimney"></i>
                </div>
                <h5 class="fw-bold mt-3">{{ $propertyCounts['total'] }} Total Property</h5>
                {{-- <p class="text-muted">Lihat Detail</p> --}}
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm text-center p-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-gears"></i>
                </div>
                <h5 class="fw-bold mt-3">{{ $propertyCounts['on_progress'] }} On Progress</h5>
                {{-- <p class="text-muted">Lihat Detail</p> --}}
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm text-center p-3">
                <div class="icon-circle bg-warning">
                    <i class="fas fa-calendar"></i>
                </div>
                <h5 class="fw-bold mt-3">{{ $propertyCounts['on_reserved'] }} Reserved</h5>
                {{-- <p class="text-muted">Lihat Detail</p> --}}
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm text-center p-3">
                <div class="icon-circle bg-danger">
                    <i class="fas fa-sack-dollar"></i>
                </div>
                <h5 class="fw-bold mt-3">{{ $propertyCounts['sold'] }} Sold</h5>
                {{-- <p class="text-muted">Lihat Detail</p> --}}
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card overflow-hidden"
                style="background-color: rgba(33, 150, 243, 0.2); color: #0d47a1; border: none;">
                <div class="card-body p-4 text-center">
                    <h5 class="card-title mb-3 fw-semibold" style="font-size: 1.2rem;">Available On Sale Property</h5>
                    <h4 class="fw-semibold mb-0" style="font-size: 1.5rem;">{{ $propertyCounts['available'] }}</h4>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Form Header Image Landing Page</h5>
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <h5 class="card-title fw-semibold mb-4">Form Input Video Landing Page</h5>
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <h5 class="card-title fw-semibold mb-4">Form Input Experience Landing Page</h5>
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <h5 class="card-title fw-semibold mb-4">Form Input Recommended Property</h5>
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <h5 class="card-title fw-semibold mb-4">Form Input Contact</h5>
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <h5 class="card-title fw-semibold mb-4">Form Input Social Media</h5>
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .icon-circle {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: white;
            font-size: 24px;
            margin: 0 auto;
        }

        .bg-danger {
            background-color: #dc3545;
        }

        .bg-success {
            background-color: #28a745;
        }

        .bg-primary {
            background-color: #6f42c1;
        }

        .bg-warning {
            background-color: #c66a00;
        }

        .card {
            border: none;
            border-radius: 10px;
        }
    </style>


</x-layout_admin>
