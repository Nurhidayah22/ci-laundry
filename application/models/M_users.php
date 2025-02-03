<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_users extends CI_Model
{
    public function get_session()
    {
        return $this->db->query("SELECT * FROM tb_users WHERE userid = " . $this->session->userdata('userid') . "")->result();
    }

    public function get_users()
    {
        return $this->db->query('SELECT * FROM tb_users ORDER BY userid DESC')->result();
    }

    public function get_usersid($userid)
    {
        return $this->db->query("SELECT * FROM tb_users WHERE userid = " . $userid . "")->result();
    }

    public function cek_username($username)
    {
        return $this->db->query("SELECT * FROM tb_users WHERE username = '$username'");
    }

    public function insert_users($username, $password, $nama, $alamat, $usertelp, $level)
    {
        $this->db->query("INSERT INTO `tb_users`(`userid`, `username`, `userpass`, `nama`, `alamat`, `usertelp`, `level`) VALUES ('', '$username', '$password', '$nama', '$alamat', '$usertelp', '$level')");
    }

    public function get_idus($id)
    {
        return $this->db->query("SELECT * FROM tb_users WHERE userid = $id");
    }

    public function upload_gambar($namafoto, $id)
    {
        $this->db->query("UPDATE tb_users SET userfoto = '$namafoto' WHERE userid = $id");
    }

    public function update_userspas($username, $password, $nama, $alamat, $usertelp, $level, $id)
    {
        $this->db->query("UPDATE `tb_users` SET
        `username` = '$username',
        `userpass` = '$password',
        `nama` = '$nama',
        `alamat` = '$alamat',
        `usertelp` = '$usertelp',
        `level` = '$level'
        WHERE `tb_users`.`userid` = $id
        ");
    }

    public function update_usersnonpas($username, $nama, $alamat, $usertelp, $level, $id)
    {
        $this->db->query("UPDATE `tb_users` SET
      `username` = '$username',
      `nama` = '$nama',
      `alamat` = '$alamat',
      `usertelp` = '$usertelp',
      `level` = '$level'
      WHERE `tb_users`.`userid` = $id
      ");
    }

    public function delete_users($id)
    {
        return $this->db->query("DELETE FROM tb_users WHERE userid = $id");
    }
}
