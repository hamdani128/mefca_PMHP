<!-- ########## START: MAIN PANEL ########## -->
<div ng-app="ParameterMasterAdmin" ng-controller="ParameterMasterAdminController">
    <div class="br-mainpanel">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="<?= base_url("/opr/master/parameter") ?>">Parameter</a>
                <span class="breadcrumb-item active">Modul Master</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="br-pagetitle">
            <i class="icon icon ion-ios-photos-outline"></i>
            <div>
                <h4>Informasi Data Parameter</h4>
                <p class="mg-b-0">
                    Informasi Data Parameter Beserta Detail Kelengkapan.
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
                                        <button class="btn btn-md btn-primary" ng-click="add_parameter_add()">
                                            <i class="fa fa-plus"></i>
                                            Tambah Data
                                        </button>
                                        <button class="btn btn-md btn-dark" ng-click="show_kategori_parameter()">
                                            <i class="fa fa-database"></i>
                                            Kategori Parameter
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
                                                    <th>No</th>
                                                    <th>#Act</th>
                                                    <th>Kategori</th>
                                                    <th>List Parameter</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="dt in postData" ng-if="postData.length > 0">
                                                    <td>{{$index + 1}}</td>
                                                    <td>
                                                        <div class="button-group">
                                                            <button class="btn btn-sm btn-warning" ng-click="EditParameterUji(dt)">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-danger" ng-click="DeleteParameterUji(dt)">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td>{{dt.kategori}}</td>
                                                    <td>{{dt.parameter}}</td>
                                                </tr>
                                                <tr ng-if="postData.length === 0">
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

    <!-- Modal Parameter -->
    <div id="my-modal-kategori" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="my-modal-title">Informasi Parameter Uji</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Row Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Input</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row pt-2">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table display table-hover nowrap" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>#Act</th>
                                                    <th>Parameter Uji</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tbody>
                                                <tr ng-repeat="dt in post" ng-if="post.length > 0">
                                                    <td>{{$index + 1}}</td>
                                                    <td>
                                                        <div class="button-group">
                                                            <button class="btn btn-sm btn-danger" ng-click="DeleteKategriParameter(dt)">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td>{{dt.kategori}}</td>
                                                </tr>
                                                <tr ng-if="post.length === 0">
                                                    <td colspan="10">No data available</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row pt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Parameter Uji</label>
                                        <input type="text" name="parameter_uji" id="parameter_uji" ng-model="parameter_uji" class="form-control" placeholder="Masukkan Parameter Uji">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-md btn-primary" ng-click="insert_parameter_uji()">
                                            <i class="fa fa-save"></i>
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal Parameter -->

    <!-- Modal Add Parameter -->
    <div id="my-modal-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="my-modal-title">Tambah Data List Detail Parameter</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Pilih Kategori Paremeter</label>
                                <select name="cmb_kategori" id="cmb_kategori" class="form-control">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">List Detail Parameter</label>
                                <textarea name="list_detail" id="list_detail" cols="2" rows="2" class="form-control" placeholder="List Detail Parameter"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-md" ng-click="Insert_list_parameter()">
                        <i class="fa fa-save"></i>
                        Submit
                    </button>
                    <button class="btn btn-md btn-close" data-dismiss="modal" aria-label="Close">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End Add Parameter -->
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