<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        sudah_login();

        $this->load->model('user_model');
    }

    public function index()
    {
        $data['title'] = 'Siswa - Home';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['totalpemasukkan'] = $this->user_model->jumlahpemasukkan();
        $data['totalpengeluaran'] = $this->user_model->jumlahpengeluaran();
        $data['pembayaransiswa'] = $this->user_model->pembayaransiswa();

        $data['saldo'] = $data['totalpemasukkan'] - $data['totalpengeluaran'];

        $this->load->view('profil-s',$data);
    }

    public function laporan()
    {
        $data['title'] = 'Siswa - Laporan Pengeluaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['keluar'] = $this->db->get('keluar')->result_array();
        $this->load->view('laporan-s', $data);
    }

    public function pembayaran()
    {
        $data['title'] = 'Siswa - Pembayaran Kas Anda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['masuk'] = $this->db->get_where('masuk', ['nama' => $this->session->userdata('nama')])->result_array();
        $this->load->view('tagihan-s', $data);
    }

    public function editprofil()
    {
        $data['title'] = 'Siswa - Edit Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => 'Kolom role wajib diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('edit-profil-s', $data);
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            //cek jika ada gambar yang dapat di upload
            $upload_gambar = $_FILES['image']['name']; //ini asalnya  $_FILES['image']['nama']; diganti jadi $_FILES['image']['name']; karena emang harusnya gitu wkwk
            if ($upload_gambar) {
                $config['upload_path'] = './assets/images/profil'; //disini kurang slash kamu malah '.assets/images/profil'
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                //$config['max_size']     = '50000000000000';

                $this->load->library('upload');     // nah di baris 224 sama 225 teh sama aja kaya $this->load->library('upload', $config); 
                $this->upload->initialize($config); // tapi pake itu teh gabisa gatau kenapa, jadinya dipisah, jadinya meload dulu library di line 224, terus inisialisasi konfigurasi di line 225

                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $data['user']['image'];

                    if ($gambar_lama != 'default.jpg') {
                    unlink(FCPATH.'assets/images/profil/'.$gambar_lama);
                    }

                    $new_image = $this->upload->data('file_name');


                    $this->db->where('email', $this->session->userdata('email')); // nah line 238-239 sama kaya query UPDATE user SET 'image'=$new_image where 'email'=$userdata('email')
                    $this->db->update('user', ['image' => $new_image]);

                    
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('update', '<div class="alert alert-success" role="alert">Profil berhasil diedit! </div>');
            redirect('user');
        }
    }

    public function ubahsandi()
    {
        $data['title'] = 'Siswa - Ubah Kata Sandi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('passwordlama', 'Password Lama', 'required|trim', [
            'required' => 'Kata Sandi Lama harus diisi!'
        ]);
        $this->form_validation->set_rules('passwordbaru1', 'Password Baru', 'required|trim|min_length[3]|matches[passwordbaru2]', [
            'required' => 'Kata Sandi Baru harus diisi!',
            'matches' => 'Kata Sandi tidak cocok!',
            'min_length' => 'Kata Sandi terlalu pendek!'

        ]);

        $this->form_validation->set_rules('passwordbaru2', 'Password Baru', 'required|trim|min_length[3]|matches[passwordbaru2]', [
            'required' => 'Konfirmasi Kata Sandi harus diisi!',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('sandi-s', $data);
        } else {

            $password_lama = $this->input->post('passwordlama');
            $password_baru = $this->input->post('passwordbaru1');
            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('sandi', '<div class="alert alert-danger" role="alert">Password Lama yang anda masukkan salah! </div>');
                redirect('admin/ubahsandi');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('sandi', '<div class="alert alert-danger" role="alert">Password Baru tidak boleh sama dengan Password Lama! </div>');
                    redirect('admin/ubahsandi');
                } else {
                    //password sudah benar
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('sandi', '<div class="alert alert-success" role="alert">Password telah diubah! </div>');
                    redirect('user');
                }
            }
        }
    }
}

