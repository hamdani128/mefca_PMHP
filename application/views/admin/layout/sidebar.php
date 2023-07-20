<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo"><a href=""><span>[</span>MEFCA <i>APP</i><span>]</span></a></div>
<div class="br-sideleft sideleft-scrollbar">
    <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
    <ul class="br-sideleft-menu">
        <li class="br-menu-item">
            <a href="<?= base_url('usr/dashboard') ?>"
                class="br-menu-link <?= uri_string() == 'usr/dashboard' ? 'active' : '' ?>">
                <i class="menu-item-icon icon ion-ios-home-outline tx-20"></i>
                <span class="menu-item-label">Dashboard</span>
            </a>
        </li>

        <?php if ($this->session->userdata('level') == "Super Admin" || $this->session->userdata('level') == "Admin Content") { ?>
        <li class="br-menu-item">
            <a href="<?= base_url("usr/slider") ?>"
                class="br-menu-link <?= uri_string() == 'usr/slider' ? 'active' : '' ?>">
                <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
                <span class="menu-item-label">Slider</span>
            </a>
        </li>
        <li class="br-menu-item">
            <a href="#"
                class="br-menu-link with-sub  <?= uri_string() == 'usr/profile' || uri_string() == 'usr/visimisi' ||  uri_string() == 'usr/pimpinan' ||  uri_string() == 'usr/organisasi' ? 'active' : '' ?>">
                <i class="menu-item-icon icon ion-ios-folder-outline tx-20"></i>
                <span class="menu-item-label">Profile</span>
            </a>
            <ul class="br-menu-sub">
                <li class="sub-item">
                    <a href="<?= base_url("usr/profile") ?>"
                        class="sub-link <?= uri_string() == 'usr/profile' ? 'active' : '' ?>">
                        Profile
                    </a>
                </li>
                <li class="sub-item">
                    <a href="<?= base_url("usr/visimisi") ?>"
                        class="sub-link <?= uri_string() == 'usr/visimisi' ? 'active' : '' ?>">
                        Visi Misi
                    </a>
                </li>
                <li class="sub-item">
                    <a href="<?= base_url("usr/pimpinan") ?>"
                        class="sub-link <?= uri_string() == 'usr/pimpinan' ? 'active' : '' ?>">
                        Profile Pimpinan
                    </a>
                </li>
                <li class="sub-item">
                    <a href="<?= base_url("usr/organisasi") ?>"
                        class="sub-link <?= uri_string() == 'usr/organisasi' ? 'active' : '' ?>">
                        Struktur Organisasi
                    </a>
                </li>
                <li class="sub-item"><a href="#" class="sub-link">Kurator</a></li>
            </ul>
        </li>
        <li class="br-menu-item">
            <a href="<?= base_url("usr/berita") ?>"
                class="br-menu-link <?= uri_string() == 'usr/berita' ? 'active' : '' ?>">
                <i class="menu-item-icon icon ion-ios-folder-outline tx-20"></i>
                <span class="menu-item-label">Berita</span>
            </a>
        </li>
        <li class="br-menu-item">
            <a href="<?= base_url("usr/pengumuman") ?>"
                class="br-menu-link <?= uri_string() == 'usr/pengumuman' ? 'active' : '' ?>">
                <i class="menu-item-icon icon ion-ios-folder-outline tx-20"></i>
                <span class="menu-item-label">Pengumuman</span>
            </a>
        </li>
        <li class="br-menu-item">
            <a href="#"
                class="br-menu-link with-sub <?= uri_string() == 'usr/kegiatan/survei' || uri_string() == 'usr/kegiatan/agenda'  ? 'active' : '' ?>">
                <i class="menu-item-icon icon ion-ios-folder-outline tx-20"></i>
                <span class="menu-item-label">Kegiatan</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item">
                    <a href="<?= base_url("usr/kegiatan/survei") ?>"
                        class="sub-link <?= uri_string() == 'usr/kegiatan/survei' ? 'active' : '' ?>">
                        Survei Layanan
                    </a>
                </li>
                <li class="sub-item">
                    <a href="<?= base_url("usr/kegiatan/agenda") ?>"
                        class="sub-link <?= uri_string() == 'usr/kegiatan/agenda' ? 'active' : '' ?>">
                        Agenda
                    </a>
                </li>

            </ul>
        </li>

        <li class="br-menu-item">
            <a href="<?= base_url("usr/koleksi") ?>"
                class="br-menu-link <?= uri_string() == 'usr/koleksi' ? 'active' : '' ?>">
                <i class="menu-item-icon icon ion-ios-albums-outline tx-20"></i>
                <span class="menu-item-label">Koleksi</span>
            </a>
        </li>
        <li class="br-menu-item">
            <a href="<?= base_url("usr/zona_integritas") ?>"
                class="br-menu-link <?= uri_string() == 'usr/zona_integritas' ? 'active' : '' ?>">
                <i class="menu-item-icon icon ion-ios-folder-outline tx-20"></i>
                <span class="menu-item-label">Zona Integritas</span>
            </a>
        </li>
        <li class="br-menu-item">
            <a href="<?= base_url("usr/galeri") ?>"
                class="br-menu-link <?= uri_string() == 'usr/galeri' ? 'active' : '' ?>">
                <i class="menu-item-icon icon ion-ios-folder-outline tx-20"></i>
                <span class="menu-item-label">Galeri Photo Kegiatan</span>
            </a>
        </li>
        <li class="br-menu-item">
            <a href="<?= base_url("usr/galeri/video") ?>"
                class="br-menu-link <?= uri_string() == 'usr/galeri/video' ? 'active' : '' ?>">
                <i class="menu-item-icon icon ion-ios-folder-outline tx-20"></i>
                <span class="menu-item-label">Galeri Video</span>
            </a>
        </li>

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub">
                <i class="menu-item-icon icon ion-ios-folder-outline tx-20"></i>
                <span class="menu-item-label">Publikasi</span>
            </a>
            <ul class="br-menu-sub">
                <li class="sub-item"><a href="#" class="sub-link">Artikel</a></li>
                <li class="sub-item"><a href="#" class="sub-link">Jurnal Museum</a></li>
                <li class="sub-item"><a href="#" class="sub-link">SAKIP</a></li>
                <li class="sub-item"><a href="#" class="sub-link">Perpustakaan</a></li>
                <li class="sub-item"><a href="#" class="sub-link">Buku Elektronik</a></li>
            </ul>
        </li>
        <?php } ?>

        <?php if ($this->session->userdata('level') == "Super Admin" || $this->session->userdata('level') == "Admin Operasional") { ?>
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub <?= uri_string() == 'opr/register'   ? 'active' : '' ?>">
                <i class="menu-item-icon icon fa fa-users tx-5"></i>
                <span class="menu-item-label">Register</span>
            </a>
            <ul class="br-menu-sub">
                <li class="sub-item"><a href="<?= base_url('opr/register') ?>"
                        class="sub-link <?= uri_string() == 'opr/register'   ? 'active' : '' ?>">Data Register</a></li>
            </ul>
        </li>
        <li class="br-menu-item">
            <a href="#"
                class="br-menu-link with-sub <?= uri_string() == 'opr/master/sdm' || uri_string() == 'opr/master/parameter' ||  uri_string() == 'opr/master/metode_uji' || uri_string() == 'opr/master/daftar_harga_uji'  ? 'active' : '' ?>">
                <i class="menu-item-icon icon fa fa-list-alt tx-5"></i>
                <span class="menu-item-label">Master</span>
            </a>
            <ul class="br-menu-sub">
                <li class="sub-item"><a href="<?= base_url('opr/master/sdm') ?>"
                        class="sub-link <?= uri_string() == 'opr/master/sdm'   ? 'active' : '' ?>">Data SDM</a>
                </li>
                <li class="sub-item"><a href="<?= base_url('opr/master/parameter') ?>"
                        class="sub-link <?= uri_string() == 'opr/master/parameter'   ? 'active' : '' ?>">
                        Parameter Uji
                    </a>
                </li>
                <li class="sub-item"><a href="<?= base_url('opr/master/metode_uji') ?>"
                        class="sub-link <?= uri_string() == 'opr/master/metode_uji'   ? 'active' : '' ?>">
                        Metode Uji
                    </a>
                </li>
                <li class="sub-item"><a href="<?= base_url('opr/master/daftar_harga_uji') ?>"
                        class="sub-link <?= uri_string() == 'opr/master/daftar_harga_uji'   ? 'active' : '' ?>">
                        Daftar Harga Uji
                    </a>
                </li>
            </ul>
        </li>
        </li>
        <li class="br-menu-item">
            <a href="#"
                class="br-menu-link with-sub <?= uri_string() == 'opr/transaksi/list_pengujian' || uri_string() == 'opr/transaksi/laporan'   ? 'active' : '' ?>">
                <i class="menu-item-icon icon fa fa-suitcase tx-5"></i>
                <span class="menu-item-label">Transaksi Pengujian</span>
            </a>
            <ul class="br-menu-sub">
                <li class="sub-item">
                    <a href="<?= base_url('opr/transaksi/list_pengujian') ?>"
                        class="sub-link <?= uri_string() == 'opr/transaksi/list_pengujian'   ? 'active' : '' ?>">
                        List Pengujian
                    </a>
                </li>
                <li class="sub-item">
                    <a href="<?= base_url('opr/transaksi/laporan') ?>"
                        class="sub-link <?= uri_string() == 'opr/transaksi/laporan'   ? 'active' : '' ?>">
                        Laporan
                    </a>
                </li>
            </ul>
        </li>
        <?php } ?>

        <?php if ($this->session->userdata('level') == "Super Admin") { ?>
        <li class="br-menu-item">
            <a href="<?= base_url("usr/person") ?>"
                class="br-menu-link <?= uri_string() == 'usr/person' ? 'active' : '' ?>">
                <i class="menu-item-icon icon ion-ios-bookmarks tx-20"></i>
                <span class="menu-item-label">Account</span>
            </a>
        </li>
        <?php } ?>

        <?php if ($this->session->userdata('level') == "Users") { ?>
        <li class="br-menu-item">
            <a href="<?= base_url("users/permohonan/pengujian") ?>"
                class="br-menu-link <?= uri_string() == 'users/permohonan/pengujian' ? 'active' : '' ?>">
                <i class="menu-item-icon icon ion-ios-pricetags-outline  tx-20"></i>
                <span class="menu-item-label">Permohonan Pengujian</span>
            </a>
        </li>
        <?php } ?>

    </ul>
</div>
<!-- br-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->