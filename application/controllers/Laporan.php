<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_laporan');
        if ($this->session->userdata('userid') == null) {
            redirect('Login');
        }
    }

    public function index()
    {
        $data['datas'] = $this->M_laporan->get_session();
        $data['tb_laporan'] = $this->M_laporan->get_laporan();
        $data['Content'] = 'page/laporan/Laporan';
        $this->load->view('Dinamis/Layout', $data);
    }

    public function aksi_laporan()
    {
        // jika mencari data tanggal
        $tglAwal = $_POST['tanggalawal'];
        $tglAkhir = $_POST['tanggalakhir'];
        if ($tglAwal == '' || $tglAkhir == '') {
            redirect('laporan');
        }
        if (isset($_POST['cari'])) {
            // menampilkan data transaksi
            $data['datas'] = $this->M_laporan->get_session();
            $data['tb_laporan'] = $this->M_laporan->where_tanggal($tglAwal, $tglAkhir);
            $data['Content'] = 'page/laporan/Laporan';
            $this->load->view('Dinamis/Layout', $data);
        }
    }
}
