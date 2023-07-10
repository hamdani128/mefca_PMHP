<!-- Start Banner Area 
    ============================================= -->
<div class="banner-area banner-style-two navigation-icon-solid navigation-between-bottom navigation-custom overflow-hidden top-pad-150 text-light">
    <!-- Slider main container -->
    <div class="banner-slide">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">

            <?php if (count($slider) > 0) { ?>
                <?php foreach ($slider as $row) { ?>
                    <!-- Single Item -->
                    <div class="swiper-slide bg-cover shadow dark" style="background: url(<?= base_url() ?>public/upload/slider/<?= $row->file_img; ?>);">
                        <div class="container">
                            <div class="row align-center">
                                <div class="col-xl-8 offset-xl-1">
                                    <div class="content">
                                        <h2>Selamat Datang</h2>
                                        <p>
                                            UPTD Pengendalian dan Pengujian Mutu Hasil Perikanan (PMHP).
                                        </p>
                                        <!-- <div class="button">
                                    <a class="btn btn-gradient btn-md radius animation" href="#">Meet with us</a>
                                </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item -->
                <?php } ?>
            <?php } ?>

        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>

        <!-- Navigation -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

    </div>
</div>
<!-- End Banner -->