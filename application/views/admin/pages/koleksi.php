<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="<?= base_url("admin/slider") ?>">Slider</a>
            <span class="breadcrumb-item active">Admin</span>
        </nav>
    </div><!-- br-pageheader -->
    <div class="br-pagetitle">
        <i class="icon icon ion-ios-photos-outline"></i>
        <div>
            <h4>Informasi Data Koleksi Museum</h4>
            <p class="mg-b-0">
                Informasi Data Pengelolaan Data Lengkap Kelimuan Museum.
            </p>
        </div>
    </div><!-- d-flex -->

    <div class="br-pagebody">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="button-group">
                                    <button class="btn btn-md btn-primary" onclick="add_koleksi()">
                                        <i class="fa fa-plus"></i>
                                        Tambah Data
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-5">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="tbl_koleksi" class="table display table-hover nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kategori</th>
                                                <th>Judul</th>
                                                <th>File Img</th>
                                                <th>Deskripsi 1</th>
                                                <th>Penulis</th>
                                                <th>Tanggal Publis</th>
                                                <th>#action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (count($koleksidata) > 0) { ?>
                                                <?php $no = 1; ?>
                                                <?php foreach ($koleksidata as $row) { ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $row->kategori; ?></td>
                                                        <td>
                                                            <p><?= substr($row->judul, 0, 10) . "..."; ?></p>
                                                        </td>
                                                        <td>
                                                            <div class="media mg-t-20 mg-b-0">
                                                                <img src="<?= base_url() ?>public/upload/koleksi/<?= $row->file_image; ?>" class="d-flex wd-100 rounded-circle mg-r-8" alt="Image">
                                                                <div class="media-body">
                                                                </div><!-- media-body -->
                                                            </div><!-- media -->
                                                        </td>
                                                        <td>
                                                            <p><?= substr($row->judul, 0, 50) . "..."; ?></p>
                                                        </td>
                                                        <td><?= $row->penulis; ?></td>
                                                        <td><?= $row->tanggal; ?></td>
                                                        <td>
                                                            <div class="input-group">
                                                                <button class="btn btn-md btn-edit btn-warning">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button class="btn btn-md btn-danger">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->


<!-- Modal Tambah -->
<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="my-modal-title">Tambah Data Koleksi</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" id="form_koleksi" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="cmb_kategori" id="cmb_kategori" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Arkeologi">Arkeologi</option>
                                    <option value="Etnografi">Etnografi</option>
                                    <option value="Geografi">Geografi</option>
                                    <option value="Keramik">Keramik</option>
                                    <option value="Numesmatik dan Heladrik">Numesmatik dan Heladrik</option>
                                    <option value="Sejarah">Sejarah</option>
                                    <option value="Prasejarah">Prasejarah</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Masukkan Gambar Utama</label>
                                <input type="file" name="file_img" id="file_img" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Masukkan Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan Judul Koleksi">
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi Detail</label>
                                <div style="max-height: 500px" id="summernote"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Sumber</label>
                                <input type="text" name="sumber" id="sumber" class="form-control" placeholder="Masukkan Data Sumber">
                            </div>
                            <div cslass="form-group">
                                <label for="">Penulis</label>
                                <input type="text" name="penulis" id="penulis" class="form-control" placeholder="Masukkan Data Penulis">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Publish</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-md btn-primary button-prevent" onclick="simpan_data_koleksi()">
                            <i class="fa fa-save hide-text"></i>
                            <span class="hide-text">Simpan</span>
                            <div class="spinner" style="display: none;">
                                <img src="<?= base_url() ?>public/admin/img/loading_2.gif" alt="" style="width: 15%;height: 15%;">
                                Loading..
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>