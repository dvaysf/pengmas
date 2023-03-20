<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

    function ban_masyarakat($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('masyarakat', $data);
    }

    public function activeMasyarakat($Mactive)
    {
        $this->db->update('masyarakat', $Mactive);
    }
    
    function login($username)
    {
        return $this->db->get_where('masyarakat', ['username' => $username])->row_array();
    }
}
