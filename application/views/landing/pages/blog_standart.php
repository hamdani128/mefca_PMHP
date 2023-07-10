<?php require_once 'breadcrumb.php' ?>

<!-- Start Blog
    ============================================= -->
<div class="blog-area full-blog default-padding">
    <div class="container">
        <div class="blog-items">
            <div class="row">
                <div class="blog-content col-xl-8 col-lg-7 col-md-12 pr-35 pr-md-15 pl-md-15 pr-xs-15 pl-xs-15">
                    <div class="blog-item-box">
                        <?php if (count($berita) > 0) { ?>
                            <?php foreach ($berita as $row) { ?>
                                <!-- Single Item -->
                                <div class="blog-style-two">
                                    <div class="thumb">
                                        <a href="#"><img src="<?= base_url() ?>public/upload/berita/<?= $row->file_img; ?>" alt="Thumb"></a>
                                        <div class="tags">
                                            <a href="#"><?= $row->kategori; ?></a>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <div class="meta">
                                            <ul>
                                                <!-- <li>
                                            <a href="#"><i class="far fa-comment-alt"></i> 12 Comments</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="far fa-heart"></i> 25</a>
                                        </li> -->
                                            </ul>
                                        </div>
                                        <h2 class="title">
                                            <a href="<?= base_url() ?>berita/reader/<?= $row->slug; ?>"><?= $row->judul; ?>.</a>
                                        </h2>
                                        <p style="text-align: justify;">
                                            <?= substr($row->detail_1, 0, 500) . "..." ?>.
                                        </p>
                                    </div>
                                    <div class="author">
                                        <div class="thumbs">
                                            <a href="#"><img src="<?= base_url() ?>public/landing/img/100x100.png" alt="Author"></a>
                                        </div>
                                        <div class="author-info">
                                            <h5><?= $row->penulis; ?></h5>
                                            <span>
                                                <?= date('F', strtotime($row->tanggal)) ?>
                                                <?= date('d', strtotime($row->tanggal)) ?>
                                                , <?= date('Y', strtotime($row->tanggal)) ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Item -->
                            <?php } ?>
                        <?php } else { ?>
                            <div class="blog-post style-two">
                                <h5>Empty Information</h5>
                            </div>
                        <?php } ?>

                    </div>

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-md-12 pagi-area text-center">
                            <nav aria-label="navigation">
                                <ul class="pagination">
                                    <!-- <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-left"></i></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li> -->
                                    <?php echo $this->pagination->create_links(); ?>
                                </ul>
                            </nav>
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