<div class="sidebar col-xl-4 col-lg-5 col-md-12 mt-md-50 mt-xs-50">
    <aside>
        <div class="sidebar-item search">
            <div class="sidebar-info">
                <form>
                    <input type="text" placeholder="Enter Keyword" name="text" class="form-control">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="sidebar-item recent-post">
            <h4 class="title">Recent Post</h4>
            <ul>
                <?php if (count($berita) > 0) { ?>
                    <?php foreach ($berita as $row) { ?>
                        <li>
                            <div class="thumb">
                                <a href="<?= base_url() ?>berita/reader/<?= $row->slug; ?>">
                                    <img src="<?= base_url() ?>public/upload/berita/<?= $row->file_img; ?>" alt="Thumb">
                                </a>
                            </div>
                            <div class="info">
                                <div class="meta-title">
                                    <span class="post-date">
                                        <?= date('F', strtotime($row->tanggal)) ?>
                                        <?= date('d', strtotime($row->tanggal)) ?>
                                        , <?= date('Y', strtotime($row->tanggal)) ?>
                                    </span>
                                </div>
                                <a href="<?= base_url() ?>berita/reader/<?= $row->slug; ?>"><?= $row->judul; ?>.</a>
                            </div>
                        </li>
                    <?php } ?>
                <?php } else { ?>
                    <h5>Empty Information</h5>
                <?php } ?>


            </ul>
        </div>
        <div class="sidebar-item category">
            <h4 class="title">category list</h4>
            <div class="sidebar-info">
                <?php if (count($kategoriberita) > 0) { ?>
                    <ul>
                        <?php foreach ($kategoriberita as $row) { ?>
                            <li>
                                <a href="#"><?= $row->kategori; ?> <span><?= $row->jumlah; ?></span></a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } else { ?>
                    <span>Emty Information</span>
                <?php } ?>
            </div>
        </div>
        <div class="sidebar-item gallery">
            <h4 class="title">Gallery</h4>
            <div class="sidebar-info">
                <ul>
                    <li>
                        <a href="#">
                            <img src="<?= base_url() ?>public/landing/img/800x800.png" alt="thumb">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?= base_url() ?>public/landing/img/800x800.png" alt="thumb">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?= base_url() ?>public/landing/img/800x800.png" alt="thumb">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?= base_url() ?>public/landing/img/800x800.png" alt="thumb">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?= base_url() ?>public/landing/img/800x800.png" alt="thumb">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?= base_url() ?>public/landing/img/800x800.png" alt="thumb">
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </aside>
</div>