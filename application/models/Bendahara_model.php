<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bendahara_model extends CI_Model
{
    public function tambahpengeluaran()
    {
        $data = [
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
            'jumlah' => $this->input->post('jumlah')
        ];
        
        $this->db->insert('keluar', $data);
    }
    
    public function ubahpengeluaran()
    {
        $datakeluar = [
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
            'jumlah' => $this->input->post('jumlah')
        ];
    
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('keluar', $datakeluar);
    }
    
    
    public function ambildatapengeluaran($id)
    {
        return $this->db->get_where('keluar', ['id' => $id])->row_array();
    }
    
    public function tambahpemasukkan()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'bulan' => $this->input->post('bulan'),
            'minggu' => $this->input->post('minggu'),
            'jumlah' => $this->input->post('jumlah'),
            'tahun' => time()
        ];

       $this->db->insert('masuk', $data);
    }

    public function hapuspengeluaran($id)
    {
        return $this->db->delete('keluar', array("id"=>$id));
    }
       
    public function hapusmasuk($id)
    {
        return $this->db->delete('masuk', array("id"=>$id));
    }
        
    public function ambildatapemasukkan($id)
    {
        return $this->db->get_where('masuk', ['id' => $id])->row_array();
    } 
        
    public function ubahpemasukkan()
    {
    $datamasuk = [
        'nama' => $this->input->post('nama'),
        'bulan' => $this->input->post('bulan'),
        'minggu' => $this->input->post('minggu'),
        'jumlah' => $this->input->post('jumlah')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('masuk', $datamasuk);
    }

    public function editprofil()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $nama = $this->input->post('nama');
        $email = $this->input->post('email');

        //cek jika ada gambar yang dapat di upload
        $upload_gambar = $_FILES['image']['name'];
        if ($upload_gambar) 
        {  
            $config['upload_path'] = './assets/images/profil';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) 
            {
                $gambar_lama = $data['user']['image'];

                if ($gambar_lama != 'default.jpg') 
                {
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

    public function ubahsandi()
    {
        //password sudah benar
        $password_baru = $this->input->post('passwordbaru1');
        $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
        $this->db->set('password', $password_hash);
        $this->db->where('email', $this->session->userdata('email'));
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

