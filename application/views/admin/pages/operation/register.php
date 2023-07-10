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
                                        <button class="btn btn-md btn-primary" onclick="add_agenda()">
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
                                                    <th>No Register</th>
                                                    <th>Instansi</th>
                                                    <th>NIK KTP</th>
                                                    <th>Nama</th>
                                                    <th>E-mail</th>
                                                    <th>Kontak</th>
                                                    <th>Alamat</th>
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
                                                            <button class="btn btn-sm btn-dark"
                                                                ng-click="ShowPassworRegister(dt)">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-success"
                                                                ng-click="ValidasiRegister(dt)">
                                                                <i class="fa fa-check"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span ng-if="dt.status=='active'"
                                                            class="badge badge-primary">{{dt.status}}</span>
                                                        <span ng-if="dt.status!='active'"
                                                            class="badge badge-dark">{{dt.status}}</span>
                                                    </td>
                                                    <td>{{dt.no_register}}</td>
                                                    <td>{{dt.instansi}}</td>
                                                    <td>{{dt.nik}}</td>
                                                    <td>{{dt.nama}}</td>
                                                    <td>{{dt.email}}</td>
                                                    <td>{{dt.kontak}}</td>
                                                    <td>{{dt.alamat}}</td>

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

</div>
<!-- ########## END: MAIN PANEL ########## -->