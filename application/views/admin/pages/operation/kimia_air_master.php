<div ng-app="KimiaAirMaster">
    <div class="br-mainpanel">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="<?= base_url("/opr/kimia/master") ?>">Register</a>
                <span class="breadcrumb-item active">Admin</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="br-pagetitle">
            <i class="icon icon ion-ios-photos-outline"></i>
            <div>
                <h4>Informasi Data Master Kimia Air</h4>
                <p class="mg-b-0">
                    Informasi Data Parameter Kimiar Air dan Pengujian.
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
                                    <a class="nav-link bd-0 active pd-y-8" href="#air1" data-toggle="tab">
                                        <i class="fa fa-folder" aria-hidden="true"></i>
                                        Air Minum
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link bd-0 pd-y-8" href="#air2" data-toggle="tab">
                                        <i class="fa fa-folder" aria-hidden="true"></i>
                                        Air Bersih
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link bd-0 tx-gray-light" href="#air3" data-toggle="tab">
                                        <i class="fa fa-folder" aria-hidden="true"></i>
                                        Badan Air
                                    </a>
                                </li>
                            </ul>
                        </div><!-- card-header -->
                        <div class="card-body color-gray-lighter bd bd-t-0 rounded-bottom">
                            <div class="tab-content">
                                <?php require_once 'kimia_air_master/air_minum.php' ?>
                                <?php require_once 'kimia_air_master/air_bersih.php' ?>
                                <?php require_once 'kimia_air_master/air_badan.php' ?>
                            </div><!-- tab-content -->
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div>
            </div>
        </div><!-- br-pagebody -->
    </div><!-- br-mainpanel -->
</div>