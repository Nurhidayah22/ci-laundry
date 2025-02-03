<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_profile');
        if ($this->session->userdata('userid') == null) {
            redirect('Login');
        }
    }

    public function index()
    {
        redirect('Profile/Profile/' . $this->session->userdata('userid'));
    }

    public function Profile()
    {
        $data['datas'] = $this->M_profile->get_session();
        $data['Content'] = 'page/profile/Profile';
        $this->load->view('Dinamis/Layout', $data);
    }

    public function Foto($id)
    {
        $data['datas'] = $this->M_profile->get_session();
        $data['data'] = $this->M_profile->get_users($id);
        $data['Content'] = 'page/profile/Foto';
        $this->load->view('Dinamis/Layout', $data);
    }

    public function aksi_tambah()
    {
        // mengambil nilai id dar url
        $id = $_POST['userid'];

        // mengambil data dari tb_user berdasarkan id
        $result = $this->M_profile->get_users($id);
        $row = $result;

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
            $pesan_error = "";
            $pesan_error_user = "";
            $pesan_error_pass = "";

            // jika username namanya sama
            if ($row['username'] !== $username) {
                $query_username = $this->M_profile->get_username($username);
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
                    redirect('Profile/Profile/' . $this->session->userdata('userid'));
                }
            }

            // jika tidak ada pesan error
            if ($pesan_error_user == "" && $pesan_error_pass == "") {
                // jika password diinput, maka password diupdate
                if ($userpass !== "") {
                    $password = password_hash($userpass, PASSWORD_DEFAULT);
                    $query = $this->M_profile->update_users_incpw($username, $password, $nama, $alamat, $usertelp, $id);
                    // jika tidak password tidak diupdate
                } else {
                    $query = $this->M_profile->update_users_noincpw($username, $nama, $alamat, $usertelp, $id);
                }
                // cek keberhasilan
                if ($query) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Berhasil Di Ubah!</div>');
                    redirect('Profile/Profile/' . $this->session->userdata('userid'));
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data User Gagal Di Ubah!</div>');
                    redirect('Profile/Profile/' . $this->session->userdata('userid'));
                }
                // jika ada pesan error
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data User Gagal Di Ubah!</div>');
                redirect('Profile/Profile/' . $this->session->userdata('userid'));
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

    public function aksi_foto()
    {
        if (isset($_POST['simpan'])) {
            $id = $_POST['id'];
            $pesan_error = "";

            // jika kedua inputan kosong
            if ($_POST['foto'] == "" && $_FILES['userfoto']['name'] == "") {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silahkan pilih salah satu!</div>');

                // jika upload melalui oncam
            } else if ($_POST['foto'] !== "") {
                $img = $_POST['foto'];
                $target_gambars = './assets/fotouser/';
                $folderPenyimpanan = $target_gambars;
                $image_parts = explode(";base64,", $img);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];

                $image_base64 = base64_decode($image_parts[1]);

                // memberikan nama unik pada gambar
                $namafoto = uniqid() . '.png';

                $file = $folderPenyimpanan . $namafoto;

                // pindah foto ke folder fotouser/
                file_put_contents($file, $image_base64);

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
                $query = $this->M_profile->get_users($id);
                $row = $query;
                // jika ada foto lama maka foto yg lama diganti/dihapus dengan foto yg baru
                if ($row[0]->userfoto != NULL || $row[0]->userfoto != " ") {
                    $target_gambar = './assets/fotouser/' . $row[0]->userfoto;
                    unlink($target_gambar);
                }

                // simpan nama foto di db
                $namaOwner = $row[0]->username;
                $this->M_profile->upload_gambar($namafoto, $id);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $namaOwner . ' Berhasil Upload gambar!</div>');
                redirect('Profile/Profile/' . $this->session->userdata('userid'));
            }
        } else {
            $this->session->set_flashdata('message', '');
        }
    }
}
