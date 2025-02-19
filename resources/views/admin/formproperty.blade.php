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
                                        {{-- <label class="input-group-text" for="images">Browse</label> --}}
                                    </div>
                                    @error('images.*')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror

                                    <div id="imagePreview" class="mt-3 row g-3"></div>
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

                if (imageFiles.length === 0) {
                    imagePreview.innerHTML = `
                        <div class="col-12">
                            <div class="text-center p-3 border rounded bg-light">
                                <p class="text-muted mb-0">No images selected</p>
                            </div>
                        </div>`;
                    return;
                }

                imageFiles.forEach((file, index) => {
                    if (!file.type.startsWith("image/")) return;

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const div = document.createElement("div");
                        div.className = "col-6 col-sm-4 col-md-3 col-lg-2";

                        div.innerHTML = `
                            <div class="card h-100 position-relative image-card">
                                <div class="ratio ratio-1x1">
                                    <img src="${e.target.result}" 
                                        class="card-img-top object-fit-cover" 
                                        alt="Preview">
                                </div>
                                <button type="button" 
                                    class="btn-close position-absolute top-0 end-0 m-2 bg-white rounded-circle" 
                                    onclick="removeImage(${index})"
                                    style="width: 20px; height: 20px;">
                                </button>
                                <div class="card-footer p-2 bg-light">
                                    <small class="text-muted text-truncate d-block">${file.name}</small>
                                </div>
                            </div>
                        `;
                        imagePreview.appendChild(div);
                    };
                    reader.readAsDataURL(file);
                });
            }

            window.removeImage = function(index) {
                imageFiles.splice(index, 1);
                const dt = new DataTransfer();
                imageFiles.forEach(file => dt.items.add(file));
                imageInput.files = dt.files;
                updatePreview();
            };

            // Add some CSS
            const style = document.createElement('style');
            style.textContent = `
                .image-card {
                    transition: all 0.3s ease;
                    border: 1px solid rgba(0,0,0,.125);
                }
                .image-card:hover {
                    box-shadow: 0 4px 8px rgba(0,0,0,.1);
                    transform: translateY(-2px);
                }
                .btn-close {
                    opacity: 0.8;
                    transition: opacity 0.2s ease;
                }
                .btn-close:hover {
                    opacity: 1;
                }
            `;
            document.head.appendChild(style);
        });
    </script>

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
