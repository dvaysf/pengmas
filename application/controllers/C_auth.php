<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    // Login masyarakat
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page User';
            $this->load->view('temp/temp_auth/v_header', $data);
            $this->load->view('auth/v_login');
            $this->load->view('temp/temp_auth/v_footer');
        } else {
            // validasinya success
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('masyarakat', ['username' => $username])->row_array();

        if ($user) {
            // cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'active' => $user['active'],
                ];

                // kondisi
                $this->session->set_userdata($data);
                if ($user['active'] == 'aktif') {
                    redirect('C_masyarakat');
                } else if ($user['active'] == 'ban') {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akun Ke Banned !! </div>');
                    redirect('C_auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Salah password! </div>');
                redirect('C_auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username tidak terdaftar </div>');
            redirect('C_auth');
        }
    }

    // Registrasi masyarakat
    public function registration()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[masyarakat.username]', [
            'is_unique' => 'Username ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[masyarakat.email]', [
            'is_unique' => 'Email ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required|trim');
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont match',
            'min_length' => 'password too short'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]',);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration Page User';
            $this->load->view('temp/temp_auth/v_header', $data);
            $this->load->view('auth/v_register');
            $this->load->view('temp/temp_auth/v_footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'active' => 'aktif',
            ];

            $this->db->insert('masyarakat', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Akun sudah terdaftar. Silahkan Login</div>');
            redirect('C_auth');
        }
    }
    
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        log out</div>');
        redirect('C_auth');
    }
    // akhir masyarakat

    // Login Admin
    public function login_admin()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page Petugas';
            $this->load->view('temp/temp_auth/v_header', $data);
            $this->load->view('auth/v_login_admin');
            $this->load->view('temp/temp_auth/v_footer');
        } else {
            // validasinya success
            $this->_login_admin();
        }
    }

    private function _login_admin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('petugas', ['username' => $username])->row_array();

        if ($user) {
            // cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'role' => $user['role']
                ];

                // kondisi
                $this->session->set_userdata($data);
                if ($user['role'] == 'admin') {
                    redirect('C_admin'); //admin
                } else if ($user['role'] == 'petugas') {
                    redirect('C_petugas'); //petugas
                } else if ($user['active'] == 'aktif') {
                    redirect('C_auth/login_admin');
                } else if ($user['active'] == 'ban') {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akun Ke Banned !! </div>');
                    redirect('C_auth/login_admin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Salah password! </div>');
                redirect('C_auth/login_admin');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username tidak terdaftar </div>');
            redirect('C_auth/login_admin');
        }
    }

    public function registration_admin()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[petugas.username]', [
            'is_unique' => 'Username ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[petugas.email]', [
            'is_unique' => 'Email ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required|trim');
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont match',
            'min_length' => 'password too short'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]',);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration Page Petugas';
            $this->load->view('temp/temp_auth/v_header', $data);
            $this->load->view('auth/v_register_admin');
            $this->load->view('temp/temp_auth/v_footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'role' => 'admin',
            ];

            $this->db->insert('petugas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Akun sudah terdaftar. Silahkan Login</div>');
            redirect('C_auth/login_admin');
        }
    }

    public function logout_admin()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        log out</div>');
        redirect('C_auth/login_admin');
    }
}
