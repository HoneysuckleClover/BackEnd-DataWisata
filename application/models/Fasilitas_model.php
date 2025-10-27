<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas_model extends CI_Model {

    private $table = 'fasilitas';

    public function __construct() {
        parent::__construct();
    }

    // Ambil semua fasilitas
    public function get_all() {
        return $this->db->get($this->table)->result();
    }

    // Di Fasilitas_model
    public function get_by_wisata($id_wisata) {
    $this->db->select('f.id_fasilitas');
    $this->db->from('fasilitas f');
    $this->db->join('wisata_fasilitas wf', 'f.id_fasilitas = wf.id_fasilitas');
    $this->db->where('wf.id_wisata', $id_wisata);
    $query = $this->db->get();
    
    // Pastikan mengembalikan array kosong jika tidak ada data
    return $query->num_rows() > 0 ? $query->result() : [];
    }

    // Tambah fasilitas ke wisata
    public function add_to_wisata($id_wisata, $fasilitas) {
        // Hapus dulu yang lama
        $this->db->where('id_wisata', $id_wisata);
        $this->db->delete('wisata_fasilitas');
        
        // Tambah yang baru
        if(!empty($fasilitas)) {
            $data = [];
            foreach($fasilitas as $id_fasilitas) {
                $data[] = [
                    'id_wisata' => $id_wisata,
                    'id_fasilitas' => $id_fasilitas
                ];
            }
            return $this->db->insert_batch('wisata_fasilitas', $data);
        }
        return true;
    }

    // ===== METHOD BARU UNTUK CRUD FASILITAS =====

    // Get data by ID
    public function get_by_id($id) {
        return $this->db->get_where($this->table, ['id_fasilitas' => $id])->row();
    }

    // Insert data
    public function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // Update data
    public function update($id, $data) {
        $this->db->where('id_fasilitas', $id);
        return $this->db->update($this->table, $data);
    }

    // Delete data
    public function delete($id) {
        $this->db->where('id_fasilitas', $id);
        return $this->db->delete($this->table);
    }

    // Count all data
    public function count_all() {
        return $this->db->count_all($this->table);
    }

    // Get paginated data
    public function get_paginated($limit, $offset) {
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table)->result();
    }

    // Check if fasilitas has wisata
    public function has_wisata($id_fasilitas) {
        $this->db->where('id_fasilitas', $id_fasilitas);
        return $this->db->count_all_results('wisata_fasilitas') > 0;
    }
}
?>