<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jenis extends CI_Model
{
    public function get_session()
    {
        return $this->db->query("SELECT * FROM tb_users WHERE userid = " . $this->session->userdata('userid') . "")->result();
    }

    public function get_jenis()
    {
        return $this->db->query('SELECT * FROM tb_jenis')->result();
    }

    public function get_kdjenis($kd_jenis)
    {
        return $this->db->query("SELECT * FROM tb_jenis WHERE kd_jenis = " . $kd_jenis  . "")->result();
    }

    public function get_jenislaundry($jenis_laundry)
    {
        return $this->db->query("SELECT * FROM tb_jenis WHERE jenis_laundry = '$jenis_laundry'");
    }

    public function insert_jenis($jenis_laundry, $lama_proses, $tarif)
    {
        $this->db->query("INSERT INTO `tb_jenis` (`kd_jenis`, `jenis_laundry`, `lama_proses`, `tarif`) VALUES ('', '$jenis_laundry', '$lama_proses', '$tarif')");
    }

    public function get_jenisid($id)
    {
        return $this->db->query("SELECT * FROM tb_jenis WHERE kd_jenis = '$id'");
    }

    public function update_jenis($jenis_laundry, $lama_proses, $tarif, $id)
    {
        $this->db->query("UPDATE `tb_jenis` SET `jenis_laundry` = '$jenis_laundry', `lama_proses` = '$lama_proses', `tarif` = '$tarif' WHERE `tb_jenis`.`kd_jenis` = $id");
    }

    public function delete_jenis($id)
    {
        return $this->db->query("DELETE FROM tb_jenis WHERE kd_jenis = $id");
    }
}
