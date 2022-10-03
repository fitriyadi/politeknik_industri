<?php
require_once '../setting/konstanta.php';
require_once '../setting/koneksi.php';
require_once '../setting/crud.php';
require_once '../setting/label.php';
require_once '../setting/helper.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php

if (isset($_SESSION['user'])) {
    extract(_dataGetId($mysqli, "tb_pegawai", "idpegawai='" . $_SESSION['user'] . "'"));
}

//Cek Debug
$debug = true;
if ($debug == true) :
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
endif;
?>


<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SI Pengadaan Barang dan Jasa - Politeknik Industri Furnitur dan Pengolahan Kayu</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Impact - v1.1.0
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <section id="topbar" class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="row col-md-2">
                <div class="contact-info d-flex">
                    <div class="float-left">
                        <img src="assets/logo/logo_kementrian.png" width="80" height="80" alt="">
                    </div>
                </div>
            </div>
            <div class="row col-md-8">
                <div class="contact-info d-flex justify-content-center">
                    <h4>PENGADAAN BARANG DAN JASA</h4>
                </div>
                <div class="contact-info d-flex justify-content-center">
                    <p>POLITEKNIK INDUSTRI FURNITUR DAN PENGOLAHN KAYU</p>
                </div>

            </div>

            <div class="row col-md-2">
                <div class="contact-info d-flex flex-row-reverse">
                    <div class="float-right">
                        <img src="assets/logo/logo_politeknik.png" width="80" height="80" alt="">
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section><!-- End Top Bar -->

    <header id="header" class="header d-flex align-items-center">
        <?php
        function link_home($hal, $page)
        {
            if ($hal == $page) {
                return "class='nav-link active'";
            } else {
                return "";
            }
        }
        ?>
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.php" <?= link_home(@$_GET['hal'], "") ?>>Home</a></li>
                    <li><a href="?hal=beranda#about" <?= link_home(@$_GET['hal'], "beranda") ?>>Produk Layanan</a></li>
                    <li><a href="?hal=user_home" <?= link_home(@$_GET['hal'], "user_home") ?>>Permintaan</a></li>

                    <?php if (!isset($_SESSION['user'])) { ?>
                        <li><a href="?hal=login" <?= link_home(@$_GET['hal'], "login") ?>>Login</a></li>
                    <?php } else { ?>
                        <li><a onclick="return confirm('Apakah anda yakin akan logout?')" href="proses_logout.php">Log Out</a></li>
                    <?php } ?>
                </ul>
            </nav><!-- .navbar -->

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->
    <!-- End Header -->

    <!-- ======= Hero Section =======  JIKA MENU UTAMA-->
    <?php
    if (!isset($_GET['hal']) || @$_GET['hal'] == 'beranda') {
        require_once '_hero.php';
    }
    ?>
    <!-- End Hero Section -->

    <main id="main">
        <?php
        $hal = @$_GET['hal'];
        $modul = "";
        $default = "beranda.php";
        if (!$hal) {
            require_once "$default";
        } else {
            switch ($hal) {
                case $hal:
                    if (is_file($modul . $hal . ".php"))
                        require_once $modul . $hal . ".php";

                    else
                        require_once $default;
                    break;
                default:
                    require_once $default;
            }
        }
        ?>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-9 col-md-12 footer-info">
                    <a href="index.php" class="logo d-flex align-items-center">
                        <span>Sistem Informasi Pengadaan Barang dan Jasa</span>
                    </a>

                    <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta
                        donna mare fermentum iaculis eu non diam phasellus.</p>
                    <div class="social-links d-flex mt-4">
                        <a href="https://www.youtube.com/channel/UCUHbsBygWUFMWRMfkGsV6vw" class="twitter"><i class="bi bi-youtube"></i></a>
                        <a href="https://www.facebook.com/poltekfuniturkendal/" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/poltekfurniturkendal/" class="instagram"><i class="bi bi-instagram"></i></a>

                    </div>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Hubungi Kami</h4>
                    <p>
                        <strong>Alamat :</strong>Jl. Wanamarta Raya No. 20 - Kawasan Industri Kendal,
                        Kendal - Jawa Tengah 51371. Indonesia <br>
                        <strong>Telepon :</strong> +62 294 3692732<br>
                        <strong>Email:</strong> humas@poltek-furnitur.ac.id<br>
                    </p>

                </div>

            </div>
        </div>

        <div class="container mt-4">
            <div class="copyright">
                &copy; Copyright 2022 <strong><span>SI Pengadaan Barang dan Jasa</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>