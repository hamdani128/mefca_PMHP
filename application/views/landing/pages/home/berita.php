<!-- Start Blog 
    ============================================= -->
<div id="blog" class="blog-area blog-grid bg-gray default-padding bottom-less">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    <h2 class="title">Informasi Berita Terkini</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <?php if (count($berita) > 0) { ?>
            <?php foreach ($berita as $row) { ?>
            <!-- Single Item -->
            <div class="col-xl-4 col-md-12 single-item">
                <div class="blog-style-two">
                    <div class="thumb">
                        <a href="#"><img src="<?= base_url() ?>public/upload/berita/<?= $row->file_img; ?>"
                                alt="Thumb"></a>
                        <div class="tags">
                            <a href="#"><?= $row->kategori; ?></a>
                        </div>
                    </div>
                    <div class="info">
                        <div class="meta">
                            <ul>
                                <li>
                                    <a href="#"><i class="far fa-edit"></i><?= $row->penulis; ?></a>
                                </li>
                            </ul>
                        </div>
                        <h4 class="title">
                            <a href="<?= base_url('berita/reader/' . $row->slug) ?>">
                                <?= $row->judul; ?>
                            </a>
                        </h4>
                    </div>
                    <div class="author">
                        <div class="thumbs">
                            <a href="#"><img src="<?= base_url() ?>public/landing/img/sumutprov.png" alt="Author"></a>
                        </div>
                        <div class="author-info">
                            <h5><?= $row->penulis; ?></h5>
                            <span><?= date('d', strtotime($row->tanggal)) ?>
                                <?= date('F Y', strtotime($row->tanggal)); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Item -->
            <?php } ?>
            <?php } ?>
        </div>
        <div class="row pt-2">
            <div class="col-md-12 text-center">
                <a href="<?= base_url('berita') ?>" class="btn mt-35 btn-md btn-theme">
                    Selengkapnya
                </a>
            </div>
        </div>
    </div>
</div>
<!-- End Blog -->