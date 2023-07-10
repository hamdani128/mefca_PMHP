<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Crysa - It Solution Template">

    <!-- ========== Page Title ========== -->
    <title>App Mefca</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="<?= base_url() ?>public/landing/img/sumutprov.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="<?= base_url() ?>public/landing/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>public/landing/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>public/landing/css/themify-icons.css" rel="stylesheet" />
    <link href="<?= base_url() ?>public/landing/css/elegant-icons.css" rel="stylesheet" />
    <link href="<?= base_url() ?>public/landing/css/flaticon-set.css" rel="stylesheet" />
    <link href="<?= base_url() ?>public/landing/css/magnific-popup.css" rel="stylesheet" />
    <link href="<?= base_url() ?>public/landing/css/swiper-bundle.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>public/landing/css/animate.css" rel="stylesheet" />
    <link href="<?= base_url() ?>public/landing/css/validnavs.css" rel="stylesheet" />
    <link href="<?= base_url() ?>public/landing/css/helper.css" rel="stylesheet" />
    <link href="<?= base_url() ?>public/landing/css/style.css" rel="stylesheet" />
    <link href="<?= base_url() ?>public/landing/style.css" rel="stylesheet">
    <!-- ========== End Stylesheet ========== -->

</head>

<body>

    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->


    <!-- Header 
    ============================================= -->
    <?php require_once 'header.php' ?>
    <!-- End Header -->


    <!-- content -->
    <?php if ($content) { ?>
        <?php $this->load->view($content); ?>
    <?php } ?>
    <!-- End Conten -->



    <!-- Start Footer 
    ============================================= -->
    <?php require_once 'footer.php' ?>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="<?= base_url() ?>public/landing/js/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url() ?>public/landing/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>public/landing/js/jquery.appear.js"></script>
    <script src="<?= base_url() ?>public/landing/js/jquery.easing.min.js"></script>
    <script src="<?= base_url() ?>public/landing/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url() ?>public/landing/js/modernizr.custom.13711.js"></script>
    <script src="<?= base_url() ?>public/landing/js/swiper-bundle.min.js"></script>
    <script src="<?= base_url() ?>public/landing/js/wow.min.js"></script>
    <script src="<?= base_url() ?>public/landing/js/progress-bar.min.js"></script>
    <script src="<?= base_url() ?>public/landing/js/circle-progress.js"></script>
    <script src="<?= base_url() ?>public/landing/js/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>public/landing/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url() ?>public/landing/js/jquery.nice-select.min.js"></script>
    <script src="<?= base_url() ?>public/landing/js/count-to.js"></script>
    <script src="<?= base_url() ?>public/landing/js/jquery.scrolla.min.js"></script>
    <script src="<?= base_url() ?>public/landing/js/YTPlayer.min.js"></script>
    <script src="<?= base_url() ?>public/landing/js/TweenMax.min.js"></script>
    <script src="<?= base_url() ?>public/landing/js/validnavs.js"></script>
    <script src="<?= base_url() ?>public/landing/js/main.js"></script>
    <!-- sweetalert -->
    <!-- Sweetalert -->
    <script src="<?= base_url() ?>public/landing/sweetalert/sweetalert2.js"></script>
    <script src="<?= base_url() ?>public/landing/sweetalert/sweetalert2.all.js"></script>
    <script src="<?= base_url() ?>public/landing/sweetalert/sweetalert2.min.js"></script>
    <script src="<?= base_url() ?>public/landing/sweetalert/sweetalert2.all.min.js"></script>
    <!-- Custom -->
    <script src="<?= base_url() ?>public/landing/custom/pendaftaran.js"></script>

</body>

</html>