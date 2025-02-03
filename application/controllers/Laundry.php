<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laundry extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_laundry');
        if ($this->session->userdata('userid') == null) {
            redirect('Login');
        }
    }

    public function index()
    {
        $data['datas'] = $this->M_laundry->get_session();
        $data['tb_laundry'] = $this->M_laundry->get_laundry();
        $data['Content'] = 'page/laundry/Laundry';
        $this->load->view('Dinamis/Layout', $data);
    }

    public function LaundryLunas()
    {
        $data['datas'] = $this->M_laundry->get_session();
        $data['tb_laundry'] = $this->M_laundry->laundry_lunas();
        $data['Content'] = 'page/laundry/LaundryLunas';
        $this->load->view('Dinamis/Layout', $data);
    }

    public function LaundryBelumLunas()
    {
        $data['datas'] = $this->M_laundry->get_session();
        $data['tb_laundry'] = $this->M_laundry->laundry_belum_lunas();
        $data['Content'] = 'page/laundry/LaundryBelumLunas';
        $this->load->view('Dinamis/Layout', $data);
    }

    public function Detail($id_laundry = null)
    {
        $cek = $this->M_laundry->cek_idlaundry($id_laundry);
        if ($cek[0]->pelangganid == '') {
            redirect('Laundry');
        } else {
            $data['datas'] = $this->M_laundry->get_session();
            $data['tb_laundry'] = $this->M_laundry->cek_detail($id_laundry);
            $data['Content'] = 'page/laundry/Detail_transaksi';
            $this->load->view('Dinamis/Layout', $data);
        }
    }
    public function Tambah()
    {
        $data['tb_jenis'] = $this->M_laundry->get_jenis();
        $data['tb_pelanggan'] = $this->M_laundry->get_pelanggan();
        $data['kode'] = generateCode('tb_laundry', 'LD-', 3);
        $data['Content'] = 'page/laundry/Tambah';
        $this->load->view('Dinamis/Layout', $data);
    }


    public function autofill()
    {
        $idjenis = $_GET['idjenis'];

        $query_jenis = $this->M_laundry->get_idjenis($idjenis);
        $hasil_jenis = $query_jenis->result();

        // jika tarif tidak kosong
        if ($hasil_jenis) {
            $lama_proses = $hasil_jenis[0]->lama_proses;

            // tanggal hari ini + lama proses
            $tglselesai = date('Y-m-d', strtotime('+' . $lama_proses . ' day'));

            $data = [
                'sukses' => [
                    'tarif' => $hasil_jenis[0]->tarif,
                    'tgl_selesai' => $tglselesai
                ]
            ];
        } elseif (!$hasil_jenis) {
            $data = [
                'gagal' => 'gagal'
            ];
        }

        // data dikirim kembali ke laundry/tambah.php
        echo json_encode($data);
    }

    public function aksi_tambah()
    {
        if (isset($_POST['tambah'])) {
            $idlaundry = $_POST['id_laundry'];
            $pelangganid = htmlentities(strip_tags(trim($_POST["pelangganid"])));
            $userid = htmlentities(strip_tags(trim($_POST["userid"])));
            $jenis = htmlentities(strip_tags(trim($_POST["id_jenis"])));
            $tarif = htmlentities(strip_tags(trim($_POST["tarif"])));
            $tgl_selesai = htmlentities(strip_tags(trim($_POST["tgl_selesai"])));
            $jml_kilo = htmlentities(strip_tags(trim($_POST["jml_kilo"])));
            $totalbayar = htmlentities(strip_tags(trim($_POST["totalbayar"])));
            $catatan = htmlentities(strip_tags(trim($_POST["catatan"])));
            $status = htmlentities(strip_tags(trim($_POST["status"]))); // status pembayaran
            $status_pengambilan = 0;
            $tgl_terima = date('Y-m-d');
            $ket_laporan = 1;
            $pesan_error = "";

            // input ke tb transaksi
            $query = $this->M_laundry->insert_transaksi($idlaundry, $pelangganid, $userid, $jenis, $tgl_terima, $tgl_selesai, $jml_kilo, $catatan, $totalbayar, $status, $status_pengambilan);
            $result = $query;

            // jika sudah lunas, maka input data transaksi ke tb_laporan
            if ($status == 1) {
                $this->M_laundry->insert_lunas($tgl_terima, $ket_laporan, $catatan, $idlaundry, $totalbayar);
            }

            if (!$result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi Laundry Berhasil disimpan!</div>');
                redirect('Laundry');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Transaksi Laundry Gagal disimpan!</div>');
                redirect('Laundry');
            }
        } else {
            $pesan_error = "";
            $pelangganid = "";
            $jenis = "";
            $tarif = "";
            $tgl_selesai = "";
            $jml_kilo = "";
            $totalbayar = "";
            $catatan = "";
            $status = "";
        }
    }

    public function aksi_cetak_transaksi($id_laundry = null)
    {
        $cek = $this->M_laundry->cek_idlaundry($id_laundry);
        if ($cek[0]->id_laundry == '') {
            redirect('Laundry');
        } else {
            $data['datas'] = $this->M_laundry->get_session();
            $data['data_laundry'] = $this->M_laundry->cek_idlaundry($id_laundry);
            $this->load->view('page/laundry/Cetak_transaksi', $data);
        }
    }

    public function aksi_lunas($id_laundry = null)
    {
        // ambil id dari url
        $id = $id_laundry;
        $cek = $this->M_laundry->get_idlaundry($id);
        if ($cek[0]->id_laundry == '') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Transaksi Laundry Gagal dilunasi!</div>');
            redirect('Laundry');
        }

        // tampilkan data seuai id
        $query = $this->M_laundry->get_idlaundry($id);;
        $row = $query;

        $tgl = $row[0]->tgl_terima;
        $pemasukan = $row[0]->totalbayar;
        $catatan = $row[0]->catatan;
        $ket_laporan = 1;

        // ubah status_pembayaran transaksi laundry menjadi lunas = 1
        $result = $this->M_laundry->update_status_pembayaran($id);

        // jika lunas maka tambah data ke tb_pemasukan
        $result2 = $this->M_laundry->insert_pemasukan($tgl, $ket_laporan, $catatan, $id, $pemasukan);

        if ($result && $result2) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi Laundry Berhasil dilunasi!</div>');
            redirect('Laundry');
        }
    }

    public function aksi_ambil($id_laundry = null)
    {
        // ambil id dari url
        $id = $id_laundry;

        // ubah status pengambilan baju
        $result = $this->M_laundry->update_ambil($id);

        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Baju milik ID transaksi ' . $id . ' telah diambil</div>');
            redirect('Laundry');
        }
    }

    public function aksi_hapus($id_laundry)
    {
        // menangkap nilai id dari url
        $id = $id_laundry;
        // mengambil data dari tb_laundry berdasarkan id
        $query = $this->M_laundry->get_idlaundry($id);
        $row = $query;
        $id_laundry = $row[0]->id_laundry;

        // menghapus data laundry
        $result = $this->M_laundry->delete_laundry($id);

        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $id_laundry . ' Berhasil Di Hapus!</div>');
            redirect('Laundry');
        }
    }
}
