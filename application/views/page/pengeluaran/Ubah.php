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
                                    <li class="breadcrumb-item"><a href="index.php">Laundry</a></li>
                                    <li class="breadcrumb-item active">Data Jenis Laundry</li>
                                    <li class="breadcrumb-item active">Edit Jenis Laundry</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Edit Jenis Laundry</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <form action="<?= base_url('Pengeluaran/aksi_ubah') ?>" method="post">
                            <div class="card m-b-100">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="id_pengeluaran" value="<?= $data_pengeluaran[0]->id_pengeluaran ?>">
                                            <input class="form-control" type="date" id="example-text-input" name="tanggal" value="<?= $data_pengeluaran[0]->tanggal; ?>" required autofocus />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">catatan</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="example-text-input" name="catatan" cols="20" rows="5" placeholder="Masukkan catatan" required><?= $data_pengeluaran[0]->catatan; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-number-input" class="col-sm-2 col-form-label">Pengeluaran (Rp)</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="pengeluaran" id="pengeluaran" value="<?= $data_pengeluaran[0]->pengeluaran; ?>" required>
                                        </div>
                                    </div>

                                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url('Jenis') ?>" class="btn btn-warning">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
        </div>
        <br>


        <!-- Page content Wrapper -->
    </div>
    <!-- content -->