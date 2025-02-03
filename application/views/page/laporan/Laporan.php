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
                                    <li class="breadcrumb-item active">Data Laporan</li>
                                </ol>
                            </div>
                            <!-- <h4 class="page-title">Data Laporan Pemasukan dan Pengeluaran</h4> -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <!-- melakukan cari data berdasar tanggal -->
                                <form class="form-inline mr-auto w-100 navbar-search" action="<?= base_url('Laporan/aksi_laporan') ?>" method="POST">
                                    <div class="input-group">
                                        <label for="" class="form-control-label">Tanggal Awal</label>
                                        <input type="date" class="form-control bg-light border-0 small ml-3 mr-3" name="tanggalawal" id="tanggalawal" required>

                                        <label for="" class="form-control-label">Tanggal Akhir</label>
                                        <input type="date" class="form-control bg-light border-0 small ml-3" name="tanggalakhir" id="tanggalakhir" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="submit" name="cari">
                                                <i class="fa fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <div class="table-responsive">
                                    <?php if ($_SESSION['level'] == 'owner') : ?>
                                        <h4 class="mt-0 header-title" style="text-align: right;">
                                            <a href="" class="btn btn-success" onclick="printContent('laporan');">Cetak Laporan</a>
                                        </h4>
                                    <?php endif; ?>
                                    <div class="" id="laporan">
                                        <br></br>

                                        <h4 class="mt-0 header-title" style="text-align: center;">Data Laporan Pemasukan dan Pengeluaran</h4>

                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal</th>
                                                    <th>Keterangan</th>
                                                    <th>Catatan</th>
                                                    <th>Pemasukan</th>
                                                    <th>Pengeluaran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($tb_laporan as $data) { ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $data->tgl_laporan ?></td>
                                                        <td><?= ($data->ket_laporan == 1 ? 'Pemasukan' : 'Pengeluaran'); ?></td>
                                                        <td><?= $data->catatan ?></td>
                                                        <td>Rp. <?= number_format($data->pemasukan); ?></td>
                                                        <td>Rp. <?= number_format($data->pengeluaran); ?></td>
                                                    </tr>
                                                <?php
                                                    $masuk = $masuk + $data->pemasukan;
                                                    $keluar = $keluar + $data->pengeluaran;
                                                    $total = $masuk - $keluar;
                                                }
                                                ?>
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <th colspan="4" style="text-align: center;">Total Pemasukan dan Pembayaran</th>
                                                    <td>Rp. <?= number_format($masuk); ?></td>
                                                    <td colspan="2">Rp. <?= number_format($keluar); ?></td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <th colspan="4" style="text-align: center;">Saldo Akhir</th>
                                                    <td colspan="3">Rp. <?= number_format($total); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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