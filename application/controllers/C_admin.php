<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Admin Page';
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
        $this->load->view('admin/v_admin', $data);
        $this->load->view('temp/temp_dash/v_footer', $data);
    }

    // kategori
    public function kategori()
    {
        $data['title'] = 'Home Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $this->load->model('m_join');
        $data['sub_kategori'] = $this->m_join->kategori()->result_array();
        $this->load->model('m_join');

        $this->load->view('temp/temp_dash/v_header', $data);
        $this->load->view('temp/temp_dash/v_sidebar', $data);
        $this->load->view('temp/temp_dash/v_topbar', $data);
        $this->load->view('admin/v_kategori', $data);
        $this->load->view('temp/temp_dash/v_footer', $data);
    }

    public function tambahkategori()
    {
        $kategori = $this->input->post('kategori');
        $data = array(
            'kategori' => $kategori,
        );
        $this->db->insert('kategori', $data);
        redirect('c_admin/kategori');
    }

    public function tambahsubkategori()
    {
        $sub_kategori = $this->input->post('sub_kategori');
        $data = array(
            'sub_kategori' => $sub_kategori,
            'id_kategori' => $this->input->post('kategori')
        );
        $this->db->insert('sub_kategori', $data);
        redirect('c_admin/kategori');
    }

    public function edit_kategori($edit_id)
    {
        $edit_id = $this->input->post('edit_id');
        $edit_kategori = $this->input->post('edit_kategori');

        $update = array(
            'kategori' =>  $edit_kategori,

        );
        $this->db->where('id', $edit_id);
        $this->db->update('kategori', $update);
        redirect('c_admin/kategori');
    }

    public function edit_sub_kategori($edit_id)
    {
        $edit_sub_kategori = $this->input->post('edit_sub_kategori');

        $update = array(
            'sub_kategori' =>  $edit_sub_kategori,
        );
        $this->db->where('subkategori_id', $edit_id);
        $this->db->update('sub_kategori', $update);
        redirect('c_admin/kategori');
    }

    public function delete_kategori($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kategori');
        redirect('c_admin/kategori/');
    }

    public function delete_subkategori($id)
    {
        $this->db->where('subkategori_id', $id);
        $this->db->delete('sub_kategori');
        redirect('c_admin/kategori/');
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
        $this->load->view('admin/v_masyarakat', $data);
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
        redirect('c_admin/masyarakat');
    }

    public function hapus_masyarakat($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('masyarakat');
        $this->session->set_flashdata('masyarakat', '<div class="alert alert-success" role="alert"> Data berhasil dihapus! </div>');
        redirect('c_admin/masyarakat');
    }

    public function ban_masyarakat($id)
    {
        $data = [
            'active' => 'suspend'
        ];

        $this->db->where('id', $id);
        $this->db->update('masyarakat', $data);
        $this->session->set_flashdata('masyarakat', '<div class="alert alert-success" role="alert"> User berhasil di banned! </div>');
        redirect('c_admin/masyarakat');
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
        $this->load->view('admin/v_petugas', $data);
        $this->load->view('temp/temp_dash/v_footer', $data);
    }

    public function hapus_petugas($id)
    {
        $this->db->where('id_petugas', $id);
        $this->db->delete('petugas');
        $this->session->set_flashdata('petugas', '<div class="alert alert-success" role="alert"> Data berhasil dihapus! </div>');
        redirect('c_admin/petugas');
    }

    public function ban_petugas($id)
    {
        $data = [
            'active' => 'suspended'
        ];

        $this->db->where('id_petugas', $id);
        $this->db->update('petugas', $data);
        $this->session->set_flashdata('petugas', '<div class="alert alert-success" role="alert"> User berhasil diban! </div>');
        redirect('c_admin/petugas');
    }

    public function edit_petugas($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim');

        $data = [
            'nama' => htmlspecialchars($this->input->post('nama')),
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'no_telp' => htmlspecialchars($this->input->post('telepon')),
        ];

        $this->db->where('id_petugas', $id);
        $this->db->update('petugas', $data);
        $this->session->set_flashdata('petugas', '<div class="alert alert-success" role="alert"> Data berhasil diupdate! </div>');
        redirect('c_admin/petugas/');
    }

    public function delete_petugas($id_petugas)
    {
        $this->db->where('id_petugas', $id_petugas);
        $this->db->delete('petugas');
        redirect('c_admin/petugas/');
    }

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
        $this->load->view('admin/v_pengaduan', $data);
        $this->load->view('temp/temp_dash/v_footer', $data);
    }

    public function tanggapan_pengaduan($id)
    {
        $data['title'] = 'Admin Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['tanggapan'] = $this->db->get('tanggapan')->result_array();
        $data['pengaduan'] = $this->m_join->tanggapan_pengaduan2($id)->result_array();

        $this->load->view('temp/temp_dash/v_header', $data);
        $this->load->view('temp/temp_dash/v_sidebar', $data);
        $this->load->view('temp/temp_dash/v_topbar', $data);
        $this->load->view('admin/v_detail_pengaduan', $data);
        $this->load->view('temp/temp_dash/v_footer', $data);
    }

    public function balas_pengaduan($id)
    {
        $user = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data = [
            'id_pengaduan' => $id,
            'tgl_tanggapan' => date('Y-m-d'),
            'tanggapan' => $this->input->post('tanggapan'),
            'id_petugas' => $user['id_petugas'],
        ];

        $this->db->insert('tanggapan', $data);

        $update = [
            'status' => $this->input->post('status'),
        ];

        $this->db->where('id_pengaduan', $id);
        $this->db->update('pengaduan', $update);
        $this->session->set_flashdata('tindakan', '<div class="alert alert-success" role="alert"> Data berhasil di tambahkan </div>');
        redirect('c_admin/pengaduan');
    }
    // akhir pengaduan

    public function laporan()
    {
        $data['title'] = 'Home Page';
        $data['user'] = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row_array();
        $data['petugas'] = $this->db->get('petugas')->result_array();

        $this->load->view('temp/temp_dash/v_header', $data);
        $this->load->view('temp/temp_dash/v_sidebar', $data);
        $this->load->view('temp/temp_dash/v_topbar', $data);
        $this->load->view('admin/v_laporan', $data);
        $this->load->view('temp/temp_dash/v_footer', $data);
    }
}
