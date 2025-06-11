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

    <title>
        Kulinery Jakarta
    </title>
</head>
<body>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
        <div class="container">
                <div class="site-navigation">
                    <a href="{{ url('/') }}" class="logo m-0 float-start">Kulineran Bareng</a>

                    <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                        <li class="active"><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('user.create') }}">Upload Kuliner</a></li>
                        <li><a href="{{ route('user.profil') }}">Profil</a></li>
                        <li>
                            <a href="{{ route('logout') }} "
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                               Login
                            </a>
                        </li>
                    </ul>
                    <!-- Form Logout -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <a href="#" class="burger light me-auto float-end mt-1 site-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
                        <span></span>
                    </a>
                </div>
        </div>
    </nav>

    <div class="hero">
        <div class="hero-slide">
            <div class="img overlay" style="background-image: url('{{ asset('backend/property-1.0.0/images/1.png') }}')"></div>
            <div class="img overlay" style="background-image: url('{{ asset('backend/property-1.0.0/images/2.png') }}')"></div>
            <div class="img overlay" style="background-image: url('{{ asset('backend/property-1.0.0/images/3.png') }}')"></div>
        </div>

      <div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-9 text-center">
            <h1 class="heading" data-aos="fade-up">
                Cari Tempat Kuliner
            </h1>
           <form action="{{ route('user.dashboard') }}" method="GET" class="narrow-w form-search d-flex align-items-stretch mb-3 gap-2 flex-wrap justify-content-center" data-aos="fade-up" data-aos-delay="200">
    <input type="text" name="keyword" class="form-control px-4" placeholder="Masukkan Nama Kuliner" value="{{ request('keyword') }}" />

    <select name="lokasi" class="form-control px-4">
      <option value="">-- Pilih Lokasi --</option>
<option value="Gambir" {{ request('lokasi') == 'Gambir' ? 'selected' : '' }}>Gambir</option>
<option value="Tanah Abang" {{ request('lokasi') == 'Tanah Abang' ? 'selected' : '' }}>Tanah Abang</option>
<option value="Menteng" {{ request('lokasi') == 'Menteng' ? 'selected' : '' }}>Menteng</option>
<option value="Senen" {{ request('lokasi') == 'Senen' ? 'selected' : '' }}>Senen</option>
<option value="Cempaka Putih" {{ request('lokasi') == 'Cempaka Putih' ? 'selected' : '' }}>Cempaka Putih</option>
<option value="Kemayoran" {{ request('lokasi') == 'Kemayoran' ? 'selected' : '' }}>Kemayoran</option>
<option value="Johar Baru" {{ request('lokasi') == 'Johar Baru' ? 'selected' : '' }}>Johar Baru</option>
<option value="Sawah Besar" {{ request('lokasi') == 'Sawah Besar' ? 'selected' : '' }}>Sawah Besar</option>
<option value="Pasar Baru" {{ request('lokasi') == 'Pasar Baru' ? 'selected' : '' }}>Pasar Baru</option>
<option value="Penjaringan" {{ request('lokasi') == 'Penjaringan' ? 'selected' : '' }}>Penjaringan</option>
<option value="Pademangan" {{ request('lokasi') == 'Pademangan' ? 'selected' : '' }}>Pademangan</option>
<option value="Tanjung Priok" {{ request('lokasi') == 'Tanjung Priok' ? 'selected' : '' }}>Tanjung Priok</option>
<option value="Koja" {{ request('lokasi') == 'Koja' ? 'selected' : '' }}>Koja</option>
<option value="Kelapa Gading" {{ request('lokasi') == 'Kelapa Gading' ? 'selected' : '' }}>Kelapa Gading</option>
<option value="Cilincing" {{ request('lokasi') == 'Cilincing' ? 'selected' : '' }}>Cilincing</option>
<option value="Cengkareng" {{ request('lokasi') == 'Cengkareng' ? 'selected' : '' }}>Cengkareng</option>
<option value="Grogol Petamburan" {{ request('lokasi') == 'Grogol Petamburan' ? 'selected' : '' }}>Grogol Petamburan</option>
<option value="Taman Sari" {{ request('lokasi') == 'Taman Sari' ? 'selected' : '' }}>Taman Sari</option>
<option value="Tambora" {{ request('lokasi') == 'Tambora' ? 'selected' : '' }}>Tambora</option>
<option value="Palmerah" {{ request('lokasi') == 'Palmerah' ? 'selected' : '' }}>Palmerah</option>
<option value="Kalideres" {{ request('lokasi') == 'Kalideres' ? 'selected' : '' }}>Kalideres</option>
<option value="Kebon Jeruk" {{ request('lokasi') == 'Kebon Jeruk' ? 'selected' : '' }}>Kebon Jeruk</option>
<option value="Kebayoran Baru" {{ request('lokasi') == 'Kebayoran Baru' ? 'selected' : '' }}>Kebayoran Baru</option>
<option value="Kebayoran Lama" {{ request('lokasi') == 'Kebayoran Lama' ? 'selected' : '' }}>Kebayoran Lama</option>
<option value="Pesanggrahan" {{ request('lokasi') == 'Pesanggrahan' ? 'selected' : '' }}>Pesanggrahan</option>
<option value="Cilandak" {{ request('lokasi') == 'Cilandak' ? 'selected' : '' }}>Cilandak</option>
<option value="Pasar Minggu" {{ request('lokasi') == 'Pasar Minggu' ? 'selected' : '' }}>Pasar Minggu</option>
<option value="Jagakarsa" {{ request('lokasi') == 'Jagakarsa' ? 'selected' : '' }}>Jagakarsa</option>
<option value="Mampang Prapatan" {{ request('lokasi') == 'Mampang Prapatan' ? 'selected' : '' }}>Mampang Prapatan</option>
<option value="Pancoran" {{ request('lokasi') == 'Pancoran' ? 'selected' : '' }}>Pancoran</option>
<option value="Tebet" {{ request('lokasi') == 'Tebet' ? 'selected' : '' }}>Tebet</option>
<option value="Setiabudi" {{ request('lokasi') == 'Setiabudi' ? 'selected' : '' }}>Setiabudi</option>
<option value="Matraman" {{ request('lokasi') == 'Matraman' ? 'selected' : '' }}>Matraman</option>
<option value="Pulo Gadung" {{ request('lokasi') == 'Pulo Gadung' ? 'selected' : '' }}>Pulo Gadung</option>
<option value="Jatinegara" {{ request('lokasi') == 'Jatinegara' ? 'selected' : '' }}>Jatinegara</option>
<option value="Duren Sawit" {{ request('lokasi') == 'Duren Sawit' ? 'selected' : '' }}>Duren Sawit</option>
<option value="Kramat Jati" {{ request('lokasi') == 'Kramat Jati' ? 'selected' : '' }}>Kramat Jati</option>
<option value="Ciracas" {{ request('lokasi') == 'Ciracas' ? 'selected' : '' }}>Ciracas</option>
<option value="Cakung" {{ request('lokasi') == 'Cakung' ? 'selected' : '' }}>Cakung</option>
<option value="Makasar" {{ request('lokasi') == 'Makasar' ? 'selected' : '' }}>Makasar</option>
<option value="Pasar Rebo" {{ request('lokasi') == 'Pasar Rebo' ? 'selected' : '' }}>Pasar Rebo</option>
        <option value="pasar baru" {{ request('lokasi') == 'pasar baru' ? 'selected' : '' }}>pasar baru</option>
    </select>

    <button type="submit" class="btn btn-primary">Pencarian</button>
