<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= SITE_NAME ?> - Digital Invitation Indonesia</title>
    <link rel="icon" href="<?php echo base_url() ?>/assets/base/img/favicon.png">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords"
        content="Undangan digital berupa website untuk pernikahanmu. Lebih praktis, keren dan kekinian...  ">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#3498db" />
    <meta name="author" content="hambaAllah">


 
    
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url() ?>/assets/base/beranda/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/base/beranda/vendor/bootstrap-icons/bootstrap-icons.css"
        rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/base/beranda/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/base/beranda/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/base/beranda/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/base/beranda/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Template Main CSS File -->
    <link href="<?php echo base_url() ?>/assets/base/beranda/css/style.css" rel="stylesheet">

    </head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="<?php echo base_url() ?>" class="logo d-flex align-items-center">
                <img src="<?php echo base_url() ?>/assets/base/img/logo4.png" alt="image">
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#home">Home</a></li>
                    <li><a class="nav-link scrollto" href="<?php echo base_url() ?>#fitur">Fitur</a></li>
                    <li><a class="nav-link scrollto" href="<?php echo base_url() ?>#harga">Harga</a></li>
                    <li><a class="nav-link scrollto" href="#tema">Tema</a></li>
                    <li><a class="nav-link scrollto" href="<?php echo base_url() ?>#testimonial">Testimonial</a></li>
                    <li><a class="getstarted scrollto" href="<?= base_url('login') ?>">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="home" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up"><a href="" class="typewrite judul" data-period="2000"
                            data-type='[ "UndanganCnk", "Digital Invitation", "Kirim Undangan..", "Desain Unik..", "Mudah diatur.."]'>
                            <span class="wrap"></span>
                        </a></h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Solusi pernikahan lebih hemat, praktis, dan kekinian
                        dengan e-invitation yang disebar otomatis untuk memberikan kesan terbaik</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="#tema"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Buat Sekarang</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="<?php echo base_url() ?>/assets/base/beranda/img/header-hero.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= tema Section ======= -->
        <section id="tema" class="tema">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Tema</p>
                </header>

                <div class="row gy-4" data-aos="fade-left">
                    <?php
                    $i = 1;
                    foreach ($tema->getResult() as $row) { ?>
                    <div class="col-lg-3 col-md-6 " data-aos="zoom-in">
                        <div class="box ">
                           
                            <img src="<?php echo base_url() ?>/assets/themes/<?= $row->nama_theme ?>/preview.png"
                                class="img-fluid" alt="image">
                                <h3 style="color: #07d5c0;"><?= $row->nama_theme ?></h3>
                            <a href="<?= base_url('order/' . $row->kode_theme) ?>"
                                class="btn btn-success btn-sm">Pesan</a>
                            <a href="<?= base_url('demo/' . $row->nama_theme) ?>"
                                class="btn btn-primary btn-sm">Demo</a>
                        </div>
                    </div>
                    <?php
                    }
                    ?>

                </div>


            </div>

        </section><!-- End tema Section -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="copyright">
                Copyright &#169; <?= date('Y') ?> <?= SITE_NAME ?>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <a href="https://api.whatsapp.com/send?phone=<?= $setting[0]->no_wa; ?>&text=<?= $setting[0]->pesan_wa; ?>" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>

</a>
    <!-- Vendor JS Files -->
    <script src="<?php echo base_url() ?>/assets/base/beranda/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/beranda/vendor/aos/aos.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/beranda/vendor/php-email-form/validate.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/beranda/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/beranda/vendor/purecounter/purecounter.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/beranda/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/beranda/vendor/glightbox/js/glightbox.min.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url() ?>/assets/base/beranda/js/main.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/js/text.js"></script>

</body>

</html>