<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_profile extends CI_Model
{
    public function get_session()
    {
        return $this->db->query("SELECT * FROM tb_users WHERE userid = " . $this->session->userdata('userid') . "")->result();
    }

    public function get_users($id)
    {
        return $this->db->query("SELECT * FROM tb_users WHERE userid = " . $id . "")->result();
    }

    public function get_username($username)
    {
        return $this->db->query("SELECT * FROM tb_users WHERE username = '$username'");
    }

    public function update_users_incpw($username, $password, $nama, $jk, $alamat, $usertelp, $id)
    {
        return  $this->db->query("UPDATE `tb_users` SET
              `username` = '$username',
              `userpass` = '$password',
              `nama` = '$nama',
              `alamat` = '$alamat',
              `usertelp` = '$usertelp'
              WHERE `tb_users`.`userid` = $id
              ");
    }

    public function update_users_noincpw($username, $nama, $jk, $alamat, $usertelp, $id)
    {
        return $this->db->query("UPDATE `tb_users` SET
              `username` = '$username',
              `nama` = '$nama',
              `alamat` = '$alamat',
              `usertelp` = '$usertelp'
              WHERE `tb_users`.`userid` = $id
              ");
    }

    public function upload_gambar($namafoto, $id)
    {
        return $this->db->query("UPDATE tb_users SET userfoto = '$namafoto' WHERE userid = $id");
    }
}
