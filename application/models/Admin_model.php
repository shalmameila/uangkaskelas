<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function hapusmenu($id)
    {
        return $this->db->delete('user_menu', array("id"=>$id));
    }
    
    public function hapussubmenu($id)
    {
        return $this->db->delete('user_sub_menu', array("id"=>$id));
    }
    
    public function hapusrole($id)
    {
        return $this->db->delete('user_role', array("id"=>$id));
    }
    
}