<div class="tab-pane" id="air2">
    <div ng-module="ModuleKimiaAirBersih" ng-controller="ControllerKimiaAirBersih">
        <div class="row pb-3">
            <div class="col-md-12">
                <button class="btn btn-md btn-primary" ng-click="AddAirBersih()">
                    <i class="fa fa-plus"></i>
                    Tambah
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table table-bordered responsive table-hover" style="width: 100%;" datatable="ng"
                            dt-options="vm.dtOptions">
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
                                        <div class="button-group">
                                            <div class="button-group">
                                                <button class="btn btn-sm btn-danger" ng-click="AirBersihDelete(dt)">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <button class="btn btn-sm btn-warning" ng-click="AirBersihShow(dt)">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr ng-if="Parameter.length === 0">
                                    <td colspan="7" class="text-center weight">No data available</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- All Modal -->

        <!-- Add Modal -->
        <div id="air-bersih-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="my-modal-title">Tambah Parameter Air Bersih</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <input type="text" name="kategori_air_bersih" id="kategori_air_bersih"
                                        class="form-control" placeholder="Masukkan Kategori"
                                        ng-model="kategori_air_bersih">
                                </div>
                                <div class="form-group">
                                    <label for="">Parameter Pengujian</label>
                                    <input type="text" name="parameter_air_bersih" id="parameter_air_bersih"
                                        class="form-control" placeholder="Masukkan Nama Parameter"
                                        ng-model="parameter_air_bersih">
                                </div>
                                <div class="form-group">
                                    <label for="">satuan</label>
                                    <input type="text" name="satuan_air_bersih" id="satuan_air_bersih"
                                        class="form-control" placeholder="Masukkan satuan Parameter"
                                        ng-model="satuan_air_bersih">
                                </div>
                                <div class="form-group">
                                    <label for="">Standard Maksimum</label>
                                    <input type="text" name="standart_air_bersih" id="standart_air_bersih"
                                        class="form-control" placeholder="Masukkan Statndard Maksimum"
                                        ng-model="standart_air_bersih">
                                </div>
                                <div class="form-group">
                                    <label for="">Metode Pengujian</label>
                                    <input type="text" name="metode_air_bersih" id="metode_air_bersih"
                                        class="form-control" placeholder="Masukkan metode Parameter"
                                        ng-model="metode_air_bersih">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-md btn-primary" ng-click="InsertAirBersih()">
                                        <i class="fa fa-plus"></i>
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <!-- Modal Show Edit -->
        <div id="air-bersih-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title text-white" id="my-modal-title">Update Parameter Air Bersih</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="fomr-group">
                                    <input type="hidden" name="id_update_air_bersih" class="form-control"
                                        id="id_update_air_bersih" ng-model="id_update_air_bersih">
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <input type="text" name="kategori_air_bersih_update" id="kategori_air_bersih_update"
                                        class="form-control" placeholder="Masukkan Kategori"
                                        ng-model="kategori_air_bersih_update">
                                </div>
                                <div class="form-group">
                                    <label for="">Parameter Pengujian</label>
                                    <input type="text" name="parameter_air_bersih_update"
                                        id="parameter_air_bersih_update" class="form-control"
                                        placeholder="Masukkan Nama Parameter" ng-model="parameter_air_bersih_update">
                                </div>
                                <div class="form-group">
                                    <label for="">satuan</label>
                                    <input type="text" name="satuan_air_bersih_update" id="satuan_air_bersih_update"
                                        class="form-control" placeholder="Masukkan satuan Parameter"
                                        ng-model="satuan_air_bersih_update">
                                </div>
                                <div class="form-group">
                                    <label for="">Standard Maksimum</label>
                                    <input type="text" name="standart_air_bersih_update" id="standart_air_bersih_update"
                                        class="form-control" placeholder="Masukkan Statndard Maksimum"
                                        ng-model="standart_air_bersih_update">
                                </div>
                                <div class="form-group">
                                    <label for="">Metode Pengujian</label>
                                    <input type="text" name="metode_air_bersih_update" id="metode_air_bersih_update"
                                        class="form-control" placeholder="Masukkan metode Parameter"
                                        ng-model="metode_air_bersih_update">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-md btn-warning" ng-click="UpdateAirBersih()">
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