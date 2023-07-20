<!-- ########## START: MAIN PANEL ########## -->
<div ng-app="MetodeUjiAdmin" ng-controller="MetodeUjiAdminController">
    <div class="br-mainpanel">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="<?= base_url("/opr/master/metode_uji") ?>">Metode Uji</a>
                <span class="breadcrumb-item active">Modul Master</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="br-pagetitle">
            <i class="icon icon ion-ios-photos-outline"></i>
            <div>
                <h4>Informasi Data Metode Uji</h4>
            </div>
        </div><!-- d-flex -->

        <div class="br-pagebody">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header tx-medium">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <table style="width: 100%;">
                                                        <tr>
                                                            <td style="width: 30%;">Parameter Uji</td>
                                                            <td style="width: 5%;">:</td>
                                                            <td style="width: 50%;">
                                                                <select name="cmb_kategori_parameter" id="cmb_kategori_parameter" class="form-control" ng-model="selectedOption" onchange="OnchangeKategori()">
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 30%;">Parameter Detail</td>
                                                            <td style="width: 5%;">:</td>
                                                            <td style="width: 50%;">
                                                                <select name="cmb_kategori_detail" id="cmb_kategori_detail" class="form-control">
                                                                </select>
                                                            </td>
                                                            <td style="width: 15%;">
                                                                <div class="input-group">
                                                                    <button class="btn btn-md btn-dark" ng-click="FilterDataMetodeUji()">
                                                                        <i class="fa fa-filter"></i>
                                                                    </button>
                                                                    <button class="btn btn-md btn-primary" ng-click="AddMetodeUji()">
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div><!-- card-header -->
                                    </div><!-- card -->
                                </div>
                            </div>

                            <div class="row pt-5">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table display table-hover nowrap" style="width: 100%;">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th class="text-white">No</th>
                                                    <th class="text-white">#Act</th>
                                                    <th class="text-white">Kategori Parameter</th>
                                                    <th class="text-white">Detail Parameter</th>
                                                    <th class="text-white">Metode Uji</th>
                                                </tr>
                                            </thead>
                                            <tbody>

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
                        <h5 style="display: none;" id="lb_cmb_kategori">-</h5>
                        <h5 style="display: none;" id="lb_cmb_kategori_detail">-</h5>
                    </div>
                    <div class="form-group">
                        <label for="">Metode Uji</label>
                        <input type="text" name="add_metode_uji" id="add_metode_uji" class="form-control" placeholder="Metode Uji">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-md btn-primary">
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
    <div id="my-modal-show-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title text-white" id="my-modal-title">Update Data List Detail Parameter</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input id="id_update" class="form-control" type="hidden" name="id_update">
                            </div>
                            <div class="form-group">
                                <label for="">Pilih Kategori Paremeter</label>
                                <select name="cmb_kategori_update" id="cmb_kategori_update" class="form-control">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">List Detail Parameter</label>
                                <textarea name="list_detail_update" id="list_detail_update" cols="2" rows="2" class="form-control" placeholder="List Detail Parameter"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning btn-md" ng-click="Update_list_parameter()">
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