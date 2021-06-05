<?php

$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
$this->form_validation->set_rules('email', 'Email', 'requied|trim|valid_email');

if ($this->form_validation->run() == false) {
    $this->load->view("admin/_partials/head");
    $this->load->view("admin/_partials/regis_page");
    $this->load->view("admin/_partials/js");
    echo 'GAGAL SIATEH';
} else {
    echo 'data berhasil ditambahkan';
}
