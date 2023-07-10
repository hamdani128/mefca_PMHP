<div ng-app="UsersMikrobiologi" ng-controller="UsersControllerMikrobiologi">
    <div class="br-mainpanel">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="<?= base_url("/users/mikrobio") ?>">Medical Check-Up</a>
                <span class="breadcrumb-item active">Users</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="br-pagetitle">
            <i class="icon icon ion-ios-photos-outline"></i>
            <div>
                <h4>Informasi Data Request Mikrobiologi</h4>
                <p class="mg-b-0">
                    Informasi Form Request dan Pengajuan Laboratorium Mikrobiologi.
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
                                                <table datatable="ng" dt-options="vm.dtOptions" class="table display table-hover nowrap" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>#No</th>
                                                            <th>Action</th>
                                                            <th>No.Permohonan</th>
                                                            <th>Status</th>
                                                            <th>Nama Pelanggan</th>
                                                            <th>Alamat</th>
                                                            <th>No.Hp</th>
                                                            <th>Pemilik</th>
                                                            <th>Sampel</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr ng-repeat="dt in Request" ng-if="Request.length > 0">
                                                            <td>{{$index + 1}}</td>
                                                            <td>
                                                                <div class="button-group">
                                                                    <button class="btn btn-sm btn-danger" ng-click="DeleteMikrobiologi(dt)">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                    <button class="btn btn-sm btn-dark">
                                                                        <i class="fa fa-eye"></i>
                                                                    </button>
                                                                    <button class="btn btn-sm btn-info" ng-click="CetakPermohonanMikrobiologi(dt)">
                                                                        <i class="fa fa-print"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <td>{{dt.request_id}}</td>
                                                            <td>
                                                                <span ng-if="dt.status=='Request'" class="badge badge-secondary">{{dt.status}}</span>
                                                                <span ng-if="dt.status=='In Process'" class="badge badge-primary">{{dt.status}}</span>
                                                                <span ng-if="dt.status=='Clear'" class="badge badge-success">{{dt.status}}</span>
                                                            </td>

                                                            <td>{{dt.pelanggan}}</td>
                                                            <td>{{dt.alamat}}</td>
                                                            <td>{{dt.no_hp}}</td>
                                                            <td>{{dt.pemilik}}</td>
                                                            <td>{{dt.sampel}}</td>
                                                        </tr>
                                                        <tr ng-if="Request.length === 0">
                                                            <td colspan="9" class="text-center">No data available</td>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nama Pelanggan</label>
                                                <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" ng-model="nama_pelanggan" placeholder="Nama Pelanggan">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Alamat</label>
                                                <textarea name="alamat" id="alamat" cols="5" rows="5" class="form-control" placeholder="Masukkan Alamat" ng-model="alamat"></textarea>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Pemilik</label>
                                                <input type="text" name="pemilik" id="pemilik" class="form-control" placeholder="Masukkan Data Pemilik" ng-model="pemilik">
                                            </div>
                                            <div class="form-group">
                                                <label for="">No.HP</label>
                                                <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan No HP" ng-model="no_hp">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Sampel diambil</label>
                                                <textarea name="sampel" id="sampel" cols="5" rows="5" class="form-control" ng-model="sampel" placeholder="Masukkan Sampel"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary btn-md" ng-click="SimpanRequestMikrobiologi()">
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