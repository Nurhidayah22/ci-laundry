<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('userid') == null) {
			redirect('Login');
		}
	}

	public function index()
	{
		$data['datas'] = $this->db->query("SELECT * FROM tb_users WHERE userid = " . $this->session->userdata('userid') . "")->result();
		$data['Content'] = 'Welcome';
		$this->load->view('Dinamis/Layout', $data);
	}
}
