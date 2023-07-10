<div ng-app="AdmMedicalTrans" ng-controller="ControllerAdmMedicalTrans">
    <div class="br-mainpanel">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="<?= base_url("/opr/medical/master") ?>">List Permohonan</a>
                <span class="breadcrumb-item active">Admin</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="br-pagetitle">
            <i class="icon icon ion-ios-photos-outline"></i>
            <div>
                <h4>Informasi Medical Check-Up</h4>
                <p class="mg-b-0">
                    Informasi Data List Permohonan Medical Check-Up .
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
                                                    <th>Act</th>
                                                    <th>#</th>
                                                    <th>ID Permohonan</th>
                                                    <th>Status</th>
                                                    <th>Tanggal</th>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Alamat</th>
                                                    <th>Telepon</th>
                                                    <th>User Aktif</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="dt in Transaksi" ng-if="Transaksi.length > 0">
                                                    <td>
                                                        <div class="button-group">
                                                            <button class="btn btn-sm btn-danger"
                                                                ng-click="DeleteRequestMedical(dt)">
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
                                                    <td>{{dt.request_id}}</td>
                                                    <td>
                                                        <span ng-if="dt.status=='request'"
                                                            class="badge badge-secondary">{{dt.status}}</span>
                                                        <span ng-if="dt.status=='in process'"
                                                            class="badge badge-primary">{{dt.status}}</span>
                                                        <span ng-if="dt.status=='clear'"
                                                            class="badge badge-success">{{dt.status}}</span>
                                                    </td>
                                                    <td>{{dt.tangal}}</td>
                                                    <td>{{dt.nik}}</td>
                                                    <td>{{dt.nama}}</td>
                                                    <td>{{dt.jk}}</td>
                                                    <td>{{dt.alamat}}</td>
                                                    <td>{{dt.telepon}}</td>
                                                    <td>{{dt.username}}</td>
                                                </tr>
                                                <tr ng-if="Transaksi.length === 0">
                                                    <td colspan="11" class="text-center">No data available</td>
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
</div>