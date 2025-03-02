<x-layout_admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!--  Row 1 -->
    <div class="alert alert-warning" role="alert">
        <h5 class="fw-bold"><i class="fas fa-exclamation-triangle"></i> Peringatan!</h5><br>
        <p>System admin ini masih kurang optimal. Harap perhatikan hal berikut:</p>
        <ul class="mb-0">
            <li>1. Untuk pengisian nomer hp harap ganti angka awal dengan 62(081357477967 -> 6281357477967)</li>
            <li>2. Setelah melakukan pencarian klik tombol <strong>‘refresh’</strong> untuk menampilkan semua data yang tersedia.</li>
        </ul>
    </div>
    <div class="row">
        <!-- Menampilkan pesan sukses -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-3">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Admin Rotator Management</h5>
                        </div>
                        <div class="d-flex align-items-center">
                            <form action="{{ route('rotator.index') }}" method="GET" class="mb-3">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Cari user..."
                                        value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <br>
                    <button type="button" class="btn btn-outline-success m-1" data-bs-toggle="modal"
                        data-bs-target="#formModal1">
                        Add
                    </button>
                    <a href="{{ route('rotator.index') }}" class="btn btn-outline-primary m-1">
                        <i class="bi bi-arrow-clockwise"></i> Refresh
                    </a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Username</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Updated at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($nomors->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center text-muted">❌ Tidak ada data ditemukan</td>
                                </tr>
                            @else
                                @foreach ($nomors as $index => $user)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->nomor }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-secondary m-1 edit-btn"
                                                data-bs-toggle="modal" data-bs-target="#formModal2"
                                                data-id="{{ $user->id }}" data-username="{{ $user->username }}"
                                                data-nomor="{{ $user->nomor }}">
                                                Edit
                                            </button>

                                            <form action="{{ route('rotator.destroy', $user->id) }}" method="POST"
                                                class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-outline-danger m-1 delete-btn"
                                                    data-id="{{ $user->id }}">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mb-0">
            <div class="card-body">
                <form>

                    <legend>Rotator Link</legend>

                    <div class="input-group mb-3">
                        <input type="text" id="copyInput" class="form-control"
                            value="{{ url(route('rotator.showLink')) }}" readonly>
                        <button class="btn btn-outline-secondary" type="button" id="copyButton">
                            <i class="fas fa-copy"></i> Salin
                        </button>
                    </div>
                    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                        <div id="copyToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-body">
                                <i class="fas fa-check-circle text-success"></i> Teks berhasil disalin!
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('rotator.showLink') }}" class="btn btn-primary" target="_blank" rel="noopener noreferrer">Test</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Add -->
        <div class="modal fade" id="formModal1" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('rotator.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" name="username" value="{{ old('username') }}">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nomor" class="form-label">Number Phone</label>
                                <input type="number" class="form-control @error('nomor') is-invalid @enderror"
                                    id="nomor" name="nomor" value="{{ old('nomor') }}">
                                @error('nomor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="formModal2" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editUserForm" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="editUserId" name="id">

                            <div class="mb-3">
                                <label for="editUsername" class="form-label">Username</label>
                                <input type="text" class="form-control" id="editUsername" name="username"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="editNomor" class="form-label">No Hp</label>
                                <input type="number" class="form-control" id="editNomor" name="nomor" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('copyButton').addEventListener('click', function() {
            // Get the input element
            const copyText = document.getElementById('copyInput');

            // Try to copy using the modern Clipboard API
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(copyText.value)
                    .then(() => showToast())
                    .catch((err) => {
                        console.error('Gagal menyalin teks:', err);
                        fallbackCopyMethod(copyText);
                    });
            } else {
                // Fallback for older browsers
                fallbackCopyMethod(copyText);
            }
        });

        // Fallback copy method
        function fallbackCopyMethod(copyText) {
            try {
                // Select the text
                copyText.select();
                copyText.setSelectionRange(0, 99999); // For mobile devices

                // Copy the text
                document.execCommand('copy');

                // Show success message
                showToast();
            } catch (err) {
                console.error('Fallback: Gagal menyalin teks', err);
                alert('Tidak dapat menyalin teks. Silakan coba secara manual.');
            }
        }

        // Function to show toast notification
        function showToast() {
            const toast = new bootstrap.Toast(document.getElementById('copyToast'));
            toast.show();

            // Optional: Change button text temporarily
            const button = document.getElementById('copyButton');
            const originalContent = button.innerHTML;
            button.innerHTML = '<i class="fas fa-check"></i> Tersalin!';

            setTimeout(() => {
                button.innerHTML = originalContent;
            }, 2000);
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll(".edit-btn");
            editButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const userId = this.getAttribute("data-id");
                    const username = this.getAttribute("data-username");
                    const nomor = this.getAttribute("data-nomor");

                    document.getElementById("editUserId").value = userId;
                    document.getElementById("editUsername").value = username;
                    document.getElementById("editNomor").value = nomor;

                    // Ubah action form agar sesuai dengan user yang diedit
                    document.getElementById("editUserForm").action = `/rotator-update/${userId}`;
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll(".delete-btn");

            deleteButtons.forEach(button => {
                button.addEventListener("click", function(event) {
                    event.preventDefault();
                    const form = this.closest(".delete-form");
                    const userId = this.getAttribute("data-id");

                    Swal.fire({
                        title: "Hapus User?",
                        text: `Apakah Anda yakin ingin menghapus user ini?`,
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Ya, Hapus!",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</x-layout_admin>
