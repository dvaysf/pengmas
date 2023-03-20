<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Petugas Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();

        $pengaduan = array(
            'status' => 'segera',
        );
        $this->db->where($pengaduan);
        $pengaduan = $this->db->get('pengaduan')->num_rows();
        $proses = array(
            'status' => 'proses',
        );
        $this->db->where($proses);
        $proses = $this->db->get('pengaduan')->num_rows();
        $selesai = array(
            'status' => 'selesai',
        );
        $this->db->where($selesai);
        $selesai = $this->db->get('pengaduan')->num_rows();

        $data['jumlah'] = array(
            'pengaduan' => $pengaduan,
            'proses' => $proses,
            'selesai' => $selesai,
        );

        $this->load->view('temp/temp_dash/v_header', $data);
        $this->load->view('temp/temp_dash/v_sidebar', $data);
        $this->load->view('temp/temp_dash/v_topbar', $data);
        $this->load->view('petugas/v_petugas', $data);
        $this->load->view('temp/temp_dash/v_footer', $data);
    }

    // kategori
    public function kategori()
    {
        $data['title'] = 'Home Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['sub_kategori'] = $this->M_join->kategori()->result_array();

        $this->load->view('temp/temp_dash/v_header', $data);
        $this->load->view('temp/temp_dash/v_sidebar', $data);
        $this->load->view('temp/temp_dash/v_topbar', $data);
        $this->load->view('petugas/v_kategori', $data);
        $this->load->view('temp/temp_dash/v_footer', $data);
    }

    public function tambahsubkategori()
    {
        $sub_kategori = $this->input->post('sub_kategori');
        $data = array(
            'sub_kategori' => $sub_kategori,
            'id_kategori' => $this->input->post('kategori')
        );
        $this->db->insert('sub_kategori', $data);
        redirect('c_petugas/kategori');
    }

    public function edit_sub_kategori($edit_id)
    {
        $edit_sub_kategori = $this->input->post('edit_sub_kategori');

        $update = array(
            'sub_kategori' =>  $edit_sub_kategori,
        );
        $this->db->where('subkategori_id', $edit_id);
        $this->db->update('sub_kategori', $update);
        redirect('c_petugas/kategori');
    }

    public function delete_subkategori($id)
    {
        $this->db->where('subkategori_id', $id);
        $this->db->delete('sub_kategori');
        redirect('c_petugas/kategori/');
    }
    // akhir kategori

    // masyarakat
    public function masyarakat()
    {
        $data['title'] = 'Home Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['masyarakat'] = $this->db->get('masyarakat')->result_array();

        $this->load->view('temp/temp_dash/v_header', $data);
        $this->load->view('temp/temp_dash/v_sidebar', $data);
        $this->load->view('temp/temp_dash/v_topbar', $data);
        $this->load->view('petugas/v_masyarakat', $data);
        $this->load->view('temp/temp_dash/v_footer', $data);
    }

    public function edit_masyarakat($id)
    {
        $data = [
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'no_telp' => $this->input->post('no_telp'),
            'active' => 'active',
        ];

        $this->db->where('id', $id);
        $this->db->update('masyarakat', $data);
        $this->session->set_flashdata('masyarakat', '<div class="alert alert-success" role="alert"> Data berhasil diupdate! </div>');
        redirect('c_petugas/masyarakat');
    }

    public function ban_masyarakat($id)
    {
        $data = [
            'active' => 'suspended'
        ];

        $this->db->where('id', $id);
        $this->db->update('masyarakat', $data);
        $this->session->set_flashdata('masyarakat', '<div class="alert alert-success" role="alert"> User berhasil di banned! </div>');
        redirect('c_petugas/masyarakat');
    }

    public function aktif_masyarakat($id)
    {
        $data = [
            'active' => 'active'
        ];

        $this->db->where('id', $id);
        $this->db->update('masyarakat', $data);
        $this->session->set_flashdata('masyarakat', '<div class="alert alert-success" role="alert"> User berhasil di banned! </div>');
        redirect('c_petugas/masyarakat');
    }

    // akhir masyarakat
    

    // petugas
    public function petugas()
    {
        $data['title'] = 'Home Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['petugas'] = $this->db->get('petugas')->result_array();

        $this->load->view('temp/temp_dash/v_header', $data);
        $this->load->view('temp/temp_dash/v_sidebar', $data);
        $this->load->view('temp/temp_dash/v_topbar', $data);
        $this->load->view('petugas/v_data_petugas', $data);
        $this->load->view('temp/temp_dash/v_footer', $data);
    }
    // akhir petugas

    // pengaduan
    public function pengaduan()
    {
        $data['title'] = 'Home Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['pengaduan'] = $this->M_join->admin_pengaduan()->result_array();

        $this->load->view('temp/temp_dash/v_header', $data);
        $this->load->view('temp/temp_dash/v_sidebar', $data);
        $this->load->view('temp/temp_dash/v_topbar', $data);
        $this->load->view('petugas/v_pengaduan', $data);
        $this->load->view('temp/temp_dash/v_footer', $data);
    }

    public function tanggapan_pengaduan($id)
    {
        $data['title'] = 'Admin Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['tanggapan'] = $this->M_admin->tanggapan_pengaduan($id)->result_array();
        $data['pengaduan'] = $this->M_join->tanggapan_pengaduan2($id)->result_array();

        $this->load->view('temp/temp_dash/v_header', $data);
        $this->load->view('temp/temp_dash/v_sidebar', $data);
        $this->load->view('temp/temp_dash/v_topbar', $data);
        $this->load->view('petugas/v_detail_pengaduan', $data);
        $this->load->view('temp/temp_dash/v_footer', $data);
    }

    public function balas_pengaduan($id)
    {
        $user=$this->db->get_where('petugas',['username'=>$this->session->userdata('username')])->row_array();
        $data = [
            'id_pengaduan' => $id,
            'tgl_tanggapan' => date('Y-m-d'),
            'tanggapan' => $this->input->post('tanggapan'),
            'id_petugas'=>$user['id_petugas'],
        ];

        $this->db->insert('tanggapan', $data);

        $update = [
            'status' => $this->input->post('status'),
        ];

        $this->db->where('id_pengaduan', $id);
        $this->db->update('pengaduan', $update);
        $this->session->set_flashdata('tindakan', '<div class="alert alert-success" role="alert"> Data berhasil di tambahkan </div>');
        redirect('c_petugas/pengaduan');
    }
    // akhir pengaduan


    public function print_laporan_admin()
    {
        $data['masyarakat'] = $this->db->get('masyarakat')->result_array();
        $data['petugas'] = $this->db->get('petugas')->result_array();
        $pengaduan = $this->m_join->joinpengaduandata2()->result_array();

        $data = array(
            "dataku" => array(
                "nama" => "Petani Kode",
                "url" => "http://petanikode.com"
            ),
            'pengaduan' => $pengaduan   
        );
    
        $this->load->library('pdf');
        $data['title'] = 'Laporan Pengaduan';
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan.pdf";
        $this->pdf->load_view('laporan_pdf', $data);
    }
}
