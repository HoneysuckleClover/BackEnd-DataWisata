<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->library(['form_validation', 'session']); // Tambahkan session library
    }

    // Index - Menampilkan semua data
    public function index() {
        $data['title'] = 'Data Kategori Wisata';
        $data['kategori'] = $this->Kategori_model->getAll();
        $this->load->view('template/header', $data);
         $this->load->view('template/sidebar');
        $this->load->view('kategori/index', $data);
        $this->load->view('template/footer');
    }

    // Create - Form tambah data
    public function create() {
        $data['title'] = 'Tambah Kategori Wisata';
        $this->load->view('template/header', $data);
         $this->load->view('template/sidebar');
        $this->load->view('kategori/create');
        $this->load->view('template/footer');
    }

    // Store - Menyimpan data baru
    public function store() {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = [
                'nama_kategori' => $this->input->post('nama_kategori'),
                'deskripsi' => $this->input->post('deskripsi')
            ];
            
            $this->Kategori_model->insert($data);
            $this->session->set_flashdata('success', 'Data kategori berhasil ditambahkan');
            redirect('kategori');
        }
    }

    // Edit - Form edit data
    public function edit($id) {
        $data['title'] = 'Edit Kategori Wisata';
        $data['kategori'] = $this->Kategori_model->getById($id);
        
        if (!$data['kategori']) {
            show_404();
        }
        
        $this->load->view('template/header', $data);
         $this->load->view('template/sidebar');
        $this->load->view('kategori/edit', $data);
        $this->load->view('template/footer');
    }

    // Update - Memperbarui data
    public function update($id) {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = [
                'nama_kategori' => $this->input->post('nama_kategori'),
                'deskripsi' => $this->input->post('deskripsi')
            ];
            
            $this->Kategori_model->update($id, $data);
            $this->session->set_flashdata('success', 'Data kategori berhasil diupdate');
            redirect('kategori');
        }
    }

    // Delete - Menghapus data
    public function delete($id) {
        $kategori = $this->Kategori_model->getById($id);
        
        if (!$kategori) {
            show_404();
        }
        
        $this->Kategori_model->delete($id);
        $this->session->set_flashdata('success', 'Data kategori berhasil dihapus');
        redirect('kategori');
    }
}
?>