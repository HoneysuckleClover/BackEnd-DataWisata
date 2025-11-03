<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermanagement extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    // ======================
    // HALAMAN UTAMA (LIST USER)
    // ======================
    public function index() {
        $data['title'] = 'Manajemen User';
        $data['users'] = $this->User_model->get_all_users();
        $data['total_users'] = $this->User_model->count_all();
        $data['total_active_users'] = $this->User_model->count_active_users();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }

    // ======================
    // TAMBAH USER - FORM
    // ======================
    public function add() {
        $data['title'] = 'Tambah User';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('user/add', $data);
        $this->load->view('template/footer');
    }

    // ======================
    // TAMBAH USER - PROSES SIMPAN
    // ======================
    public function save() {
    // Validasi input
    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
    $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');

    if ($this->form_validation->run() == FALSE) {
        // Jika validasi gagal, tampilkan form lagi dengan error
        $data['title'] = 'Tambah User';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('user/add', $data);
        $this->load->view('template/footer');
    } else {
        // Cek apakah username sudah ada
        $username = $this->input->post('username');
        if ($this->User_model->check_username_exists($username)) {
            $this->session->set_flashdata('error', 'Username sudah digunakan. Silakan gunakan username lain.');
            redirect('usermanagement/add');
        }

        // PERBAIKAN: Gunakan md5() bukan password_hash()
        $data_insert = [
            'nama' => $this->input->post('nama'),
            'username' => $username,
            'password' => md5($this->input->post('password')), // PAKAI MD5
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($this->User_model->insert_user($data_insert)) {
            $this->session->set_flashdata('success', 'User berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan user.');
        }
        redirect('usermanagement');
    }
}
    // ======================
    // EDIT USER - FORM
    // ======================
    public function edit($id) {
        $data['title'] = 'Edit User';
        $data['user'] = $this->User_model->get_user_by_id($id);

        if (!$data['user']) {
            $this->session->set_flashdata('error', 'User tidak ditemukan.');
            redirect('usermanagement');
        }

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('user/edit', $data);
        $this->load->view('template/footer');
    }

    // ======================
    // UPDATE USER - PROSES
    // ======================
    public function update($id) {
    // Cek user exists
    $user = $this->User_model->get_user_by_id($id);
    if (!$user) {
        $this->session->set_flashdata('error', 'User tidak ditemukan.');
        redirect('usermanagement');
    }

    // Validasi input
    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]');
    
    // Validasi password hanya jika diisi
    if ($this->input->post('password')) {
        $this->form_validation->set_rules('password', 'Password', 'min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'matches[password]');
    }

    if ($this->form_validation->run() == FALSE) {
        // Jika validasi gagal, tampilkan form edit lagi
        $data['title'] = 'Edit User';
        $data['user'] = $user;
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('user/edit', $data);
        $this->load->view('template/footer');
    } else {
        // Cek apakah username sudah digunakan oleh user lain
        $username = $this->input->post('username');
        if ($this->User_model->check_username_exists($username, $id)) {
            $this->session->set_flashdata('error', 'Username sudah digunakan oleh user lain.');
            redirect('usermanagement/edit/' . $id);
        }

        // Jika validasi berhasil, update data
        $update_data = [
            'nama' => $this->input->post('nama'),
            'username' => $username,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // PERBAIKAN: Gunakan md5() untuk update password
        $password = $this->input->post('password');
        if (!empty($password)) {
            $update_data['password'] = md5($password); // PAKAI MD5
        }

        if ($this->User_model->update_user($id, $update_data)) {
            $this->session->set_flashdata('success', 'User berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Tidak ada perubahan data atau gagal mengupdate user.');
        }
        
        redirect('usermanagement');
    }
}

    // ======================
    // HAPUS USER
    // ======================
    public function delete($id) {
        // Cek apakah user mencoba menghapus dirinya sendiri
        $current_user_id = $this->session->userdata('user_id');
        if ($current_user_id == $id) {
            $this->session->set_flashdata('error', 'Tidak dapat menghapus user yang sedang login.');
            redirect('usermanagement');
        }

        $user = $this->User_model->get_user_by_id($id);

        if (!$user) {
            $this->session->set_flashdata('error', 'User tidak ditemukan.');
            redirect('usermanagement');
        }

        if ($this->User_model->delete_user($id)) {
            $this->session->set_flashdata('success', 'User berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus user.');
        }
        
        redirect('usermanagement');
    }

    // ======================
    // METHOD TEST
    // ======================
    public function test() {
        echo "CONTROLLER USERMANAGEMENT BERHASIL DIAKSES!";
        echo "<br>Method: test";
        echo "<br>Model loaded: " . (isset($this->User_model) ? 'Yes' : 'No');
        die();
    }
}