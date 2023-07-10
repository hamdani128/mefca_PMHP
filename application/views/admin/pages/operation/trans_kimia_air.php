<div ng-app="AdmKimiaAir">
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
                <h4>Informasi Permohonan Kimia Air</h4>
                <p class="mg-b-0">
                    Informasi List Permohonan Daftar Laboratorium Kimia Air.
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
                                    <div class="card">
                                        <div class="card-header bg-dark">
                                            <ul class="nav nav-tabs nav-tabs-for-dark card-header-tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link bd-0 active pd-y-8" href="#trans_air1" data-toggle="tab">
                                                        <i class="fa fa-folder" aria-hidden="true"></i>
                                                        Air Minum
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link bd-0 pd-y-8" href="#trans_air2" data-toggle="tab">
                                                        <i class="fa fa-folder" aria-hidden="true"></i>
                                                        Air Bersih
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link bd-0 tx-gray-light" href="#trans_air3" data-toggle="tab">
                                                        <i class="fa fa-folder" aria-hidden="true"></i>
                                                        Badan Air
                                                    </a>
                                                </li>
                                            </ul>
                                        </div><!-- card-header -->
                                        <div class="card-body color-gray-lighter bd bd-t-0 rounded-bottom">
                                            <div class="tab-content">
                                                <?php require_once 'kimia_air_trans/air_minum.php' ?>
                                                <?php require_once 'kimia_air_trans/air_bersih.php' ?>
                                                <?php require_once 'kimia_air_trans/air_badan.php' ?>
                                            </div><!-- tab-content -->
                                        </div><!-- card-body -->
                                    </div><!-- card -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- br-pagebody -->
    </div><!-- br-mainpanel -->
</div>