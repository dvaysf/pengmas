<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_masyarakat extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
    }

	public function index()
	{
		$data['title'] = 'Home Page';
		$data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
		
		$pengaduan = array(
            'status' => '0',
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

		$this->load->view('temp/temp_dash/v_u_header', $data);
		$this->load->view('temp/temp_dash/v_u_sidebar', $data);
		$this->load->view('temp/temp_dash/v_u_topbar', $data);
		$this->load->view('user/v_dash', $data);
		$this->load->view('temp/temp_dash/v_u_footer', $data);
	}

	public function pengaduan()
	{
		$data['title'] = 'Home Page';
		$data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$data['pengaduan2'] = $this->M_join->pengaduan()->result_array();
		
		$this->load->view('temp/temp_dash/v_u_header', $data);
		$this->load->view('temp/temp_dash/v_u_sidebar', $data);
		$this->load->view('temp/temp_dash/v_u_topbar', $data);
		$this->load->view('user/v_pengaduan', $data);
		$this->load->view('temp/temp_dash/v_u_footer', $data);
	}

	public function detailpengaduan($id)
	{
		$data['title'] = 'Home Page';
		$data['user'] = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
		$data['kategori'] = $this->db->get('kategori')->result_array();
		// $data['pengaduan2'] = $this->db->get('pengaduan')->result_array();
		$data['tanggapan'] = $this->M_join->tanggapan($id)->result_array();
		// $data['pengaduan2'] = $this->m_join->pengaduan()->result_array();
		$data['pengaduan2'] = $this->M_join->joinpengaduan2($id)->result_array();
		
		$this->load->view('temp/temp_dash/v_u_header', $data);
		$this->load->view('temp/temp_dash/v_u_sidebar', $data);
		$this->load->view('temp/temp_dash/v_u_topbar', $data);
		$this->load->view('user/v_detail_pengaduan', $data);
		$this->load->view('temp/temp_dash/v_u_footer', $data);
	}

	public function isipengaduan()
	{
		$data = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
		$kategori = $this->input->post('kategori');
		$sub_kategori = $this->input->post('sub_kategori');
		$isi_laporan = $this->input->post('isi_laporan');

		// upload file
		$config['upload_path']          = './assets/uploads/img/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		
        $this->upload->initialize($config);

		$this->upload->do_upload('foto');
		$upload_img = $this->upload->data('file_name');

		$data = array(
			'nik' => $data['nik'],
			'id_kategori' => $kategori,
			'id_subkategori' => $sub_kategori,
			'tgl_pengaduan' => date('Y-m-d'),
			'isi_laporan' => $isi_laporan,
			'foto' => $upload_img,
		);

		$this->db->insert('pengaduan', $data);
		redirect('C_masyarakat/pengaduan');
	}

	public function get_sub_kategori()
	{
		$id_kategori = $this->input->post('id');
		$sub_kategori = $this->db->get_where('sub_kategori', ['id_kategori' => $id_kategori])->result();
		echo json_encode($sub_kategori);
	}
}
