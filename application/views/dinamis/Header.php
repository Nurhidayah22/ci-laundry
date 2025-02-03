<!-- <?php

        // memulai session
        session_start();

        // menghilangkan undifine error index
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

        // membuat keamanan, jika belum login maka kembali ke login.php
        if (!isset($_SESSION['login'])) {
            header('location: login.php');
        }

        // menyertakan koneksi.php
        include "include/koneksi.php";

        // menampilkan data user yang sedang login
        $id = $_SESSION['userid'];
        $users = mysqli_query($conn, "SELECT * FROM tb_users WHERE userid = '$id'");
        $tampilusers = mysqli_fetch_assoc($users);

        ?> -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <title>KasirRizkyLaundry</title>
    <!-- <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" /> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- <link rel="icon" href="<?= base_url('assets/') ?>images/logo1.png" type="image/png" > -->
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>images/logo.png" type="image/png" />

    <link href="<?= base_url('assets/') ?>plugins/morris/morris.css" rel="stylesheet" />

    <link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/') ?>css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="<?= base_url('assets/') ?>plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/') ?>plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?= base_url('assets/') ?>plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- sweetalert -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>sweeetalert2/dist/sweetalert2.min.css">
    <script src="<?= base_url('assets/') ?>sweeetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- select -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/select2/select2.min.css">
</head>

<body class="fixed-left">
    <!-- Loader -->

    <!-- Begin page -->
    <div id="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                <i class="ion-close"></i>
            </button>