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
                                    <li class="breadcrumb-item active">Data Pelanggan</li>
                                    <li class="breadcrumb-item active">Edit Pelanggan</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Edit Pelanggan</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <form action="<?= base_url('Users/aksi_ubah') ?>" method="post">
                            <div class="card m-b-100">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="userid" value="<?= $data_users[0]->userid ?>">
                                            <input class="form-control" type="text" id="example-text-input" name="username" autofocus required value="<?= $data_users[0]->username ?>" />

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <div>
                                                <input class="form-control" type="password" id="example-text-input" name="userpass" placeholder="Masukkan password" />
                                            </div>
                                            <div class="m-t-10">
                                                <input class="form-control" type="password" id="example-text-input" name="userpass2" placeholder="Retype password" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="example-text-input" name="nama" value="<?= $data_users[0]->nama ?>" required />
                                        </div>
                                    </div>


                                    <!--end row-->

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="example-text-input" name="alamat" cols="20" rows="5" placeholder="Masukkan alamat" required><?= $data_users[0]->alamat ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Telp</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" id="example-text-input" name="usertelp" placeholder="Masukkan No.Telp" value="<?= $data_users[0]->usertelp ?>" required />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Jabatan</label>
                                        <div class="col-sm-10">
                                            <select name="level" class="form-control">
                                                <?php if ($data_users[0]->level == 'owner') { ?>
                                                    <option value='owner' selected>Owner</option>
                                                    <option value='kasir'>Kasir</option>
                                                <?php } else { ?>
                                                    <option value='owner'>Owner</option>
                                                    <option value='kasir' selected>Kasir</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url('Users') ?>" class="btn btn-warning">Kembali</a>
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