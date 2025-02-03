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

        <!-- memasukkan konten-->
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group float-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="index.php">Laundry</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                        <div class="row">
                            <!-- Column -->
                            <?php if ($_SESSION['level'] == 'kasir') : ?>
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="d-flex flex-row">
                                                <div class="col-3 align-self-center">
                                                    <div class="round">
                                                        <i class="mdi mdi-account-multiple-plus"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 text-center align-self-center">
                                                    <div class="m-l-1 ">
                                                        <h5 class="mt-0 round-inner"><?= $jmlDataPelanggan; ?></h5>
                                                        <p class="mb-0 text-muted">Data Pelanggan</p>
                                                    </div>
                                                    <a href="<?= base_url('Pelanggan') ?>" class="btn btn-success mt-1">More Info</a>
                                                </div>
                                                <div class="col-10"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="d-flex flex-row">
                                                <div class="col-3 align-self-center">
                                                    <div class="round ">
                                                        <i class="mdi mdi-basket"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 align-self-center text-center">
                                                    <div class="m-l-10 ">
                                                        <h5 class="mt-0 round-inner"><?= $jmljenis; ?></h5>
                                                        <p class="mb-0 text-muted">Jenis Layanan</p>
                                                    </div>
                                                    <a href="<?= base_url('Jenis') ?>" class="btn btn-success mt-1">More Info</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->


                                <!-- Column -->
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="d-flex flex-row">
                                                <div class="col-3 align-self-center">
                                                    <div class="round ">
                                                        <i class="mdi mdi-shopping"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 align-self-center text-center">
                                                    <div class="m-l-10 ">
                                                        <h5 class="mt-0 round-inner"><?= $jmllaundry; ?></h5>
                                                        <p class="mb-0 text-muted">Transaksi Laundry</p>
                                                    </div>
                                                    <a href="<?= base_url('Laundry') ?>" class="btn btn-success mt-1">More Info</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <!-- Column -->


                            <!-- jika levelnya owner ini tampil -->
                            <?php if ($_SESSION['level'] == 'owner') : ?>

                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="d-flex flex-row">
                                                <div class="col-3 align-self-center">
                                                    <div class="round">
                                                        <i class="mdi mdi-account-multiple-plus"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 align-self-center text-center">
                                                    <div class="m-l-10">
                                                        <h5 class="mt-0 round-inner"><?= $jmlDataUser; ?></h5>
                                                        <p class="mb-0 text-muted">Data Users</p>
                                                    </div>
                                                    <a href="<?= base_url('Users') ?>" class="btn btn-success mt-1">More Info</a>
                                                </div>
                                                <div class="col-10"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="d-flex flex-row">
                                                <div class="col-3 align-self-center">
                                                    <div class="round ">
                                                        <i class="mdi mdi-account-multiple-plus"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 align-self-center text-center">
                                                    <div class="m-l-10 ">
                                                        <h5 class="mt-0 round-inner"><?= $jmlDataPelanggan; ?></h5>
                                                        <p class="mb-0 text-muted">Data Pelanggan</p>
                                                    </div>
                                                    <a href="<?= base_url('Pelanggan') ?>" class="btn btn-success mt-1">More Info</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="d-flex flex-row">
                                                <div class="col-3 align-self-center">
                                                    <div class="round ">
                                                        <i class="mdi mdi-shopping basket"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 align-self-center text-center">
                                                    <div class="m-l-10 ">
                                                        <h5 class="mt-0 round-inner"><?= $jmllaundry; ?></h5>
                                                        <p class="mb-0 text-muted">Transaksi Laundry</p>
                                                    </div>
                                                    <a href="<?= base_url('Laundry') ?>" class="btn btn-success mt-1">More Info</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Column -->
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="d-flex flex-row">
                                                <div class="col-3 align-self-center">
                                                    <div class="round ">
                                                        <i class="mdi mdi-rocket"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 align-self-center text-center">
                                                    <div class="m-l-10 ">
                                                        <h5 class="mt-0 round-inner"><?= $jmlpengeluaran; ?></h5>
                                                        <p class="mb-0 text-muted">Data Pengeluaran</p>
                                                    </div>
                                                    <a href="<?= base_url('Pengeluaran') ?>" class="btn btn-success mt-1">More Info</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    <?php endif; ?>



                    <!-- Default Card Example -->
                    <div class="card mb-3" style="max-width: 520px;">
                        <div class="row g-0">
                            <div class="col-md-4">

                                <!-- jika user memiliki foto, maka foto ditampilkan -->
                                <?php if ($datas[0]->userfoto != null) { ?>
                                    <img src="<?= base_url('assets/') ?>fotouser/<?= $datas[0]->userfoto ?>" class="img-fluid rounded-start" alt="..." style="width: 500px;">
                                    <!-- jika tidak -->
                                <?php } else { ?>
                                    <img src="<?= base_url('assets/') ?>fotouser/default.svg" class="img-fluid rounded-start" alt="...">
                                <?php } ?>

                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-title">Akun Yang Sedang Login</h6>
                                    <p class="card-text">
                                        <b>Username : </b><?= $this->session->userdata('username') ?><br>
                                        <b>Nama :</b> <?= $this->session->userdata('nama') ?><br>
                                        <b>Jabatan :</b> <?= $this->session->userdata('level') ?>
                                    </p>
                                    <p class="card-text"><small class="text-muted">Tanggal & jam login : <?= $_SESSION['tgllogin']; ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- end row -->
                <!-- end page title end breadcrumb -->
            </div>
            <!-- container -->
        </div>

        <!-- Page content Wrapper -->
    </div>
    <!-- content -->