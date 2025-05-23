<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Punyaa Bicopii</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Satisfy:wght@400&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Delicious
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header fixed-top">

        <div class="branding d-flex align-items-cente">

            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <!-- <img src="assets/img/logo.png" alt=""> -->
                    <h1 class="sitename">Bicopi</h1>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="#hero" class="active">Beranda</a></li>
                        <li><a href="#about">Tentang Kami</a></li>
                        <li><a href="#gallery">Galeri</a></li>
                        <li><a href="#events">Halaman Affiliate</a></li>
                        <li><a href="#contact">Lokasi & Kontak</a></li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

                <a class="btn-book-a-table" href="https://order.bicopicoffe.com/">Pesan Sekarang</a>

            </div>

        </div>

    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel"
                data-bs-interval="5000">


                @foreach ($sliders as $index => $slider)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset('image/' . $slider->image) }}" class="d-block w-100"
                            alt="Slide {{ $index + 1 }}">
                        <div class="carousel-container">
                            <h2><span>{{ $slider->title }}</span></h2>
                            <p>{{ $slider->description }}</p>
                            <div>
                                <a href="#menu" class="btn-get-started">Menu Kami</a>
                                <a class="btn-get-started" href="#menu">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

                <ol class="carousel-indicators"></ol>

            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section light-background">

            <div class="container">

                <div class="row gy-4">
                    <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('image/' . $about->image) }}" class="img-fluid" alt="">
                        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
                    </div>
                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                        <h3>{{ $about->judul }}</h3>
                        <p class="fst-italic">
                            {{ $about->subjudul }}
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>{{ $about->kelebihan_1 }}</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>{{ $about->kelebihan_2 }}</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>{{ $about->kelebihan_3 }}</span></li>
                        </ul>
                    </div>
                </div>

            </div>

            <!-- Gallery Section -->
            <section id="gallery" class="gallery section">

    <div class="container section-title" data-aos="fade-up">
        <h2>Gallery</h2>
        <div><span>Some photos from</span> <span class="description-title">Our Restaurant</span></div>
    </div><div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-0">
            @foreach ($portfolios as $image)
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="gallery-item">
                        <a href="{{ asset('image/' . $image->image) }}" class="glightbox"
                            data-gallery="images-gallery">
                            <img src="{{ asset('image/' . $image->image) }}" alt=""
                                class="img-fluid w-100 h-100 object-fit-cover">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</section><!-- /Gallery Section -->

        </section><!-- /About Section -->

        <!-- Menu Section -->
        <section id="menu" class="menu section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Menu</h2>
                <div><span>Berbagai Macam</span> <span class="description-title">Menu Kami</span></div>
            </div>

            <div class="container isotope-layout" data-default-filter="*" data-layout="masonry"
                data-sort="original-order">

                <!-- Filter Buttons -->
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul class="menu-filters isotope-filters">
                            <li data-filter="*" class="filter-active">Semua</li>
                            <li data-filter=".filter-starters">Makanan</li>
                            <li data-filter=".filter-salads">Minuman</li>
                            <li data-filter=".filter-specialty">Snack</li>
                        </ul>
                    </div>
                </div>

                <!-- Menu Items -->
                <div class="row isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($menus as $menu)
                        @php
                            // Klasifikasi kategori jadi class CSS
                            $filterClass = match (strtolower($menu->kategori)) {
                                'food' => 'filter-starters',
                                'drink' => 'filter-salads',
                                'snack' => 'filter-specialty',
                                default => '',
                            };
                        @endphp

                        <div class="col-lg-6 menu-item isotope-item {{ $filterClass }}">
                            <div class="d-flex align-items-start">
                                <img src="{{ $menu->foto_menu }}" class="menu-img" alt="{{ $menu->nama_menu }}">

                                <div>
                                    <div class="menu-content d-flex justify-content-between">
                                        <a href="#">{{ $menu->nama_menu }}</a>
                                        <span>Rp {{ number_format($menu->harga_menu, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="menu-ingredients">
                                        {{ $menu->deskripsi_menu }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>


        <!-- Specials Section -->
        <section id="specials" class="specials section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Specials</h2>
                <div><span>Check Our</span> <span class="description-title">Specials</span></div>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#specials-tab-1">Makanan
                                    berat</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#specials-tab-2">Makanan ringan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#specials-tab-3">Minuman dingin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#specials-tab-4">Minuman hanget</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#specials-tab-5">Cuci mulut</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content">
                            @foreach ($specials as $index => $special)
                                <div class="tab-pane {{ $index == 0 ? 'active show' : '' }}"
                                    id="specials-tab-{{ $index + 1 }}">
                                    <div class="row">
                                        <div class="col-lg-8 details order-2 order-lg-1">
                                            <h3>{{ $special->judul }}</h3>
                                            <p class="fst-italic">{{ $special->deskripsi }}</p>
                                        </div>
                                        <div class="col-lg-4 text-center order-1 order-lg-2">
                                            <img src="{{ asset('image/' . $special->image) }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Specials Section -->

        <!-- Events Section -->
        <section id="events" class="events section">

            <img class="slider-bg" src="assets/img/events-bg.jpg" alt="" data-aos="fade-in">

            <div class="container">

                <div class="swiper init-swiper" data-aos="fade-up" data-aos-delay="100">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
                    <div class="swiper-wrapper">
                        @foreach ($promosi as $item)
                            <div class="swiper-slide">
                                <div class="row gy-4 event-item">
                                    <div class="col-lg-6">
                                        <img src="{{ asset('image/' . $item->image) }}" class="img-fluid"
                                            alt="">
                                    </div>
                                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                                        <h3>{{ $item->judul }}</h3>
                                        <p class="fst-italic">
                                            {{ $item->deskripsi_1 }}
                                        </p>
                                        <ul>
                                            <li><i class="bi bi-check2-circle" style="color: #059652;"></i>
                                                <span>{{ $item->kelebihan_1 }}</span>
                                            </li>
                                            <li><i class="bi bi-check2-circle" style="color: #059652;"></i>
                                                <span>{{ $item->kelebihan_2 }}</span>
                                            </li>
                                            <li><i class="bi bi-check2-circle" style="color: #059652;"></i>
                                                <span>{{ $item->kelebihan_3 }}</span>
                                            </li>
                                        </ul>

                                        <a href="https://link-aplikasi.com" class="btn-book-a-table" target="_blank">
                                            Klik Jika Tertarik
                                        </a>
                                    </div>
                                </div>
                            </div><!-- End Slider item -->
                        @endforeach
                    </div>


                </div>
                <div class="swiper-pagination"></div>
            </div>

            </div>

        </section><!-- /Events Section -->

        </div>

        </div>

        </section><!-- /Book A Table Section -->

    </main>

    <!-- Contact Section -->
    <section id="contact" class="contact section" style="margin-bottom: 0; padding-bottom: 0;">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Lokasi dan Kontak</h2>
            <div><span>Lokasi Kami</span> <span class="description-title">Kami</span></div>
        </div><!-- End Section Title -->

        <iframe src="{{ $contact->maps_embed }}" style="width: 100%; height: 400px; border:0;" allowfullscreen=""
            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>

        <div class="container" data-aos="fade">

            <div class="row gy-5 gx-lg-5">

            </div>

        </div>

    </section><!-- /Contact Section -->

    <footer id="footer" class="footer dark-background" style="margin-top: 0; padding-top: 0;">
        r
        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div class="address">
                        <h4>Alamat</h4>
                        <p>{{ $contact->alamat }}</p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Kontak</h4>
                        <p>
                            <strong>Phone:</strong> <span>{{ $contact->telepon }}</span><br>
                            <strong>Email:</strong> <span>{{ $contact->email }}</span><br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Jam Buka</h4>
                        <p>
                            <strong>Rabu-Senin:</strong> <span>{{ $contact->jam_buka }}</span><br>
                            <strong>Selasa</strong>: <span>Tutup</span>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="{{ $contact->twitter }}" class="twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="{{ $contact->facebook }}" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="{{ $contact->instagram }}" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="{{ $contact->lynkin }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Bicopi</strong> <span>All Rights Reserved</span>
            </p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
