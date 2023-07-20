<!-- ########## START: MAIN PANEL ########## -->
<div ng-app="HargaUjiAdmin" ng-controller="HargaUjiAdminController">
    <div class="br-mainpanel">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="<?= base_url("/opr/master/metode_uji") ?>">Daftar Harga Uji</a>
                <span class="breadcrumb-item active">Modul Master</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="br-pagetitle">
            <i class="icon icon ion-ios-photos-outline"></i>
            <div>
                <h4>Informasi Data Daftar Harga Uji</h4>
            </div>
        </div><!-- d-flex -->

        <div class="br-pagebody">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row pb-4">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-md" ng-click="add_daftar_uji()">
                                        <i class="fa fa-plus"></i>
                                        Tambah
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table datatable="ng" dt-options="vm.dtOptions" class="table display table-hover nowrap" style="width: 100%;">
                                            <thead class="bg-dark">
                                                <tr>
                                                    <th class="text-white">#Act</th>
                                                    <th class="text-white">No</th>
                                                    <th class="text-white">Kategori</th>
                                                    <th class="text-white">Detail Parameter</th>
                                                    <th class="text-white">Metode</th>
                                                    <th class="text-white">Lambang</th>
                                                    <th class="text-white">Qty</th>
                                                    <th class="text-white">Tarif Umum</th>
                                                    <th class="text-white">Tarif Mahasiswa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="dt in DataDaftar" ng-if="DataDaftar.length > 0">
                                                    <td>
                                                        <div class="button-group">
                                                            <button class="btn btn-sm btn-warning" ng-click="EditShow(dt)">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-danger" ng-click="DeleteData(dt)">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td>{{$index + 1}}</td>
                                                    <td>{{dt.kategori}}</td>
                                                    <td>{{dt.detail_parameter}}</td>
                                                    <td>{{dt.metode}}</td>
                                                    <td>{{dt.lambang}}</td>
                                                    <td>{{dt.qty}}</td>
                                                    <td>{{dt.tarif_umum}}</td>
                                                    <td>{{dt.tarif_mahasiswa}}</td>
                                                </tr>
                                                <tr ng-if="DataDaftar.length === 0">
                                                    <td colspan="10" class="text-center">No data available</td>
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

    <!-- Modal Add -->
    <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="my-modal-title">Tambah Data Metode Uji</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="cmb_kategori" id="cmb_kategori" class="form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Detail Parameter</label>
                        <input type="text" name="add_detail_parameter" id="add_detail_parameter" class="form-control" placeholder="Detail Parameter">
                    </div>
                    <div class="form-group">
                        <label for="">Metode</label>
                        <input type="text" name="add_metode" id="add_metode" class="form-control" placeholder="Metode Parameter">
                    </div>
                    <div class="form-group">
                        <label for="">Lambang</label>
                        <input type="text" name="add_lambang" id="add_lambang" class="form-control" placeholder="Metode Lambang">
                    </div>
                    <div class="form-group">
                        <label for="">Qty</label>
                        <input type="number" name="add_qty" id="add_qty" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tarif Umum</label>
                        <input type="number" name="add_tarif_umum" id="add_tarif_umum" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tarif Mahasiswa</label>
                        <input type="number" name="add_tarif_mahasiswa" id="add_tarif_mahasiswa" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-md btn-primary" ng-click="Insert_daftar_harga()">
                        <i class="fa fa-save"></i>
                        Submit
                    </button>
                    <button class="btn btn-md btn-secondary" data-dismiss="modal" aria-label="Close">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->


    <!-- Modal Show -->
    <div id="my-modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title text-white" id="my-modal-title">Update Data Daftar Harga uji</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" id="id_update">
                            </div>

                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="cmb_kategori_update" id="cmb_kategori_update" class="form-control">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Detail Parameter</label>
                                <input type="text" name="edit_detail_parameter" id="edit_detail_parameter" class="form-control" placeholder="Detail Parameter">
                            </div>
                            <div class="form-group">
                                <label for="">Metode</label>
                                <input type="text" name="edit_metode" id="edit_metode" class="form-control" placeholder="Metode Parameter">
                            </div>
                            <div class="form-group">
                                <label for="">Lambang</label>
                                <input type="text" name="edit_lambang" id="edit_lambang" class="form-control" placeholder="Metode Lambang">
                            </div>
                            <div class="form-group">
                                <label for="">Qty</label>
                                <input type="number" name="edit_qty" id="edit_qty" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Tarif Umum</label>
                                <input type="number" name="edit_tarif_umum" id="edit_tarif_umum" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Tarif Mahasiswa</label>
                                <input type="number" name="edit_tarif_mahasiswa" id="edit_tarif_mahasiswa" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning btn-md" ng-click="UpdateDataDaftarUji()">
                        <i class="fa fa-edit"></i>
                        Update
                    </button>
                    <button class="btn btn-md btn-close" data-dismiss="modal" aria-label="Close">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Show Data -->




</div>
<!-- ########## END: MAIN PANEL ########## -->