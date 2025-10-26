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
}
?>