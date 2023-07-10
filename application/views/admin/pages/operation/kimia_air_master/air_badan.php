<div class="tab-pane" id="air3">
    <div ng-module="ModuleBadanAir" ng-controller="ControllerKimiaBadanAir">
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
                    <table class="table table-bordered responsive table-hover" style="width: 100%;" datatable="ng"
                        dt-options="vm.dtOptions">
                        <thead class="bg-dark">
                            <tr class="text-center">
                                <th rowspan="2" class="text-white">No.</th>
                                <th rowspan="2" class="text-white">Kategori</th>
                                <th rowspan="2" class="text-white">Parameter Analisa</th>
                                <th rowspan="2" class="text-white">Satuan</th>
                                <th colspan="4" class="text-white">Kelas</th>
                                <th rowspan="2" class="text-white">Metode Pengujian</th>
                                <th rowspan="2" class="text-white">#Act</th>
                            </tr>
                            <tr>
                                <td class="text-white">I</td>
                                <td class="text-white">II</td>
                                <td class="text-white">III</td>
                                <td class="text-white">IV</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="dt in Parameter" ng-if="Parameter.length > 0">
                                <td>{{$index + 1}}</td>
                                <td>{{dt.kategori}}</td>
                                <td>{{dt.parameter}}</td>
                                <td>{{dt.satuan}}</td>
                                <td>{{dt.kelas1}}</td>
                                <td>{{dt.kelas2}}</td>
                                <td>{{dt.kelas3}}</td>
                                <td>{{dt.kelas4}}</td>
                                <td>{{dt.metode}}</td>
                                <td>
                                    <div class="button-group">
                                        <button class="btn btn-sm btn-danger" ng-click="AirBadanDelete(dt)">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning" ng-click="AirBadanShow(dt)">
                                            <i class="fa fa-edit"></i>
                                        </button>
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

        <!-- Modal -->

        <!-- Modal Add Badan -->
        <div id="air-badan-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="my-modal-title">Tambah Parameter Air Badan</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <input type="text" name="kategori_badan_air" id="kategori_badan_air"
                                        class="form-control" placeholder="Masukkan Kategori"
                                        ng-model="kategori_badan_air">
                                </div>
                                <div class="form-group">
                                    <label for="">Parameter</label>
                                    <input type="text" name="parameter_badan_air" id="parameter_badan_air"
                                        class="form-control" placeholder="Masukkan parameter"
                                        ng-model="parameter_badan_air">
                                </div>
                                <div class="form-group">
                                    <label for="">Satuan</label>
                                    <input type="text" name="satuan_badan_air" id="satuan_badan_air"
                                        class="form-control" placeholder="Masukkan satuan" ng-model="satuan_badan_air">
                                </div>
                                <div class="form-group">
                                    <label for="">Kelas</label>
                                    <div class="input-group">
                                        <input type="text" name="kelas1" id="kelas1" class="form-control"
                                            placeholder="Kelas 1" ng-model="kelas1">
                                        <input type="text" name="kelas2" id="kelas2" class="form-control"
                                            placeholder="Kelas 2" ng-model="kelas2">
                                        <input type="text" name="kelas2" id="kelas3" class="form-control"
                                            placeholder="Kelas 3" ng-model="kelas3">
                                        <input type="text" name="kelas2" id="kelas4" class="form-control"
                                            placeholder="Kelas 4" ng-model="kelas4">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Metode Pengujian</label>
                                    <input type="text" name="metode_air_badan" id="metode_air_badan"
                                        class="form-control" placeholder="Masukkan Pengujian"
                                        ng-model="metode_air_badan">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-md btn-primary" ng-click="InsertAirBadan()">
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
        <!-- Enda Modal -->


        <!-- Modal show Add -->
        <div id="air-badan-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title text-white" id="my-modal-title">Update Parameter Air Badan</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="id_update_badan_air" id="id_update_badan_air"
                                        class="form-control" ng-model="id_update_badan_air">
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <input type="text" name="kategori_badan_air_update" id="kategori_badan_air_update"
                                        class="form-control" placeholder="Masukkan Kategori"
                                        ng-model="kategori_badan_air_update">
                                </div>
                                <div class="form-group">
                                    <label for="">Parameter</label>
                                    <input type="text" name="parameter_badan_air_update" id="parameter_badan_air_update"
                                        class="form-control" placeholder="Masukkan parameter"
                                        ng-model="parameter_badan_air_update">
                                </div>
                                <div class="form-group">
                                    <label for="">Satuan</label>
                                    <input type="text" name="satuan_badan_air_update" id="satuan_badan_air_update"
                                        class="form-control" placeholder="Masukkan satuan"
                                        ng-model="satuan_badan_air_update">
                                </div>
                                <div class="form-group">
                                    <label for="">Kelas</label>
                                    <div class="input-group">
                                        <input type="text" name="kelas1_update" id="kelas1_update" class="form-control"
                                            placeholder="Kelas 1" ng-model="kelas1_update">
                                        <input type="text" name="kelas2_update" id="kelas2_update" class="form-control"
                                            placeholder="Kelas 2" ng-model="kelas2_update">
                                        <input type="text" name="kelas3_update" id="kelas3_update" class="form-control"
                                            placeholder="Kelas 3" ng-model="kelas3_update">
                                        <input type="text" name="kelas4_update" id="kelas4_update" class="form-control"
                                            placeholder="Kelas 4" ng-model="kelas4_update">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Metode Pengujian</label>
                                    <input type="text" name="metode_air_badan_update" id="metode_air_badan_update"
                                        class="form-control" placeholder="Masukkan Pengujian"
                                        ng-model="metode_air_badan_update">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-md btn-warning" ng-click="UpdateAirBadan()">
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
        <!-- End Modal -->
    </div>
</div>