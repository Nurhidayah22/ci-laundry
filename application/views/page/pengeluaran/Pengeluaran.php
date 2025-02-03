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
                                    <li class="breadcrumb-item active">Data Pengeluaran</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Data Pengeluaran</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <?= $this->session->flashdata('message'); ?>
                                <div class="table-responsive">
                                    <h4 class="mt-0 header-title">
                                        <a href="<?= base_url('Pengeluaran/tambah') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah data</a>
                                    </h4>
                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID</th>
                                                <th>Tanggal</th>
                                                <th>Catatan</th>
                                                <th>Pengeluaran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($tb_pengeluaran as $data) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data->id_pengeluaran ?></td>
                                                    <td><?= $data->tgl_pengeluaran ?></td>
                                                    <td><?= $data->catatan ?></td>
                                                    <td>Rp. <?= number_format($data->pengeluaran) ?></td>
                                                    <td>
                                                        <a href="<?= base_url('Pengeluaran/Ubah/' . $data->id_pengeluaran) ?>" class="btn btn-warning"><i class="fa fa-tags"></i></a>
                                                        <a href="<?= base_url('Pengeluaran/Aksi_Hapus/' . $data->id_pengeluaran) ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus ?');"><i class="fa fa-trash-o"></i></a>
                                                        <a href="<?= base_url('Pengeluaran/Detail/' . $data->id_pengeluaran) ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                            <?php  } ?>
                                        </tbody>
                                    </table>
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