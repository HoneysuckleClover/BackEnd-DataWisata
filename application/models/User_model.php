<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function count_all()
    {
        return $this->db->count_all('user'); // Ganti dengan nama tabel user Anda
    }
    
    public function get_recent_wisata($limit = 5)
    {
        $this->db->select('w.nama_wisata, k.nama_kecamatan as lokasi, COALESCE(kat.nama_kategori, "Umum") as kategori');
        $this->db->from('wisata w');
        $this->db->join('kecamatan k', 'w.id_kecamatan = k.id_kecamatan', 'left');
        $this->db->join('kategori_wisata kat', 'w.id_kategori = kat.id_kategori', 'left');
        $this->db->order_by('w.id_wisata', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }
}