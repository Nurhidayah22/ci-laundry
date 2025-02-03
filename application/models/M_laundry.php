<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laundry extends CI_Model
{
    public function get_session()
    {
        return $this->db->query("SELECT * FROM tb_users WHERE userid = " . $this->session->userdata('userid') . "")->result();
    }

    public function get_laundry()
    {
        return $this->db->query('SELECT * FROM `tb_laundry` INNER JOIN `tb_pelanggan` ON `tb_laundry`.`pelangganid` = `tb_pelanggan`.`pelangganid` INNER JOIN `tb_users` ON `tb_users`.`userid` = `tb_laundry`.`userid` INNER JOIN `tb_jenis` ON `tb_jenis`.`kd_jenis` = `tb_laundry`.`kd_jenis` ORDER BY `tb_laundry`.`id_laundry` DESC')->result();
    }

    public function laundry_lunas()
    {
        return $this->db->query('SELECT * FROM `tb_laundry` INNER JOIN `tb_pelanggan` ON `tb_laundry`.`pelangganid` = `tb_pelanggan`.`pelangganid` INNER JOIN `tb_users` ON `tb_users`.`userid` = `tb_laundry`.`userid` INNER JOIN `tb_jenis` ON `tb_jenis`.`kd_jenis` = `tb_laundry`.`kd_jenis` WHERE `tb_laundry`.`status_pembayaran` = 1')->result();
    }

    public function laundry_belum_lunas()
    {
        return $this->db->query('SELECT * FROM `tb_laundry` INNER JOIN `tb_pelanggan` ON `tb_laundry`.`pelangganid` = `tb_pelanggan`.`pelangganid` INNER JOIN `tb_users` ON `tb_users`.`userid` = `tb_laundry`.`userid` INNER JOIN `tb_jenis` ON `tb_jenis`.`kd_jenis` = `tb_laundry`.`kd_jenis` WHERE `tb_laundry`.`status_pembayaran` = 0')->result();
    }

    public function cek_idlaundry($id_laundry)
    {
        return $this->db->query('SELECT * FROM `tb_laundry` INNER JOIN `tb_pelanggan` ON `tb_laundry`.`pelangganid` = `tb_pelanggan`.`pelangganid` INNER JOIN `tb_users` ON `tb_users`.`userid` = `tb_laundry`.`userid` INNER JOIN `tb_jenis` ON `tb_jenis`.`kd_jenis` = `tb_laundry`.`kd_jenis` WHERE `tb_laundry`.`id_laundry` ="' . $id_laundry . '"')->result();
    }

    public function cek_detail($id_laundry)
    {
        return $this->db->query('SELECT * FROM `tb_laundry` INNER JOIN `tb_pelanggan` ON `tb_laundry`.`pelangganid` = `tb_pelanggan`.`pelangganid` INNER JOIN `tb_users` ON `tb_users`.`userid` = `tb_laundry`.`userid` INNER JOIN `tb_jenis` ON `tb_jenis`.`kd_jenis` = `tb_laundry`.`kd_jenis` WHERE `tb_laundry`.`id_laundry` ="' . $id_laundry . '"')->result();
    }

    public function get_jenis()
    {
        return $this->db->query('SELECT * FROM tb_jenis')->result();
    }

    public function get_pelanggan()
    {
        return $this->db->query('SELECT * FROM tb_pelanggan')->result();
    }

    public function get_idjenis($idjenis)
    {
        return $this->db->query("SELECT * FROM tb_jenis WHERE kd_jenis = '$idjenis'");
    }

    public function insert_transaksi($idlaundry, $pelangganid, $userid, $jenis, $tgl_terima, $tgl_selesai, $jml_kilo, $catatan, $totalbayar, $status, $status_pengambilan)
    {
        $this->db->query("INSERT INTO `tb_laundry` (`id_laundry`, `pelangganid`, `userid`, `kd_jenis`, `tgl_terima`, `tgl_selesai`, `jml_kilo`, `catatan`, `totalbayar`, `status_pembayaran`,`status_pengambilan`) VALUES ('$idlaundry', '$pelangganid', '$userid', '$jenis', '$tgl_terima', '$tgl_selesai', '$jml_kilo', '$catatan', '$totalbayar', '$status','$status_pengambilan')");
    }

    public function insert_lunas($tgl_terima, $ket_laporan, $catatan, $idlaundry, $totalbayar)
    {
        $this->db->query("INSERT INTO `tb_laporan` (`id_laporan`, `tgl_laporan`, `ket_laporan`, `catatan`, `id_laundry`, `pemasukan`) VALUES ('', '$tgl_terima', '$ket_laporan', '$catatan', '$idlaundry', '$totalbayar')");
    }

    public function get_idlaundry($id)
    {
        return $this->db->query("SELECT * FROM tb_laundry WHERE id_laundry = '$id'")->result();
    }

    public function update_status_pembayaran($id)
    {
        return $this->db->query("UPDATE tb_laundry SET `status_pembayaran` = 1 WHERE id_laundry = '$id'");
    }

    public function insert_pemasukan($tgl, $ket_laporan, $catatan, $id, $pemasukan)
    {
        return $this->db->query("INSERT INTO `tb_laporan` (`id_laporan`, `tgl_laporan`, `ket_laporan`, `catatan`, `id_laundry`, `pemasukan`) VALUES ('', '$tgl', '$ket_laporan', '$catatan', '$id', '$pemasukan')");
    }

    public function update_ambil($id)
    {
        return $this->db->query("UPDATE tb_laundry SET `status_pengambilan` = 1 WHERE id_laundry = '$id'");
    }

    public function delete_laundry($id)
    {
        return $this->db->query("DELETE FROM tb_laundry WHERE id_laundry = '$id'");
    }
}
