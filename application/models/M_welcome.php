<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_welcome extends CI_Model
{
    public function get_session()
    {
        return $this->db->query("SELECT * FROM tb_users WHERE userid = " . $this->session->userdata('userid') . "")->result();
    }

    public function get_pelanggan()
    {
        return $this->db->query("SELECT * FROM tb_pelanggan")->num_rows();
    }

    public function get_users()
    {
        return $this->db->query("SELECT * FROM tb_users")->num_rows();
    }

    public function get_jenis()
    {
        return $this->db->query("SELECT * FROM tb_jenis")->num_rows();
    }

    public function get_laundry()
    {
        return $this->db->query("SELECT * FROM tb_laundry")->num_rows();
    }

    public function get_pengeluaran()
    {
        return $this->db->query("SELECT * FROM tb_pengeluaran")->num_rows();
    }
}
