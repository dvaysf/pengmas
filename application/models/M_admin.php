<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
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

    function tanggapan_pengaduan($id)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->join('tanggapan', 'tanggapan.id_pengaduan=pengaduan.id_pengaduan');
        $this->db->where('pengaduan.id_pengaduan', $id);
        return $this->db->get();
    }
}
