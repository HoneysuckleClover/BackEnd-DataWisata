<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('auth/register-v2');
    }

    public function simpan() {
        // Validasi input
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');

        // Validasi manual
        if(empty($nama) || empty($username) || empty($password) || empty($confirm_password)) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Semua field harus diisi!</div>');
            redirect('register');
        }

        if($password !== $confirm_password) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Password dan konfirmasi password tidak sama!</div>');
            redirect('register');
        }

        // Cek apakah username sudah ada
        $this->db->where('username', $username);
        $existing_user = $this->db->get('user')->row();
        if($existing_user) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Username sudah digunakan!</div>');
            redirect('register');
        }

        // Simpan data
        $data = array(
            'nama' => $nama,
            'username' => $username,
            'password' => md5($password),
            'created_at' => date('Y-m-d H:i:s')
        );

        // Insert ke database
        $this->db->insert('user', $data);
        
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Registrasi berhasil! Silakan login.</div>');
            redirect('login');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Gagal registrasi!</div>');
            redirect('register');
        }
    }
}