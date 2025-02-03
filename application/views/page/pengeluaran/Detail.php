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
                                    <li class="breadcrumb-item active">Detail Pengeluaran Laundry</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Detail Pengeluaran Laundry</h4>
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

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Tanggal Pengeluaran</th>
                                                <th>Catatan</th>
                                                <th>Pengeluaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= "1"; ?></td>
                                                <td><?= $data_pengeluaran[0]->id_pengeluaran ?></td>
                                                <td><?= $data_pengeluaran[0]->tgl_pengeluaran ?></td>
                                                <td><?= $data_pengeluaran[0]->catatan ?></td>
                                                <td>Rp. <?= number_format($data_pengeluaran[0]->pengeluaran); ?></td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <th colspan="4" style="text-align: center;">TOTAL PENGELUARAN</th>
                                                <th>Rp. <?= number_format($data_pengeluaran[0]->pengeluaran); ?></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="<?= base_url('Pengeluaran/aksi_cetak_pengeluaran/' . $data_pengeluaran[0]->id_pengeluaran) ?>" class="btn btn-success" target="_blank">Cetak Pengeluaran</a>
                                    <a href="<?= base_url('Pengeluaran') ?>" class="btn btn-warning">Kembali</a>
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

        <!-- Page content Wrapper -->
    </div>
    <!-- content -->