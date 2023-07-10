<div ng-app="UsersMedical" ng-controller="UsersMedicalController">
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
                <h4>Informasi Data Master Medical Check-Up Consumen</h4>
                <p class="mg-b-0">
                    Informasi Form Request dan Pengajuan Medical Check up Pasien.
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
                                                            <th>NIK</th>
                                                            <th>Nama</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Alamat</th>
                                                            <th>Kontak</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr ng-repeat="dt in LoadData" ng-if="LoadData.length > 0">
                                                            <td>{{$index + 1}}</td>
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
                                                            <td>{{dt.request_id}}</td>
                                                            <td>
                                                                <span ng-if="dt.status=='request'"
                                                                    class="badge badge-secondary">{{dt.status}}</span>
                                                                <span ng-if="dt.status=='in process'"
                                                                    class="badge badge-primary">{{dt.status}}</span>
                                                                <span ng-if="dt.status=='clear'"
                                                                    class="badge badge-success">{{dt.status}}</span>
                                                            </td>

                                                            <td>{{dt.nik}}</td>
                                                            <td>{{dt.nama}}</td>
                                                            <td>{{dt.jk}}</td>
                                                            <td>{{dt.alamat}}</td>
                                                            <td>{{dt.telepon}}</td>

                                                        </tr>
                                                        <tr ng-if="LoadData.length === 0">
                                                            <td colspan="8" class="text-center">No data available</td>
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
                                                <label for="">NIK (Nomor Induk Kependudukan)</label>
                                                <input type="text" name="nik" id="nik" class="form-control"
                                                    placeholder="Masukkan No KTP ( 1207XXXX )">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nama Lengkap</label>
                                                <input type="text" name="nama" id="nama" class="form-control"
                                                    placeholder="Masukkan Nama Lengkap">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Jenis Kelamin</label>
                                                <select class="form-control" name="cmb_jk" id="cmb_jk">
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">No.Kontak</label>
                                                <input type="text" name="no_kontak" id="no_kontak" class="form-control"
                                                    placeholder="Masukkan No.Telepon">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Alamat Lengkap</label>
                                                <textarea name="alamat" id="alamat" cols="5" rows="5"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card bd-0">
                                                <div class="card-header tx-medium bd-0 tx-white bg-mantle">
                                                    Daftar Pengambilan Pemeriksaan
                                                </div><!-- card-header -->
                                                <div class="card-body bd bd-t-0 rounded-bottom">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Kategori Pengujian</label>
                                                                <select name="cmb_pengujian" id="cmb_pengujian"
                                                                    class="form-control"
                                                                    onchange="get_list_pengujian()">
                                                                    <option value="">Pilih Pengujian</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="">List Detail</label>
                                                                <div class="input-group">
                                                                    <select name="cmb_list" id="cmb_list"
                                                                        class="form-control">
                                                                        <option value="">List Pengujian</option>
                                                                    </select>
                                                                    <button class="btn btn-md btn-dark"
                                                                        onclick="TambahBarisMedical()">
                                                                        <i class="fa fa-list"></i>
                                                                        Tambahkan List
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-2">
                                                        <div class="col-md-12">
                                                            <div class="table-responsive">
                                                                <table id="tb_listMedical"
                                                                    class="table table-bordered display table-hover nowrap"
                                                                    style="width: 100%;">
                                                                    <thead class="bg-dark">
                                                                        <tr>
                                                                            <th class="text-white text-center">No.</th>
                                                                            <th class="text-white text-center">Kategori
                                                                            </th>
                                                                            <th class="text-white text-center">List</th>
                                                                            <th class="text-white text-center">Harga
                                                                            </th>
                                                                            <th class="text-white text-center">Action
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 text-right">
                                                            <label for="">Subtotal Pengambilan Uji</label>
                                                            <h5>Rp.<span id="lb_subtotal">0</span></h5>
                                                        </div>
                                                    </div>

                                                </div><!-- card-body -->
                                            </div><!-- card -->
                                        </div>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary btn-md"
                                                onclick="simpan_data_request_medical()">
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