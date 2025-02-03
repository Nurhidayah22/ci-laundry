<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_cektransaksi extends CI_Model
{
    public function get_transaksi($id_laundry)
    {
        return $this->db->query('SELECT * FROM `tb_laundry` INNER JOIN `tb_pelanggan` ON `tb_laundry`.`pelangganid` = `tb_pelanggan`.`pelangganid` INNER JOIN `tb_users` ON `tb_users`.`userid` = `tb_laundry`.`userid` INNER JOIN `tb_jenis` ON `tb_jenis`.`kd_jenis` = `tb_laundry`.`kd_jenis` WHERE `tb_laundry`.`id_laundry` ="' . $id_laundry . '"')->result();
    }

    public function cek_idlaundry($id_laundry)
    {
        return $this->db->query('SELECT * FROM `tb_laundry` INNER JOIN `tb_pelanggan` ON `tb_laundry`.`pelangganid` = `tb_pelanggan`.`pelangganid` INNER JOIN `tb_users` ON `tb_users`.`userid` = `tb_laundry`.`userid` INNER JOIN `tb_jenis` ON `tb_jenis`.`kd_jenis` = `tb_laundry`.`kd_jenis` WHERE `tb_laundry`.`id_laundry` ="' . $id_laundry . '"')->result();
    }
}
