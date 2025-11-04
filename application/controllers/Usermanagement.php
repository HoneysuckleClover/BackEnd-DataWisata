<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermanagement extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index() {
        $page = $this->input->get('page') ? (int)$this->input->get('page') : 1;
        $limit = 5; 
        $offset = ($page - 1) * $limit;

        $total_rows = $this->User_model->count_all();

        $data['users'] = $this->User_model->get_paginated($limit, $offset);
        $data['title'] = 'Manajemen User';
        $data['total_users'] = $total_rows;
        $data['total_active_users'] = $this->User_model->count_active_users();
        $data['start'] = $offset;

        // Buat pagination manual
        $total_pages = ceil($total_rows / $limit);
        $data['pagination'] = $this->create_manual_pagination($page, $total_pages);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }

    private function create_manual_pagination($current_page, $total_pages) {
        $pagination = '<ul class="pagination justify-content-center">';

        // Tombol Previous
        if ($current_page > 1) {
            $pagination .= '<li class="page-item"><a class="page-link" href="?page='.($current_page - 1).'">&laquo;</a></li>';
        }

        // Nomor halaman
        for ($i = 1; $i <= $total_pages; $i++) {
            $active = ($i == $current_page) ? ' active' : '';
            $pagination .= '<li class="page-item'.$active.'"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
        }

        // Tombol Next
        if ($current_page < $total_pages) {
            $pagination .= '<li class="page-item"><a class="page-link" href="?page='.($current_page + 1).'">&raquo;</a></li>';
        }

        $pagination .= '</ul>';
        return $pagination;
    }

    public function add() {
        $data['title'] = 'Tambah User';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('user/add', $data);
        $this->load->view('template/footer');
    }

    public function save() {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah User';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('user/add', $data);
            $this->load->view('template/footer');
        } else {
            $username = $this->input->post('username');
            if ($this->User_model->check_username_exists($username)) {
                $this->session->set_flashdata('error', 'Username sudah digunakan. Silakan gunakan username lain.');
                redirect('usermanagement/add');
            }

            $data_insert = [
                'nama' => $this->input->post('nama'),
                'username' => $username,
                'password' => md5($this->input->post('password')),
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

    public function update($id) {
        $user = $this->User_model->get_user_by_id($id);
        if (!$user) {
            $this->session->set_flashdata('error', 'User tidak ditemukan.');
            redirect('usermanagement');
        }

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]');
        
        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'min_length[6]');
            $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'matches[password]');
        }

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit User';
            $data['user'] = $user;
            
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('user/edit', $data);
            $this->load->view('template/footer');
        } else {
            $username = $this->input->post('username');
            if ($this->User_model->check_username_exists($username, $id)) {
                $this->session->set_flashdata('error', 'Username sudah digunakan oleh user lain.');
                redirect('usermanagement/edit/' . $id);
            }

            $update_data = [
                'nama' => $this->input->post('nama'),
                'username' => $username,
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $password = $this->input->post('password');
            if (!empty($password)) {
                $update_data['password'] = md5($password);
            }

            if ($this->User_model->update_user($id, $update_data)) {
                $this->session->set_flashdata('success', 'User berhasil diperbarui.');
            } else {
                $this->session->set_flashdata('error', 'Tidak ada perubahan data atau gagal mengupdate user.');
            }
            
            redirect('usermanagement');
        }
    }

    public function delete($id) {
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

    public function test() {
        echo "CONTROLLER USERMANAGEMENT BERHASIL DIAKSES!";
        echo "<br>Method: test";
        echo "<br>Model loaded: " . (isset($this->User_model) ? 'Yes' : 'No');
        die();
    }
}
