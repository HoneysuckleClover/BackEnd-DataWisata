<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getAll() {
        return $this->db->get('kategori_wisata')->result();
    }

    public function getById($id) {
        return $this->db->get_where('kategori_wisata', ['id_kategori' => $id])->row();
    }

    public function insert($data) {
        $this->db->insert('kategori_wisata', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        $this->db->where('id_kategori', $id);
        return $this->db->update('kategori_wisata', $data);
    }

    public function delete($id) {
        $this->db->where('id_kategori', $id);
        return $this->db->delete('kategori_wisata');
    }

    public function countAll() {
        return $this->db->count_all('kategori_wisata');
    }
}
?>