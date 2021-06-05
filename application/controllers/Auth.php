<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		$this->load->model('admin_model');
		$this->load->model('auth_model');
	}

	public function index()
	{
	
		$data['title'] = 'Registrasi - Pencatatan Uang Kas';
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Kolom nama wajib diisi!'
			]);
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'required' => 'Kolom email wajib diisi!',
			'valid_email' => 'Email yang anda masukkan tidak valid, masukkan email yang valid!',
			'is_unique' => 'Email yang anda masukkan sudah digunakan!'
			
			]);
			$this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[3]|matches[password2]', [
				'matches' => 'Password tidak cocok!',
				'min_length' => 'Password terlalu pendek!',
				'required' => 'Kolom password harus diisi!'
				]);
				$this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]', [
					'required' => 'Kolom password harus diisi!'
					]);
					
					if ($this->form_validation->run($this) == false) {
						$this->load->view("admin/_partials/head", $data);
						$this->load->view("admin/_partials/regis_page", $data);
						$this->load->view("admin/_partials/js");
		}

		$email = $this->input->post('email');
		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		// jika userdata email diisi maka lakukan yg ada di kurung kurawal. pengisian userdata ada pada line 136. disini pengisian userdata nya 2 yaitu email dan role_id.
		if ($this->session->userdata('email')) {
			//jika userdata role_id == 1 maka redirect ke bendahara dan seterusnya
			if ($this->session->userdata('role_id') == 1) {
				redirect('bendahara');
			} elseif ($this->session->userdata('role_id') == 2) {
				redirect('walikelas');
			} elseif ($this->session->userdata('role_id') == 4) {
				redirect('admin');
			} else {
				redirect('user');
			}
		}
		
		elseif($this->form_validation->run() == true) 
		{
			$email = $this->input->post('email', true);
			$data = [
				'nama' => htmlspecialchars ($this->input->post('nama',true)),
				'email' => htmlspecialchars ($email),
				'image' => 'default.jpg',
				'password' =>  password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 3,
				'is_active' => 0,
				'data_created' => time()
			];

			// siapkan token
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				// 'tanggal_dibuat' => time()
			];

			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);

			$this->_kirimEmail($token, 'aktivasi');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Selamat! Akun anda telah dibuat. Silakan cek email anda dan lakukan aktivasi sebelum masuk/login! </div>');
			redirect('auth/login');
			
		}
	}
	
	private function _kirimEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'uangkasshalma@gmail.com',
			'smtp_pass' => 'Hatake99',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('uangkasshalma@gmail.com', 'Sistem Pencatatan Uang Kas Kelas');
		$this->email->to($this->input->post('email'));

		if($type == 'aktivasi')
		{
			$this->email->subject('Aktivasi Akun Sistem Pencatatan Uang Kas');
			$this->email->message('Klik link ini untuk mengaktifkan akun anda : <a href="'. base_url() . 'auth/aktivasi?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> AKTIVASI </a>.');
		}
		
		elseif($type == 'lupa')
		{
			$this->email->subject('Atur Ulang Kata Sandi');
			$this->email->message('Klik link ini untuk mengatur ulang kata sandi anda : <a href="'. base_url() . 'auth/aturulang?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> ATUR ULANG KATA SANDI </a>.');			
		}

		if($this->email->send())
		{
			return true;
		}

		else
		{
			echo $this->email->print_debugger();
			die;
		}

	}

	public function aktivasi()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if($user)
		{
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if($user_token)
			{
					$this->db->set('is_active', 1);
					//$this->db->set('email', $email);
					$this->db->update('user');

					//$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('gagalaktivasi', '<div class="alert alert-success" role="alert"> '. $email .' sudah berhasil diaktivasi! </div>');
					redirect('auth/login');
				

			}
			else
			{
				$this->session->set_flashdata('gagalaktivasi', '<div class="alert alert-danger" role="alert"> Aktivasi akun anda gagal! Token tidak valid! </div>');
				redirect('auth');		
			}
		}
		else
		{
			$this->session->set_flashdata('gagalaktivasi', '<div class="alert alert-danger" role="alert"> Aktivasi akun anda gagal! Email tidak terdaftar! </div>');
			redirect('auth');		
		}
	}
	
	public function login()
	{
		$data['title'] = 'Masuk - Pencatatan Uang Kas';
		$this->form_validation->set_rules('email','Email','trim|required|valid_email',[
			'required' => 'Kolom email wajib diisi!',
			'valid_email' => 'Email yang anda masukkan tidak valid, masukkan email yang valid!'
			]);
			
			$this->form_validation->set_rules('password','Password','trim|required',[
				'required' => 'Kata Sandi wajib diisi!',
				'matches' => 'Password tidak cocok!'
		]);

		$email = $this->input->post('email');
		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		// jika userdata email diisi maka lakukan yg ada di kurung kurawal. pengisian userdata ada pada line 136. disini pengisian userdata nya 2 yaitu email dan role_id.
		if ($this->session->userdata('email')) {
			//jika userdata role_id == 1 maka redirect ke bendahara dan seterusnya
			if ($this->session->userdata('role_id') == 1) {
				redirect('bendahara');
			} elseif ($this->session->userdata('role_id') == 2) {
				redirect('walikelas');
			} elseif ($this->session->userdata('role_id') == 4) {
				redirect('admin');
			} else {
				redirect('user');
			}
		}
			
			if ($this->form_validation->run() == false){

				$this->load->view("login",$data);
			}
			else{
			//validasi sukses
			$this->_login();
		}
	}
	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		$user = $this->db->get_where('user',['email' => $email ])->row_array();
		//select * from table user where email = $email
		
			//usernya ada
			if($user)
			{
				if($user ['is_active'] == 1)
				{
					//cek password, 
					if(password_verify($password,$user['password']))
					{
						//jika password benar maka buat variabel $data yg bertipe data array yang nantinya akan diset kan ke userdata 
						$data = [
							'email' => $user['email'],
							'nama' => $user['nama'],
							'role_id' => $user['role_id']
						];

						//pengisian userdata dengan variabel $data di line 130
						$this->session->set_userdata($data);
						if($user['role_id'] == 1)
						{
							redirect('bendahara');
						}
						if ($user['role_id'] == 2)
						{
							redirect('walikelas');
						}
						if($user['role_id'] == 4)
						{
							redirect('admin');
						}
						if($user['role_id'] == 3) 
						{
							redirect('user');
						}
					}
					else
					{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password yang anda masukkan salah! </div>');
					redirect('auth/login');		
					}
				}
				else
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email anda belum diaktivasi! </div>');
					redirect('auth/login');				
				}
			}
		
		else
		{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email anda belum terdaftar </div>');
			redirect('auth/login');

		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		
		$data['title'] = 'Logout - Pencatatan Uang Kas';
		$this->load->view("logout",$data);
	}

	public function blocked()
	{
		$this->load->view('blocked');
	}

	public function lupasandi()
	{
		$this->form_validation->set_rules('email','email','trim|required|valid_email', [
			'required' => 'Kolom email wajib diisi!',
			'valid_email' => 'Email yang anda masukkan tidak valid, masukkan email yang valid!'
		]);

		if($this->form_validation->run() == false)
		{
			$data['title'] = 'Lupa Kata Sandi';
			$this->load->view('lupasandi', $data);
		}

		else
		{
			$email = $this->input->post('email');
			$user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

			if($user)
			{
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token
				];

				$this->db->insert('user_token', $user_token);
				$this->_kirimEmail($token, 'lupa');
				
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Periksa email anda untuk mengatur ulang password anda!</div>');
				redirect('auth/lupasandi');

			}

			else
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email anda belum terdaftar atau belum aktif</div>');
				redirect('auth/lupasandi');
			}
		}
	}
	
	public function aturulang()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		
		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		
		if($user)
		{
			$user_token = $this->db->get_where('user_token', ['token' => $token ])->row_array();
			if($user_token)
			{
				$this->session->set_flashdata('reset_email', $email);

				$this->ubahsandi();
			}

			else
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Gagal mengatur ulang kata sandi, token tidak valid!</div>');
				redirect('auth/login');
			}
		}
		
		else
		{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Gagal mengatur ulang kata sandi, email tidak terdaftar!</div>');
			redirect('auth/login');
		}
	}
	
	public function ubahsandi()
	{
		if(!$this->session->userdata('reset_email'))
		{
			redirect('auth');
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Anda tidak dapat mengubah kata sandi anda!</div>');
			redirect('auth/login');
		}
		$this->form_validation->set_rules('password1', 'password', 'trim|required|min_length[3]|matches[password2]', [
			'matches' => 'Password tidak cocok!',
			'min_length' => 'Password terlalu pendek!',
			'required' => 'Kolom password baru harus diisi!'
		]);

		$this->form_validation->set_rules('password2', 'password', 'trim|required|min_length[3]|matches[password1]', [
			'matches' => 'Password tidak cocok!',
			'min_length' => 'Password terlalu pendek!',
			'required' => 'Kolom password baru harus diisi!'
			]);

			if($this->form_validation->run() == false)
			{
				$data['title'] = 'Ubah Kata Sandi';
			$this->load->view('ubahsandi', $data);
		}
		
		else
		{
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');
			
			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');
			
			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Kata Sandi berhasil diatur ulang, silakan masuk!</div>');
			redirect('auth/login');
		}
		
	}

	
}
