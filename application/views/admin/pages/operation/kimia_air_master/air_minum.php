<div class="tab-pane active" id="air1">
    <div ng-module="ModuleKimiaAirMinum" ng-controller="ControllerKimiaAirMinum">
        <div class="row pb-3">
            <div class="col-md-12">
                <button class="btn btn-md btn-primary" ng-click="AddAirMinum()">
                    <i class="fa fa-plus"></i>
                    Tambah
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table table-bordered responsive table-hover" style="width: 100%;" datatable="ng" dt-options="vm.dtOptions">
                            <thead class="bg-dark">
                                <tr class="text-center">
                                    <th class="text-white">No.</th>
                                    <th class="text-white">Kategori</th>
                                    <th class="text-white">Parameter Analisa</th>
                                    <th class="text-white">Satuan</th>
                                    <th class="text-white">Standard Maksimum</th>
                                    <th class="text-white">Metode Pengujian</th>
                                    <th class="text-white">#Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="dt in Parameter" ng-if="Parameter.length > 0">
                                    <td>{{$index + 1}}</td>
                                    <td>{{dt.kategori}}</td>
                                    <td>{{dt.parameter}}</td>
                                    <td>{{dt.satuan}}</td>
                                    <td>{{dt.standart}}</td>
                                    <td>{{dt.metode}}</td>
                                    <td>
                                        <div class="input-group">
                                            <div class="button-group">
                                                <button class="btn btn-sm btn-danger" ng-click="AirMinumDelete(dt)">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <button class="btn btn-sm btn-warning" ng-click="AirMinumShow(dt)">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr ng-if="Parameter.length === 0">
                                    <td colspan="5" class="text-center weight">No data available</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Add -->

        <!-- Add Modal -->
        <div id="air-minum-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="my-modal-title">Tambah Parameter Air Minum</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form id="form_parameter_air_bersih_insert" action="" method="post">
                                    <div class="form-group">
                                        <label for="">Kategori</label>
                                        <input type="text" name="kategori" id="kategori" class="form-control" placeholder="Masukkan Kategori" ng-model="kategori">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Parameter Pengujian</label>
                                        <input type="text" name="parameter" id="parameter" class="form-control" placeholder="Masukkan Nama Parameter" ng-model="parameter">
                                    </div>
                                    <div class="form-group">
                                        <label for="">satuan</label>
                                        <input type="text" name="satuan" id="satuan" class="form-control" placeholder="Masukkan satuan Parameter" ng-model="satuan">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Standard Maksimum</label>
                                        <input type="text" name="standart" id="standart" class="form-control" placeholder="Masukkan Statndard Maksimum" ng-model="standart">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Metode Pengujian</label>
                                        <input type="text" name="metode" id="metode" class="form-control" placeholder="Masukkan metode Parameter" ng-model="metode">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-md btn-primary" ng-click="InsertAirMinum()">
                                            <i class="fa fa-plus"></i>
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <!-- Modal Show Edit -->
        <div id="air-minum-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title text-white" id="my-modal-title">Update Parameter Air Minum</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="fomr-group">
                                    <input type="hidden" name="id_update" class="form-control" id="id_update" ng-model="id_update">
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <input type="text" name="kategori_update" id="kategori_update" class="form-control" placeholder="Masukkan Kategori" ng-model="kategori_update">
                                </div>
                                <div class="form-group">
                                    <label for="">Parameter Pengujian</label>
                                    <input type="text" name="parameter_update" id="parameter_update" class="form-control" placeholder="Masukkan Nama Parameter" ng-model="parameter_update">
                                </div>
                                <div class="form-group">
                                    <label for="">satuan</label>
                                    <input type="text" name="satuan_update" id="satuan_update" class="form-control" placeholder="Masukkan satuan Parameter" ng-model="satuan_update">
                                </div>
                                <div class="form-group">
                                    <label for="">Standard Maksimum</label>
                                    <input type="text" name="standart_update" id="standart_update" class="form-control" placeholder="Masukkan Statndard Maksimum" ng-model="standart_update">
                                </div>
                                <div class="form-group">
                                    <label for="">Metode Pengujian</label>
                                    <input type="text" name="metode_update" id="metode_update" class="form-control" placeholder="Masukkan metode Parameter" ng-model="metode_update">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-md btn-warning" ng-click="UpdateAirMinum()">
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
        <!-- end Modal Show -->

    </div>
</div>