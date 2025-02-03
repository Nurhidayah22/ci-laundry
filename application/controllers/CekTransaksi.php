<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CekTransaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_cektransaksi');
    }

    public function index()
    {
        $this->load->view('CekTransaksi.php');
    }

    public function aksi_cek()
    {
        $id_laundry = $_POST['id_laundry'];
        // menampilkan data transaksi
        $data = $this->M_cektransaksi->get_transaksi($id_laundry);
        echo json_encode($data);
    }

    public function aksi_cetak_transaksi($id_laundry = null)
    {
        $cek = $this->M_cektransaksi->cek_idlaundry($id_laundry);
        if ($cek[0]->id_laundry == '') {
            redirect('CekTransaksi');
        } else {
            $data['data_laundry'] = $this->M_cektransaksi->cek_idlaundry($id_laundry);
            $this->load->view('page/laundry/Cetak_transaksi', $data);
        }
    }
}
