<div class="tab-pane" id="trans_air3">
    <div ng-module="AdmKimiaAirBadanAir" ng-controller="ControllerAdmKimiaAirBadanAir">
        <div class="row pb-3">
            <div class="col-md-12">
                <button class="btn btn-md btn-primary" ng-click="AddAirBadan()">
                    <i class="fa fa-plus"></i>
                    Tambah
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered responsive table-hover" style="width: 100%;" datatable="ng" dt-options="vm.dtOptions">
                        <thead class="bg-dark">
                            <tr>
                                <th class="text-white"">#No</th>
                                <th class=" text-white"">Action</th>
                                <th class="text-white"">No.Permohonan</th>
                                <th class=" text-white"">Status</th>
                                <th class="text-white"">Nama Pelanggan</th>
                                <th class=" text-white"">Alamat</th>
                                <th class="text-white"">No.Hp</th>
                                <th class=" text-white"">Pemilik</th>
                                <th class="text-white"">Sampel</th>
                                <th class=" text-white"">Merk</th>
                                <th class="text-white"">Kemasan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat=" dt in Request" ng-if="Request.length > 0">
                                <td>{{$index + 1}}</td>
                                <td>
                                    <div class="button-group">
                                        <button class="btn btn-sm btn-danger" ng-click="DeleteAirMinumRequest(dt)">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <button class="btn btn-sm btn-dark">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-info" ng-click="CetakPermohonanAirMinumRequest(dt)">
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