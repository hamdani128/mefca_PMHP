<div ng-app="PermohonanApp" ng-controller="PermohonanAppController">
    <div class="br-mainpanel">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="<?= base_url("/users/labmdc") ?>">Medical Check-Up</a>
                <span class="breadcrumb-item active">Users</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="br-pagetitle">
            <i class="icon icon ion-ios-photos-outline"></i>
            <div>
                <h4>Informasi Data Permohonan Pengujian</h4>
                <p class="mg-b-0">
                    Informasi Form Request dan Permohonan Pengujian Product.
                </p>
            </div>
        </div><!-- d-flex -->

        <div class="br-pagebody">

            <div class="row">
                <div class="col-md-12">
                    <div class="card bd-0">
                        <div class="card-header bg-dark">
                            <ul class="nav nav-tabs nav-tabs-for-dark card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link bd-0 active pd-y-8" href="#popular1" data-toggle="tab">
                                        <i class="fa fa-table"></i>
                                        Info Data
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link bd-0  tx-gray-light" href="#popular2" data-toggle="tab">
                                        <i class="fa fa-edit"></i>
                                        Input Request
                                    </a>
                                </li>
                            </ul>
                        </div><!-- card-header -->
                        <div class="card-body  color-gray-lighter bd bd-t-0 rounded-bottom">
                            <div class="tab-content">
                                <div class="tab-pane active" id="popular1">
                                    <div class="row pt-2">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table datatable="ng" dt-options="vm.dtOptions"
                                                    class="table display table-hover nowrap" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>#No</th>
                                                            <th>Action</th>
                                                            <th>ID Request</th>
                                                            <th>Status</th>
                                                            <th>Asal Produk</th>
                                                            <th>Perincian Produk</th>
                                                            <th>Pengujian Mutu</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr ng-repeat="dt in Transaksi" ng-if="Transaksi.length > 0">
                                                            <td>{{$index + 1}}</td>
                                                            <td>
                                                                <div class="button-group">
                                                                    <button class="btn btn-sm btn-danger"
                                                                        ng-click="DeleteRequestPermohonan(dt)">
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
                                                            <td>{{dt.request_id}}</td>
                                                            <td>
                                                                <span ng-if="dt.status=='Request'"
                                                                    class="badge badge-secondary">{{dt.status}}</span>
                                                                <span ng-if="dt.status=='In process'"
                                                                    class="badge badge-primary">{{dt.status}}</span>
                                                                <span ng-if="dt.status=='Clear'"
                                                                    class="badge badge-success">{{dt.status}}</span>
                                                            </td>
                                                            <td>{{dt.asal_produk}}</td>
                                                            <td>{{dt.perincian_produk}}</td>
                                                            <td>{{dt.pengujian_mutu}}</td>
                                                        </tr>
                                                        <tr ng-if="Transaksi.length === 0">
                                                            <td colspan="7" class="text-center">No data available</td>
                                                        </tr>
                                                    </tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="popular2">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Asal Produk</label>
                                                <textarea name="asal_produk" id="asal_produk" ng-model="asal_produk"
                                                    cols="5" rows="5" class="form-control"
                                                    placeholder="Masukkan Asal produk"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Perincian Produk</label>
                                                <textarea name="perincian_produk" id="perincian_produk"
                                                    ng-model="perincian_produk" cols="5" rows="5" class="form-control"
                                                    placeholder="Masukkan Detail Perincian Produk"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Pengujian Mutu</label>
                                                <textarea name="pengujian_mutu" id="pengujian_mutu"
                                                    ng-model="pengujian_mutu" cols="5" rows="5" class="form-control"
                                                    placeholder="Masukkan Pengujian Mutu"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary btn-md"
                                                ng-click="simpan_request_permohonan()">
                                                <i class="fa fa-plus"></i>
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- card -->

                </div>
            </div>
        </div><!-- br-pagebody -->
    </div><!-- br-mainpanel -->
</div>