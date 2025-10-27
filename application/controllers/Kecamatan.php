<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kecamatan_model');    
        $this->load->model('Wisata_model');
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        $page = $this->input->get('page') ? (int)$this->input->get('page') : 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $total_rows = $this->Kecamatan_model->count_all();
        
        $data['kecamatan'] = $this->Kecamatan_model->get_paginated($limit, $offset);
        $data['title'] = 'Data Kecamatan';
        $data['start'] = $offset;
        
        // Pagination manual
        $total_pages = ceil($total_rows / $limit);
        $data['pagination'] = $this->create_manual_pagination($page, $total_pages);
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('kecamatan/index', $data);
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
        $data['title'] = 'Tambah Data Kecamatan';
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('kecamatan/create', $data);
        $this->load->view('template/footer');
    }

    public function save() {
        $nama_kecamatan = $this->input->post('nama_kecamatan');

        $data = [
            'nama_kecamatan' => $nama_kecamatan
        ];

        $this->Kecamatan_model->insert($data);
        $this->session->set_flashdata('success', 'Data kecamatan berhasil ditambahkan.');
        redirect('kecamatan');
    }

    public function edit($id) {
        $data['title'] = 'Edit Data Kecamatan';
        $kecamatan_data = $this->Kecamatan_model->get_by_id($id); 
        
        if(!$kecamatan_data) {
            show_404();
        }
        
        $data['kecamatan'] = $kecamatan_data;
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('kecamatan/edit', $data);
        $this->load->view('template/footer');
    }

    public function update($id) {
        $nama_kecamatan = $this->input->post('nama_kecamatan');

        $data = [
            'nama_kecamatan' => $nama_kecamatan
        ];

        $this->Kecamatan_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data kecamatan berhasil diupdate.');
        redirect('kecamatan');
    }

    public function delete($id) {
        // Cek apakah kecamatan masih digunakan di tabel wisata
        $wisata = $this->Wisata_model->get_by_kecamatan($id);
        
        if ($wisata) {
            $this->session->set_flashdata('error', 'Data kecamatan tidak dapat dihapus karena masih digunakan di data wisata.');
            redirect('kecamatan');
        }

        $this->Kecamatan_model->delete($id);
        $this->session->set_flashdata('success', 'Data kecamatan berhasil dihapus.');
        redirect('kecamatan');
    }
}