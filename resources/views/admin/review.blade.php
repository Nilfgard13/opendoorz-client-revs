@if (auth()->user()->role == 'admin')
    <x-layout_admin_staff>
        <x-slot:title>{{ $title }}</x-slot:title>
        <!-- Menampilkan pesan sukses -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-3">
                            <div class="mb-3 mb-sm-0">
                                <h5 class="card-title fw-semibold">Review Management</h5>
                            </div>
                            <div class="d-flex align-items-center">
                                <form action="{{ route('review.index') }}" method="GET" class="mb-3">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Cari user..." value="{{ request('search') }}">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                        <br>
                        <a href="{{ route('review.index') }}" class="btn btn-outline-primary m-1">
                            <i class="bi bi-arrow-clockwise"></i> Refresh
                        </a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No HP</th>
                                    <th scope="col">Send at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($reviews->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">❌ Tidak ada data ditemukan
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($reviews as $index => $user)
                                        <!-- Baris utama -->
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->nomor }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>
                                                <form action="{{ route('review.destroy', $user->id) }}" method="POST"
                                                    class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-outline-danger m-1 delete-btn"
                                                        data-id="{{ $user->id }}" data-name="{{ $user->name }}">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Baris deskripsi -->
                                        <tr class="description-row">
                                            <td colspan="7">
                                                <div class="description-box">
                                                    <strong>Review from {{ $user->name }}:</strong>
                                                    <p class="description-text">{{ $user->deskripsi }}</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Styling agar tampilan lebih rapi -->
        <style>
            .description-box {
                border: 1px solid #ddd;
                padding: 10px;
                border-radius: 5px;
                background-color: #f8f9fa;
                font-style: italic;
                width: 100%;
                /* Memastikan elemen full ke kanan */
                max-width: 100%;
                /* Pastikan tidak melewati batas tabel */
                overflow-wrap: break-word;
                /* Memaksa teks panjang turun */
                word-break: break-word;
                /* Memecah kata panjang */
                white-space: normal;
                /* Memastikan teks turun ke bawah */
            }

            .description-text {
                display: block;
                overflow-wrap: break-word;
                word-break: break-word;
                white-space: pre-line;
                /* Memastikan format teks tetap terjaga */
            }
        </style>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const deleteButtons = document.querySelectorAll(".delete-btn");

                deleteButtons.forEach(button => {
                    button.addEventListener("click", function(event) {
                        event.preventDefault();
                        const form = this.closest(".delete-form");
                        const userId = this.getAttribute("data-id");
                        const userName = this.getAttribute("data-name");

                        Swal.fire({
                            title: "Hapus User?",
                            text: `Apakah Anda yakin ingin menghapus user "${userName}"?`,
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#d33",
                            cancelButtonColor: "#3085d6",
                            confirmButtonText: "Ya, Hapus!",
                            cancelButtonText: "Batal",
                            reverseButtons: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Show loading state
                                Swal.fire({
                                    title: 'Menghapus...',
                                    html: 'Mohon tunggu sebentar',
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    }
                                });

                                // Submit form
                                form.removeAttribute('onsubmit');
                                form.submit();
                            }
                        });
                    });
                });
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </x-layout_admin_staff>
@elseif(auth()->user()->role == 'super admin')
    <x-layout_admin>
        <x-slot:title>{{ $title }}</x-slot:title>
        <!-- Menampilkan pesan sukses -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-3">
                            <div class="mb-3 mb-sm-0">
                                <h5 class="card-title fw-semibold">Review Management</h5>
                            </div>
                            <div class="d-flex align-items-center">
                                <form action="{{ route('review.index') }}" method="GET" class="mb-3">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Cari user..." value="{{ request('search') }}">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                        <br>
                        <a href="{{ route('review.index') }}" class="btn btn-outline-primary m-1">
                            <i class="bi bi-arrow-clockwise"></i> Refresh
                        </a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No HP</th>
                                    <th scope="col">Send at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($reviews->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">❌ Tidak ada data ditemukan
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($reviews as $index => $user)
                                        <!-- Baris utama -->
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->nomor }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>
                                                <form action="{{ route('review.destroy', $user->id) }}" method="POST"
                                                    class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-outline-danger m-1 delete-btn"
                                                        data-id="{{ $user->id }}" data-name="{{ $user->name }}">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Baris deskripsi -->
                                        <tr class="description-row">
                                            <td colspan="7">
                                                <div class="description-box">
                                                    <strong>Review from {{ $user->name }}:</strong>
                                                    <p class="description-text">{{ $user->deskripsi }}</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Styling agar tampilan lebih rapi -->
        <style>
            .description-box {
                border: 1px solid #ddd;
                padding: 10px;
                border-radius: 5px;
                background-color: #f8f9fa;
                font-style: italic;
                width: 100%;
                /* Memastikan elemen full ke kanan */
                max-width: 100%;
                /* Pastikan tidak melewati batas tabel */
                overflow-wrap: break-word;
                /* Memaksa teks panjang turun */
                word-break: break-word;
                /* Memecah kata panjang */
                white-space: normal;
                /* Memastikan teks turun ke bawah */
            }

            .description-text {
                display: block;
                overflow-wrap: break-word;
                word-break: break-word;
                white-space: pre-line;
                /* Memastikan format teks tetap terjaga */
            }
        </style>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const deleteButtons = document.querySelectorAll(".delete-btn");

                deleteButtons.forEach(button => {
                    button.addEventListener("click", function(event) {
                        event.preventDefault();
                        const form = this.closest(".delete-form");
                        const userId = this.getAttribute("data-id");
                        const userName = this.getAttribute("data-name");

                        Swal.fire({
                            title: "Hapus User?",
                            text: `Apakah Anda yakin ingin menghapus user "${userName}"?`,
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#d33",
                            cancelButtonColor: "#3085d6",
                            confirmButtonText: "Ya, Hapus!",
                            cancelButtonText: "Batal",
                            reverseButtons: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Show loading state
                                Swal.fire({
                                    title: 'Menghapus...',
                                    html: 'Mohon tunggu sebentar',
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    }
                                });

                                // Submit form
                                form.removeAttribute('onsubmit');
                                form.submit();
                            }
                        });
                    });
                });
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </x-layout_admin>
@endif
