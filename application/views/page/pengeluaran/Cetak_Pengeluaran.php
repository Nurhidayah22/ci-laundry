<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengeluaran <?= $data_pengeluaran[0]->id_pengeluaran ?></title>
    <link href="<?= base_url('assets/') ?>plugins/morris/morris.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/') ?>css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet" type="text/css">
</head>

<body onload="window.print()">
    <h3>Detail Pengeluaran</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Tanggal Pengeluaran</th>
                <th>Catatan</th>
                <th>Pengeluaran</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= 1 ?></td>
                <td><?= $data_pengeluaran[0]->id_pengeluaran ?></td>
                <td><?= $data_pengeluaran[0]->tgl_pengeluaran ?></td>
                <td><?= $data_pengeluaran[0]->catatan ?></td>
                <td>Rp. <?= number_format($data_pengeluaran[0]->pengeluaran); ?></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th colspan="4" style="text-align: center;">TOTAL PENGELUARAN</th>
                <th>Rp. <?= number_format($data_pengeluaran[0]->pengeluaran); ?></th>
            </tr>
        </tbody>
    </table>

    <script src="<?= base_url('assets/') ?>plugins/datatables/vfs_fonts.js"></script>

</html>