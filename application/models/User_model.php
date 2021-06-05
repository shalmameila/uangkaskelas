<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
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
    
    public function pembayaransiswa()
    {
        $this->db->select_sum('jumlah');
        $pembayaransiswa = $this->db->get_where('masuk', ['nama' => $this->session->userdata('nama')]);

        return $pembayaransiswa->row()->jumlah;
    }
}