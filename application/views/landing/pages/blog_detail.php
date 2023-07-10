<?php require_once 'breadcrumb.php' ?>

<!-- Start Blog
    ============================================= -->
<div class="blog-area single full-blog right-sidebar full-blog default-padding">
    <div class="container">
        <div class="blog-items">
            <div class="row">
                <div class="blog-content col-xl-8 col-lg-7 col-md-12 pr-35 pr-md-15 pl-md-15 pr-xs-15 pl-xs-15">
                    <div class="blog-style-two item">

                        <div class="blog-item-box">

                            <div class="thumb">
                                <a href="#">
                                    <img src="<?= base_url() ?>public/upload/berita/<?= $beritarow->file_img; ?>"
                                        alt="Thumb">
                                </a>
                            </div>
                            <div class="info">
                                <div class="meta">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fas fa-calendar-alt"></i>
                                                <?= date('F', strtotime($beritarow->tanggal)) ?>
                                                <?= date('d', strtotime($beritarow->tanggal)) ?>
                                                , <?= date('Y', strtotime($beritarow->tanggal)) ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-user-circle"></i>
                                                <?= $beritarow->penulis; ?></a>
                                        </li>
                                    </ul>
                                </div>
                                <h3><?= $beritarow->judul; ?>.</h3>
                                <p style="text-align: justify;">
                                    <?= $beritarow->detail_1; ?>
                                </p>
                                <?php if (count($berita_img) > 0) { ?>
                                <?php foreach ($berita_img as $row) { ?>
                                <div class="image-box">
                                    <div class="image">
                                        <img src="<?= base_url() ?>public/upload/berita/detail/<?= $row->file_img; ?>"
                                            alt="" />
                                    </div>
                                </div>
                                <p style="text-align: justify;">
                                    <?= $row->deskripsi; ?>
                                </p>
                                <?php } ?>
                                <?php } else { ?>
                                <?php } ?>
                                <p style="text-align: justify;">
                                    <?= $beritarow->detail_2; ?>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Start Sidebar -->
                <?php require_once 'blog_side.php' ?>
                <!-- End Start Sidebar -->
            </div>
        </div>
    </div>
</div>
<!-- End Blog -->