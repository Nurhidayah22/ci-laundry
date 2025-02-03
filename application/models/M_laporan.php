<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
    public function get_session()
    {
        return $this->db->query("SELECT * FROM tb_users WHERE userid = " . $this->session->userdata('userid') . "")->result();
    }

    public function get_laporan()
    {
        return $this->db->query('SELECT * FROM `tb_laporan')->result();
    }

    public function where_tanggal($tglAwal, $tglAkhir)
    {
        return $this->db->query("SELECT * FROM `tb_laporan` WHERE tgl_laporan BETWEEN '$tglAwal' AND '$tglAkhir'")->result();
    }
}
