<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Walikelas_model extends CI_Model
{
    public function editprofil()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');

        $upload_gambar = $_FILES['image']['name'];
        if ($upload_gambar) 
        {
            $config['upload_path'] = './assets/images/profil';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            //$config['max_size']     = '50000000000000';

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) 
            {
                $gambar_lama = $data['user']['image'];

                if ($gambar_lama != 'default.jpg') {
                    unlink(FCPATH . 'assets/images/profil/' . $gambar_lama);
                }

                $new_image = $this->upload->data('file_name');

                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('user', ['image' => $new_image]);
            } 
            
            else 
            {
                echo $this->upload->display_errors();
            }
        }
            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

    }

    public function jumlahpemasukkan()
    {
        $this->db->select_sum('jumlah');
        $totalpemasukkan = $this->db->get('masuk');

        return $totalpemasukkan->row()->jumlah;
    }

    public function jumlahpengeluaran()
    {
        $this->db->select_sum('jumlah');
        $totalpengeluaran = $this->db->get('keluar');

        return $totalpengeluaran->row()->jumlah;
    }
}