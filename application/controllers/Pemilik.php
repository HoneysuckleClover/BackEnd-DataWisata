<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilik extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pemilik_model');    
        $this->load->model('Wisata_model');
        $this->load->library('pagination');
        $this->load->library('session'); 
        $this->load->helper('url');
    }

    public function index() {
        $page = $this->input->get('page') ? (int)$this->input->get('page') : 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $total_rows = $this->Pemilik_model->count_all();
        
        $data['pemilik'] = $this->Pemilik_model->get_paginated($limit, $offset);
        $data['title'] = 'Data Pemilik Wisata';
        $data['start'] = $offset;
         $data['total_rows'] = $total_rows;
        
        // Pagination manual
        $total_pages = ceil($total_rows / $limit);
        $data['pagination'] = $this->create_manual_pagination($page, $total_pages);
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('pemilik/index', $data);
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
        $data['title'] = 'Tambah Data Pemilik';
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('pemilik/create', $data);
        $this->load->view('template/footer');
    }

    public function save() {
        $nama_pemilik = $this->input->post('nama_pemilik');
        $nik_pemilik = $this->input->post('nik_pemilik');
        $no_telp = $this->input->post('no_telp');

        // Validasi NIK Pemilik tidak boleh kosong
        if(empty($nik_pemilik)) {
            // Jika NIK kosong, buat NIK default
            $nik_pemilik = 'NIKBELUMADA' . time();
        }

        $data = [
            'nama_pemilik' => $nama_pemilik,
            'nik_pemilik' => $nik_pemilik,
            'no_telp' => $no_telp
        ];

        $this->Pemilik_model->insert($data);
        $this->session->set_flashdata('success', 'Data pemilik berhasil ditambahkan.');
        redirect('pemilik');
    }

    public function edit($id) {
        $data['title'] = 'Edit Data Pemilik';
        $pemilik_data = $this->Pemilik_model->get_by_id($id); 
        
        if(!$pemilik_data) {
            show_404();
        }
        
        $data['pemilik'] = $pemilik_data;
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('pemilik/edit', $data);
        $this->load->view('template/footer');
    }

    public function update($id) {
        $nama_pemilik = $this->input->post('nama_pemilik');
        $nik_pemilik = $this->input->post('nik_pemilik');
        $no_telp = $this->input->post('no_telp');

        // Validasi NIK Pemilik tidak boleh kosong
        if(empty($nik_pemilik)) {
            // Jika NIK kosong, buat NIK default
            $nik_pemilik = 'NIKBELUMADA' . time();
        }

        $data = [
            'nama_pemilik' => $nama_pemilik,
            'nik_pemilik' => $nik_pemilik,
            'no_telp' => $no_telp
        ];

        $this->Pemilik_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data pemilik berhasil diupdate.');
        redirect('pemilik');
    }

    public function delete($id) {
        // Cek apakah pemilik masih digunakan di tabel wisata
        $wisata = $this->Wisata_model->get_by_pemilik($id);
        
        if ($wisata) {
            $this->session->set_flashdata('error', 'Data pemilik tidak dapat dihapus karena masih digunakan di data wisata.');
            redirect('pemilik');
        }

        $this->Pemilik_model->delete($id);
        $this->session->set_flashdata('success', 'Data pemilik berhasil dihapus.');
        redirect('pemilik');
    }
}