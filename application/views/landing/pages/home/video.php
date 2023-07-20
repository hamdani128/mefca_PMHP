<!-- Start Team Single Area
    ============================================= -->
<div class="team-single-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    <h4 class="sub-title">Video</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-end">
                <a class="btn btn-primary mb-3 me-1" href="#carouselExampleIndicators" role="button"
                    data-bs-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary mb-3" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="row">
                            <?php if ($jumlah_video >= 1) { ?>
                            <div class="carousel-inner">
                                <?php $active = true; ?>
                                <?php $count = 0; ?>
                                <?php foreach ($kegiatan_video as $index => $video) { ?>
                                <?php if ($count === 0 || $count % 2 === 0) { ?>
                                <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                                    <div class="row">
                                        <?php } ?>
                                        <div class="col-md-6 mb-3">
                                            <div class="card">
                                                <div class="embed-responsive embed-responsive-16by9">
                                                    <?= $video->file_url; ?>
                                                </div>
                                                <div class="card-body">
                                                    <h4 class="card-title"><?php echo $video->judul; ?></h4>
                                                    <p class="card-text"><?php echo $video->deskripsi; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if ($count === 1 || $index === $jumlah_video - 1) { ?>
                                    </div>
                                </div>
                                <?php $active = false; ?>
                                <?php } ?>
                                <?php $count++; ?>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<style>
.embed-responsive-16by9 {
    position: relative;
    padding-bottom: 56.25%;
    /* Untuk mendapatkan aspek rasio 16:9 */
    height: 0;
    overflow: hidden;
}

.embed-responsive-16by9 iframe,
.embed-responsive-16by9 video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>