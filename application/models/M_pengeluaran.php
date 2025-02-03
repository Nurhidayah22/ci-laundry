<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengeluaran extends CI_Model
{
    public function get_session()
    {
        return $this->db->query("SELECT * FROM tb_users WHERE userid = " . $this->session->userdata('userid') . "")->result();
    }

    public function get_pengeluaran()
    {
        return $this->db->query('SELECT * FROM tb_pengeluaran')->result();
    }

    public function cek_idpengeluaran($id_pengeluaran)
    {
        return $this->db->query('SELECT * FROM tb_pengeluaran WHERE id_pengeluaran ="' . $id_pengeluaran . '"')->result();
    }

    public function insert_pengeluaran($id_pengeluaran, $tanggal, $catatan, $pengeluaran)
    {
        return $this->db->query("INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `tgl_pengeluaran`, `catatan`, `pengeluaran`) VALUES ('$id_pengeluaran', '$tanggal', '$catatan', '$pengeluaran')");
    }

    public function insert_plaporan($tanggal, $ket_laporan, $catatan, $id_pengeluaran, $pengeluaran)
    {
        return $this->db->query("INSERT INTO `tb_laporan` (`id_laporan`, `tgl_laporan`, `ket_laporan`, `catatan`, `id_pengeluaran`, `pengeluaran`) VALUES ('', '$tanggal', '$ket_laporan', '$catatan', '$id_pengeluaran', '$pengeluaran')");
    }

    public function update_pengeluaran($tanggal, $catatan, $pengeluaran, $id_pengeluaran)
    {
        return $this->db->query("UPDATE tb_pengeluaran SET tgl_pengeluaran = '$tanggal', catatan = '$catatan', pengeluaran = '$pengeluaran' WHERE id_pengeluaran = '$id_pengeluaran'");
    }

    public function update_plaporan($catatan, $tanggal, $pengeluaran, $id_pengeluaran)
    {
        $this->db->query("UPDATE tb_laporan SET catatan = '$catatan', tgl_laporan = '$tanggal', pengeluaran = '$pengeluaran' WHERE id_pengeluaran = '$id_pengeluaran'");
    }

    public function get_idpengeluaran($id)
    {
        return $this->db->query('SELECT * FROM tb_pengeluaran WHERE id_pengeluaran ="' . $id . '"');
    }

    public function delete_pengeluaran($id)
    {
        return $this->db->query('DELETE FROM tb_pengeluaran WHERE id_pengeluaran ="' . $id . '"');
    }

    public function delete_plaporan($id)
    {
        return $this->db->query('DELETE FROM tb_laporan WHERE id_pengeluaran ="' . $id . '"');
    }
}
