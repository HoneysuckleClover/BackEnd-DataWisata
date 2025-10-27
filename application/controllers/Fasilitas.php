<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Fasilitas_model');    
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        $page = $this->input->get('page') ? (int)$this->input->get('page') : 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $total_rows = $this->Fasilitas_model->count_all();
        
        $data['fasilitas'] = $this->Fasilitas_model->get_paginated($limit, $offset);
        $data['title'] = 'Data Fasilitas';
        $data['start'] = $offset;
        
        // Pagination manual
        $total_pages = ceil($total_rows / $limit);
        $data['pagination'] = $this->create_manual_pagination($page, $total_pages);
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('fasilitas/index', $data);
        $this->load->view('template/footer');
    }

    private function create_manual_pagination($current_page, $total_pages) {
        $pagination = '<ul class="pagination justify-content-center">';
        
        // Previous button
        if ($current_page > 1) {
            $pagination .= '<li class="page-item"><a class="page-link" href="?page='.($current_page - 1).'">&laquo;</a></li>';
        }
        
        // Page numbers
        for ($i = 1; $i <= $total_pages; $i++) {
            $active = ($i == $current_page) ? ' active' : '';
            $pagination .= '<li class="page-item'.$active.'"><a class="page-link" href="?page='.$i.'">'.$i.'</a></li>';
        }
        
        // Next button
        if ($current_page < $total_pages) {
            $pagination .= '<li class="page-item"><a class="page-link" href="?page='.($current_page + 1).'">&raquo;</a></li>';
        }
        
        $pagination .= '</ul>';
        return $pagination;
    }

    public function add() {
        $data['title'] = 'Tambah Data Fasilitas';
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('fasilitas/create', $data);
        $this->load->view('template/footer');
    }

    public function save() {
        $nama_fasilitas = $this->input->post('nama_fasilitas');

        $data = [
            'nama_fasilitas' => $nama_fasilitas
        ];

        $this->Fasilitas_model->insert($data);
        $this->session->set_flashdata('success', 'Data fasilitas berhasil ditambahkan.');
        redirect('fasilitas');
    }

    public function edit($id) {
        $data['title'] = 'Edit Data Fasilitas';
        $fasilitas_data = $this->Fasilitas_model->get_by_id($id); 
        
        if(!$fasilitas_data) {
            show_404();
        }
        
        $data['fasilitas'] = $fasilitas_data;
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('fasilitas/edit', $data);
        $this->load->view('template/footer');
    }

    public function update($id) {
        $nama_fasilitas = $this->input->post('nama_fasilitas');

        $data = [
            'nama_fasilitas' => $nama_fasilitas
        ];

        $this->Fasilitas_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data fasilitas berhasil diupdate.');
        redirect('fasilitas');
    }

    public function delete($id) {
        // Cek apakah fasilitas masih digunakan di tabel wisata_fasilitas
        if ($this->Fasilitas_model->has_wisata($id)) {
            $this->session->set_flashdata('error', 'Data fasilitas tidak dapat dihapus karena masih digunakan di data wisata.');
            redirect('fasilitas');
        }

        $this->Fasilitas_model->delete($id);
        $this->session->set_flashdata('success', 'Data fasilitas berhasil dihapus.');
        redirect('fasilitas');
    }
}