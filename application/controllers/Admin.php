<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    sudah_login();

    $this->load->model('admin_model');

  }

    public function index()
    {
      $data['title'] = 'Admin - Home';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $this->load->view('profil-a', $data);
    }
  
    public function menu()
    {
      $data['title'] = 'Admin - Menu Management';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $data['menu'] = $this->db->get('user_menu')->result_array(); //manggil data dr table user_menu
      
      $this->form_validation->set_rules('menu', 'Menu', 'required',[
            'required' => 'Kolom menu wajib diisi!'
      ]);

      if ($this->form_validation->run() == false)
      {
        $this->load->view('admin/menu-mng',$data);
      }
       
      else
      {
        $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu baru berhasil ditambahkan </div>');
        redirect('admin/menu');	
      }
      
    }
    
    public function submenu()
    {
      $data['title'] = 'Admin - Sub Menu Management';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->model('Menu_model','menu');
       
      $data['submenu'] = $this->menu->getsubmenu();
      $data['menu'] = $this->db->get('user_menu')->result_array();

      $this->form_validation->set_rules('title', 'title', 'required', [
        'required' => 'Kolom sub menu wajib diisi!']);
      $this->form_validation->set_rules('menu_id', 'menu', 'required', [
        'required' => 'Kolom menu wajib diisi!']);
      $this->form_validation->set_rules('url', 'url', 'required', [
        'required' => 'Kolom url wajib diisi!']);
      $this->form_validation->set_rules('icon', 'icon', 'required', [
        'required' => 'Kolom ikon wajib diisi!']);

        if($this->form_validation->run() == false){
          $this->load->view('admin/submenu-mng',$data);
        }
        else
        {
          $data = [
            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
          ];
          $this->db->insert('user_sub_menu', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub menu baru berhasil ditambahkan </div>');

          redirect('admin/submenu');
        }
    }

    public function role()
    {
      $data['title'] = 'Admin - Role';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $data['role'] = $this->db->get('user_role')->result_array();

      $this->form_validation->set_rules('role', 'Role', 'required', [
        'required' => 'Kolom role wajib diisi!']);

      if ($this->form_validation->run() == false) {
        $this->load->view('admin/role-mng', $data);
        
      } 
      
      else 
      {
        $this->db->insert('user_role', ['role' => $this->input->post('role')]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role baru berhasil ditambahkan </div>');
        redirect('admin/role');
      }
    }

    public function roleakses($role_id)
    {
      $data['title'] = 'Admin - Role';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

      $this->db->where('id !=', 4);
      $data['menu'] = $this->db->get('user_menu')->result_array();

      $this->load->view('admin/role-akses', $data);

    }

    public function ubahakses()
    {
      $menu_id = $this->input->post('menuId');
      $role_id = $this->input->post('roleId');

      $data = [
        'role_id' => $role_id,
        'menu_id' => $menu_id
      ];

      $result = $this->db->get_where('user_access_menu', $data); //select * from user_access_menu where $data

      if($result->num_rows() < 1) //jika result tidak ada isinya atau lebih kecil dari satu
      {
        $this->db->insert('user_access_menu', $data); //bikin datanya jadi ada
      }

      else //kalau ada
      {
        $this->db->delete('user_access_menu', $data); //hapus hahahaha
      }

      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Akses telah diubah! </div>');

    }

    public function hapusmenu($id = null)
    {
      if(!isset($id))
      {
        show_404();
      }
      
      if(isset($id))
      {
		    //$this->db->delete('user_menu', array("id"=>$id));
	    	echo $this->admin_model->hapusmenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil dihapus </div>');
        redirect('admin');
        //echo var_dump($this->db->error());
      }

    }

    public function hapussubmenu($id = null)
    {
      if (!isset($id)) 
      {
        show_404();
      }

      if (isset($id))
      {
        echo $this->admin_model->hapussubmenu($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub menu berhasil dihapus </div>');
        redirect('admin/submenu');
      }

    }
    
    public function hapusrole($id = null)
    {
      if (!isset($id)) 
      {
        show_404();
      }

      if (isset($id))
      {
      echo $this->admin_model->hapusrole($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role berhasil dihapus </div>');
        redirect('admin/role');
      }

    }

    public function editprofil()
    {
      $data['title'] = 'Admin - Edit Profil';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->form_validation->set_rules('nama','Nama Lengkap','required|trim', [
        'required' => 'Kolom role wajib diisi!']);

      if($this->form_validation->run() == false)
      {
        $this->load->view('edit-profil-a', $data);
      }

      else
      {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');

        //cek jika ada gambar yang dapat di upload
        $upload_gambar = $_FILES['image']['name']; //ini asalnya  $_FILES['image']['nama']; diganti jadi $_FILES['image']['name']; karena emang harusnya gitu wkwk
        if($upload_gambar)
        {
          $config['upload_path'] = './assets/images/profil'; //disini kurang slash kamu malah '.assets/images/profil'
          $config['allowed_types'] = 'gif|jpg|png|jpeg';
          //$config['max_size']     = '50000000000000';

          $this->load->library('upload');     // nah di baris 224 sama 225 teh sama aja kaya $this->load->library('upload', $config); 
          $this->upload->initialize($config); // tapi pake itu teh gabisa gatau kenapa, jadinya dipisah, jadinya meload dulu library di line 224, terus inisialisasi konfigurasi di line 225

          if($this->upload->do_upload('image'))
          {
            $gambar_lama = $data['user']['image'];

            if ($gambar_lama != 'default.jpg') {
              unlink(FCPATH.'assets/images/profil/'.$gambar_lama);
            }

            $new_image = $this->upload->data('file_name');


            $this->db->where('email', $this->session->userdata('email')); // nah line 238-239 sama kaya query UPDATE user SET 'image'=$new_image where 'email'=$userdata('email')
            $this->db->update('user', ['image'=> $new_image]);            

          }
          
          else
          {
            echo $this->upload->display_errors();
          }

        }

        $this->db->set('nama', $nama);
        $this->db->where('email', $email);
        $this->db->update('user');

        $this->session->set_flashdata('update', '<div class="alert alert-success" role="alert">Profil berhasil diedit! </div>');
        redirect('admin');
      }

    }

    public function ubahsandi()
    {
      $data['title'] = 'Admin - Ubah Kata Sandi';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->form_validation->set_rules('passwordlama','Password Lama','required|trim',[
        'required' => 'Kata Sandi Lama harus diisi!'
        ]);
        $this->form_validation->set_rules('passwordbaru1','Password Baru','required|trim|min_length[3]|matches[passwordbaru2]', [
          'required' => 'Kata Sandi Baru harus diisi!',
          'matches' => 'Kata Sandi tidak cocok!',
				  'min_length' => 'Kata Sandi terlalu pendek!'

        ]);

        $this->form_validation->set_rules('passwordbaru2', 'Password Baru', 'required|trim|min_length[3]|matches[passwordbaru2]', [
          'required' => 'Konfirmasi Kata Sandi harus diisi!',
        ]);

      if($this->form_validation->run() == false )
      {
        $this->load->view('sandi-a', $data);
      }

      else{

        $password_lama = $this->input->post('passwordlama');
        $password_baru = $this->input->post('passwordbaru1');
        if(!password_verify($password_lama, $data['user']['password']))
        {
        $this->session->set_flashdata('sandi', '<div class="alert alert-danger" role="alert">Password Lama yang anda masukkan salah! </div>');
        redirect('admin');
      }
      
      else
      {
        if($password_lama == $password_baru)
        {
          $this->session->set_flashdata('sandi', '<div class="alert alert-danger" role="alert">Password Baru tidak boleh sama dengan Password Lama! </div>');
          redirect('admin/ubahsandi');
        }
        else
        {
          //password sudah benar
          $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
          $this->db->set('password', $password_hash);
          $this->db->where('email', $this->session->userdata('email'));
          $this->db->update('user');
          $this->session->set_flashdata('sandi', '<div class="alert alert-success" role="alert">Password telah diubah! </div>');
          redirect('admin/ubahsandi');
        }
      }
    }
  }
}
