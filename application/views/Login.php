<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/png" />
    <title>Login Rizky Laundry</title>
    <link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/') ?>css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet" type="text/css">
</head>
<style>
    .accountbg {
        background-image: url('<?= base_url('assets/') ?>images/blaundry.png');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body class="fixed-left">
    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center mt-0 m-b-15">
                    <a href="<?= base_url('Login') ?>"><img src="<?= base_url('assets/') ?>images/logo.png" width="200px"></a>
                </h3>

                <div class="p-3">
                    <h4 class="text-center mt-0 m-b-15">Login Rizky Laundry</h4>
                    <?= $this->session->flashdata('message'); ?>
                    <form class="form-horizontal m-t-20" action="<?= base_url('Login/aksi_login/') ?>" method="POST">

                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" type="text" required placeholder="Username" name="username">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" type="password" required placeholder="Password" name="password">
                            </div>
                        </div>

                        <div class="form-group text-center row m-t-20">
                            <div class="col-12">
                                <button class="btn btn-success btn-block waves-effect waves-light" type="submit" name="login">Log In</button>
                            </div>
                        </div>
                    </form>
                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <a href="<?= base_url('CekTransaksi') ?>" class="btn btn-success btn-block waves-effect waves-light">Cek Status Nota</a>
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

</body>

</html>