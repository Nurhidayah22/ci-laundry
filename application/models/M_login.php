<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{
    public function get_user($username)
    {
        return $this->db->query("SELECT * FROM tb_users WHERE username = '$username'");
    }
}
