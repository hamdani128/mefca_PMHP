<div class="br-mainpanel">
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Dashboard</h4>
            <p class="mg-b-0">informasi Jumlah Permintaan Permohonan.</p>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="row row-sm">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-info rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="ion ion-folder tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">MEdical
                                Check-Up</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><?= $jumlah_mdc; ?></p>
                        </div>
                    </div>
                    <div id="ch1" class="ht-50 tr-y-1"></div>
                </div>
            </div>
            <!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                <div class="bg-purple rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="ion ion-folder tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                                Lab. Mikrobiologi
                            </p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><?= $jumlah_mkb; ?></p>
                        </div>
                    </div>
                    <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
            </div>
            <!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="bg-teal rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="ion ion-folder tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                                Kimia Air Minum
                            </p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><?= $jumlah_kma_air_minum; ?></p>
                        </div>
                    </div>
                    <div id="ch2" class="ht-50 tr-y-1"></div>
                </div>
            </div>
            <!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="bg-primary rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="ion ion-folder tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                                Kimiar Air Bersih
                            </p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><?= $jumlah_kma_air_bersih; ?></p>

                        </div>
                    </div>
                    <div id="ch4" class="ht-50 tr-y-1"></div>
                </div>
            </div>
            <!-- col-3 -->
        </div>
        <!-- row -->
        <div class="row row-sm pt-2">
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="bg-dark rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="ion ion-folder tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                                Kimiar Badan Air
                            </p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><?= $jumlah_kma_badan_air; ?></p>

                        </div>
                    </div>
                    <div id="ch4" class="ht-50 tr-y-1"></div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="bg-warning rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="fa fa-users tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">
                                Registrasi Users
                            </p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"><?= $jumlah_register; ?></p>

                        </div>
                    </div>
                    <div id="ch4" class="ht-50 tr-y-1"></div>
                </div>
            </div>
        </div>

    </div>
    <!-- br-pagebody -->
</div>