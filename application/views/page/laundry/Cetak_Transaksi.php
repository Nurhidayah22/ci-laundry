<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice <?= $data_laundry[0]->id_laundry ?></title>
    <link href="<?= base_url('assets/') ?>plugins/morris/morris.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/') ?>css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet" type="text/css">
</head>

<!-- ketika halaman onload, maka auto print -->

<body onload="window.print()">
    <h2>Rizky Laundry</h2>
    <table width='100%'>
        <tr>
            <td>
                <br>
                Jl Tanjung Raya II, Parit Mayor, Pontianak Timur <br>
                No. Hp / WA : 085828243246 <br>
                Jam Operasional : Senin – Minggu : 08.00 – 21.00 wib
            </td>
            <td align="right">
                <p style="text-align: right;"> <b>Tanggal : </b> <?= date('Y-m-d H:i:s');; ?></p>
            </td>
        </tr>
    </table>
    <hr style="border:0; border-top: 5px double #8c8c8c;">

    <table>
        <tr>
            <th align="left">No. Order</th>
            <td>:</td>
            <td><?= $data_laundry[0]->id_laundry ?></td>
        </tr>
        <tr>
            <th align="left">Nama Pelanggan</th>
            <td>:</td>
            <td><?= $data_laundry[0]->pelanggannama ?></td>
        </tr>
        <tr>
            <th align="left">Alamat</th>
            <td>:</td>
            <td><?= $data_laundry[0]->pelangganalamat ?></td>
        </tr>
        <tr>
            <th align="left">No. Telp</th>
            <td>:</td>
            <td><?= $data_laundry[0]->pelanggantelp ?></td>
        </tr>
        <tr>
            <th align="left">Tanggal Selesai</th>
            <td>:</td>
            <td><?= $data_laundry[0]->tgl_selesai ?></td>
        </tr>
        <tr>
            <th align="left">Catatan Laundry</th>
            <td>:</td>
            <td><?= $data_laundry[0]->catatan ?></td>
        </tr>
        <tr>
            <th align="left">Status Pembayaran</th>
            <td>:</td>
            <td><?= ($data_laundry[0]->status_pembayaran == 1) ? '<nav class="badge badge-success">Lunas</nav>' : '<nav class="badge badge-danger">Belum Lunas</nav>'; ?></td>
        </tr>
        <tr>
            <th align="left">Status Pengambilan Baju</th>
            <td>:</td>
            <td><?= ($data_laundry[0]->status_pengambilan == 1) ? '<nav class="badge badge-success">Sudah Diambil</nav>' : '<nav class="badge badge-danger">Belum Diambil</nav>'; ?></td>
        </tr>
        <tr>
            <th align="left">Kasir</th>
            <td>:</td>
            <td><?= $data_laundry[0]->username ?></td>
        </tr>
    </table>
    <br>
    <!-- data transaksi -->
    <table width='100%' cellpadding='5' cellspacing='0' border="1">
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
                <td><?= "1"; ?></td>
                <td><?= $data_laundry[0]->tgl_terima ?></td>
                <td><?= $data_laundry[0]->jenis_laundry ?></td>
                <td><?= $data_laundry[0]->tgl_selesai ?></td>
                <td><?= $data_laundry[0]->jml_kilo ?> Kg</td>
                <td>Rp. <?= number_format($data_laundry[0]->tarif); ?></td>
                <td>Rp. <?= number_format($data_laundry[0]->totalbayar); ?></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th colspan="6" style="text-align: center;">TOTAL PESANAN</th>
                <th>Rp. <?= number_format($data_laundry[0]->totalbayar); ?></th>
            </tr>
        </tbody>
    </table>

    <h3>Keterangan :</h3>
    <p>
    <ol>
        <li>Pengambilan cucian harus membawa nota</li>
        <li>Cucian luntur bukan tanggung jawab kami</li>
        <li>Hitung dan periksa sebelum pergi</li>
        <li>Cucian yang rusak/mengkerut karena sifat kain tidak dapat kami ganti</li>
        <li>Cucian yang tidak diambil lebih dari 1 bulan bukan tanggung jawab kami</li>
    </ol>
    </p>
</body>

<script src="<?= base_url('assets/') ?>plugins/datatables/vfs_fonts.js"></script>

</html>