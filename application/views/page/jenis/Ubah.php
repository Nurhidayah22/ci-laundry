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
                        <form action="<?= base_url('Jenis/aksi_ubah') ?>" method="post">
                            <div class="card m-b-100">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Jenis Layanan Laundry</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="kd_jenis" value="<?= $data_jenis[0]->kd_jenis ?>">
                                            <input class="form-control" type="text" id="example-text-input" name="jenis_laundry" placeholder="Masukkan jenis laundry" value="<?= $data_jenis[0]->jenis_laundry; ?>" required autofocus />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Lama Proses (hari)</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" id="example-text-input" name="lama_proses" placeholder="Masukkan lama proses" value="<?= $data_jenis[0]->lama_proses; ?>" required />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tarif (Per Kg)</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" id="example-text-input" name="tarif" placeholder="Masukkan tarif" value="<?= $data_jenis[0]->tarif; ?>" required />
                                        </div>
                                    </div>

                                    <button type="submit" name="ubah" class="btn btn-success">Simpan</button>
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