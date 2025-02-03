<?php
$id = $this->session->userdata('userid');
$data = $this->db->query('SELECT * FROM tb_users WHERE userid="' . $id . '"')->result();
$uri = $this->uri->segment(1);
if ($data[0]->level == 'kasir') {
    if ($uri == 'Users') {
        redirect('Welcome');
    }
}
$this->load->view($Content);
