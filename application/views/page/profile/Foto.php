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
                                    <li class="breadcrumb-item active">Upload Foto Profile</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Upload Foto Profile</h4>
                        </div>
                        <!-- alert -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="page-title">Webcam</h4>
                                <form action="<?= base_url('Profile/aksi_foto') ?>" method="post" enctype="multipart/form-data">

                                    <!-- webcam -->
                                    <div id="my_camera" class="mb-3"></div>

                                    <button type="button" class="btn btn-primary" onclick="ambilgambar()">Ambil Foto</button>

                                    <!-- menyimpan / input gambar -->
                                    <input type="hidden" name="foto" class="image-tag">
                                    <input type="hidden" value="<?= $data[0]->userid ?>" name="id">

                                    <!-- hasil foto -->
                                    <div id="results" class="mt-3 mb-3"></div>

                                    <button class="btn btn-success" type="submit" name="simpan">Simpan</button>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-6">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="page-title">Upload Foto Biasa</h4>
                                <!-- upload gambar -->
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="foto" name="userfoto" onchange="previewFoto()" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <!-- menampilkan prefiew gambar -->
                                        <img src="<?= base_url('assets/') ?>fotouser/default.svg" class="img-thumbnail img-preview">
                                    </div>
                                </div>

                                <button class="btn btn-success" type="submit" name="simpan">Simpan</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- end container -->
            <!-- end page title end breadcrumb -->
        </div>

        <script language="JavaScript">
            Webcam.set({
                width: 470,
                height: 370,
                image_format: 'jpeg',
                jpeg_quality: 90
            });

            Webcam.attach('#my_camera');

            function ambilgambar() {
                Webcam.snap(function(data_uri) {
                    $(".image-tag").val(data_uri);
                    document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
                });
            }
        </script>

        <!-- Page content Wrapper -->
    </div>
    <!-- content -->