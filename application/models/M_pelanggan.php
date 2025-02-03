<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{
    public function get_session()
    {
        return $this->db->query("SELECT * FROM tb_users WHERE userid = " . $this->session->userdata('userid') . "")->result();
    }

    public function get_pelanggan()
    {
        return $this->db->query('SELECT * FROM tb_pelanggan ORDER BY pelangganid DESC')->result();
    }

    public function get_pelangganid($pelangganid)
    {
        return $this->db->query("SELECT * FROM tb_pelanggan WHERE pelangganid = " . $pelangganid  . "")->result();
    }

    public function insert_pelanggan($nama, $alamat, $pelanggantelp)
    {
        $this->db->query("INSERT INTO `tb_pelanggan` (`pelangganid`, `pelanggannama`,  `pelangganalamat`, `pelanggantelp`) VALUES ('', '$nama',  '$alamat', '$pelanggantelp')");
    }

    public function get_idpel($id)
    {
        return $this->db->query("SELECT * FROM tb_pelanggan WHERE pelangganid = $id");
    }

    public function update_pelanggan($nama, $alamat, $pelanggantelp, $id)
    {
        $this->db->query("UPDATE `tb_pelanggan` SET
        `pelanggannama` = '$nama',
        `pelangganalamat` = '$alamat',
        `pelanggantelp` = '$pelanggantelp'
        WHERE `tb_pelanggan`.`pelangganid` = $id
        ");
    }

    public function delete_pelanggan($id)
    {
        return $this->db->query("DELETE FROM tb_pelanggan WHERE pelangganid = $id");
    }
}
