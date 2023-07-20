<div id="projects" class="projects-area default-padding bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    <h4 class="sub-title">Galeri Photo</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-end">
                <a class="btn btn-primary button mb-3 me-1" href="#carouselExampleIndicators2" role="button"
                    data-bs-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary button mb-3" href="#carouselExampleIndicators2" role="button"
                    data-bs-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="row">
                            <?php if ($jumlah_photo >= 1) { ?>
                            <div class="carousel-inner">
                                <?php $active = true; ?>
                                <?php $count = 0; ?>
                                <?php foreach ($kegiatan_photo as $index => $photo) { ?>
                                <?php if ($count === 0 || $count % 3 === 0) { ?>
                                <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                                    <div class="row">
                                        <?php } ?>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280"
                                                    src="<?= base_url() ?>public/upload/galeri/photo/<?= $photo->file_img; ?>"
                                                    style="height: 250px;width: 500px;">
                                                <div class="card-body">
                                                    <h4 class="card-title"><?php echo $photo->judul; ?></h4>
                                                    <p class="card-text"><?php echo $photo->deskripsi; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if ($count === 2 || $index === $jumlah_photo - 1) { ?>
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