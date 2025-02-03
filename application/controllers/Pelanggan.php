<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pelanggan');
        if ($this->session->userdata('userid') == null) {
            redirect('Login');
        }
    }

    public function index()
    {
        $data['datas'] = $this->M_pelanggan->get_session();
        $data['tb_pelanggan'] = $this->M_pelanggan->get_pelanggan();
        $data['Content'] = 'page/pelanggan/Pelanggan';
        $this->load->view('Dinamis/Layout', $data);
    }

    public function tambah()
    {
        $data['datas'] = $this->M_pelanggan->get_session();
        $data['Content'] = 'page/pelanggan/tambah';
        $this->load->view('Dinamis/Layout', $data);
    }

    public function foto($pelangganid = null)
    {
        $cek = $this->M_pelanggan->get_pelangganid($pelangganid);
        if ($cek[0]->pelangganid == '') {
            redirect('Pelanggan');
        } else {
            $data['datas'] = $this->M_pelanggan->get_session();
            $data['data_pelanggan'] = $this->M_pelanggan->get_pelangganid($pelangganid);
            $data['Content'] = 'page/pelanggan/foto';
            $this->load->view('Dinamis/Layout', $data);
        }
    }

    public function ubah($pelangganid = null)
    {
        $cek = $this->M_pelanggan->get_pelangganid($pelangganid);
        if ($cek[0]->pelangganid == '') {
            redirect('Pelanggan');
        } else {
            $data['datas'] = $this->M_pelanggan->get_session();
            $data['data_pelanggan'] = $this->M_pelanggan->get_pelangganid($pelangganid);
            $data['Content'] = 'page/pelanggan/ubah';
            $this->load->view('Dinamis/Layout', $data);
        }
    }

    public function aksi_tambah()
    {

        if (isset($_POST['tambah'])) {
            // ambil data dari form
            $nama = htmlentities(strip_tags(trim($_POST["pelanggannama"])));
            $alamat = htmlentities(strip_tags(trim($_POST["alamat"])));
            $pelanggantelp = htmlentities(strip_tags(trim($_POST["pelanggantelp"])));
            // input data ke db
            $query = $this->M_pelanggan->insert_pelanggan($nama, $alamat, $pelanggantelp);

            // dicek
            if (!$query) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan!</div>');
                redirect('Pelanggan/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Disimpan!</div>');
                redirect('Pelanggan/');
            }
        } else {
            $nama = "";
            $alamat = "";
            $pelanggantelp = "";
        }
    }

    public function aksi_ubah()

    {
        // mengambil data url id
        $id = $_POST['id'];

        // mengambil data dari tb_pelanggan berdasarkan id
        $result = $this->M_pelanggan->get_idpel($id);
        $row = $result->result();

        $nama = $row[0]->pelanggannama;
        $alamat = $row[0]->pelangganalamat;
        $pelanggantelp = $row[0]->pelanggantelp;

        // jika tombol ubah ditekan
        if (isset($_POST['ubah'])) {
            // menamgkap data dari form 
            $nama = htmlentities(strip_tags(trim($_POST["pelanggannama"])));
            $alamat = htmlentities(strip_tags(trim($_POST["pelangganalamat"])));
            $pelanggantelp = htmlentities(strip_tags(trim($_POST["pelanggantelp"])));
            // update data
            $query = $this->M_pelanggan->update_pelanggan($nama, $alamat, $pelanggantelp, $id);
            // cek keberhasilan
            if (!$query) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah!</div>');
                redirect('Pelanggan');
                // tidak berhasil, maka menampilkan pesan error
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Diubah!</div>');
                redirect('Pelanggan');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"></div>');
            redirect('Pelanggan');
        }
    }


    public function aksi_hapus($pelangganid)
    {
        // ambil data &id= dari url
        $id = $pelangganid;
        // mengambil data dari tb_pelanggan berdasarkan id
        $query = $this->M_pelanggan->get_idpel($id);
        $row = $query->result();
        $username = $row[0]->pelanggannama;

        // menghapus data pelanggan
        $result = $this->M_pelanggan->delete_pelanggan($id);

        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $username . ' Berhasil Di Hapus!</div>');
            redirect('Pelanggan');
        }
    }
}
