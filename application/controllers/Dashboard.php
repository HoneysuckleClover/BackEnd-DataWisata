<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }
    
    public function index()
    {
        $data['title'] = 'Dashboard';

        // Ambil total dari database
        $data['total_wisata'] = $this->db->count_all('wisata');
        $data['total_fasilitas'] = $this->db->count_all('fasilitas');
        $data['total_kategori'] = $this->db->count_all('kategori_wisata');
        $data['total_user'] = $this->User_model->count_all('user');
        
        // Ambil wisata terbaru melalui model
        $data['wisata_terbaru'] = $this->User_model->get_recent_wisata(5);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('template/footer');
    }
}