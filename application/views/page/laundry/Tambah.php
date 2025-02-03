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
                                    <li class="breadcrumb-item active">Data Transaksi Laundry</li>
                                    <li class="breadcrumb-item active">Tambah</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Tambah Transaksi Laundry</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="<?= base_url('Laundry/aksi_tambah') ?>" method="post">
                            <div class="card m-b-100">
                                <div class="card-body">

                                    <input type="hidden" name="userid" value="<?= $this->session->userdata('userid') ?>">
                                    <input type="hidden" name="id_laundry" value="<?= $kode; ?>">

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                                        <div class="col-sm-10">
                                            <select name="pelangganid" class="select2 form-control">
                                                <?php
                                                foreach ($tb_pelanggan as $data) {
                                                    if ($data->pelangganid == $pelangganid) { ?>
                                                        <option value="<?= $data->pelangganid ?>" selected><?= $data->pelanggannama ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $data->pelangganid ?>"><?= $data->pelanggannama ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Jenis Laundry</label>
                                        <div class="col-sm-10">
                                            <!-- jenis() => function javascript -->
                                            <!-- onchange => jika dipilih maka fungsi jenis dijalankan -->
                                            <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="id_jenis" id="id_jenis" onchange="jenis();">
                                                <option>--Pilih jenis---</option>
                                                <?php
                                                foreach ($tb_jenis as $data) {
                                                    if ($data->kd_jenis == $jenis) { ?>
                                                        <option value="<?= $data->kd_jenis ?>" selected><?= $data->jenis_laundry ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $data->kd_jenis ?>"><?= $data->jenis_laundry ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tarif (Hari)</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="tarif" name="tarif" value="<?= $tarif; ?>" required readonly />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Tgl. Selesai</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="tgl_selesai" name="tgl_selesai" value="<?= $tgl_selesai; ?>" required readonly />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-number-input" class="col-sm-2 col-form-label">Jumlah (Kg)</label>
                                        <div class="col-sm-10">
                                            <!-- onkeyup = bereaksi ketika diketik -->
                                            <input class="form-control" type="number" id="jml_kilo" name="jml_kilo" value="<?= $jml_kilo; ?>" onkeyup="sum();" required />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-number-input" class="col-sm-2 col-form-label">Total Bayar</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" value="<?= $totalbayar; ?>" id="totalbayar" name="totalbayar" readonly required />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Catatan</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="example-text-input" name="catatan" cols="20" rows="5" placeholder="Masukkan catatan" required><?= $catatan; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select name="status" class="select2 form-control">
                                                <?php if ($status == 1) { ?>
                                                    <option value=1 selected>Lunas</option>
                                                    <option value=0>Belum lunas</option>
                                                <?php } elseif ($status == 2) { ?>
                                                    <option value=1>Lunas</option>
                                                    <option value=0 selected>Belum lunas</option>
                                                <?php } else { ?>
                                                    <option value=0>Belum lunas</option>
                                                    <option value=1>Lunas</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" name="tambah" class="btn btn-success tambah" onclick="return confirm('Apakah data yang anda masukkan sudah benar ?');">Tambah</button>
                                    <a href="<?= base_url('Laundry') ?>" class="btn btn-warning">Kembali</a>
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

    </div>
    <!-- content -->

    <script>
        // menghitung total bayar
        function sum() {
            var jmlKilo = document.getElementById('jml_kilo').value;
            var tarif = document.getElementById('tarif').value;

            // jml kilo * tarif
            var total = parseInt(jmlKilo) * tarif;

            // memeriksa apakan parameter numerik
            if (!isNaN(total)) {
                document.getElementById('totalbayar').value = total;
            } else {
                document.getElementById('totalbayar').value = '';
            }
        }

        function jenis() {
            // mengambil data dari id=id_jenis
            var id = $("#id_jenis").val();

            $.ajax({
                // mengirim data idjenis ke file autofill.php
                url: "<?= base_url() ?>Laundry/autofill",
                data: 'idjenis=' + id,
                success: function(data) {
                    var json = data,
                        obj = JSON.parse(json);
                    // jika sukses mengirim balik
                    if (obj.sukses) {
                        // auto mengisi data pada id = tarif
                        $('#tarif').val(obj.sukses.tarif);
                        // auto mengisi data pada id = tgl_selesai
                        $('#tgl_selesai').val(obj.sukses.tgl_selesai);
                        $('#jml_kilo').val('');
                        $('#totalbayar').val('');
                    } else if (obj.gagal) {
                        $('#tarif').val('');
                        $('#tgl_selesai').val('');
                        $('#jml_kilo').val('');
                        $('#totalbayar').val('');
                    }
                }
            })
        }
    </script>