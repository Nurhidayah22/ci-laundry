<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengeluaran');
        if ($this->session->userdata('userid') == null) {
            redirect('Login');
        }
    }

    public function index()
    {
        $data['datas'] = $this->M_pengeluaran->get_session();
        $data['tb_pengeluaran'] = $this->M_pengeluaran->get_pengeluaran();
        $data['Content'] = 'page/pengeluaran/Pengeluaran';
        $this->load->view('Dinamis/Layout', $data);
    }

    public function tambah()
    {
        $data['datas'] = $this->M_pengeluaran->get_session();
        $data['kode'] = generateCode('tb_pengeluaran', 'PG-', 3);
        $data['Content'] = 'page/pengeluaran/Tambah';
        $this->load->view('Dinamis/Layout', $data);
    }

    public function ubah($id_pengeluaran = null)
    {
        $cek = $this->M_pengeluaran->cek_idpengeluaran($id_pengeluaran);
        if ($cek[0]->id_pengeluaran == '') {
            redirect('Pengeluaran');
        } else {
            $data['datas'] = $this->M_pengeluaran->get_session();
            $data['data_pengeluaran'] = $this->M_pengeluaran->cek_idpengeluaran($id_pengeluaran);
            $data['Content'] = 'page/pengeluaran/Ubah';
            $this->load->view('Dinamis/Layout', $data);
        }
    }

    public function detail($id_pengeluaran = null)
    {
        $cek = $this->M_pengeluaran->cek_idpengeluaran($id_pengeluaran);
        if ($cek[0]->id_pengeluaran == '') {
            redirect('Pengeluaran');
        } else {
            $data['datas'] = $this->M_pengeluaran->get_session();
            $data['data_pengeluaran'] = $this->M_pengeluaran->cek_idpengeluaran($id_pengeluaran);
            $data['Content'] = 'page/pengeluaran/Detail';
            $this->load->view('Dinamis/Layout', $data);
        }
    }

    public function aksi_tambah()
    {
        if (isset($_POST['tambah'])) {
            $id_pengeluaran = htmlentities(strip_tags(trim($_POST["id_pengeluaran"])));
            $tanggal = htmlentities(strip_tags(trim($_POST["tanggal"])));
            $catatan = htmlentities(strip_tags(trim($_POST["catatan"])));
            $pengeluaran = htmlentities(strip_tags(trim($_POST["pengeluaran"])));
            $ket_laporan = 2;
            $pesan_error = "";

            // input ke tb_pengeluaran
            $query = $this->M_pengeluaran->insert_pengeluaran($id_pengeluaran, $tanggal, $catatan, $pengeluaran);

            // input ke tb_laporan
            $query2 = $this->M_pengeluaran->insert_plaporan($tanggal, $ket_laporan, $catatan, $id_pengeluaran, $pengeluaran);

            // jika tidak ada error
            if ($query && $query2) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pengeluaran dengan ID ' . $id_pengeluaran . ' berhasil ditambahkan</div>');
                redirect('Pengeluaran');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data pengeluaran gagal disimpan !</div>');
                redirect('Pengeluaran');
            }
        } else {
            $tanggal = "";
            $catatan = "";
            $pengeluaran = "";
        }
    }

    public function aksi_ubah()
    {
        // mengambil id dari url
        $id_pengeluaran = $_POST['id_pengeluaran'];

        // ambil data dari tabel pengeluaran
        $query_p = $this->M_pengeluaran->cek_idpengeluaran($id_pengeluaran);
        $result = $query_p;

        // ambil data
        $tanggal = $result[0]->tgl_pengeluaran;
        $catatan = $result[0]->catatan;
        $pengeluaran = $result[0]->pengeluaran;

        if (isset($_POST['simpan'])) {
            $tanggal = htmlentities(strip_tags(trim($_POST["tanggal"])));
            $catatan = htmlentities(strip_tags(trim($_POST["catatan"])));
            $pengeluaran = htmlentities(strip_tags(trim($_POST["pengeluaran"])));
            $pesan_error = "";

            // ubah data pengeluaran pada tb_pengeluaran
            $query = $this->M_pengeluaran->update_pengeluaran($tanggal, $catatan, $pengeluaran, $id_pengeluaran);

            // ubah data pengeluaran pada tb_laporan
            $query = $this->M_pengeluaran->update_plaporan($catatan, $tanggal, $pengeluaran, $id_pengeluaran);

            if (!$query) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pengeluaran dengan ID ' . $id_pengeluaran . ' berhasil diubah</div>');
                redirect('Pengeluaran');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data pengeluaran dengan ID ' . $id_pengeluaran . ' gagal diubah</div>');
                redirect('Pengeluaran');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"></div>');
        }
    }

    public function aksi_hapus($id_pengeluaran)
    {
        // menangkap nilai id dari url
        $id = $id_pengeluaran;
        // mengambil data dari tb_pengeluaran berdasarkan id
        $query = $this->M_pengeluaran->get_idpengeluaran($id);
        $row = $query->result();
        $id_pengeluaran = $row[0]->id_pengeluaran;

        // menghapus data jenis laundry
        $result = $this->M_pengeluaran->delete_pengeluaran($id);

        $result2 = $this->M_pengeluaran->delete_plaporan($id);

        if ($result && $result2) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $id_pengeluaran . ' Berhasil Di Hapus!</div>');
            redirect('Pengeluaran');
        }
    }

    public function aksi_cetak_pengeluaran($id_pengeluaran = null)
    {
        $cek = $this->M_pengeluaran->cek_idpengeluaran($id_pengeluaran);
        if ($cek[0]->id_pengeluaran == '') {
            redirect('Pengeluaran');
        } else {
            $data['datas'] = $this->M_pengeluaran->get_session();
            $data['data_pengeluaran'] = $this->M_pengeluaran->cek_idpengeluaran($id_pengeluaran);
            $this->load->view('page/pengeluaran/cetak_pengeluaran', $data);
        }
    }
}
