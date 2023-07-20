<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket Plus">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracketplus">
    <meta property="og:title" content="Bracket Plus">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">
    <link rel="shortcut icon" href="<?= base_url() ?>public/admin/img/sumut.png" />

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Bracket Plus Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="<?= base_url() ?>public/admin/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>public/admin/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>public/admin/css/bracket.css">
</head>

<body>
    <div class="d-flex align-items-center justify-content-center ht-100v">
        <img src="<?= base_url() ?>public/admin/img/tuna.jpg" class="wd-100p ht-100p object-fit-cover" alt="">
        <div class="overlay-body bg-black-6 d-flex align-items-center justify-content-center">
            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 rounded bd bd-white-2 bg-black-7">
                <div class="signin-logo tx-center tx-28 tx-bold tx-white"><span class="tx-normal">[</span> Mefca <span
                        class="tx-info">App</span> <span class="tx-normal">]</span></div>
                <div class="tx-white-5 tx-center mg-b-60">Adminitrator aplikasi</div>

                <div class="form-group">
                    <input type="text" name="username" id="username" class="form-control fc-outline-dark"
                        placeholder="Enter your username">
                </div>
                <!-- form-group -->
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control fc-outline-dark"
                        placeholder="Enter your password">
                    <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
                </div>
                <!-- form-group -->
                <button type="button" class="btn btn-info btn-block" onclick="login_administrator()">Log In</button>
                <a href="<?= base_url() ?>" class="btn btn-info btn-block btn-light">
                    <i class="fa fa-home"></i>
                    Home
                </a>

                <!-- <div class="mg-t-60 tx-center">Not yet a member? <a href="" class="tx-info">Sign Up</a></div> -->
            </div>
            <!-- login-wrapper -->
        </div>
        <!-- overlay-body -->
    </div>
    <!-- d-flex -->
    <script src="<?= base_url() ?>public/admin/lib/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>public/admin/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="<?= base_url() ?>public/admin/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>public/admin/sweetalert/sweetalert2.js"></script>
    <script src="<?= base_url() ?>public/admin/sweetalert/sweetalert2.min.js"></script>
    <script src="<?= base_url() ?>public/admin/sweetalert/sweetalert2.all.js"></script>
    <script src="<?= base_url() ?>public/admin/sweetalert/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>public/admin/custom/auth.js"></script>
</body>

</html>