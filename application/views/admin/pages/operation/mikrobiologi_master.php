<div ng-app="admin_microbiologi_master" ng-controller="ControllerMicrobiologi">
    <div class="br-mainpanel">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="<?= base_url("/opr/mikrobiologi/master") ?>">Register</a>
                <span class="breadcrumb-item active">Admin</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="br-pagetitle">
            <i class="icon icon ion-ios-photos-outline"></i>
            <div>
                <h4>Informasi Data Master Mikrobiologi</h4>
                <p class="mg-b-0">
                    Informasi Data list dan Harga Masing-Masing Mikrobiologi.
                </p>
            </div>
        </div><!-- d-flex -->

        <div class="br-pagebody">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="button-group">
                                        <button class="btn btn-md btn-primary" onclick="add_data_mikrobiologi_master()">
                                            <i class="fa fa-plus"></i>
                                            Tambah Data
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-5">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table datatable="ng" dt-options="vm.dtOptions" class="table display table-hover nowrap" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>#No</th>
                                                    <th>Parameter</th>
                                                    <th>Satuan</th>
                                                    <th>Metode Pengujian</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="dt in MikroMaster" ng-if="MikroMaster.length > 0">
                                                    <td>{{$index + 1}}</td>
                                                    <td>{{dt.parameter}}</td>
                                                    <td>{{dt.satuan}}</td>
                                                    <td>{{dt.metode}}</td>
                                                    <td>
                                                        <div class="button-group">
                                                            <button class="btn btn-sm btn-danger" ng-click="DeleteMasterMikro(dt)">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-warning" ng-click="ShowMasterMikro(dt)">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr ng-if="MikroMaster.length === 0">
                                                    <td colspan="5" class="text-center weight">No data available</td>
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



    <!-- Add Modal -->
    <div id="my-modal-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="my-modal-title">Tambah Parameter</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="form_parameter_mikrobiologi_insert" action="" method="post">
                                <div class="form-group">
                                    <label for="">Parameter Pengujian</label>
                                    <input type="text" name="parameter" id="parameter" class="form-control" placeholder="Masukkan Nama Parameter">
                                </div>
                                <div class="form-group">
                                    <label for="">satuan</label>
                                    <input type="text" name="satuan" id="satuan" class="form-control" placeholder="Masukkan satuan Parameter">
                                </div>
                                <div class="form-group">
                                    <label for="">Metode Pengujian</label>
                                    <input type="text" name="metode" id="metode" class="form-control" placeholder="Masukkan metode Parameter">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-md btn-primary" onclick="SimpanMasterMikrobiologi()">
                                        <i class="fa fa-plus"></i>
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->


    <!-- Update Modal -->
    <div id="my-modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title text-white" id="my-modal-title">Update Parameter</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="form_parameter_mikrobiologi_update" action="" method="post">
                                <div class="form-group">
                                    <input type="hidden" id="id_update" name="id_update" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Parameter Pengujian</label>
                                    <input type="text" name="parameter_update" id="parameter_update" class="form-control" placeholder="Masukkan Nama Parameter">
                                </div>
                                <div class="form-group">
                                    <label for="">satuan</label>
                                    <input type="text" name="satuan_update" id="satuan_update" class="form-control" placeholder="Masukkan satuan Parameter">
                                </div>
                                <div class="form-group">
                                    <label for="">Metode Pengujian</label>
                                    <input type="text" name="metode_update" id="metode_update" class="form-control" placeholder="Masukkan metode Parameter">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-md btn-warning" ng-click="UpdateDataMikro()">
                                        <i class="fa fa-edit"></i>
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Update Modal -->
</div>