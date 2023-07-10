<div ng-app="admin_mdical_master" ng-controller="ControllerMedical">
    <div class="br-mainpanel">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="<?= base_url("/opr/medical/master") ?>">Register</a>
                <span class="breadcrumb-item active">Admin</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="br-pagetitle">
            <i class="icon icon ion-ios-photos-outline"></i>
            <div>
                <h4>Informasi Data Master Medical Check-Up</h4>
                <p class="mg-b-0">
                    Informasi Data list dan Harga Masing-Masing Medical Check-Up.
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
                                        <button class="btn btn-md btn-primary" onclick="add_data_medical_master()">
                                            <i class="fa fa-plus"></i>
                                            Tambah Data
                                        </button>
                                        <button class="btn btn-md btn-dark" onclick="add_import_medical()">
                                            <i class="fa fa-file"></i>
                                            Import Data
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-2 right">
                                    <div class="button-group">
                                        <button class="btn btn-md btn-success" onclick="show_kategori_medic()">
                                            <i class="fa fa-folder"></i>
                                            Kategori
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
                                                    <th>Kategori</th>
                                                    <th>list</th>
                                                    <th>Harga</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="dt in MedicalMaster" ng-if="MedicalMaster.length > 0">
                                                    <td>{{$index + 1}}</td>
                                                    <td>{{dt.kategori}}</td>
                                                    <td>{{dt.detail}}</td>
                                                    <td>{{dt.harga}}</td>
                                                    <td>
                                                        <div class="button-group">
                                                            <button class="btn btn-sm btn-danger" ng-click="DeleteMasterMedical(dt)">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-warning" ng-click="ShowMasterMedical(dt)">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr ng-if="MedicalMaster.length === 0">
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


    <!-- Modal Show Kategori -->
    <div id="my-modal-kategori" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="my-modal-title">Kategori Medical Checkup</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="bg-success">
                        <ul class="nav nav-tabs nav-tabs-for-dark card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link bd-0 active pd-y-8" href="#popular2" data-toggle="tab">
                                    <i class="fa fa-table"></i>
                                    Form Data
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link bd-0 pd-y-8" href="#popular3" data-toggle="tab">
                                    <i class="fa fa-edit"></i>
                                    Input
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="popular2">
                            <div class="row pt-4">
                                <div class="col-md-12">
                                    <div class="table-responsive pt-2">
                                        <table datatable="ng" dt-options="vm.dtOptions" class="table display table-hover nowrap" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>#No</th>
                                                    <th>Kategori</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="dt in MedicalKategori" ng-if="MedicalKategori.length > 0">
                                                    <td>{{$index + 1}}</td>
                                                    <td>{{dt.kategori}}</td>
                                                    <td>
                                                        <div class="button-group">
                                                            <button class="btn btn-sm btn-danger" ng-click="DeleteKategoriMedocal(dt)">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr ng-if="MedicalKategori.length === 0">
                                                    <td colspan="3">No data available</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="popular3">
                            <div class="form-group pt-4">
                                <label for="">Kategori</label>
                                <textarea name="kategori" id="kategori" cols="3" rows="3" class="form-control" placeholder="Masukkan Kategori" ng-model="kategori"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-md btn-success" ng-click="InsertKategoriMedical()">
                                    <i class="fa fa-plus"></i>
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Show Kategori -->


    <!-- Modal Show Add -->
    <div id="my-modal-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="my-modal-title">Tambah Daftar Harga</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="form_insert_medical" action="" method="post">
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select name="cmb_kategori_medical" id="cmb_kategori_medical" class="form-control">
                                        <option value="">Pilih</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Detail List</label>
                                    <input type="text" name="list" id="list" class="form-control" placeholder="Masukkan Nama List">
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukkan Daftar Harga">
                                </div>
                            </form>

                            <div class="form-group">
                                <button class="btn btn-md btn-primary" onclick="insert_medical_harga()">
                                    <i class="fa fa-plus"></i>
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End Show -->

    <!-- Modal Show Update -->
    <div id="my-modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title text-white" id="my-modal-title">Update Daftar Harga</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="form_update_medical" action="" method="post">
                                <div class="form-group">
                                    <input type="hidden" id="id_update" name="id_update" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select name="cmb_kategori_medical_update" id="cmb_kategori_medical_update" class="form-control">
                                        <option value="">Pilih</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Detail List</label>
                                    <input type="text" name="list_update" id="list_update" class="form-control" placeholder="Masukkan Nama List">
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="number" name="harga_update" id="harga_update" class="form-control" placeholder="Masukkan Daftar Harga">
                                </div>
                            </form>

                            <div class="form-group">
                                <button class="btn btn-md btn-warning" onclick="update_medical_harga()">
                                    <i class="fa fa-edit"></i>
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>