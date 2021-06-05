<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bendahara extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    sudah_login();

    $this->load->model('bendahara_model');
  }

  public function index()
  {
    $data['title'] = 'Bendahara - Home';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['totalpemasukkan'] = $this->bendahara_model->jumlahpemasukkan();
    $data['totalpengeluaran'] = $this->bendahara_model->jumlahpengeluaran();

    $data['saldo'] = $data['totalpemasukkan'] - $data['totalpengeluaran'];
    
    $this->load->view('profil-b', $data);
    
  }

  public function pemasukkan()
  {
    $data['title'] = 'Bendahara - Pemasukkan';
    $data['user'] = $this->db->get_where('user', ['role_id' => '3'])->result_array();
    $data['masuk'] = $this->db->get('masuk')->result_array();
    $this->load->view('tagihan-b', $data);
  }

  public function tambahpemasukkan()
  {
    $data['title'] = 'Bendahara - Tambah Pemasukkan';
    $data['user'] = $this->db->get_where('user', ['role_id' => '3'])->result_array();
    $data['masuk'] = $this->db->get('masuk')->result_array();

    $this->form_validation->set_rules('nama', 'nama', 'required', [
      'required' => 'Kolom tanggal wajib diisi!'
    ]);
    $this->form_validation->set_rules('bulan', 'bulan', 'required', [
      'required' => 'Kolom bulan wajib diisi!'
    ]);
    $this->form_validation->set_rules('minggu', 'minggu', 'required', [
      'required' => 'Kolom minggu wajib diisi!'
    ]);
    $this->form_validation->set_rules('jumlah', 'jumlah', 'required', [
      'required' => 'Kolom jumlah wajib diisi!'
    ]);


    if ($this->form_validation->run() == false) {
      $this->load->view('tambahpemasukkan', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">GAGAL!!! </div>');
    } else {
      $this->bendahara_model->tambahpemasukkan();
      $this->session->set_flashdata('tambahpemasukkan', '<div class="alert alert-success" role="alert"> Data Pemasukkan berhasil ditambahkan! </div>');
      redirect('bendahara/pemasukkan');
    }
  }

  public function ubahpemasukkan($id = null)
  {
    $data['title'] = 'Bendahara - Ubah Pemasukkan';
    $data['user'] = $this->db->get_where('user', ['role_id' => '3'])->result_array();
    $data['masuk'] = $this->bendahara_model->ambildatapemasukkan($id);
    $data['bulan'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $data['minggu'] = ['1', '2', '3', '4', '5'];

    $this->form_validation->set_rules('nama', 'nama', 'required', [
      'required' => 'Kolom tanggal wajib diisi!'
    ]);
    $this->form_validation->set_rules('bulan', 'bulan', 'required', [
      'required' => 'Kolom bulan wajib diisi!'
    ]);
    $this->form_validation->set_rules('minggu', 'minggu', 'required', [
      'required' => 'Kolom minggu wajib diisi!'
    ]);
    $this->form_validation->set_rules('jumlah', 'jumlah', 'required', [
      'required' => 'Kolom jumlah wajib diisi!'
    ]);


    if ($this->form_validation->run() == false) {
      $this->load->view('ubahpemasukkan', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">GAGAL!!! </div>');
    } else {
      $this->bendahara_model->ubahpemasukkan();
      $this->session->set_flashdata('ubahpemasukkan', '<div class="alert alert-success" role="alert"> Data Pemasukkan berhasil diubah! </div>');
      redirect('bendahara/pemasukkan');
    }
  }

  public function hapusmasuk($id = null)
  {
    if (!isset($id)) {
      show_404();
    }

    if (isset($id)) {
      $this->bendahara_model->hapusmasuk($id);
      $this->session->set_flashdata('hapuspemasukkan', '<div class="alert alert-success" role="alert">Data Pemasukkan berhasil dihapus </div>');
      redirect('bendahara/pemasukkan');
    }
  }

  public function pengeluaran()
  {
    $data['title'] = 'Bendahara - Pengeluaran';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['keluar'] = $this->db->get('keluar')->result_array();

    $this->load->view('kelola-b', $data);
  }

  public function tambahpengeluaran()
  {
    $data['title'] = 'Bendahara - Tambah Pengeluaran';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['keluar'] = $this->db->get('keluar')->result_array();

    $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim', [
      'required' => 'Kolom tanggal wajib diisi!'
    ]);
    $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim', [
      'required' => 'Kolom keterangan wajib diisi!'
    ]);
    $this->form_validation->set_rules('jumlah', 'jumlah', 'required|numeric|trim', [
      'required' => 'Kolom jumlah wajib diisi!',
      'numeric' => 'Kolom jumlah harus berupa angka!'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('tambahpengeluaran', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">GAGAL!!! </div>');
    } else {
      $this->bendahara_model->tambahpengeluaran();
      $this->session->set_flashdata('tambahpengeluaran', '<div class="alert alert-success" role="alert"> Data Pengeluaran berhasil ditambahkan! </div>');
      redirect('bendahara/pengeluaran');
    }
  }

  public function ubahpengeluaran($id = null)
  {
    $data['title'] = 'Bendahara - Ubah Pengeluaran';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['keluar'] = $this->bendahara_model->ambildatapengeluaran($id);

    $this->form_validation->set_rules('tanggal', 'tanggal', 'required', [
      'required' => 'Kolom tanggal wajib diisi!'
    ]);
    $this->form_validation->set_rules('keterangan', 'keterangan', 'required', [
      'required' => 'Kolom keterangan wajib diisi!'
    ]);
    $this->form_validation->set_rules('jumlah', 'jumlah', 'required', [
      'required' => 'Kolom jumlah wajib diisi!'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('ubahpengeluaran', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">GAGAL!!! </div>');
    } else {
      $this->bendahara_model->ubahpengeluaran();
      $this->session->set_flashdata('ubahpengeluaran', '<div class="alert alert-success" role="alert"> Data Pengeluaran berhasil diubah! </div>');
      redirect('bendahara/pengeluaran');
    }
  }

  public function hapuspengeluaran($id = null)
  {

    if (!isset($id)) {
      show_404();
    }

    if (isset($id)) {
      echo $this->bendahara_model->hapuspengeluaran($id);
      $this->session->set_flashdata('hapuspengeluaran', '<div class="alert alert-success" role="alert">Data Pengeluaran berhasil dihapus </div>');
      redirect('bendahara/pengeluaran');
    }
  }

  public function editprofil()
  {
    $data['title'] = 'Bendahara - Edit Profil';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
      'required' => 'Kolom role wajib diisi!'
    ]);

    if ($this->form_validation->run() == false) 
    {
      $this->load->view('edit-profil-b', $data);
    } 
    
    else 
    {
      $this->bendahara_model->editprofil();
      $this->session->set_flashdata('update', '<div class="alert alert-success" role="alert">Profil berhasil diedit! </div>');
      redirect('bendahara');
    }
  }

  public function ubahsandi()
  {
    $data['title'] = 'Bendahara - Ubah Kata Sandi';
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

    if ($this->form_validation->run() == false) 
    {
      $this->load->view('sandi-b', $data);
    } 
    
    else 
    {
      $password_lama = $this->input->post('passwordlama');
      $password_baru = $this->input->post('passwordbaru1');
      if (!password_verify($password_lama, $data['user']['password'])) 
      {
        $this->session->set_flashdata('sandi', '<div class="alert alert-danger" role="alert">Kata Sandi Lama yang anda masukkan salah! </div>');
        redirect('bendahara/ubahsandi');
      } 
      
      else 
      {
        if ($password_lama == $password_baru) 
        {
          $this->session->set_flashdata('sandi', '<div class="alert alert-danger" role="alert">Kata Sandi Baru tidak boleh sama dengan Password Lama! </div>');
          redirect('bendahara');
        } 
        
        else 
        {
          $this->bendahara_model->ubahsandi();
          $this->session->set_flashdata('sandi', '<div class="alert alert-success" role="alert">Kata Sandi telah diubah! </div>');
          redirect('bendahara');
        }
      }
    }
  }
}
