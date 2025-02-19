<x-layout_admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-3">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Property Content Management</h5>
                        </div>
                        <div class="d-flex align-items-center">
                            <form action="{{ route('property.index') }}" method="GET" class="mb-3">
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
                    {{-- <button type="button" class="btn btn-outline-success m-1" data-bs-toggle="modal"
                        data-bs-target="#formModal1">
                        Add
                    </button> --}}
                    <div class="d-flex gap-3 mb-4">
                        <a class="btn btn-outline-success m-1" href="\form-property">Add</a>
                        <a href="{{ route('property.index') }}" class="btn btn-outline-primary m-1">
                            <i class="bi bi-arrow-clockwise"></i> Refresh
                        </a>
                        <a href="\category-admin"
                            class="btn btn-outline-warning d-flex align-items-center px-4 py-2 rounded-pill">
                            <i class="ti ti-category me-2"></i>
                            <span>Type Property</span>
                        </a>

                        <a href="\category-location-admin"
                            class="btn btn-outline-warning d-flex align-items-center px-4 py-2 rounded-pill">
                            <i class="ti ti-location me-2"></i>
                            <span>Location Property</span>
                        </a>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                {{-- <th scope="col">Image</th> --}}
                                <th scope="col">Price</th>
                                <th scope="col">Location</th>
                                <th scope="col">Type</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($property->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center text-muted">❌ Tidak ada data ditemukan</td>
                                </tr>
                            @else
                                @foreach ($property as $index => $user)
                                    <tr class="toggle-row" data-target="details{{ $index }}">
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $user->title }}</td>
                                        @php
                                            $images = json_decode($user->images, true);
                                        @endphp

                                        {{-- <td>
                                            @if ($images)
                                                @foreach ($images as $image)
                                                    <img src="{{ asset('storage/' . $image) }}" alt="Property Image"
                                                        width="100" class="m-1">
                                                @endforeach
                                            @else
                                                <span>No images available</span>
                                            @endif
                                        </td> --}}
                                        <td>${{ number_format($user->price, 2) }}</td>
                                        <td>{{ $user->categoryLocation->name }}</td>
                                        <td>{{ $user->categoryType->name }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td>
                                            <a href="{{ route('property.edit', $user->id) }}"
                                                class="btn btn-outline-secondary m-1">Edit</a>
                                            <form action="{{ route('property.destroy', $user->id) }}" method="POST"
                                                class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger m-1 delete-btn"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus properti ini?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr id="details{{ $index }}" class="detail-row">
                                        <td colspan="8" class="p-0">
                                            <div class="card card-body m-2">
                                                <div class="mb-4 pb-3 border-bottom">
                                                    <h5 class="mb-2 text-primary">Description</h5>
                                                    <p class="description-text mb-0">{{ $user->description }}</p>
                                                </div>

                                                <div class="row g-4">
                                                    <div class="col-md-6 border-end">
                                                        <div class="mb-3 d-flex">
                                                            <div class="border-start ps-2 border-3 border-primary">
                                                                <strong>Bedrooms:</strong>
                                                                <span class="ms-2">{{ $user->bedrooms }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 d-flex">
                                                            <div class="border-start ps-2 border-3 border-primary">
                                                                <strong>Bathrooms:</strong>
                                                                <span class="ms-2">{{ $user->bathrooms }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3 d-flex">
                                                            <div class="border-start ps-2 border-3 border-primary">
                                                                <strong>Area:</strong>
                                                                <span class="ms-2">{{ $user->area }} m²</span>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 d-flex">
                                                            <div class="border-start ps-2 border-3 border-primary">
                                                                <strong>Floor:</strong>
                                                                <span class="ms-2">{{ $user->floor }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-4 pt-3 border-top">
                                                    <h5 class="mb-2 text-primary">Address</h5>
                                                    <p class="mb-0">{{ $user->address }}</p>
                                                </div>
                                                <div class="mt-4 pt-3 border-top">
                                                    <h5 class="mb-2 text-primary">Images</h5>
                                                    @if ($images)
                                                        @foreach ($images as $image)
                                                            <img src="{{ asset('storage/' . $image) }}"
                                                                alt="Property Image" width="100" class="m-1">
                                                        @endforeach
                                                    @else
                                                        <span>No images available</span>
                                                    @endif
                                                </div>
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

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll(".edit-btn");
            editButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const userId = this.getAttribute("data-id");
                    const username = this.getAttribute("data-username");
                    const email = this.getAttribute("data-email");
                    const role = this.getAttribute("data-role");

                    document.getElementById("editUserId").value = userId;
                    document.getElementById("editUsername").value = username;
                    document.getElementById("editEmail").value = email;
                    document.getElementById("editRole").value = role;

                    // Ubah action form agar sesuai dengan user yang diedit
                    document.getElementById("editUserForm").action = `/property-update/${userId}`;
                });
            });
        });
    </script> --}}

    <style>
        .description-text {
            display: block;
            width: 100%;
            /* Menyesuaikan dengan lebar container */
            overflow-wrap: break-word;
            /* Memaksa teks panjang turun */
            word-break: break-word;
            /* Memecah kata panjang */
            white-space: pre-line;
            /* Menjaga format teks sesuai input */
        }

        .card-body {
            background-color: #f8f9fa;
            border-radius: 5px;
            padding: 10px;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".toggle-row").forEach(row => {
                row.addEventListener("click", function() {
                    let targetId = this.getAttribute("data-target");
                    let targetRow = document.getElementById(targetId);

                    if (targetRow.classList.contains("open")) {
                        targetRow.style.display = "none";
                        targetRow.classList.remove("open");
                    } else {
                        document.querySelectorAll(".detail-row").forEach(detail => {
                            detail.style.display = "none";
                            detail.classList.remove("open");
                        });

                        targetRow.style.display = "table-row";
                        targetRow.classList.add("open");
                    }
                });
            });

            document.querySelectorAll(".detail-row").forEach(detail => {
                detail.style.display = "none";
            });
        });
    </script>


</x-layout_admin>
