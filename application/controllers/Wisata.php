<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Wisata_model');    
        $this->load->model('Kecamatan_model');  
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function index() {
        // Pagination config
        $config['base_url'] = site_url('wisata/index');
        $config['total_rows'] = $this->Wisata_model->count_all();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;

        // Style pagination
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $start = $this->uri->segment(3);
        $start = (is_numeric($start)) ? (int)$start : 0;

        $data['start'] = $start;
        $data['wisata'] = $this->Wisata_model->get_all($config['per_page'], $start);
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = 'Data Wisata Magelang';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('wisata/index', $data);
        $this->load->view('template/footer');
    }

    public function add() {
        $data['title'] = 'Tambah Data Wisata';
        $data['kecamatan'] = $this->Kecamatan_model->get_all();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('wisata/form', $data);
        $this->load->view('template/footer');
    }

    public function save() {
        $nama_pemilik = $this->input->post('nama_pemilik');
        $nik_pemilik = $this->input->post('nik_pemilik'); // input dari form tetap 'nik_pemilik'
        $no_telp = $this->input->post('no_telp');

        // Cek apakah pemilik sudah ada berdasarkan NIK
        $pemilik = $this->db->get_where('pemilik', ['nik_pemilik' => $nik_pemilik])->row();
        if ($pemilik) {
            $id_pemilik = $pemilik->id_pemilik;
        } else {
            $this->db->insert('pemilik', [
                'nik_pemilik' => $nik_pemilik,
                'nama_pemilik' => $nama_pemilik,
                'no_telp' => $no_telp
            ]);
            $id_pemilik = $this->db->insert_id();
        }

        $data = [
            'nama_wisata' => $this->input->post('nama_wisata'),
            'id_pemilik' => $id_pemilik,
            'id_kecamatan' => $this->input->post('id_kecamatan'),
            'jenis_wisata' => $this->input->post('jenis_wisata'),
            'alamat' => $this->input->post('alamat'),
            'jumlah_karyawan' => $this->input->post('jumlah_karyawan')
        ];

        $this->Wisata_model->insert($data);
        redirect('wisata');
    }

    public function edit($id) {
    $data['title'] = 'Edit Data Wisata';
    $data['wisata'] = $this->Wisata_model->get_by_id($id); 
    $data['kecamatan'] = $this->Kecamatan_model->get_all();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar');
    $this->load->view('wisata/form', $data);
    $this->load->view('template/footer');
}


    public function update($id) {
        $nama_pemilik = $this->input->post('nama_pemilik');
        $nik_pemilik = $this->input->post('nik_pemilik');
        $no_telp = $this->input->post('no_telp');

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
            $this->db->insert('pemilik', [
                'nik_pemilik' => $nik_pemilik,
                'nama_pemilik' => $nama_pemilik,
                'no_telp' => $no_telp
            ]);
            $id_pemilik = $this->db->insert_id();
        }

        $data = [
            'nama_wisata' => $this->input->post('nama_wisata'),
            'id_pemilik' => $id_pemilik,
            'id_kecamatan' => $this->input->post('id_kecamatan'),
            'jenis_wisata' => $this->input->post('jenis_wisata'),
            'alamat' => $this->input->post('alamat'),
            'jumlah_karyawan' => $this->input->post('jumlah_karyawan')
        ];

        $this->Wisata_model->update($id, $data);
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
        redirect('wisata');
    }
}
