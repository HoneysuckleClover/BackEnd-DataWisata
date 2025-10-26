<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  public function index()
  {
    $data['title'] = 'Dashboard';

    // Ambil total dari database
    $data['total_wisata'] = $this->db->count_all('wisata');
    $data['total_fasilitas'] = $this->db->count_all('fasilitas');
    $data['total_pengunjung'] = rand(50,200); // contoh data dummy

    // Ambil 5 wisata terbaru tanpa join ke tabel jenis
$data['wisata_terbaru'] = $this->db
  ->select('w.nama_wisata, k.nama_kecamatan as lokasi, "Umum" as kategori')
  ->from('wisata w')
  ->join('kecamatan k', 'w.id_kecamatan = k.id_kecamatan', 'left')
  ->order_by('w.id_wisata', 'DESC')
  ->limit(5)
  ->get()
  ->result();


    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('dashboard', $data);
    $this->load->view('template/footer');
  }
}
