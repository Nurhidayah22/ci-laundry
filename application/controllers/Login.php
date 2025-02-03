<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}

	public function index()
	{
		$this->load->view('Login.php');
	}

	public function aksi_login()
	{
		if (isset($_POST['login'])) {
			$username = htmlentities(strip_tags(trim($_POST["username"])));;
			$pass = htmlentities(strip_tags(trim($_POST["password"])));
			$login = $this->M_login->get_user($username);
			$cekUser = $login->num_rows();
			if ($cekUser > 0) {
				$row = $login->result();
				if (password_verify($pass, $row[0]->userpass)) {
					$this->session->set_userdata('username', $row[0]->username);
					$this->session->set_userdata('nama', $row[0]->nama);
					$this->session->set_userdata('userid', $row[0]->userid);
					$this->session->set_userdata('level', $row[0]->level);
					$this->session->set_userdata('tgllogin', date('Y-m-d H:i:s'));
					$_SESSION['login'] = true;
					redirect('Welcome');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username / Password Salah!</div>');
					redirect('Login');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username / Password Salah!</div>');
				redirect('Login');
			}
		} else {
			$this->session->set_flashdata('message', '');
			redirect('Login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('tgllogin');
		session_destroy();
		redirect('Login');
	}
}
