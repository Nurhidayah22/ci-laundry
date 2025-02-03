<!-- Start right Content here -->
<div class="content-page background">

    <!-- Start content -->
    <div class="content">
        <!-- Top Bar Start -->
        <div class="topbar">
            <nav class="navbar-custom">
                <ul class="list-inline float-right mb-0">
                    <li class="list-inline-item dropdown notification-list">
                        <a class="
                      nav-link
                      dropdown-toggle
                      arrow-none
                      waves-effect
                      nav-user
                    " data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

                            <!-- jika foto profile ada -->
                            <?php if ($datas[0]->userfoto != null) { ?>
                                <img src="<?= base_url('assets/') ?>fotouser/<?= $datas[0]->userfoto ?>" ; alt="user" class="rounded-circle" />
                            <?php } else { ?>
                                <img src="<?= base_url('assets/') ?>fotouser/default.svg" ; alt="user" class="rounded-circle" />
                            <?php } ?>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5>Welcome <?= $this->session->userdata('username') ?></h5>
                            </div>

                            <a class="dropdown-item" href="<?= base_url('profile/Profile/' . $this->session->userdata('userid')) ?>"><i class="mdi mdi-account-circle m-r-5 text-muted"></i>Profile</a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="<?= base_url('Login/logout') ?>" onclick="return confirm('Apakah anda ingin logout ?');"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                        </div>
                    </li>
                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="
                      button-menu-mobile
                      open-left
                      waves-light waves-effect
                    ">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                </ul>

                <div class="clearfix"></div>
            </nav>
        </div>
        <!-- Top Bar End -->

        <div class="page-content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group float-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Laundry</a></li>
                                    <li class="breadcrumb-item active">Detail Transaksi Laundry</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Detail Transaksi Laundry</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <p>
                                    <b>Tanggal : </b> <?= date('Y-m-d'); ?>
                                </p>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>No. Order</th>
                                        <td><?= $tb_laundry[0]->id_laundry ?></td>
                                    </tr>
                                    <tr>
                                        <th>Pelanggan</th>
                                        <td><?= $tb_laundry[0]->pelanggannama ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td><?= $tb_laundry[0]->pelangganalamat ?></td>
                                    </tr>
                                    <tr>
                                        <th>No. Telp</th>
                                        <td><?= $tb_laundry[0]->pelanggantelp ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Selesai</th>
                                        <td><?= $tb_laundry[0]->tgl_selesai ?></td>
                                    </tr>
                                    <tr>
                                        <th>Catatan Laundry</th>
                                        <td><?= $tb_laundry[0]->catatan ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status Pembayaran</th>
                                        <td><?= ($tb_laundry[0]->status_pembayaran == 1) ? '<nav class="badge badge-success">Lunas</nav>' : '<nav class="badge badge-danger">Belum Lunas</nav>'; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status Pengambilan Baju</th>
                                        <td><?= ($tb_laundry[0]->status_pengambilan == 1) ? '<nav class="badge badge-success">Sudah Diambil</nav>' : '<nav class="badge badge-danger">Belum Diambil</nav>'; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kasir</th>
                                        <td><?= $tb_laundry[0]->username ?></td>
                                    </tr>
                                </table>

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Terima</th>
                                                <th>Jenis Layanan</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Berat Cucian</th>
                                                <th>Harga/Kg</th>
                                                <th>Total Bayar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= "1"; ?></td>
                                                <td><?= $tb_laundry[0]->tgl_terima ?></td>
                                                <td><?= $tb_laundry[0]->jenis_laundry ?></td>
                                                <td><?= $tb_laundry[0]->tgl_selesai ?></td>
                                                <td><?= $tb_laundry[0]->jml_kilo ?> Kg</td>
                                                <td>Rp. <?= number_format($tb_laundry[0]->tarif); ?></td>
                                                <td>Rp. <?= number_format($tb_laundry[0]->totalbayar); ?></td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <th colspan="6" style="text-align: center;">TOTAL PESANAN</th>
                                                <th>Rp. <?= number_format($tb_laundry[0]->totalbayar); ?></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="<?= base_url('Laundry/aksi_cetak_transaksi/' . $tb_laundry[0]->id_laundry) ?>" class="btn btn-primary" target="_blank">Cetak Invoice</a>
                                <a href="<?= base_url('Laundry') ?>" class="btn btn-warning">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
                <!-- end page title end breadcrumb -->
            </div>
            <!-- container -->
        </div>


    </div>
    <!-- content -->