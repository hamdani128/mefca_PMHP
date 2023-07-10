<!-- ########## START: MAIN PANEL ########## -->
<div ng-app="AdminSDM" ng-controller="AdminSDMController">
    <div class="br-mainpanel">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="<?= base_url("/opr/master/sdm") ?>">SDM Manajemen</a>
                <span class="breadcrumb-item active">Modul Master</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="br-pagetitle">
            <i class="icon icon ion-ios-photos-outline"></i>
            <div>
                <h4>Informasi Data SDM Manajemen</h4>
                <p class="mg-b-0">
                    Informasi Data SDM Manajemen.
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
                                        <button class="btn btn-md btn-primary" ng-click="add_sdm()">
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
                                                    <th>#Act</th>
                                                    <th>No</th>
                                                    <th>ID SDM</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Jabatan</th>
                                                    <th>Divisi</th>
                                                    <th>Departemen</th>
                                                    <th>Status Users</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="dt in SDM" ng-if="SDM.length > 0">
                                                    <td>
                                                        <div class="button-group">
                                                            <button class="btn btn-sm btn-danger"
                                                                ng-click="DeleteData(dt)">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-dark">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-info"
                                                                ng-click="CetakPermohonan(dt)">
                                                                <i class="fa fa-print"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td>{{$index + 1}}</td>
                                                    <td>{{dt.kode_sdm}}</td>
                                                    <td>{{dt.nama}}</td>
                                                    <td>{{dt.jk}}</td>
                                                    <td>{{dt.jabatan}}</td>
                                                    <td>{{dt.divisi}}</td>
                                                    <td>{{dt.departement}}</td>
                                                    <td>
                                                        <span ng-if="dt.status_akun=='Non Active'"
                                                            class="badge badge-secondary">{{dt.status_akun}}</span>
                                                        <span ng-if="dt.status_akun=='Active'"
                                                            class="badge badge-primary">{{dt.status_akun}}</span>
                                                    </td>
                                                </tr>
                                                <tr ng-if="SDM.length === 0">
                                                    <td colspan="9" class="text-center">No data available</td>
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
    <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="my-modal-title">Tambah Data SDM</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" ng-model="nama" class="form-control"
                                    placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="cmb_jk" id="cmb_jk" ng-model="cmb_jk" class="form-control">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan" ng-model="jabatan" class="form-control"
                                    placeholder="Masukkan Jabatan">
                            </div>
                            <div class="form-group">
                                <label for="">Divisi</label>
                                <input type="text" name="divisi" id="divisi" ng-model="divisi" class="form-control"
                                    placeholder="Masukkan Divisi">
                            </div>
                            <div class="form-group">
                                <label for="">Departement</label>
                                <input type="text" name="departement" id="departement" ng-model="departement"
                                    class="form-control" placeholder="Masukkan Departement">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <button class="btn btn-primary btn-md" ng-click="SimpaDataSDM()">
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
<!-- ########## END: MAIN PANEL ########## -->