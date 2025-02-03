<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_users');
        if ($this->session->userdata('userid') == null) {
            redirect('Login');
        }
    }

    public function index()
    {
        $data['datas'] = $this->M_users->get_session();
        $data['tb_users'] = $this->M_users->get_users();
        $data['Content'] = 'page/users/Users';
        $this->load->view('Dinamis/Layout', $data);
    }

    public function tambah()
    {
        $data['datas'] = $this->M_users->get_session();
        $data['Content'] = 'page/users/Tambah';
        $this->load->view('Dinamis/Layout', $data);
    }

    public function foto($userid = null)
    {
        $cek = $this->M_users->get_usersid($userid);
        if ($cek[0]->userid == '') {
            redirect('Users');
        } else {
            $data['datas'] = $this->M_users->get_session();
            $data['data_users'] = $this->M_users->get_usersid($userid);
            $data['Content'] = 'page/users/foto';
            $this->load->view('Dinamis/Layout', $data);
        }
    }

    public function ubah($userid = null)
    {
        $cek = $this->M_users->get_usersid($userid);
        if ($cek[0]->userid == '') {
            redirect('Users');
        } else {
            $data['datas'] = $this->M_users->get_session();
            $data['data_users'] = $this->M_users->get_usersid($userid);
            $data['Content'] = 'page/users/ubah';
            $this->load->view('Dinamis/Layout', $data);
        }
    }

    public function aksi_tambah()
    {
        if (isset($_POST['tambah'])) {
            $username = htmlentities(strip_tags(trim($_POST["username"])));
            $nama = htmlentities(strip_tags(trim($_POST["nama"])));
            $userpass = htmlentities(strip_tags(trim($_POST["userpass"])));
            $userpass2 = htmlentities(strip_tags(trim($_POST["userpass2"])));
            $alamat = htmlentities(strip_tags(trim($_POST["alamat"])));
            $usertelp = htmlentities(strip_tags(trim($_POST["usertelp"])));
            $level = htmlentities(strip_tags(trim($_POST["level"])));
            $pesan_error = "";
            $pesan_error_user = "";
            $pesan_error_pass = "";

            $query_username = $this->M_users->cek_username($username);
            $result_username = $query_username->num_rows();
            // jika username ada yg sama
            if ($result_username > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username sudah ada!</div>');
                redirect('Users');
            }

            // jika pass tidak sama
            if ($userpass !== $userpass2) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Tidak Sama!</div>');
                redirect('Users');
            }

            // jika tidak ada error
            if ($pesan_error_user == "" && $pesan_error_pass == "") {
                // enkripsi password
                $password = password_hash($userpass, PASSWORD_DEFAULT);
                $query = $this->M_users->insert_users($username, $password, $nama, $alamat, $usertelp, $level);
                if (!$query) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan!</div>');
                    redirect('Users/');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Disimpan!</div>');
                    redirect('Users/');
                }

                // jika error menampilkan pesan error
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Disimpan!</div>');
                redirect('Users/');
            }
        } else {
            $username = "";
            $nama = "";
            $userpass = "";
            $userpass2 = "";
            $alamat = "";
            $usertelp = "";
            $pesan_error_user = "";
            $pesan_error_pass = "";
        }
    }

    public function aksi_foto()
    {
        if (isset($_POST['simpan'])) {
            $id = $_POST['id'];
            $pesan_error = "";

            // jika kedua inputan kosong
            if ($_POST['foto'] == "" && $_FILES['userfoto']['name'] == "") {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silahkan pilih salah satu!</div>');

                // jika upload biasa / file upload biasa diinput
            } elseif ($_FILES['userfoto']['name'] !== "") {
                $namaFile = $_FILES["userfoto"]["name"];
                $ukuran = $_FILES["userfoto"]["size"];
                $error = $_FILES["userfoto"]["error"];
                $tmp = $_FILES["userfoto"]["tmp_name"];
                // belum upload gambar
                if ($error === 4) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silahkan pilih salah satu!</div>');
                }

                $gambarvalid = ["jpg", "jpeg", "png"];
                $ekstensigambar = explode('.', $namaFile);
                $ekstensigambar = strtolower(end($ekstensigambar));

                // mengecek apakah ekstensi valid
                if (!in_array($ekstensigambar, $gambarvalid)) {
                    $pesan_error = "Yang anda upload bukan gambar";
                }

                // max 2mb
                if ($ukuran > 2000000) {
                    $pesan_error = "Ukuran gambar terlalu besar";
                }

                $namafoto = uniqid();
                $namafoto .= '.';
                $namafoto .= $ekstensigambar;

                // jika tidak ada error
                if ($pesan_error == "") {
                    $target_gambars = './assets/fotouser/';
                    move_uploaded_file($tmp, $target_gambars . $namafoto);
                }
            }

            if ($pesan_error == "") {
                // cek foto 
                // jika foto didalam database tidak kosong
                $query = $this->M_users->get_idus($id);
                $row = $query->result();
                // jika ada foto lama maka foto yg lama diganti/dihapus dengan foto yg baru
                if ($row[0]->userfoto != NULL || $row[0]->userfoto != "") {
                    $target_gambar = './assets/fotouser/' . $row[0]->userfoto;
                    unlink($target_gambar);
                }

                // simpan nama foto di db
                $namaOwner = $row[0]->username;
                $this->M_users->upload_gambar($namafoto, $id);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $namaOwner . ' Berhasil Upload gambar!</div>');
                redirect('users');
            }
        } else {
            $this->session->set_flashdata('message', '');
        }
    }

    public function aksi_ubah()
    {
        // mengambil nilai id dar url
        $id = $_POST['userid'];

        // mengambil data dari tb_user berdasarkan id
        $result = $this->M_users->get_idus($id);
        $row = $result->result();

        $username = $row[0]->username;
        $nama = $row[0]->nama;
        $alamat = $row[0]->alamat;
        $usertelp = $row[0]->usertelp;

        // jika tombol ubah ditekan
        if (isset($_POST['ubah'])) {
            $username = htmlentities(strip_tags(trim($_POST["username"])));
            $nama = htmlentities(strip_tags(trim($_POST["nama"])));
            $userpass = htmlentities(strip_tags(trim($_POST["userpass"])));
            $userpass2 = htmlentities(strip_tags(trim($_POST["userpass2"])));
            $alamat = htmlentities(strip_tags(trim($_POST["alamat"])));
            $usertelp = htmlentities(strip_tags(trim($_POST["usertelp"])));
            $level = htmlentities(strip_tags(trim($_POST["level"])));
            $pesan_error = "";
            $pesan_error_user = "";
            $pesan_error_pass = "";

            // jika username namanya sama
            if ($row['username'] !== $username) {
                $query_username = $this->M_users->cek_username($username);
                $result_username = $query_username->num_rows();
                // cek apakah username ada
                if ($result_username > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username ' . $username . ' sudah digunakan</div>');
                }
            }

            // jika password diisi
            if ($userpass !== "") {
                // jika password tidak sama
                if ($userpass !== $userpass2) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Tidak Sama</div>');
                    redirect('Users');
                }
            }

            // jika tidak ada pesan error
            if ($pesan_error_user == "" && $pesan_error_pass == "") {
                // jika password diinput, maka password diupdate
                if ($userpass !== "") {
                    $password = password_hash($userpass, PASSWORD_DEFAULT);
                    $query = $this->M_users->update_userspas($username, $password, $nama, $alamat, $usertelp, $level, $id);
                    // jika tidak password tidak diupdate
                } else {
                    $query = $this->M_users->update_usersnonpas($username, $nama, $alamat, $usertelp, $level, $id);
                }
                // cek keberhasilan
                if (!$query) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Berhasil Di Ubah!</div>');
                    redirect('Users');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data User Gagal Di Ubah!</div>');
                    redirect('Users');
                }
                // jika ada pesan error
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data User Gagal Di Ubah!</div>');
                redirect('Users');
            }
        } else {
            // value pass
            $userpass = "";
            $userpass2 = "";
            // pesan error
            $pesan_error_user = "";
            $pesan_error_pass = "";
        }
    }

    public function aksi_hapus($userid)
    {
        // ambil data &id= dari url
        $id = $userid;
        // mengambil data dari tb_user berdasarkan id
        $query = $this->M_users->get_idus($id);
        $row = $query->result();
        $username = $row[0]->nama;

        // menghapus foto profile jika ada
        if ($row[0]->userfoto != NULL || $row[0]->userfoto != "") {
            $target_gambar = './assets/fotouser/' . $row[0]->userfoto;
            unlink($target_gambar);
        }
        // menghapus data user
        $result = $this->M_users->delete_users($id);

        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $username . ' Berhasil Di Hapus!</div>');
            redirect('users');
        }
    }
}
