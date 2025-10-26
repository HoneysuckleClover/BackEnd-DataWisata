<?php
/**
 * @property CI_Input $input
 * @property CI_Session $session
 * @property Login_model $login_model
 */
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    // Menampilkan halaman login
    function index() {
        // Jika sudah login, langsung redirect sesuai level
        if ($this->session->userdata('masuk')) {
            redirect('dashboard'); // ubah ke halaman setelah login
        } else {
            $this->load->view('auth/login-v2');
        }
    }

    // Fungsi autentikasi login
    function auth() {
        $username = strip_tags($this->input->post('username'));
        $password = strip_tags($this->input->post('password'));

        // Cek login di tabel login
        $cek_login = $this->login_model->auth_login($username, $password);

        if ($cek_login->num_rows() > 0) {
            $data = $cek_login->row_array();

            // Simpan data ke session
            $this->session->set_userdata('masuk', TRUE);
            $this->session->set_userdata('ses_id', $data['id_user']); 
            $this->session->set_userdata('ses_nama', $data['nama']); 

            redirect('dashboard'); // arahkan ke halaman dashboard
        } else {
            // Jika username atau password salah
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Username atau Password salah!</div>');
            redirect('login');
        }
    }

    // Fungsi logout
    function logout() {
        $this->session->sess_destroy(); // hapus semua data session
        redirect('login'); // kembali ke halaman login
    }
}
