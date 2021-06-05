<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function ubahsandi()
    {
        $data['title'] = 'Ubah Kata Sandi';
        $this->load->view('ubahsandi');
    }
}
