<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function index() {
        // tampilkan halaman register
        $this->load->view('auth/register-v2');
    }

    public function simpan() {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password')); 
        $data = array(
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
        );


        $this->db->insert('user', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Registrasi berhasil! Silakan login.</div>');
        redirect('login');
    }
}
?>
