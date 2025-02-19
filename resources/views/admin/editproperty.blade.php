<x-layout_admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!--  Row 1 -->
    <div class="row">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container mt-8">
            <div class="row justify-content-center">
                <div class="col-lg-16">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title fw-semibold mb-0">Edit Property</h5>
                        </div>
                        <div class="card-body">
                            <a href="/property-admin" class="btn btn-warning mb-3">
                                <i class="bi bi-arrow-left"></i> Back
                            </a>
                            <form action="{{ route('property.update', $property->id) }}" method="POST"
                                enctype="multipart/form-data" class="p-4">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="title" class="form-label">Property Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title', $property->title) }}"
                                        placeholder="Enter property title" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        rows="3" placeholder="Enter property description" required>{{ old('description', $property->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Lanjutkan untuk semua field lainnya dengan pola yang sama -->

                                <!-- Untuk field select -->
                                <div class="col-md-6 mb-3">
                                    <label for="category_type_id" class="form-label">Property Type</label>
                                    <select class="form-select @error('category_type_id') is-invalid @enderror"
                                        id="category_type_id" name="category_type_id" required>
                                        <option value="">Choose type</option>
                                        @foreach ($categoryTypes as $type)
                                            <option value="{{ $type->id }}"
                                                {{ old('category_type_id', $property->category_type_id) == $type->id ? 'selected' : '' }}>
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_type_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Untuk images -->
                                <div class="mb-3">
                                    <label for="images" class="form-label">Property Images</label>
                                    <input type="file" class="form-control @error('images.*') is-invalid @enderror"
                                        id="images" name="images[]" accept="image/*" multiple>
                                    @error('images.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    <!-- Preview gambar yang sudah ada -->
                                    <div class="mt-3">
                                        <label>Current Images:</label>
                                        <div class="d-flex flex-wrap gap-2">
                                            @if ($property->images)
                                                @foreach (json_decode($property->images) as $image)
                                                    <img src="{{ asset('storage/' . $image) }}" alt="Property Image"
                                                        style="width: 150px; height: 150px; object-fit: cover;"
                                                        class="rounded">
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Preview gambar baru -->
                                    <div id="imagePreview" class="mt-2 d-flex flex-wrap gap-2"></div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Update Property</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const image = document.getElementById('imagePreview');
            image.src = URL.createObjectURL(event.target.files[0]);
            image.style.display = 'block';
        }
    </script>

    <script>
        function changeBackground(select) {
            const colorMap = {
                available: "#d4edda", // Hijau muda
                sold: "#f8d7da", // Merah muda
                reserved: "#fff3cd", // Kuning muda
                pending: "#d1ecf1" // Biru muda
            };
            select.style.backgroundColor = colorMap[select.value] || "white";
        }

        // Atur warna saat halaman dimuat
        document.addEventListener("DOMContentLoaded", function() {
            changeBackground(document.getElementById("status"));
        });
    </script>

    <script>
        document.getElementById('images').addEventListener('change', function(event) {
            const preview = document.getElementById('imagePreview');
            preview.innerHTML = '';

            Array.from(event.target.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '150px';
                    img.style.height = '150px';
                    img.style.objectFit = 'cover';
                    img.classList.add('rounded');
                    preview.appendChild(img);
                }
                reader.readAsDataURL(file);
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</x-layout_admin>
