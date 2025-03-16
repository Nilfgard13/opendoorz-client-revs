@if (auth()->user()->role == 'admin')
    <x-layout_admin_staff>
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
                                        <label for="title" class="form-label">Property Title *maks 15
                                            karakter*</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" name="title" value="{{ old('title', $property->title) }}"
                                            placeholder="Enter property title" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        rows="3" placeholder="Enter property description" required>{{ old('description', $property->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div> --}}

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description (limit hanya 2
                                            paragraf)</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                            rows="3" placeholder="Enter property description" required>{{ old('description', $property->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price (Rp) *maks 10 digit*</label>
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
                                            <select
                                                class="form-select @error('category_location_id') is-invalid @enderror"
                                                id="category_location_id" name="category_location_id" required>
                                                <option value="">Choose location</option>
                                                @foreach ($categoryLocations as $location)
                                                    <option value="{{ $location->id }}"
                                                        {{ old('category_location_id', $property->category_location_id) == $location->id ? 'selected' : '' }}>
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
                                        <input type="text"
                                            class="form-control @error('address') is-invalid @enderror" id="address"
                                            name="address" value="{{ old('address', $property->address) }}"
                                            placeholder="Enter property address" required>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="bedrooms" class="form-label">Bedrooms</label>
                                            <input type="number"
                                                class="form-control @error('bedrooms') is-invalid @enderror"
                                                id="bedrooms" name="bedrooms"
                                                value="{{ old('bedrooms', $property->bedrooms) }}" placeholder="Qty"
                                                min="1" required>
                                            @error('bedrooms')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="bathrooms" class="form-label">Bathrooms</label>
                                            <input type="number"
                                                class="form-control @error('bathrooms') is-invalid @enderror"
                                                id="bathrooms" name="bathrooms"
                                                value="{{ old('bathrooms', $property->bathrooms) }}" placeholder="Qty"
                                                min="0" required>
                                            @error('bathrooms')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="area" class="form-label">Area (m²)</label>
                                            <input type="number"
                                                class="form-control @error('area') is-invalid @enderror"
                                                id="area" name="area"
                                                value="{{ old('area', $property->area) }}" placeholder="m²"
                                                min="0" required>
                                            @error('area')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="floor" class="form-label">Floor</label>
                                            <input type="number"
                                                class="form-control @error('floor') is-invalid @enderror"
                                                id="floor" name="floor"
                                                value="{{ old('floor', $property->floor) }}" placeholder="Qty"
                                                min="0" required>
                                            @error('floor')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="parking" class="form-label">Parking</label>
                                        <input type="number"
                                            class="form-control @error('parking') is-invalid @enderror"
                                            id="parking" name="parking"
                                            value="{{ old('parking', $property->parking) }}" placeholder="Per Car"
                                            min="1">
                                        @error('parking')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select @error('status') is-invalid @enderror"
                                            id="status" name="status" required>
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

                                    <div class="mb-4">
                                        <label for="images" class="form-label fw-semibold mb-2">Property
                                            Images</label>
                                        <div class="input-group">
                                            <input type="file"
                                                class="form-control @error('images.*') is-invalid @enderror"
                                                id="images" name="images[]" accept="image/*" multiple>
                                        </div>
                                        @error('images.*')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror

                                        <!-- Existing Images -->
                                        <div class="mt-3 row g-3" id="existingImages">
                                            @foreach (json_decode($property->images, true) ?? [] as $image)
                                                <div class="col-md-4 position-relative">
                                                    <img src="{{ asset('storage/' . $image) }}"
                                                        class="img-fluid rounded border existing-image"
                                                        data-image-path="{{ $image }}"
                                                        onclick="openCropModal('{{ asset('storage/' . $image) }}', '{{ $image }}')">
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm position-absolute"
                                                        style="top: 5px; right: 5px; border-radius: 50%; padding: 2px 6px;"
                                                        onclick="removeExistingImage(this, '{{ $image }}')">×</button>
                                                    <input type="hidden" name="existing_images[]"
                                                        value="{{ $image }}">
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Preview New Images -->
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
                                                {{-- <div class="modal-body text-center">
                                                <img id="cropImage" style="max-width: 100%;">
                                            </div> --}}
                                                <div class="modal-body text-center">
                                                    <div style="overflow: hidden; max-width: 100%;">
                                                        <img id="cropImage" class="img-fluid">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary"
                                                        id="cropAndSave">Crop
                                                        & Save</button>
                                                </div>
                                            </div>
                                        </div>
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
            document.addEventListener('DOMContentLoaded', function() {
                let cropper;
                let selectedFile;
                let currentImagePath = null;

                // Event Listener untuk input file baru
                const imageInput = document.getElementById('images');
                if (imageInput) {
                    imageInput.addEventListener('change', function(event) {
                        console.log('File selected'); // Untuk debugging
                        const file = event.target.files[0];

                        if (file) {
                            selectedFile = file;
                            openCropModal(URL.createObjectURL(file));
                        }
                    });
                } else {
                    console.error('Image input element not found'); // Untuk debugging
                }

                // Fungsi untuk membuka modal cropping (bisa untuk gambar lama atau baru)
                window.openCropModal = function(imageSrc, imagePath = null) {
                    console.log('Opening crop modal with image:', imageSrc); // Untuk debugging
                    currentImagePath = imagePath;
                    const image = document.getElementById('cropImage');
                    if (!image) {
                        console.error('Crop image element not found'); // Untuk debugging
                        return;
                    }
                    image.src = imageSrc;

                    // Tampilkan modal
                    const modalElement = document.getElementById('cropModal');
                    if (!modalElement) {
                        console.error('Crop modal element not found'); // Untuk debugging
                        return;
                    }

                    try {
                        const cropModal = new bootstrap.Modal(modalElement);
                        cropModal.show();

                        // Tunggu modal terbuka sebelum inisialisasi Cropper.js
                        modalElement.addEventListener('shown.bs.modal', function() {
                            console.log('Modal shown, initializing cropper'); // Untuk debugging
                            if (cropper) cropper.destroy(); // Hancurkan instance sebelumnya
                            cropper = new Cropper(image, {
                                aspectRatio: 350 / 260,
                                viewMode: 2,
                                scalable: true,
                                zoomable: true,
                                background: false
                            });
                        });
                    } catch (error) {
                        console.error('Error initializing modal:', error); // Untuk debugging
                    }
                };

                // Event untuk menyimpan hasil cropping
                const cropSaveButton = document.getElementById('cropAndSave');
                if (cropSaveButton) {
                    cropSaveButton.addEventListener('click', function() {
                        console.log('Crop and save clicked'); // Untuk debugging
                        // ... sisa kode crop dan save tidak berubah ...
                    });
                } else {
                    console.error('Crop and save button not found'); // Untuk debugging
                }

                // Event untuk menyimpan hasil cropping
                document.getElementById('cropAndSave').addEventListener('click', function() {
                    if (cropper) {
                        const highResCanvas = cropper.getCroppedCanvas({
                            width: 1400,
                            height: 1040,
                            imageSmoothingEnabled: true,
                            imageSmoothingQuality: 'high',
                            willReadFrequently: true
                        });

                        // Resize ke ukuran final
                        const finalCanvas = document.createElement('canvas');
                        finalCanvas.width = 700;
                        finalCanvas.height = 520;
                        const ctx = finalCanvas.getContext('2d', {
                            willReadFrequently: true
                        });
                        ctx.imageSmoothingEnabled = true;
                        ctx.imageSmoothingQuality = 'high';
                        ctx.drawImage(highResCanvas, 0, 0, 700, 520);

                        // Convert ke Blob (WebP untuk kualitas lebih baik)
                        finalCanvas.toBlob(function(blob) {
                            const url = URL.createObjectURL(blob);

                            // Jika gambar lama diedit, gantikan di existingImages
                            if (currentImagePath) {
                                const existingImages = document.getElementById('existingImages');
                                const oldImageElement = existingImages.querySelector(
                                    `img[data-image-path="${currentImagePath}"]`);
                                if (oldImageElement) {
                                    oldImageElement.src = url;

                                    // Tandai gambar lama sebagai dihapus
                                    const deletedImageInput = document.createElement('input');
                                    deletedImageInput.type = 'hidden';
                                    deletedImageInput.name = 'deleted_images[]';
                                    deletedImageInput.value = currentImagePath;
                                    document.querySelector('form').appendChild(deletedImageInput);
                                }
                            } else {
                                // Jika gambar baru, tambahkan ke preview
                                const previewContainer = document.getElementById('imagePreview');
                                const preview = document.createElement('div');
                                preview.classList.add('col-md-4');
                                preview.innerHTML = `<img src="${url}" class="img-fluid rounded">`;
                                previewContainer.appendChild(preview);

                                // Simpan file ke input file
                                const fileInput = document.getElementById('images');
                                const dataTransfer = new DataTransfer();
                                dataTransfer.items.add(new File([blob], selectedFile.name.replace(
                                    /\.[^/.]+$/, ".webp"), {
                                    type: 'image/webp'
                                }));
                                fileInput.files = dataTransfer.files;
                            }

                            // Tutup modal
                            const cropModal = bootstrap.Modal.getInstance(document.getElementById(
                                'cropModal'));
                            cropModal.hide();
                        }, 'image/webp', 1.0);
                    }
                });

                // Fungsi untuk menghapus gambar lama
                window.removeExistingImage = function(button, imagePath) {
                    if (confirm('Are you sure you want to remove this image?')) {
                        const imageContainer = button.closest('.col-md-4');

                        // Tambahkan input hidden untuk menyimpan gambar yang akan dihapus
                        const deletedImageInput = document.createElement('input');
                        deletedImageInput.type = 'hidden';
                        deletedImageInput.name = 'deleted_images[]';
                        deletedImageInput.value = imagePath;
                        document.querySelector('form').appendChild(deletedImageInput);

                        // Hapus dari tampilan
                        imageContainer.remove();
                    }
                };
            });
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
            $(document).ready(function() {
                $('#description').summernote({
                    placeholder: 'Enter property description',
                    height: 200,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['para', ['ul', 'ol', 'paragraph']],
                    ]
                });
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Tambahkan di bagian head dokumen HTML -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.12/dist/cropper.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

        <!-- Tambahkan di bagian akhir body sebelum script Anda -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.12/dist/cropper.min.js"></script>

    </x-layout_admin_staff>
@elseif(auth()->user()->role == 'super admin')
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
                                        <label for="title" class="form-label">Property Title *maks 15
                                            karakter*</label>
                                        <input type="text"
                                            class="form-control @error('title') is-invalid @enderror" id="title"
                                            name="title" value="{{ old('title', $property->title) }}"
                                            placeholder="Enter property title" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        rows="3" placeholder="Enter property description" required>{{ old('description', $property->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div> --}}

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description (limit hanya 2
                                            paragraf)</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                            rows="3" placeholder="Enter property description" required>{{ old('description', $property->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price (Rp) *maks 10 digit*</label>
                                        <input type="number"
                                            class="form-control @error('price') is-invalid @enderror" id="price"
                                            name="price" value="{{ old('price', $property->price) }}"
                                            placeholder="Enter price" min="0" required>
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <!-- Untuk field select -->
                                        <div class="col-md-6 mb-3">
                                            <label for="category_type_id" class="form-label">Property Type</label>
                                            <select
                                                class="form-select @error('category_type_id') is-invalid @enderror"
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
                                            <select
                                                class="form-select @error('category_location_id') is-invalid @enderror"
                                                id="category_location_id" name="category_location_id" required>
                                                <option value="">Choose location</option>
                                                @foreach ($categoryLocations as $location)
                                                    <option value="{{ $location->id }}"
                                                        {{ old('category_location_id', $property->category_location_id) == $location->id ? 'selected' : '' }}>
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
                                        <input type="text"
                                            class="form-control @error('address') is-invalid @enderror"
                                            id="address" name="address"
                                            value="{{ old('address', $property->address) }}"
                                            placeholder="Enter property address" required>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="bedrooms" class="form-label">Bedrooms</label>
                                            <input type="number"
                                                class="form-control @error('bedrooms') is-invalid @enderror"
                                                id="bedrooms" name="bedrooms"
                                                value="{{ old('bedrooms', $property->bedrooms) }}" placeholder="Qty"
                                                min="1" required>
                                            @error('bedrooms')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="bathrooms" class="form-label">Bathrooms</label>
                                            <input type="number"
                                                class="form-control @error('bathrooms') is-invalid @enderror"
                                                id="bathrooms" name="bathrooms"
                                                value="{{ old('bathrooms', $property->bathrooms) }}"
                                                placeholder="Qty" min="0" required>
                                            @error('bathrooms')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="area" class="form-label">Area (m²)</label>
                                            <input type="number"
                                                class="form-control @error('area') is-invalid @enderror"
                                                id="area" name="area"
                                                value="{{ old('area', $property->area) }}" placeholder="m²"
                                                min="0" required>
                                            @error('area')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="floor" class="form-label">Floor</label>
                                            <input type="number"
                                                class="form-control @error('floor') is-invalid @enderror"
                                                id="floor" name="floor"
                                                value="{{ old('floor', $property->floor) }}" placeholder="Qty"
                                                min="0" required>
                                            @error('floor')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="parking" class="form-label">Parking</label>
                                        <input type="number"
                                            class="form-control @error('parking') is-invalid @enderror"
                                            id="parking" name="parking"
                                            value="{{ old('parking', $property->parking) }}" placeholder="Per Car"
                                            min="1">
                                        @error('parking')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select @error('status') is-invalid @enderror"
                                            id="status" name="status" required>
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

                                    <div class="mb-4">
                                        <label for="images" class="form-label fw-semibold mb-2">Property
                                            Images</label>
                                        <div class="input-group">
                                            <input type="file"
                                                class="form-control @error('images.*') is-invalid @enderror"
                                                id="images" name="images[]" accept="image/*" multiple>
                                        </div>
                                        @error('images.*')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror

                                        <!-- Existing Images -->
                                        <div class="mt-3 row g-3" id="existingImages">
                                            @foreach (json_decode($property->images, true) ?? [] as $image)
                                                <div class="col-md-4 position-relative">
                                                    <img src="{{ asset('storage/' . $image) }}"
                                                        class="img-fluid rounded border existing-image"
                                                        data-image-path="{{ $image }}"
                                                        onclick="openCropModal('{{ asset('storage/' . $image) }}', '{{ $image }}')">
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm position-absolute"
                                                        style="top: 5px; right: 5px; border-radius: 50%; padding: 2px 6px;"
                                                        onclick="removeExistingImage(this, '{{ $image }}')">×</button>
                                                    <input type="hidden" name="existing_images[]"
                                                        value="{{ $image }}">
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Preview New Images -->
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
                                                {{-- <div class="modal-body text-center">
                                                <img id="cropImage" style="max-width: 100%;">
                                            </div> --}}
                                                <div class="modal-body text-center">
                                                    <div style="overflow: hidden; max-width: 100%;">
                                                        <img id="cropImage" class="img-fluid">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary"
                                                        id="cropAndSave">Crop
                                                        & Save</button>
                                                </div>
                                            </div>
                                        </div>
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
            document.addEventListener('DOMContentLoaded', function() {
                let cropper;
                let selectedFile;
                let currentImagePath = null;

                // Event Listener untuk input file baru
                const imageInput = document.getElementById('images');
                if (imageInput) {
                    imageInput.addEventListener('change', function(event) {
                        console.log('File selected'); // Untuk debugging
                        const file = event.target.files[0];

                        if (file) {
                            selectedFile = file;
                            openCropModal(URL.createObjectURL(file));
                        }
                    });
                } else {
                    console.error('Image input element not found'); // Untuk debugging
                }

                // Fungsi untuk membuka modal cropping (bisa untuk gambar lama atau baru)
                window.openCropModal = function(imageSrc, imagePath = null) {
                    console.log('Opening crop modal with image:', imageSrc); // Untuk debugging
                    currentImagePath = imagePath;
                    const image = document.getElementById('cropImage');
                    if (!image) {
                        console.error('Crop image element not found'); // Untuk debugging
                        return;
                    }
                    image.src = imageSrc;

                    // Tampilkan modal
                    const modalElement = document.getElementById('cropModal');
                    if (!modalElement) {
                        console.error('Crop modal element not found'); // Untuk debugging
                        return;
                    }

                    try {
                        const cropModal = new bootstrap.Modal(modalElement);
                        cropModal.show();

                        // Tunggu modal terbuka sebelum inisialisasi Cropper.js
                        modalElement.addEventListener('shown.bs.modal', function() {
                            console.log('Modal shown, initializing cropper'); // Untuk debugging
                            if (cropper) cropper.destroy(); // Hancurkan instance sebelumnya
                            cropper = new Cropper(image, {
                                aspectRatio: 350 / 260,
                                viewMode: 2,
                                scalable: true,
                                zoomable: true,
                                background: false
                            });
                        });
                    } catch (error) {
                        console.error('Error initializing modal:', error); // Untuk debugging
                    }
                };

                // Event untuk menyimpan hasil cropping
                const cropSaveButton = document.getElementById('cropAndSave');
                if (cropSaveButton) {
                    cropSaveButton.addEventListener('click', function() {
                        console.log('Crop and save clicked'); // Untuk debugging
                        // ... sisa kode crop dan save tidak berubah ...
                    });
                } else {
                    console.error('Crop and save button not found'); // Untuk debugging
                }

                // Event untuk menyimpan hasil cropping
                document.getElementById('cropAndSave').addEventListener('click', function() {
                    if (cropper) {
                        const highResCanvas = cropper.getCroppedCanvas({
                            width: 1400,
                            height: 1040,
                            imageSmoothingEnabled: true,
                            imageSmoothingQuality: 'high',
                            willReadFrequently: true
                        });

                        // Resize ke ukuran final
                        const finalCanvas = document.createElement('canvas');
                        finalCanvas.width = 700;
                        finalCanvas.height = 520;
                        const ctx = finalCanvas.getContext('2d', {
                            willReadFrequently: true
                        });
                        ctx.imageSmoothingEnabled = true;
                        ctx.imageSmoothingQuality = 'high';
                        ctx.drawImage(highResCanvas, 0, 0, 700, 520);

                        // Convert ke Blob (WebP untuk kualitas lebih baik)
                        finalCanvas.toBlob(function(blob) {
                            const url = URL.createObjectURL(blob);

                            // Jika gambar lama diedit, gantikan di existingImages
                            if (currentImagePath) {
                                const existingImages = document.getElementById('existingImages');
                                const oldImageElement = existingImages.querySelector(
                                    `img[data-image-path="${currentImagePath}"]`);
                                if (oldImageElement) {
                                    oldImageElement.src = url;

                                    // Tandai gambar lama sebagai dihapus
                                    const deletedImageInput = document.createElement('input');
                                    deletedImageInput.type = 'hidden';
                                    deletedImageInput.name = 'deleted_images[]';
                                    deletedImageInput.value = currentImagePath;
                                    document.querySelector('form').appendChild(deletedImageInput);
                                }
                            } else {
                                // Jika gambar baru, tambahkan ke preview
                                const previewContainer = document.getElementById('imagePreview');
                                const preview = document.createElement('div');
                                preview.classList.add('col-md-4');
                                preview.innerHTML = `<img src="${url}" class="img-fluid rounded">`;
                                previewContainer.appendChild(preview);

                                // Simpan file ke input file
                                const fileInput = document.getElementById('images');
                                const dataTransfer = new DataTransfer();
                                dataTransfer.items.add(new File([blob], selectedFile.name.replace(
                                    /\.[^/.]+$/, ".webp"), {
                                    type: 'image/webp'
                                }));
                                fileInput.files = dataTransfer.files;
                            }

                            // Tutup modal
                            const cropModal = bootstrap.Modal.getInstance(document.getElementById(
                                'cropModal'));
                            cropModal.hide();
                        }, 'image/webp', 1.0);
                    }
                });

                // Fungsi untuk menghapus gambar lama
                window.removeExistingImage = function(button, imagePath) {
                    if (confirm('Are you sure you want to remove this image?')) {
                        const imageContainer = button.closest('.col-md-4');

                        // Tambahkan input hidden untuk menyimpan gambar yang akan dihapus
                        const deletedImageInput = document.createElement('input');
                        deletedImageInput.type = 'hidden';
                        deletedImageInput.name = 'deleted_images[]';
                        deletedImageInput.value = imagePath;
                        document.querySelector('form').appendChild(deletedImageInput);

                        // Hapus dari tampilan
                        imageContainer.remove();
                    }
                };
            });
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
            $(document).ready(function() {
                $('#description').summernote({
                    placeholder: 'Enter property description',
                    height: 200,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['para', ['ul', 'ol', 'paragraph']],
                    ]
                });
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Tambahkan di bagian head dokumen HTML -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.12/dist/cropper.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

        <!-- Tambahkan di bagian akhir body sebelum script Anda -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.12/dist/cropper.min.js"></script>

    </x-layout_admin>
@endif
