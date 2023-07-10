<div ng-app="AdmMikrobilogiTrans" ng-controller="ControllerAdmMikrobilogiTrans">
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
                <h4>Informasi Permohonan Laboratorium Mikrobiologi</h4>
                <p class="mg-b-0">
                    Informasi Data List Permohonan Laboratorium Mikrobiologi.
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
                                        <button class="btn btn-md btn-primary" ng-click="AddPermohonan()">
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
                                                    <th>Pelanggan</th>
                                                    <th>Alamat</th>
                                                    <th>No.HP</th>
                                                    <th>Pemilik</th>
                                                    <th>Sampel</th>
                                                    <th>Username</th>
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
                                                    <td>{{dt.created_at}}</td>
                                                    <td>{{dt.pelanggan}}</td>
                                                    <td>{{dt.alamat}}</td>
                                                    <td>{{dt.no_hp}}</td>
                                                    <td>{{dt.pemilik}}</td>
                                                    <td>{{dt.sampel}}</td>
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