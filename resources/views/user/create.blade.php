<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="{{ asset('backend/property-1.0.0/fonts/icomoon/style.css')}}" />
    <link rel="stylesheet" href="{{ asset('backend/property-1.0.0/fonts/flaticon/font/flaticon.css')}}" />
    <link rel="stylesheet" href="{{ asset('backend/property-1.0.0/css/tiny-slider.css')}}" />
    <link rel="stylesheet" href="{{ asset('backend/property-1.0.0/css/aos.css')}}" />
    <link rel="stylesheet" href="{{ asset('backend/property-1.0.0/css/style.css')}}" />

    <title>Upload Tempat Kuliner</title>
  </head>
  <body>
    <div class="container mt-5">
      <h1 class="heading mb-4">Upload Tempat Kuliner</h1>

      <!-- Form Upload -->
      <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
          <label for="name">Nama Tempat Kuliner</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Nama Tempat Kuliner" required>
        </div>

        <div class="form-group mb-3">
          <label for="description">Deskripsi</label>
          <textarea name="description" class="form-control" id="description" rows="3" placeholder="Deskripsi Tempat Kuliner" required></textarea>
        </div>

        <div class="form-group mb-3">
          <label for="price_range">Rentang Harga</label>
          <input type="text" name="price_range" class="form-control" id="price_range" placeholder="Rentang Harga (misal: Rp 10.000 - Rp 50.000)" required>
        </div>

        <div class="form-group mb-3">
          <label for="address">Alamat (terverifikasi dengan Google Maps)</label>
          <input type="text" name="address" class="form-control" id="address" placeholder="Alamat Tempat Kuliner" required>
        </div>

        <div class="form-group mb-3">
          <label for="image">Gambar</label>
          <input type="file" name="image" class="form-control" id="image" required>
      <div class="form-group">
  <a href="javascript:history.back()" class="btn btn-secondary me-2">Kembali</a>
  <button type="submit" class="btn btn-primary">Upload</button>
</div>


    <script src="{{ asset('backend/property-1.0.0/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('backend/property-1.0.0/js/tiny-slider.js')}}"></script>
    <script src="{{ asset('backend/property-1.0.0/js/aos.js')}}"></script>
    <script src="{{ asset('backend/property-1.0.0/js/navbar.js')}}"></script>
    <script src="{{ asset('backend/property-1.0.0/js/counter.js')}}"></script>
    <script src="{{ asset('backend/property-1.0.0/js/custom.js')}}"></script>
  </body>
</html>
