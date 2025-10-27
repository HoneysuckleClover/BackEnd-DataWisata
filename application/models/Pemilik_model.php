<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilik_model extends CI_Model {

    protected $table = 'pemilik';
    protected $primary_key = 'id_pemilik';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Get all data
    public function get_all() {
        return $this->db->get($this->table)->result_array();
    }

    // Get data by ID
    public function get_by_id($id) {
        return $this->db->get_where($this->table, [$this->primary_key => $id])->row_array();
    }

    // Insert data
    public function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // Update data
    public function update($id, $data) {
        $this->db->where($this->primary_key, $id);
        return $this->db->update($this->table, $data);
    }

    // Delete data
    public function delete($id) {
        $this->db->where($this->primary_key, $id);
        return $this->db->delete($this->table);
    }

    // Count all data
    public function count_all() {
        return $this->db->count_all($this->table);
    }

    // Get paginated data
    public function get_paginated($limit, $offset) {
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table)->result_array();
    }

    // Check if pemilik has wisata
    public function has_wisata($id_pemilik) {
        $this->db->where('id_pemilik', $id_pemilik);
        return $this->db->count_all_results('wisata') > 0;
    }
}