<?php
$data['jmlDataPelanggan'] = $this->db->query("SELECT * FROM tb_pelanggan")->num_rows();
$data['jmlDataUser'] = $this->db->query("SELECT * FROM tb_users")->num_rows();
$data['jmljenis'] = $this->db->query("SELECT * FROM tb_jenis")->num_rows();
$data['jmllaundry'] = $this->db->query("SELECT * FROM tb_laundry")->num_rows();
$data['jmlpengeluaran'] = $this->db->query("SELECT * FROM tb_pengeluaran")->num_rows();
$this->load->view('dinamis/Header');
$this->load->view('dinamis/Sidebar', $data);
$this->load->view('dinamis/Content');
$this->load->view('dinamis/Footer');
