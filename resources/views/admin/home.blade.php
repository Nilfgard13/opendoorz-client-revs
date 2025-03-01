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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Form Edit Landing Page</h5>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('landingPage.insert') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="address" class="form-label">Company Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $landingPage->address ?? 'N/A' }}">
                            </div>

                            <div class="mb-3">
                                <label for="number" class="form-label">Company Number Phone</label>
                                <input type="number" class="form-control" id="number" name="number"
                                    value="{{ $landingPage->number ?? '0' }}">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Company Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $landingPage->email ?? 'info@company.com' }}">
                            </div>

                            {{-- <div class="mb-3">
                                <label for="slogan" class="form-label">Header Slogan</label>
                                <input type="text" class="form-control" id="slogan" name="slogan"
                                    value="{{ $landingPage->slogan ?? 'empty' }}">
                            </div> --}}

                            <div class="mb-3">
                                <label for="url" class="form-label">YouTube URL</label>
                                <input type="text" class="form-control" id="url" name="url"
                                    value="{{ $landingPage->url ?? 'https://www.youtube.com/' }}">
                            </div>

                            <div class="mb-3">
                                <label for="url-ig" class="form-label">Instagram URL</label>
                                <input type="text" class="form-control" id="url-ig" name="url_ig"
                                    value="{{ $landingPage->url_ig ?? 'https://www.instagram.com/' }}">
                            </div>

                            <div class="mb-3">
                                <label for="experience" class="form-label">Company Experience (Years)</label>
                                <input type="number" class="form-control" id="experience" name="experience"
                                    value="{{ $landingPage->experience ?? '0' }}">
                            </div>

                            <div class="mb-3">
                                <label for="gmap" class="form-label">Company Location (Google Maps)</label>
                                <input type="text" class="form-control" id="gmap" name="gmap"
                                    value="{{ $landingPage->gmap ?? 'empty' }}">
                            </div>

                            {{-- <!-- Image Upload -->
                            <div class="mb-4">
                                <label for="images" class="form-label fw-semibold">Property Images (1600x800)</label>
                                <input type="file" class="form-control" id="images" name="images[]"
                                    accept="image/*" multiple>
                            </div> --}}

                            {{-- <div class="mb-4">
                                <label for="thumbnails" class="form-label fw-semibold">Youtube thumbnails
                                    (1070x480)</label>
                                <input type="file" class="form-control" id="thumbnails" name="thumbnails[]"
                                    accept="thumbnails/*">

                                <div class="mt-3">
                                    <p>Current Image:</p>
                                    @php
                                        $images = !empty($landingPage->thumbnails)
                                            ? json_decode($landingPage->thumbnails, true)
                                            : [];
                                        $imagePath =
                                            !empty($images) && isset($images[0])
                                                ? asset('storage/' . $images[0])
                                                : asset('user/assets/images/video-frame.jpg');
                                    @endphp
                                    <img src="{{ $imagePath }}" alt="No Image" class="img-fluid"
                                        style="max-width: 200px;">
                                </div>
                            </div> --}}

                            <div class="mb-4">
                                <label for="thumbnail_input" class="form-label fw-semibold">Youtube thumbnails
                                    (1070x480)</label>

                                <!-- Original file input (hidden) -->
                                <input type="file" class="form-control" id="thumbnail_input"
                                    accept="image/jpeg,image/png,image/jpg,image/gif" style="display: none;">

                                <!-- Custom file select button -->
                                <div class="d-flex align-items-center">
                                    <button type="button" class="btn btn-primary" id="select-image-btn">Select
                                        Image</button>
                                    <span class="ms-3" id="selected-file-name">No file selected</span>
                                </div>

                                <!-- Modal for Cropper -->
                                <div class="modal fade" id="cropperModal" tabindex="-1"
                                    aria-labelledby="cropperModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="cropperModalLabel">Crop Image</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="img-container" style="height: 400px;">
                                                            <img id="image-to-crop" src=""
                                                                alt="Image to crop" class="img-fluid">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="d-flex flex-column">
                                                            <div class="preview-label mb-2">Preview (1070x480):</div>
                                                            <div class="preview"
                                                                style="width: 100%; overflow: hidden; height: 200px; background-color: #f8f9fa; border: 1px solid #dee2e6;">
                                                            </div>

                                                            <div class="mt-3">
                                                                <div class="d-flex justify-content-between mb-2">
                                                                    <span>Zoom:</span>
                                                                    <span id="zoom-value">100%</span>
                                                                </div>
                                                                <input type="range" class="form-range"
                                                                    id="zoom-range" min="0.1" max="3"
                                                                    step="0.1" value="1">
                                                            </div>

                                                            <div class="mt-3">
                                                                <div class="crop-info">
                                                                    <p class="mb-1"><small>• Drag the image to
                                                                            position</small></p>
                                                                    <p class="mb-1"><small>• Use mouse wheel to
                                                                            zoom</small></p>
                                                                    <p class="mb-1"><small>• Aspect ratio locked to
                                                                            1070x480</small></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-primary" id="crop-button">Crop
                                                    & Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- File input for the actual form submission -->
                                <input type="file" name="thumbnails[]" id="thumbnails" style="display: none;">

                                <!-- Preview of current/cropped image -->
                                <div class="mt-3">
                                    <p>Current Image:</p>
                                    <div class="position-relative">
                                        @php
                                            $images = !empty($landingPage->thumbnails)
                                                ? json_decode($landingPage->thumbnails, true)
                                                : [];
                                            $imagePath =
                                                !empty($images) && isset($images[0])
                                                    ? asset('storage/' . $images[0])
                                                    : asset('user/assets/images/video-frame.jpg');
                                        @endphp
                                        <img src="{{ $imagePath }}" alt="No Image" id="thumbnail-preview"
                                            class="img-fluid rounded" style="max-width: 200px;">
                                        <div id="image-overlay"
                                            class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center"
                                            style="background-color: rgba(0, 0, 0, 0.1); display: none !important;">
                                            <button type="button" class="btn btn-sm btn-light"
                                                id="change-image-btn">Change</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit -->
                            <button type="submit" class="btn btn-primary">Edit</button>
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



    <!-- CSS for Cropperjs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css">

    <!-- JavaScript for handling the cropping functionality -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // DOM elements
            const fileInput = document.getElementById('thumbnail_input');
            const selectButton = document.getElementById('select-image-btn');
            const changeButton = document.getElementById('change-image-btn');
            const fileNameDisplay = document.getElementById('selected-file-name');
            const cropperModal = new bootstrap.Modal(document.getElementById('cropperModal'));
            const imageToCrop = document.getElementById('image-to-crop');
            const cropButton = document.getElementById('crop-button');
            const formFileInput = document.getElementById('thumbnails');
            const thumbnailPreview = document.getElementById('thumbnail-preview');
            const imageOverlay = document.getElementById('image-overlay');
            const zoomRange = document.getElementById('zoom-range');
            const zoomValue = document.getElementById('zoom-value');

            // Cropper instance
            let cropper;
            let originalFile = null;

            // When select button is clicked
            selectButton.addEventListener('click', function() {
                fileInput.click();
            });

            // Show overlay on preview image hover
            thumbnailPreview.addEventListener('mouseenter', function() {
                imageOverlay.style.display = 'flex !important';
            });

            thumbnailPreview.addEventListener('mouseleave', function() {
                imageOverlay.style.display = 'none !important';
            });

            // When change button is clicked
            changeButton.addEventListener('click', function() {
                fileInput.click();
            });

            // When file is selected
            fileInput.addEventListener('change', function(e) {
                const files = e.target.files;

                if (files && files.length > 0) {
                    originalFile = files[0];
                    fileNameDisplay.textContent = originalFile.name;

                    // Check if the file is an image
                    if (!originalFile.type.startsWith('image/')) {
                        alert('Please select an image file.');
                        return;
                    }

                    // Create a FileReader to read the image
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        // Set the image source
                        imageToCrop.src = e.target.result;

                        // Show the modal
                        cropperModal.show();

                        // Initialize cropper after image is loaded and modal is shown
                        imageToCrop.onload = function() {
                            // Destroy existing cropper if any
                            if (cropper) {
                                cropper.destroy();
                            }

                            // Initialize Cropper.js
                            cropper = new Cropper(imageToCrop, {
                                aspectRatio: 1070 / 480,
                                viewMode: 1,
                                preview: '.preview',
                                zoomable: true,
                                minContainerWidth: 300,
                                minContainerHeight: 200,
                                ready: function() {
                                    // Auto crop the entire image while maintaining aspect ratio
                                    const containerData = cropper.getContainerData();
                                    const cropBoxData = cropper.getCropBoxData();

                                    cropBoxData.width = containerData.width;
                                    cropBoxData.height = containerData.width * (480 /
                                        1070);

                                    cropper.setCropBoxData(cropBoxData);
                                }
                            });
                        };
                    };

                    reader.readAsDataURL(originalFile);
                }
            });

            // Update zoom value display
            zoomRange.addEventListener('input', function() {
                if (cropper) {
                    const zoomValue = parseFloat(this.value);
                    cropper.zoomTo(zoomValue);
                    document.getElementById('zoom-value').textContent = (zoomValue * 100).toFixed(0) + '%';
                }
            });

            // When crop button is clicked
            cropButton.addEventListener('click', function() {
                if (!cropper) return;

                // Get the cropped canvas
                const canvas = cropper.getCroppedCanvas({
                    width: 1070,
                    height: 480
                });

                if (canvas) {
                    // Convert canvas to blob
                    canvas.toBlob(function(blob) {
                        // Create a new File object from the blob
                        const croppedFile = new File([blob], originalFile.name, {
                            type: originalFile.type,
                            lastModified: Date.now()
                        });

                        // Create a DataTransfer object to create a FileList
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(croppedFile);

                        // Set the cropped file to the actual form input
                        formFileInput.files = dataTransfer.files;

                        // Update the preview image
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            thumbnailPreview.src = e.target.result;
                        };
                        reader.readAsDataURL(blob);

                        // Hide the modal
                        cropperModal.hide();

                        // Reset the temp file input
                        fileInput.value = '';

                        // Destroy cropper
                        cropper.destroy();
                        cropper = null;
                    }, originalFile.type);
                }
            });

            // When modal is hidden
            document.getElementById('cropperModal').addEventListener('hidden.bs.modal', function() {
                // Reset the file input if no crop was performed
                if (cropper) {
                    fileInput.value = '';
                    fileNameDisplay.textContent = 'No file selected';

                    // Destroy cropper
                    cropper.destroy();
                    cropper = null;
                }
            });

            // Handle form submission to ensure the cropped file is included
            document.querySelector('form').addEventListener('submit', function(e) {
                // If formFileInput has no files and is required, prevent submission
                if (formFileInput.required && formFileInput.files.length === 0) {
                    e.preventDefault();
                    alert('Please select and crop an image.');
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</x-layout_admin>
