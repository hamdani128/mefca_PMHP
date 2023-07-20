<!-- ########## START: MAIN PANEL ########## -->
<div ng-app="adminregister" ng-controller="ControllerRegister">
    <div class="br-mainpanel">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="<?= base_url("/opr/register") ?>">Register</a>
                <span class="breadcrumb-item active">Admin</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="br-pagetitle">
            <i class="icon icon ion-ios-photos-outline"></i>
            <div>
                <h4>Informasi Data Register</h4>
                <p class="mg-b-0">
                    Informasi Data Register.
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
                                        <button class="btn btn-md btn-primary" ng-click="add_data()">
                                            <i class="fa fa-plus"></i>
                                            Tambah Data
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-5">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table datatable="ng" dt-options="vm.dtOptions"
                                            class="table display table-hover nowrap" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>#action</th>
                                                    <th>Status</th>
                                                    <th>No.Registrasi</th>
                                                    <th>Kategori</th>
                                                    <th>Instansi</th>
                                                    <th>Nama Instansi</th>
                                                    <th>Alamat</th>
                                                    <th>Telepon</th>
                                                    <th>Fax</th>
                                                    <th>E-mail</th>
                                                    <th>TGL HCCP</th>
                                                    <th>No.HCCP</th>
                                                    <th>Product HCCP</th>
                                                    <th>Rating HCCP</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="dt in dataregister" ng-if="dataregister.length > 0">
                                                    <td>{{$index + 1}}</td>
                                                    <td>
                                                        <div class="button-group">
                                                            <button class="btn btn-sm btn-danger"
                                                                ng-click="DeleteRegister(dt)">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-warning"
                                                                ng-click="ShowEditRegister(dt)">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-dark"
                                                                ng-click="PrintRegister(dt)">
                                                                <i class="fa fa-print"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-success"
                                                                ng-click="PermohononaPengujian(dt)">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span ng-if="dt.status=='Registered'"
                                                            class="badge badge-primary">{{dt.status}}</span>
                                                    </td>
                                                    <td>{{dt.no_registrasi}}</td>
                                                    <td>{{dt.kategori}}</td>
                                                    <td>{{dt.instansi}}</td>
                                                    <td>{{dt.nama}}</td>
                                                    <td>{{dt.alamat}}</td>
                                                    <td>{{dt.tlp}}</td>
                                                    <td>{{dt.fax}}</td>
                                                    <td>{{dt.email}}</td>
                                                    <td>{{dt.tgl_hccp}}</td>
                                                    <td>{{dt.no_hccp}}</td>
                                                    <td>{{dt.product_hccp}}</td>
                                                    <td>{{dt.ratting_hccp}}</td>
                                                </tr>
                                                <tr ng-if="dataregister.length === 0">
                                                    <td colspan="10">No data available</td>
                                                </tr>
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

    <!-- Modal Show Password -->
    <div id="my-modal-show-password" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="my-modal-title">Informasi Akun</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table datatable="ng" dt-options="vm.dtOptions"
                                        class="table display table-hover nowrap" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Akun</th>
                                                <th>Password</th>
                                                <th>Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="dt in passwordshow" ng-if="passwordshow.length > 0">
                                                <td>{{$index + 1}}</td>
                                                <td>{{dt.no_register}}</td>
                                                <td>{{dt.password}}</td>
                                                <td>{{dt.created_at}}</td>
                                            </tr>
                                            <tr ng-if="passwordshow.length === 0">
                                                <td colspan="4">No data available</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Tambah Data -->
    <div id="my-modal-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="my-modal-title">Tambah Manual Data</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="form_pendaftaran_admin">
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
                                    <input type="text" name="nama" id="nama" class="form-control"
                                        placeholder="Masukkan Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="3" rows="3"
                                        class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Telepon</label>
                                    <input type="text" name="telepon" id="telepon" class="form-control"
                                        placeholder="Masukkan Telepon">
                                </div>
                                <div class="form-group">
                                    <label for="">Fax</label>
                                    <input type="text" name="fax" id="fax" class="form-control"
                                        placeholder="Masukkan E-Mail">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        placeholder="Masukkan E-Mail">
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
                                    <input type="text" class="form-control" name="no_hccp" id="no_hccp"
                                        placeholder="No HCCP">
                                </div>
                                <div class="form-group">
                                    <label for="">Product HCCP</label>
                                    <input type="text" name="product_hccp" id="product_hccp" class="form-control"
                                        placeholder="Nama Produk HCCP">
                                </div>
                                <div class="form-group">
                                    <label for="">Ratting HCCP</label>
                                    <input type="text" name="ratting_hccp" id="ratting_hccp" class="form-control"
                                        placeholder="Ratting HCCP">
                                </div>
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="col-md-12">
                                <button class="btn btn-md btn-block" style="background-color: rgb(10, 158, 184);"
                                    type="button" ng-click="Submit_pendaftaran_by_admin()">
                                    <i class="fa fa-edit"></i>
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Edd -->



    <!-- Modal Permohonan -->
    <div id="my-modal-pengajuan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="my-modal-title">
                        <i class="fa fa-edit"></i>
                        Form Pengajuan Pengujian
                    </h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row pb-2">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <table style="width: 100%;">
                                        <tr>
                                            <td style="width: 15%;">No.Pelanggan</td>
                                            <td style="width: 2%;">:</td>
                                            <td style="width: 75%;" id="form_no_pelanggan"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%;"> Perusahaan / UMKM / Mahasiswa</td>
                                            <td style="width: 2%;">:</td>
                                            <td style="width: 65%;" id="form_Kategori"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 15%;">Nama</td>
                                            <td style="width: 2%;">:</td>
                                            <td style="width: 75%;" id="form_nama"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 15%;">No.Konntak/HP</td>
                                            <td style="width: 2%;">:</td>
                                            <td style="width: 75%;" id="form_kontak"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 15%;">Alamat</td>
                                            <td style="width: 2%;">:</td>
                                            <td style="width: 75%;" id="form_alamat"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 15%;">Kategori</td>
                                            <td style="width: 2%;">:</td>
                                            <td style="width: 75%;">
                                                <h6 id="form_kategori_uji"></h6>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Kategori Pengujian</label>
                                                <select name="cmb_kategori_register" id="cmb_kategori_register"
                                                    class="form-control" onchange="get_detail_daftar_harga()">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table display table-hover nowrap" style="width: 100%;">
                                                    <thead class="bg-secondary">
                                                        <tr>
                                                            <th class="text-white">No.</th>
                                                            <th class="text-white">List Parameter</th>
                                                            <th class="text-white">Metode</th>
                                                            <th class="text-white">Lambang</th>
                                                            <th class="text-white">Qty</th>
                                                            <th class="text-white">Tarif</th>
                                                            <th class="text-white">#</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody_detail">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table display table-hover nowrap" style="width: 100%;"
                                    id="tb_listPangambilan">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th class="text-white">No</th>
                                            <th class="text-white">Kategori</th>
                                            <th class="text-white">Detail Parameter</th>
                                            <th class="text-white">Metode</th>
                                            <th class="text-white">Lambang</th>
                                            <th class="text-white">Harga</th>
                                            <th class="text-white">Act</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <tr ng-repeat="dt in ListPengambilan" ng-if="ListPengambilan.length > 0">
                                            <td>{{$index + 1}}</td>
                                            <td>{{dt.kategori}}</td>
                                            <td>{{dt.list}}</td>
                                            <td>{{dt.harga}}</td>
                                            <td>
                                                <button class="btn btn-sm btn-danger" onclick="DeleteRowMedical(this)">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 50%;">
                                        <div class="card">
                                            <div class="card-header bg-light">
                                                <div class="col-md-12 text-right">
                                                    <h6 class="text-bold">No.Permohonan Invoice</h6>
                                                    <h5 id="form_status">-</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width: 50%;">
                                        <div class="card">
                                            <div class="card-header bg-primary">
                                                <div class="col-md-12 text-right text-white">
                                                    <label for="">Subtotal Pengambilan Uji</label>
                                                    <h5>Rp.<span id="lb_subtotal_pengambilan">0</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-md btn-primary" ng-click="Submit_Pengajuan()">
                                <i class="fa fa-edit"></i>
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- ########## END: MAIN PANEL ########## -->