</form>

        </div>
    </div>
</div>
    <div class="section py-5">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6">
                    <h2 class="font-weight-bold text-primary heading">Populer Tempat Kuliner</h2>
                </div>

                <div class="row g-5 justify-content-center">
                    @if ($uploads->count() > 0)
                        @foreach ($uploads as $upload)
                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                <div class="property-item d-flex flex-column align-items-center justify-content-center">
                                    <a href="#" class="img">
                                        <img src="{{ asset('uploads/' . $upload->image) }}" alt="{{ $upload->name }}" class="img-fluid">
                                    </a>
                                    <div class="property-content text-center">
                                        <div class="price mb-2"><span>{{ $upload->name }}</span></div>
                                        <p>{{ Str::limit($upload->description, 100) }}</p>
                                        <span class="city d-block mb-3">{{ $upload->price_range }}</span>
                                        <a href="{{ route('kuliner.show', $upload->id) }}" class="btn btn-primary py-2 px-3">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <p>Belum ada tempat kuliner yang diunggah.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>Links</h3>
                        <ul class="list-unstyled links">
                            <li><a href="#">Our Vision</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>Social</h3>
                        <ul class="list-unstyled social">
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>Contact</h3>
                        <ul class="list-unstyled links mb-4">
                            <li><a href="tel://11234567890">+62 812 3456 7890</a></li>
                            <li><a href="mailto:info@untree.co">info@kulineryjakarta.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center text-center mt-5">
                <div class="col-md-7">
                    <address>South Jakarta, Jakarta, Indonesia</address>
                    <p class="copyright">&copy; Copyright Kulinery Jakarta. All Rights Reserved 2025.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <script src="{{ asset('backend/property-1.0.0/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('backend/property-1.0.0/js/tiny-slider.js')}}"></script>
    <script src="{{ asset('backend/property-1.0.0/js/aos.js')}}"></script>
    <script src="{{ asset('backend/property-1.0.0/js/navbar.js')}}"></script>
    <script src="{{ asset('backend/property-1.0.0/js/counter.js')}}"></script>
    <script src="{{ asset('backend/property-1.0.0/js/custom.js')}}"></script>
</body>
</html>
