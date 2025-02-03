<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <link rel="shortcut icon" href="assets/images/logo1.png" type="image/png" />
    <title>Cek Rizky Laundry</title>
    <link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/') ?>css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet" type="text/css">
</head>
<style>
    .accountbg {
        background-image: url('<?= base_url('assets/') ?>images/blaundry.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body class="fixed-left">
    <!-- Begin page -->
    <div class="accountbg"></div>
    <div id="cek" class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center mt-0 m-b-15">
                    <a href="<?= base_url('Login') ?>"><img src="<?= base_url('assets/') ?>images/logo.png" width="200px"></a>
                </h3>
                <div id="error_message"></div>
                <div class="p-3">
                    <h4 class="text-center mt-0 m-b-15">Cek Nota Anda Disini!</h4>
                    <form class="form-horizontal m-t-20" method="post">

                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" type="text" required placeholder="Input ID Laundry" name="id_laundry" id="id_laundry">
                            </div>
                        </div>

                        <div class="form-group text-center row m-t-20">
                            <div class="col-12">
                                <button id="tombol-cek" class="btn btn-success btn-block waves-effect waves-light" type="submit">Cek Status Nota</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="detail" class="container mt-3 d-none">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center"><strong>NOTA TRANSAKSI</strong></h4>
                        <a href="<?= base_url('CekTransaksi') ?>" class="btn btn-primary float-right mb-3">Kembali</a>
                        <table class="table table-bordered">
                            <tr>
                                <th>No. Order</th>
                                <td id="id_laundry"></td>
                            </tr>
                            <tr>
                                <th>Pelanggan</th>
                                <td id="pelangganid"></td>
                            </tr>
                            <tr>
                                <th>Tanggal Selesai</th>
                                <td id="tgl_selesai"></td>
                            </tr>
                            <tr>
                                <th>Catatan Laundry</th>
                                <td id="catatan"></td>
                            </tr>
                            <tr>
                                <th>Status Pembayaran</th>
                                <td id="status_pembayaran"></td>
                            </tr>
                            <tr>
                                <th>Status Pengambilan Baju</th>
                                <td id="status_pengambilan"></td>
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
                                        <td>1</td>
                                        <td id="tgl_terima"></td>
                                        <td id="jenis_laundry"></td>
                                        <td id="tgl_selesai"></td>
                                        <td id="jml_kilo"></td>
                                        <td id="tarif"></td>
                                        <td id="totalbayar"></td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <th colspan="6" style="text-align: center;">TOTAL PESANAN</th>
                                        <th id="totalpesanan"></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- jQuery  -->
    <script src="<?= base_url('assets/') ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/modernizr.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/detect.js"></script>
    <script src="<?= base_url('assets/') ?>js/fastclick.js"></script>
    <script src="<?= base_url('assets/') ?>js/jquery.slimscroll.js"></script>
    <script src="<?= base_url('assets/') ?>js/jquery.blockUI.js"></script>
    <script src="<?= base_url('assets/') ?>js/waves.js"></script>
    <script src="<?= base_url('assets/') ?>js/jquery.nicescroll.js"></script>
    <script src="<?= base_url('assets/') ?>js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="<?= base_url('assets/') ?>js/app.js"></script>

    <script>
        $(document).on('click', '#tombol-cek', function(e) {
            e.preventDefault();
            id = document.getElementById("id_laundry").value;
            $.ajax({
                url: '<?= base_url() ?>CekTransaksi/aksi_cek/',
                type: 'POST',
                data: 'id_laundry=' + id,
                success: function(hasil) {
                    data = JSON.parse(hasil)
                    if (data == '') {
                        const message = '<div class="alert alert-danger" role="alert">Data tidak ada!</div>'
                        $('div#error_message').html(message);

                    } else {
                        let cek = document.getElementById("cek");
                        cek.classList.add("d-none");
                        let detail = document.getElementById("detail");
                        detail.classList.remove("d-none");

                        id_laundry = data[0].id_laundry;
                        pelangganid = data[0].pelangganid;
                        pelangganalamat = data[0].pelangganalamat;
                        pelanggantelp = data[0].pelanggantelp;
                        tgl_selesai = data[0].tgl_selesai;
                        catatan = data[0].catatan;
                        status_pembayaran = data[0].status_pembayaran;
                        status_pengambilan = data[0].status_pengambilan;
                        username = data[0].username;

                        tgl_terima = data[0].tgl_terima;
                        jenis_laundry = data[0].jenis_laundry;
                        tgl_selesai = data[0].tgl_selesai;
                        jml_killo = data[0].jml_kilo;
                        jml_kilo = jml_killo + ' Kg';
                        tarif = data[0].tarif;
                        totalbayar = data[0].totalbayar;


                        $('td#id_laundry').text(id_laundry);
                        $('td#pelangganid').text(pelangganid);
                        $('td#pelangganalamat').text(pelangganalamat);
                        $('td#pelanggantelp').text(pelanggantelp);
                        $('td#tgl_selesai').text(tgl_selesai);
                        $('td#catatan').text(catatan);


                        $('td#tgl_terima').text(tgl_terima);
                        $('td#jenis_laundry').text(jenis_laundry);
                        $('td#tgl_selesai').text(tgl_selesai);
                        $('td#jml_kilo').text(jml_kilo);
                        $('td#tarif').text(tarif);
                        $('td#totalbayar').text(totalbayar);
                        $('th#totalpesanan').text(totalbayar);


                        const stat_bayar = (status_pembayaran == 1) ? '<nav class="badge badge-success">Lunas</nav>' : '<nav class="badge badge-danger">Belum Lunas</nav>'
                        $('td#status_pembayaran').html(stat_bayar);
                        const stat_ambil = (status_pengambilan == 1) ? '<nav class="badge badge-success">Sudah Diambil</nav>' : '<nav class="badge badge-danger">Belum Diambil</nav>'
                        $('td#status_pengambilan').html(stat_ambil);

                        $('td#username').text(username);


                        $(document).on('click', '#cetak', function(e) {
                            e.preventDefault();
                            const link = '<?= base_url() ?>CekTransaksi/aksi_cetak_transaksi/' + id_laundry;
                            location.href = link;
                        });
                    }
                }
            })
        });
    </script>

</body>

</html>