<header>
    <!-- Start Navigation -->
    <nav class="navbar mobile-sidenav navbar-sticky navbar-default validnavs navbar-fixed white no-background">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?= base_url() ?>">
                    <img src="<?= base_url() ?>public/landing/img/logo-mefca.png" class="logo logo-display" alt="Logo">
                    <img src="<?= base_url() ?>public/landing/img/logo-mefca.png" class="logo logo-scrolled" alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">

                <img src="<?= base_url() ?>public/landing/img/logo.png" alt="Logo">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-times"></i>
                </button>

                <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
                    <li>
                        <a class="smooth-menu" href="<?= base_url() ?>">Beranda</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="<?= base_url('berita') ?>">Berita</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="#">Daftar Pengujian</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="#">Video</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="#">Kegiatan</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="#">Kontak</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

            <div class="attr-right">
                <!-- Start Atribute Navigation -->
                <div class="attr-nav button-group">
                    <ul>
                        <li class="button button-group">
                            <a href="#" onclick="register_akun()">Daftar</a>
                        </li>
                        <li class="button">
                            <a href="<?= base_url('usr/login') ?>">Masuk</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Main Nav -->

        </div>
    </nav>
    <!-- End Navigation -->
</header>

<!-- Modal Daftar -->
<div class="modal fade" id="my-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollabl">
        <div class="modal-content ">
            <div class="modal-header" style="background-color: rgb(20, 128, 200);">
                <div class="row">
                    <div style="text-align: center;">
                        <img src="<?= base_url() ?>public/landing/img/logo-mefca.png" style="height: 70%;width: 30%;">
                        <h5 class="modal-title text-bold text-white" style="font-size: 20px;">FORM PEMDAFTARAN
                            PERUSAHAAN</h5>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light">
                <form action="" method="post" id="form_pendaftaran">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">EPI/IPI</label>
                                <select name="cmb_ipi" id="cmb_ipi" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="EPI">EPI</option>
                                    <option value="IPI">IPI</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Instansi</label>
                                <select name="cmb_instansi" id="cmb_instansi" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Perusahaan">Perusahaan</option>
                                    <option value="Mahasiswa / UKM">Mahasiswa / UKM</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Perusahaan</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="3" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Telepon</label>
                                <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukkan Telepon">
                            </div>
                            <div class="form-group">
                                <label for="">Fax</label>
                                <input type="text" name="fax" id="fax" class="form-control" placeholder="Masukkan E-Mail">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan E-Mail">
                            </div>
                            <div class="form-group">
                                <label for="">HCCP</label>
                                <input type="file" name="filehccp" id="faxhccp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Terbit Haccp</label>
                                <input type="date" name="tgl_hccp" id="tgl_hccp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">No.HCCP</label>
                                <input type="text" class="form-control" name="no_hccp" id="no_hccp" placeholder="No HCCP">
                            </div>
                            <div class="form-group">
                                <label for="">Product HCCP</label>
                                <input type="text" name="product_hccp" id="product_hccp" class="form-control" placeholder="Nama Produk HCCP">
                            </div>
                            <div class="form-group">
                                <label for="">Ratting HCCP</label>
                                <input type="text" name="ratting_hccp" id="ratting_hccp" class="form-control" placeholder="Ratting HCCP">
                            </div>
                        </div>
                    </div>
                    <div class="row pt-5">
                        <button class="btn btn-sm btn-block" style="background-color: rgb(10, 158, 184);" type="button" onclick="pendaftaran()">
                            <i class="fa fa-edit"></i>
                            Submit
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- End Modal Daftar -->

<!-- Modal Success dan Dowload File Success Daftar -->
<div class="modal fade" id="my-modal-success" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" style="font-weight: bold;" id="staticBackdropLabel">Success
                    Regietered</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="height: 100%;">
                <div class="row">
                    <div style="text-align: center;">
                        <img src="<?= base_url() ?>public/landing/img/img-success.png" alt="" style="height: 20%;width: 20%;">
                        <h1 style="padding-top: 10px;">Success !</h1>
                        <p style="text-align: justify;">Regitrasi yang Anda Lakukan Telah Terdaftar di UPTD Pengendalian
                            dan Pengujian Mutu Hasil
                            Perikanan (PMHP) Sumatera Utara.
                        </p>
                        <p style="text-align: justify;">Untuk Membuktikan Anda Telah Terdaftar dengan Cara Mendowload
                            Dokumen yang Telah tersedia
                            pada tombol dibawah:</p style="text-align: justify;">
                        <p style="text-align: justify;display: none;" id="no_dokumen"></p>
                        <button class="btn  btn sm btn-success" style="background-color: rgb(10, 184, 66);" onclick="Download_Dokumen_Register()">
                            <i class="fa fa-download"></i>
                            Download File
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->