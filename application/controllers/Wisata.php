<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Wisata_model');    
        $this->load->model('Kecamatan_model');
        $this->load->model('Fasilitas_model');  
        $this->load->model('Kategori_model');
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        $page = $this->input->get('page') ? (int)$this->input->get('page') : 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $total_rows = $this->Wisata_model->count_all();
        
        $data['wisata'] = $this->Wisata_model->get_paginated($limit, $offset);
        $data['title'] = 'Data Wisata Magelang';
        $data['start'] = $offset;
        $data['total_rows'] = $total_rows;
        
        // Pagination manual
        $total_pages = ceil($total_rows / $limit);
        $data['pagination'] = $this->create_manual_pagination($page, $total_pages);
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('wisata/index', $data);
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
        $data['title'] = 'Tambah Data Wisata';
        $data['kecamatan'] = $this->Kecamatan_model->get_all();
        $data['fasilitas'] = $this->Fasilitas_model->get_all();
        $data['kategori_wisata'] = $this->Kategori_model->getAll(); // Tambahkan ini
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('wisata/form', $data);
        $this->load->view('template/footer');
    }

    public function save() {
    $nama_pemilik = $this->input->post('nama_pemilik');
    $nik_pemilik = $this->input->post('nik_pemilik');
    $no_telp = $this->input->post('no_telp');
    $fasilitas = $this->input->post('fasilitas');

    // Validasi NIK Pemilik tidak boleh kosong
    if(empty($nik_pemilik)) {
        $nik_pemilik = 'NIKBELUMADA' . time();
    }

    // Cek apakah pemilik sudah ada berdasarkan NIK
    $pemilik = $this->db->get_where('pemilik', ['nik_pemilik' => $nik_pemilik])->row();
    if ($pemilik) {
        $id_pemilik = $pemilik->id_pemilik;
        // Update data pemilik yang sudah ada
        $this->db->where('id_pemilik', $pemilik->id_pemilik);
        $this->db->update('pemilik', [
            'nama_pemilik' => $nama_pemilik,
            'no_telp' => $no_telp
        ]);
    } else {
        // Tambah pemilik baru
        $pemilik_data = [
            'nik_pemilik' => $nik_pemilik,
            'nama_pemilik' => $nama_pemilik,
            'no_telp' => $no_telp
        ];
        $this->db->insert('pemilik', $pemilik_data);
        $id_pemilik = $this->db->insert_id();
    }

    $data = [
        'nama_wisata' => $this->input->post('nama_wisata'),
        'id_pemilik' => $id_pemilik,
        'id_kecamatan' => $this->input->post('id_kecamatan'),
        'id_kategori' => $this->input->post('id_kategori'), // Hanya id_kategori
        'alamat' => $this->input->post('alamat'),
        'jumlah_karyawan' => $this->input->post('jumlah_karyawan')
    ];

    $this->Wisata_model->insert($data);
    $id_wisata = $this->db->insert_id();
    $this->Fasilitas_model->add_to_wisata($id_wisata, $fasilitas);
    $this->session->set_flashdata('success', 'Data wisata berhasil ditambahkan.');
    redirect('wisata');
}

    public function edit($id) {
        $data['title'] = 'Edit Data Wisata';
        $wisata_data = $this->Wisata_model->get_by_id($id); 
        
        if(!$wisata_data) {
            show_404();
        }
        
        $data['wisata'] = $wisata_data;
        $data['kecamatan'] = $this->Kecamatan_model->get_all();
        $data['fasilitas'] = $this->Fasilitas_model->get_all();
        $data['kategori_wisata'] = $this->Kategori_model->getAll();
        
        // Ambil fasilitas terpilih
        $fasilitas_terpilih = $this->Fasilitas_model->get_by_wisata($id);
        $data['fasilitas_terpilih'] = $fasilitas_terpilih ? $fasilitas_terpilih : [];
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('wisata/form_edit', $data);
        $this->load->view('template/footer');
    }
    
    public function update($id) {
        $nama_pemilik = $this->input->post('nama_pemilik');
        $nik_pemilik = $this->input->post('nik_pemilik');
        $no_telp = $this->input->post('no_telp');
        $fasilitas = $this->input->post('fasilitas');

        // Validasi NIK Pemilik tidak boleh kosong
        if(empty($nik_pemilik)) {
            $nik_pemilik = 'NIKBELUMADA' . time();
        }

        // Cek apakah pemilik sudah ada berdasarkan NIK
        $pemilik = $this->db->get_where('pemilik', ['nik_pemilik' => $nik_pemilik])->row();
        if ($pemilik) {
            // Update data pemilik yang sudah ada
            $this->db->where('id_pemilik', $pemilik->id_pemilik);
            $this->db->update('pemilik', [
                'nama_pemilik' => $nama_pemilik,
                'no_telp' => $no_telp
            ]);
            $id_pemilik = $pemilik->id_pemilik;
        } else {
            // Tambah pemilik baru
            $pemilik_data = [
                'nik_pemilik' => $nik_pemilik,
                'nama_pemilik' => $nama_pemilik,
                'no_telp' => $no_telp
            ];
            $this->db->insert('pemilik', $pemilik_data);
            $id_pemilik = $this->db->insert_id();
        }

        // Gunakan id_kategori
        $data = [
            'nama_wisata' => $this->input->post('nama_wisata'),
            'id_pemilik' => $id_pemilik,
            'id_kecamatan' => $this->input->post('id_kecamatan'),
            'id_kategori' => $this->input->post('id_kategori'),
            'alamat' => $this->input->post('alamat'),
            'jumlah_karyawan' => $this->input->post('jumlah_karyawan')
        ];

        $this->Wisata_model->update($id, $data);
        $this->Fasilitas_model->add_to_wisata($id, $fasilitas);

        $this->session->set_flashdata('success', 'Data wisata berhasil diupdate.');
        redirect('wisata');
    }

    public function detail($id) {
        $data['title'] = 'Detail Wisata';
        $data['wisata'] = $this->Wisata_model->get_detail($id); 
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('wisata/detail', $data);
        $this->load->view('template/footer');
    }

    public function delete($id) {
        $this->Wisata_model->delete($id);
        $this->session->set_flashdata('success', 'Data wisata berhasil dihapus.');
        redirect('wisata');
    }
}
?>