<!-- ########## START: MAIN PANEL ########## -->
<div ng-app="ListPermohonanApp" ng-controller="ListPermohonanAppController">
    <div class="br-mainpanel">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="<?= base_url("/transaksi/list_permohonan") ?>">List Permohonan</a>
                <span class="breadcrumb-item active">Admin</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="br-pagetitle">
            <i class="icon icon ion-ios-photos-outline"></i>
            <div>
                <h4>Informasi Data Permohonan Pengujian</h4>
                <p class="mg-b-0">
                    Informasi Data List Permohonan Pengujian.
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
                                            Tambah Permohonan
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
                                                    <th>Action</th>
                                                    <th>#No</th>
                                                    <th>ID Request</th>
                                                    <th>Status</th>
                                                    <th>Asal Produk</th>
                                                    <th>Perincian Produk</th>
                                                    <th>Pengujian Mutu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="dt in Transaksi" ng-if="Transaksi.length > 0">
                                                    <td>
                                                        <div class="button-group">
                                                            <button class="btn btn-sm btn-danger" ng-click="DeleteRequestPermohonan(dt)">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-dark">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-info" ng-click="CetakPermohonan(dt)">
                                                                <i class="fa fa-print"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td>{{$index + 1}}</td>

                                                    <td>{{dt.request_id}}</td>
                                                    <td>
                                                        <span ng-if="dt.status=='Request'" class="badge badge-secondary">{{dt.status}}</span>
                                                        <span ng-if="dt.status=='In process'" class="badge badge-primary">{{dt.status}}</span>
                                                        <span ng-if="dt.status=='Clear'" class="badge badge-success">{{dt.status}}</span>
                                                    </td>
                                                    <td>{{dt.asal_produk}}</td>
                                                    <td>{{dt.perincian_produk}}</td>
                                                    <td>{{dt.pengujian_mutu}}</td>
                                                </tr>
                                                <tr ng-if="Transaksi.length === 0">
                                                    <td colspan="7" class="text-center">No data available</td>
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
<!-- ########## END: MAIN PANEL ########## -->