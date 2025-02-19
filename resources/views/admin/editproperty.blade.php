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

                                <div class="mb-3">
                                    <label for="price" class="form-label">Price (Rp)</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        id="price" name="price" value="{{ old('price', $property->price) }}"
                                        placeholder="Enter price" min="0" required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
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

                                    <div class="col-md-6 mb-3">
                                        <label for="category_location_id" class="form-label">Location</label>
                                        <select class="form-select @error('category_location_id') is-invalid @enderror"
                                            id="category_location_id" name="category_location_id" required>
                                            <option value="">Choose location</option>
                                            @foreach ($categoryLocations as $location)
                                                <option value="{{ $location->id }}"
                                                    {{ old('category_location_id', $property->category_type_id) == $location->id ? 'selected' : '' }}>
                                                    {{ $location->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_location_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="address" name="address" value="{{ old('address', $property->address) }}"
                                        placeholder="Enter property address" required>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="bedrooms" class="form-label">Bedrooms</label>
                                        <input type="number"
                                            class="form-control @error('bedrooms') is-invalid @enderror" id="bedrooms"
                                            name="bedrooms" value="{{ old('bedrooms', $property->bedrooms) }}"
                                            placeholder="Qty" min="1" required>
                                        @error('bedrooms')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="bathrooms" class="form-label">Bathrooms</label>
                                        <input type="number"
                                            class="form-control @error('bathrooms') is-invalid @enderror" id="bathrooms"
                                            name="bathrooms" value="{{ old('bathrooms', $property->bathrooms) }}"
                                            placeholder="Qty" min="0" required>
                                        @error('bathrooms')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="area" class="form-label">Area (m²)</label>
                                        <input type="number" class="form-control @error('area') is-invalid @enderror"
                                            id="area" name="area" value="{{ old('area', $property->area) }}"
                                            placeholder="m²" min="0" required>
                                        @error('area')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="floor" class="form-label">Floor</label>
                                        <input type="number"
                                            class="form-control @error('floor') is-invalid @enderror" id="floor"
                                            name="floor" value="{{ old('floor', $property->floor) }}"
                                            placeholder="Qty" min="0" required>
                                        @error('floor')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status"
                                        name="status" required>
                                        <option value="available"
                                            {{ old('status', $property->status) == 'available' ? 'selected' : '' }}>
                                            Available</option>
                                        <option value="sold"
                                            {{ old('status', $property->status) == 'sold' ? 'selected' : '' }}>Sold
                                        </option>
                                        <option value="reserved"
                                            {{ old('status', $property->status) == 'reserved' ? 'selected' : '' }}>
                                            Reserved</option>
                                        <option value="on progress"
                                            {{ old('status', $property->status) == 'on progress' ? 'selected' : '' }}>
                                            On Progress</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Untuk images -->
                                <div class="mb-3">
                                    <label for="images" class="form-label">Property Images</label>
                                    <input type="file"
                                        class="form-control @error('images.*') is-invalid @enderror" id="images"
                                        name="images[]" accept="image/*" multiple>
                                    @error('images.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    <!-- Preview gambar yang sudah ada -->
                                    <div class="mt-3">
                                        <label>Current Images:</label>
                                        <div class="d-flex flex-wrap gap-2" id="existingImages">
                                            @if ($property->images)
                                                @foreach (json_decode($property->images) as $index => $image)
                                                    <div class="position-relative">
                                                        <img src="{{ asset('storage/' . $image) }}"
                                                            alt="Property Image"
                                                            style="width: 150px; height: 150px; object-fit: cover;"
                                                            class="rounded border">
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm position-absolute"
                                                            style="top: 5px; right: 5px; border-radius: 50%; padding: 2px 6px;"
                                                            onclick="removeExistingImage(this, '{{ $image }}')">×</button>
                                                        <input type="hidden" name="existing_images[]"
                                                            value="{{ $image }}">
                                                    </div>
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
        document.addEventListener("DOMContentLoaded", function() {
            const imageInput = document.getElementById("images");
            const imagePreview = document.getElementById("imagePreview");
            let imageFiles = [];

            imageInput.addEventListener("change", function() {
                imageFiles = Array.from(imageInput.files);
                updatePreview();
            });

            function updatePreview() {
                imagePreview.innerHTML = "";

                imageFiles.forEach((file, index) => {
                    if (!file.type.startsWith("image/")) return;

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const div = document.createElement("div");
                        div.classList.add("position-relative");

                        div.innerHTML = `
                        <div class="position-relative d-inline-block">
                            <img src="${e.target.result}" alt="Preview" 
                                 class="rounded border"
                                 style="width: 150px; height: 150px; object-fit: cover;">
                            <button type="button" 
                                    class="btn btn-danger btn-sm position-absolute"
                                    style="top: 5px; right: 5px; border-radius: 50%; padding: 2px 6px;"
                                    onclick="removeNewImage(${index})">×</button>
                        </div>
                    `;
                        imagePreview.appendChild(div);
                    };
                    reader.readAsDataURL(file);
                });
            }

            window.removeNewImage = function(index) {
                imageFiles.splice(index, 1);
                const dt = new DataTransfer();
                imageFiles.forEach(file => dt.items.add(file));
                imageInput.files = dt.files;
                updatePreview();
            };

            // Fungsi untuk menghapus gambar yang sudah ada
            window.removeExistingImage = function(button, imagePath) {
                // Tambahkan konfirmasi sebelum menghapus
                if (confirm('Are you sure you want to remove this image?')) {
                    const imageContainer = button.closest('.position-relative');

                    // Buat input hidden untuk menyimpan gambar yang akan dihapus
                    const deletedImageInput = document.createElement('input');
                    deletedImageInput.type = 'hidden';
                    deletedImageInput.name = 'deleted_images[]';
                    deletedImageInput.value = imagePath;
                    document.querySelector('form').appendChild(deletedImageInput);

                    // Hapus container gambar dari DOM
                    imageContainer.remove();
                }
            };
        });
    </script>

    {{-- <script>
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
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</x-layout_admin>
