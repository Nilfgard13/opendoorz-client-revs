<x-layout_admin>
    <x-slot:title>{{ $title }}</x-slot:title>

    <!--  Row 1 -->
    <div class="row">
        <!-- Menampilkan pesan sukses -->
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
                            <h5 class="card-title fw-semibold mb-0">Form Add Property</h5>
                        </div>
                        <div class="card-body">
                            <a href="/property-admin" class="btn btn-warning mb-3">
                                <i class="bi bi-arrow-left"></i> Back
                            </a>
                            <form action="{{ route('property.store') }}" method="POST" enctype="multipart/form-data"
                                class="p-4">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Property Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title') }}"
                                        placeholder="Enter property title" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        rows="3" placeholder="Enter property description" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="price" class="form-label">Price (Rp)</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        id="price" name="price" value="{{ old('price') }}"
                                        placeholder="Enter price" min="0" required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="category_type_id" class="form-label">Property Type</label>
                                        <select class="form-select @error('category_type_id') is-invalid @enderror"
                                            id="category_type_id" name="category_type_id" required>
                                            <option value="">Choose type</option>
                                            @foreach ($categoryTypes as $type)
                                                <option value="{{ $type->id }}"
                                                    {{ old('category_type_id') == $type->id ? 'selected' : '' }}>
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
                                                    {{ old('category_location_id') == $location->id ? 'selected' : '' }}>
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
                                        id="address" name="address" value="{{ old('address') }}"
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
                                            name="bedrooms" value="{{ old('bedrooms') }}" placeholder="Qty"
                                            min="1" required>
                                        @error('bedrooms')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="bathrooms" class="form-label">Bathrooms</label>
                                        <input type="number"
                                            class="form-control @error('bathrooms') is-invalid @enderror" id="bathrooms"
                                            name="bathrooms" value="{{ old('bathrooms') }}" placeholder="Qty"
                                            min="0" required>
                                        @error('bathrooms')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="area" class="form-label">Area (m²)</label>
                                        <input type="number" class="form-control @error('area') is-invalid @enderror"
                                            id="area" name="area" value="{{ old('area') }}"
                                            placeholder="m²" min="0" required>
                                        @error('area')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="floor" class="form-label">Floor</label>
                                        <input type="number"
                                            class="form-control @error('floor') is-invalid @enderror" id="floor"
                                            name="floor" value="{{ old('floor') }}" placeholder="Qty"
                                            min="0" required>
                                        @error('floor')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="parking" class="form-label">Parking</label>
                                    <input type="number"
                                        class="form-control @error('parking') is-invalid @enderror" id="parking"
                                        name="parking" value="{{ old('parking') }}" placeholder="Per Car"
                                        min="1" required>
                                    @error('parking')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status"
                                        name="status" required>
                                        <option value="available"
                                            {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                                        <option value="sold" {{ old('status') == 'sold' ? 'selected' : '' }}>Sold
                                        </option>
                                        <option value="reserved" {{ old('status') == 'reserved' ? 'selected' : '' }}>
                                            Reserved</option>
                                        <option value="on progress"
                                            {{ old('status') == 'on progress' ? 'selected' : '' }}>On Progress</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="images" class="form-label fw-semibold mb-2">Property Images</label>
                                    <div class="input-group">
                                        <input type="file"
                                            class="form-control @error('images.*') is-invalid @enderror"
                                            id="images" name="images[]" accept="image/*" multiple>
                                    </div>
                                    @error('images.*')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror

                                    <div id="imagePreview" class="mt-3 row g-3"></div>
                                </div>

                                <!-- Modal Crop -->
                                <div class="modal fade" id="cropModal" tabindex="-1"
                                    aria-labelledby="cropModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="cropModalLabel">Crop Image</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img id="cropImage" style="max-width: 100%;">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-primary" id="cropAndSave">Crop
                                                    & Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary w-100">Add Property</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let cropper;
            let selectedFile;

            document.getElementById('images').addEventListener('change', function(event) {
                const file = event.target.files[0];

                if (file) {
                    selectedFile = file;
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const image = document.getElementById('cropImage');
                        image.src = e.target.result;

                        // Show crop modal
                        const cropModal = new bootstrap.Modal(document.getElementById('cropModal'));
                        cropModal.show();

                        // Wait for modal to open, then initialize cropper
                        cropModal._element.addEventListener('shown.bs.modal', function() {
                            if (cropper) cropper
                                .destroy(); // Destroy previous instance if exists
                            cropper = new Cropper(image, {
                                aspectRatio: 350 / 260,
                                viewMode: 2,
                                scalable: true,
                                zoomable: true,
                                background: false
                            });
                        });
                    };

                    reader.readAsDataURL(file);
                }
            });

            // Event to save cropping result
            document.getElementById('cropAndSave').addEventListener('click', function() {
                if (cropper) {
                    const highResCanvas = cropper.getCroppedCanvas({
                        width: 1400,
                        height: 1040,
                        imageSmoothingEnabled: true,
                        imageSmoothingQuality: 'high',
                        willReadFrequently: true
                    });

                    // Resize to final size
                    const finalCanvas = document.createElement('canvas');
                    finalCanvas.width = 700;
                    finalCanvas.height = 520;
                    const ctx = finalCanvas.getContext('2d', {
                        willReadFrequently: true
                    });
                    ctx.imageSmoothingEnabled = true;
                    ctx.imageSmoothingQuality = 'high';
                    ctx.drawImage(highResCanvas, 0, 0, 700, 520);

                    // Convert to Blob (WebP for better quality & smaller size)
                    finalCanvas.toBlob(function(blob) {
                        const url = URL.createObjectURL(blob);

                        // Clear previous preview and show new image
                        const previewContainer = document.getElementById('imagePreview');
                        previewContainer.innerHTML = ''; // Clear previous preview
                        const preview = document.createElement('div');
                        preview.classList.add('col-md-4');
                        preview.innerHTML = `<img src="${url}" class="img-fluid rounded">`;
                        previewContainer.appendChild(preview);

                        // Save to file input
                        const fileInput = document.getElementById('images');
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(new File([blob], selectedFile.name.replace(
                            /\.[^/.]+$/, ".webp"), {
                            type: 'image/webp'
                        }));
                        fileInput.files = dataTransfer.files;

                        // Close modal
                        const cropModal = bootstrap.Modal.getInstance(document.getElementById(
                            'cropModal'));
                        cropModal.hide();
                    }, 'image/webp', 1.0);
                }
            });
        });
    </script>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            let cropper;
            let selectedFile;

            document.getElementById('images').addEventListener('change', function(event) {
                const file = event.target.files[0];

                if (file) {
                    selectedFile = file;
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const image = document.getElementById('cropImage');
                        image.src = e.target.result;

                        // Tampilkan modal crop
                        const cropModal = new bootstrap.Modal(document.getElementById('cropModal'));
                        cropModal.show();

                        // Tunggu modal terbuka, lalu inisialisasi cropper
                        cropModal._element.addEventListener('shown.bs.modal', function() {
                            if (cropper) cropper
                                .destroy(); // Hancurkan instance sebelumnya jika ada
                            cropper = new Cropper(image, {
                                aspectRatio: 350 / 260, // Set rasio crop
                                viewMode: 2,
                                scalable: true,
                                zoomable: true,
                                background: false
                            });
                        });
                    };

                    reader.readAsDataURL(file);
                }
            });

            // Event untuk menyimpan hasil cropping
            document.getElementById('cropAndSave').addEventListener('click', function() {
                if (cropper) {
                    const highResCanvas = cropper.getCroppedCanvas({
                        width: 1400, // 4x ukuran asli (untuk detail tinggi)
                        height: 1040,
                        imageSmoothingEnabled: true,
                        imageSmoothingQuality: 'high',
                        willReadFrequently: true
                    });

                    // Resize ke ukuran final
                    const finalCanvas = document.createElement('canvas');
                    finalCanvas.width = 700; // Final 2x ukuran asli
                    finalCanvas.height = 520;
                    const ctx = finalCanvas.getContext('2d', {
                        willReadFrequently: true
                    });
                    ctx.imageSmoothingEnabled = true;
                    ctx.imageSmoothingQuality = 'high';
                    ctx.drawImage(highResCanvas, 0, 0, 700, 520);

                    // Konversi ke Blob (WebP untuk kualitas lebih baik & ukuran lebih kecil)
                    finalCanvas.toBlob(function(blob) {
                        const url = URL.createObjectURL(blob);

                        // Tampilkan hasil cropping di preview
                        const previewContainer = document.getElementById('imagePreview');
                        const preview = document.createElement('div');
                        preview.classList.add('col-md-4');
                        preview.innerHTML = `<img src="${url}" class="img-fluid rounded">`;
                        previewContainer.appendChild(preview);

                        // Simpan ke input file (opsional jika ingin dikirim ke backend)
                        const fileInput = document.getElementById('images');
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(new File([blob], selectedFile.name.replace(
                            /\.[^/.]+$/, ".webp"), {
                            type: 'image/webp'
                        }));
                        fileInput.files = dataTransfer.files;

                        // Tutup modal
                        const cropModal = bootstrap.Modal.getInstance(document.getElementById(
                            'cropModal'));
                        cropModal.hide();
                    }, 'image/webp', 1.0); // WebP dengan kualitas maksimal
                }
            });
        });
    </script> --}}

    {{-- <script>
        document.getElementById('images').addEventListener('change', function(event) {
            const preview = document.getElementById('imagePreview');
            preview.innerHTML = ''; // Clear existing previews

            const files = event.target.files;

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (file) {
                    // Create preview container
                    const col = document.createElement('div');
                    col.className = 'col-md-4';

                    // Create image element
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.className = 'img-fluid rounded';
                    img.style.height = '200px';
                    img.style.objectFit = 'cover';

                    // Add to preview
                    col.appendChild(img);
                    preview.appendChild(col);
                }
            }
        });
    </script> --}}

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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Cropper.js CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
    <!-- Cropper.js JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>


</x-layout_admin>
