<div class="tab-pane active" id="air1">
    <div class="row" ng-module="UsersKimiaAirMinum" ng-controller="ControllerUsersKimiaAirMinum">
        <div class="col-md-12">
            <div id="accordion2" class="accordion accordion-head-colored accordion-primary" role="tablist"
                aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="headingOne2">
                        <h6 class="mg-b-0">
                            <a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne2"
                                aria-expanded="true" aria-controls="collapseOne2">
                                <i class="fa fa-table"></i> Informasi Row Request
                            </a>
                        </h6>
                    </div>
                    <!-- card-header -->

                    <div id="collapseOne2" class="collapse show" role="tabpanel" aria-labelledby="headingOne2">
                        <div class="card-block pd-20">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <div class="table-responsive">
                                            <table datatable="ng" dt-options="vm.dtOptions"
                                                class="table display table-hover nowrap" style="width: 100%;">
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
                                                        <th>Merk</th>
                                                        <th>Kemasan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="dt in Request" ng-if="Request.length > 0">
                                                        <td>{{$index + 1}}</td>
                                                        <td>
                                                            <div class="button-group">
                                                                <button class="btn btn-sm btn-danger"
                                                                    ng-click="DeleteAirMinumRequest(dt)">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                                <button class="btn btn-sm btn-dark">
                                                                    <i class="fa fa-eye"></i>
                                                                </button>
                                                                <button class="btn btn-sm btn-info"
                                                                    ng-click="CetakPermohonanAirMinumRequest(dt)">
                                                                    <i class="fa fa-print"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                        <td>{{dt.request_id}}</td>
                                                        <td>
                                                            <span ng-if="dt.status=='Request'"
                                                                class="badge badge-secondary">{{dt.status}}</span>
                                                            <span ng-if="dt.status=='In Process'"
                                                                class="badge badge-primary">{{dt.status}}</span>
                                                            <span ng-if="dt.status=='Clear'"
                                                                class="badge badge-success">{{dt.status}}</span>
                                                        </td>

                                                        <td>{{dt.pelanggan}}</td>
                                                        <td>{{dt.alamat}}</td>
                                                        <td>{{dt.no_hp}}</td>
                                                        <td>{{dt.pemilik}}</td>
                                                        <td>{{dt.sampel}}</td>
                                                        <td>{{dt.merk}}</td>
                                                        <td>{{dt.kemasan}}</td>
                                                    </tr>
                                                    <tr ng-if="Request.length === 0">
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
                <div class="card">
                    <div class="card-header" role="tab" id="headingTwo2">
                        <h6 class="mg-b-0">
                            <a class="collapsed transition" data-toggle="collapse" data-parent="#accordion2"
                                href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                <i class="fa fa-edit"></i> Input Form Request
                            </a>
                        </h6>
                    </div>
                    <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2">
                        <div class="card-block pd-20">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nama Pelanggan</label>
                                        <input type="text" class="form-control" name="pelanggan_air_minum"
                                            id="pelanggan_air_minum" ng-model="pelanggan_air_minum"
                                            placeholder="Nama Pelanggan">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <textarea name="alamat_air_minum" id="alamat_air_minum" cols="5" rows="5"
                                            class="form-control" placeholder="Masukkan Alamat"
                                            ng-model="alamat_air_minum"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Merk</label>
                                        <textarea name="merk_air_minum" id="merk_air_minum" cols="5" rows="5"
                                            class="form-control" placeholder="Merk Air Minum"
                                            ng-model="merk_air_minum"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Kemasan</label>
                                        <input type="text" name="kemasan_air_minum" id="kemasan_air_minum"
                                            class="form-control" placeholder="Kemasan Air Minum"
                                            ng-model="kemasan_air_minum">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Pemilik</label>
                                        <input type="text" name="pemilik_air_minum" id="pemilik_air_minum"
                                            class="form-control" placeholder="Masukkan Data Pemilik"
                                            ng-model="pemilik_air_minum">
                                    </div>
                                    <div class="form-group">
                                        <label for="">No.HP</label>
                                        <input type="text" name="no_hp_air_minum" id="no_hp_air_minum"
                                            class="form-control" placeholder="Masukkan No HP"
                                            ng-model="no_hp_air_minum">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Sampel diambil</label>
                                        <textarea name="sampel_air_minum" id="sampel_air_minum" cols="5" rows="5"
                                            class="form-control" ng-model="sampel_air_minum"
                                            placeholder="Masukkan Sampel"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-md btn-primary" ng-click="InsertRequestAirMinum()">
                                            <i class="fa fa-plus"></i>
                                            Submit Request
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
</div>