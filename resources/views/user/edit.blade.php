<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="{{ asset('backend/property-1.0.0/images/favicon.png') }}" />
    <meta name="description" content="Detail Tempat Kuliner" />
    <meta name="keywords" content="kuliner, tempat makan, review" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('backend/property-1.0.0/fonts/icomoon/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/property-1.0.0/fonts/flaticon/font/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/property-1.0.0/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/property-1.0.0/css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/property-1.0.0/css/style.css') }}" />
    <!-- Tambahan CSS Custom -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <title>Edit Tempat Kuliner</title>
</head>
<body>
    <section class="py-5 bg-light">
        <div class="container">
            <h1 class="text-center fw-bold">Edit Tempat Kuliner</h1>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="{{ route('user.update', $upload->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nama Tempat Kuliner -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Tempat Kuliner</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $upload->name) }}" required>
                        </div>

                        <!-- Deskripsi Tempat Kuliner -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', $upload->description) }}</textarea>
                        </div>

                        <!-- Rentang Harga -->
                        <div class="mb-3">
                            <label for="price_range" class="form-label">Rentang Harga</label>
                            <input type="text" name="price_range" id="price_range" class="form-control" value="{{ old('price_range', $upload->price_range) }}">
                        </div>
                        <!-- Alamat Tempat Kuliner -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $upload->address) }}" required>
                        </div>
                        <!-- Gambar Tempat Kuliner -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Tempat Kuliner</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @if($upload->image)
                                <img src="{{ asset('uploads/' . $upload->image) }}" alt="current image" class="mt-3" width="150">
                            @endif
                        </div>

                      <!-- Tombol Simpan dan Batal -->
<<!-- Tombol Simpan dan Batal -->
<div class="d-flex justify-content-start">
    <!-- Tombol Simpan -->
    <button type="submit" class="btn btn-success btn-sm rounded-pill">Simpan Perubahan</button>

    <!-- Tombol Batal -->
    <a href="{{ route('user.profil', $upload->id) }}" class="btn btn-secondary btn-sm rounded-pill ml-3">Batal</a>
</div>


                </div>
            </div>
        </div>
    </section>

        <!-- JS Libraries -->
    <script src="{{ asset('backend/property-1.0.0/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/property-1.0.0/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('backend/property-1.0.0/js/aos.js') }}"></script>
    <script src="{{ asset('backend/property-1.0.0/js/navbar.js') }}"></script>
    <script src="{{ asset('backend/property-1.0.0/js/counter.js') }}"></script>
    <script src="{{ asset('backend/property-1.0.0/js/custom.js') }}"></script>
    <!-- Tambahan JS Custom -->
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
