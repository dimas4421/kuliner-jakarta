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
  <title>Profil Pengguna</title>
</head>
<body>

<!-- Bagian Judul -->
<section class="py-5 bg-light">
  <div class="container">
    <h1 class="text-center fw-bold">Profil Pengguna</h1>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <!-- Informasi Pengguna -->
    <div class="row mb-5">
      <div class="col-md-8 offset-md-2 text-center">
        <h2 class="fw-bold">{{ $user->name }}</h2>
        <p class="text-muted">{{ $user->email }}</p>
      </div>
    </div>

    <!-- Tempat Kuliner yang Diunggah Pengguna -->
    <div class="row">
      <div class="col-lg-12 mb-4">
        <h3 class="fw-bold">Tempat Kuliner yang Anda Unggah</h3>
      </div>

      @if ($uploads->count() > 0)
        @foreach ($uploads as $upload)
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm border-0">
              <img src="{{ asset('uploads/' . $upload->image) }}" class="card-img-top" alt="{{ $upload->name }}">
              <div class="card-body">
                <h5 class="card-title">{{ $upload->name }}</h5>
                <p class="card-text">{{ Str::limit($upload->description, 100) }}</p>
                <p class="card-text"><small class="text-muted">{{ $upload->price_range }}</small></p>
                <a href="{{ route('user.show', $upload->id) }}" class="btn btn-primary btn-sm rounded-pill">Lihat Detail</a>
                <a href="{{ route('user.edit', $upload->id) }}" class="btn btn-warning btn-sm rounded-pill mt-3">Edit Tempat Kuliner</a>



                <!-- Tombol Hapus Tempat Kuliner -->
                <form action="{{ route('user.upload.delete', $upload->id) }}" method="POST" class="mt-3">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm rounded-pill">Hapus Tempat Kuliner</button>
                </form>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <div class="col-12 text-center">
          <p>Anda belum mengunggah tempat kuliner.</p>
        </div>
      @endif
    </div>
 <div class="row">
  <div class="col-lg-12 mb-4">
    <h3 class="fw-bold">Ubah User Login</h3>
  </div>
      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label">Email Baru</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label for="password" class="form-label">Password Baru</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password baru (opsional)">
      </div>

      <!-- Konfirmasi Password -->
      <div class="mb-4">
        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
      </div>

      <!-- Tombol Simpan dan Kembali -->
      <div class="text-center mt-4">
        <button type="submit" class="btn btn-success btn-sm rounded-pill me-2">Simpan Perubahan</button>
        <a href="{{ route('user.dashboard') }}" class="btn btn-secondary btn-sm rounded-pill">Kembali</a>
      </div>
    </form>
  </div>
</div>

 <!-- Footer -->
<footer class="site-footer mt-5">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <p class="text-muted">&copy; 2025 Kuliner Jakarta. All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </footer>

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
