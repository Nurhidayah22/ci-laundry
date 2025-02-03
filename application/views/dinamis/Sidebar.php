<!-- LOGO -->
<div class="topbar-left">
    <div class="text-center">
        <a href="<?= base_url('welcome') ?>"><img src="<?= base_url('assets/') ?>images/logo.png" width="160px"></a>
    </div>
</div>

<div class="sidebar-inner slimscrollleft">

    <!-- memasukkan menu.php -->
    <div id="sidebar-menu">
        <ul>

            <li class="menu-title">----------------------------</li>

            <?php if ($_SESSION['level'] == 'kasir') : ?>
                <li>
                    <a href="<?= base_url('Welcome') ?>" class="waves-effect">
                        <i class="mdi mdi-airplay"></i><span> Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Pelanggan') ?>" class="waves-effect">
                        <i class="fa fa-users"></i>
                        <span>Data Pelanggan<span class="badge badge-pill badge-success float-right"><?= $jmlDataPelanggan; ?></span></span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Jenis') ?>" class="waves-effect">
                        <i class="fa fa-key"></i>
                        <span>Jenis Layanan<span class="badge badge-pill badge-success float-right"><?= $jmljenis; ?></span></span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Laundry') ?>" class="waves-effect">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Transaksi Laundry<span class="badge badge-pill badge-success float-right"><?= $jmllaundry; ?></span></span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Laporan') ?>" class="waves-effect">
                        <i class="fa fa-reorder"></i>
                        <span>Data Laporan</span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- jika level owner -->
            <?php if ($_SESSION['level'] == 'owner') : ?>
                <li>
                    <a href="<?= base_url('Welcome') ?>" class="waves-effect">
                        <i class="mdi mdi-airplay"></i><span> Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Users') ?>" class="waves-effect">
                        <i class="fa fa-users"></i>
                        <span>Data Users<span class="badge badge-pill badge-success float-right"><?= $jmlDataUser; ?></span></span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Pelanggan') ?>" class="waves-effect">
                        <i class="fa fa-users"></i>
                        <span>Data Pelanggan<span class="badge badge-pill badge-success float-right"><?= $jmlDataPelanggan; ?></span></span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Jenis') ?>" class="waves-effect">
                        <i class="fa fa-key"></i>
                        <span>Jenis Layanan<span class="badge badge-pill badge-success float-right"><?= $jmljenis; ?></span></span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Laundry') ?>" class="waves-effect">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Transaksi Laundry<span class="badge badge-pill badge-success float-right"><?= $jmllaundry; ?></span></span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Pengeluaran') ?>" class="waves-effect">
                        <i class="fa fa-money"></i>
                        <span>Data Pengeluaran<span class="badge badge-pill badge-success float-right"><?= $jmlpengeluaran; ?></span></span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('Laporan') ?>" class="waves-effect">
                        <i class="fa fa-reorder"></i>
                        <span>Data Laporan</span>
                    </a>
                </li>
        </ul>
    <?php endif; ?>
    </div>
</div>


<div class="clearfix"></div>
</div>
<!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->