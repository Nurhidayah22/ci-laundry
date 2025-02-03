<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_jenis');
        if ($this->session->userdata('userid') == null) {
            redirect('Login');
        }
    }
    public function index()
    {
        $data['datas'] = $this->M_jenis->get_session();
        $data['tb_jenis'] = $this->M_jenis->get_jenis();
        $data['Content'] = 'page/jenis/Jenis';
        $this->load->view('Dinamis/Layout', $data);
    }

    public function tambah()
    {
        $data['datas'] = $this->M_jenis->get_session();
        $data['Content'] = 'page/jenis/Tambah';
        $this->load->view('Dinamis/Layout', $data);
    }

    public function ubah($kd_jenis = null)
    {
        $cek = $this->M_jenis->get_kdjenis($kd_jenis);
        if ($cek[0]->kd_jenis == '') {
            redirect('Jenis');
        } else {
            $data['datas'] = $this->M_jenis->get_session();
            $data['data_jenis'] = $this->M_jenis->get_kdjenis($kd_jenis);
            $data['Content'] = 'page/jenis/Ubah';
            $this->load->view('Dinamis/Layout', $data);
        }
    }

    public function aksi_tambah()
    {
        if (isset($_POST['tambah'])) {
            $jenis_laundry = htmlentities(strip_tags(trim($_POST["jenis_laundry"])));
            $lama_proses = htmlentities(strip_tags(trim($_POST["lama_proses"])));
            $tarif = htmlentities(strip_tags(trim($_POST["tarif"])));
            $pesan_error = "";

            // mengecek apakah ada jenis laundry yg sama
            $query_jenis = $this->M_jenis->get_jenislaundry($jenis_laundry);
            $result_jenis = $query_jenis->num_rows();
            if ($result_jenis > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jenis Laundry sudah ada!</div>');
                redirect('Jenis');
            }

            // jika tidak ada error
            if ($pesan_error == "") {
                $query = $this->M_jenis->insert_jenis($jenis_laundry, $lama_proses, $tarif);
                if (!$query) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jenis Laundry Berhasil disimpan!</div>');
                    redirect('Jenis');
                    // jika ada error
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jenis Laundry Gagal disimpan!</div>');
                    redirect('Jenis');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jenis Laundry Gagal disimpan!</div>');
                redirect('Jenis');
            }
        } else {
            $pesan_error = "";
            $jenis_laundry = "";
            $lama_proses = "";
            $tarif = "";
        }
    }

    public function aksi_ubah()
    {
        // ambil nilai id dari url
        $id = $_POST['kd_jenis'];
        // menampilkan data jenis berdasarkan id
        $result = $this->M_jenis->get_jenisid($id);
        $row = $result->result();

        $jenis_laundry = $row[0]->jenis_laundry;
        $lama_proses = $row[0]->lama_proses;
        $tarif = $row[0]->tarif;

        // jika tombol ubah ditekan
        if (isset($_POST['ubah'])) {
            $jenis_laundry = htmlentities(strip_tags(trim($_POST["jenis_laundry"])));
            $lama_proses = htmlentities(strip_tags(trim($_POST["lama_proses"])));
            $tarif = htmlentities(strip_tags(trim($_POST["tarif"])));
            $pesan_error = "";

            // mengecek jenis laundry
            // jika jenis laundry yang diinputkan tidak sama dengan nama jenis laundry yg lama, maka 
            if ($row[0]->jenis_laundry !== $jenis_laundry) {
                // menampilkan data jenis laundry sesuai dengan inputan jenis laundry
                $query_jenis = $this->M_jenis->get_jenislaundry($jenis_laundry);
                $result_jenis = $query_jenis->num_rows();

                // cek apakah jenis laundry ada yang
                if ($result_jenis > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jenis Laundry ' . $jenis_laundry . ' sudah ada</div>');
                }
            }

            // jika tidak terdapat pesan error
            if ($pesan_error == "") {
                $query = $this->M_jenis->update_jenis($jenis_laundry, $lama_proses, $tarif, $id);
                if (!$query) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jenis Laundry Berhasil diubah!</div>');
                    redirect('Jenis');
                } else {
                    // jika gagal disimpan
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jenis Laundry Gagal disimpan!</div>');
                    redirect('Jenis');
                }
                // jika ada error
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jenis Laundry Gagal disimpan!</div>');
                redirect('Jenis');
            }
        } else {
            $pesan_error = "";
        }
    }

    public function aksi_hapus($kd_jenis)
    {
        // menangkap nilai id dari url
        $id = $kd_jenis;
        // mengambil data dari tb_jenis berdasarkan id
        $query = $this->M_jenis->get_jenisid($id);
        $row = $query->result();
        $jenis_laundry = $row[0]->jenis_laundry;

        // menghapus data jenis laundry
        $result = $this->M_jenis->delete_jenis($id);

        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $jenis_laundry . ' Berhasil Di Hapus!</div>');
            redirect('Jenis');
        }
    }
}
