<!DOCTYPE html>
<html lang="en">

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

  <title>Detail Tempat Kuliner</title>
</head>

<body>
<!-- Title Section -->
<section class="py-5 bg-light">
  <div class="container">
    <h1 class="text-center fw-bold">Detail Tempat Kuliner</h1>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row g-5 align-items-center">
      <!-- Gambar Tempat Kuliner -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="img-fluid rounded-4 overflow-hidden shadow-sm">
          <img src="{{ asset('uploads/' . $upload->image) }}" alt="{{ $upload->name }}" class="img-fluid kuliner-image" />
        </div>
      </div>

      <!-- Informasi Tempat Kuliner -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <h2 class="mb-3 fw-semibold">{{ $upload->name }}</h2>
        <p class="text-muted mb-4">{{ $upload->description }}</p>

        <ul class="list-unstyled mb-4">
          <li class="d-flex align-items-start mb-3">
            <span class="me-2"><i class="flaticon-price-tag fs-4 text-primary"></i></span>
            <div>
              <strong>Rentang Harga:</strong> <br> {{ $upload->price_range }}
            </div>
          </li>
          <li class="d-flex align-items-start mb-3">
            <span class="me-2"><i class="flaticon-food fs-4 text-primary"></i></span>
            <div>
              <strong>Kategori:</strong> <br> {{ $upload->category }}
            </div>
          </li>
          <li class="d-flex align-items-start mb-3">
            <span class="me-2"><i class="flaticon-location fs-4 text-primary"></i></span>
            <div>
              <strong>Alamat:</strong> <br> {{ $upload->address }}
            </div>
          </li>
        </ul>
      </div>
    </div>

    <!-- Peta Lokasi (Ditempatkan di bawah informasi) -->
    <div class="mb-4 mt-5 text-center">
      <h5 class="fw-bold mb-3">Lokasi di Peta</h5>
      <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-sm" style="max-width: 600px; margin: auto;">
        <iframe 
          src="https://www.google.com/maps?q={{ urlencode($upload->address) }}&output=embed"
          allowfullscreen
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>

    <!-- Tombol Kembali -->
    <div class="text-center">
      <a href="{{ url()->previous() }}" class="btn btn-primary px-4 py-2 rounded-pill">← Kembali</a>
    </div>

  </div>
</section>

<!-- Review and Rating Section -->
<div class="section bg-light py-5">
  <div class="container">
    <h3 class="mb-4">Tulis Review Anda</h3>

    <form method="POST" action="{{ route('review.store', $upload->id) }}">
      @csrf
      <div class="mb-3">
        <label for="rating" class="form-label">Rating</label>
        <div class="star-rating">
          <input type="radio" id="star5" name="rating" value="5" required /><label for="star5" class="star">&#9733;</label>
          <input type="radio" id="star4" name="rating" value="4" required /><label for="star4" class="star">&#9733;</label>
          <input type="radio" id="star3" name="rating" value="3" required /><label for="star3" class="star">&#9733;</label>
          <input type="radio" id="star2" name="rating" value="2" required /><label for="star2" class="star">&#9733;</label>
          <input type="radio" id="star1" name="rating" value="1" required /><label for="star1" class="star">&#9733;</label>
        </div>
      </div>

      <div class="mb-3">
        <label for="review" class="form-label">Review Anda</label>
        <textarea name="review" id="review" class="form-control" rows="4" placeholder="Tulis review anda..." required></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Kirim Review</button>
    </form>

    <!-- Displaying existing reviews -->
    <h4 class="mt-5">Review Pengguna</h4>
    @foreach($reviews as $review)
      <div class="review-item bg-white rounded-3 shadow-sm p-3 my-3">
        <div class="d-flex justify-content-between align-items-center">
          <strong>{{ $review->user->name }}</strong>
          <span class="text-warning">
            @for($i = 0; $i < $review->rating; $i++)
              &#9733;
            @endfor
          </span>
        </div>
        <p class="mt-2">{{ $review->review }}</p>
      </div>
    @endforeach

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

<script>
  AOS.init();
</script>

</body>

</html>
