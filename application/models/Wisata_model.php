<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata_model extends CI_Model {

    private $table = 'wisata';

    public function __construct() {
        parent::__construct();
    }

    // Hitung total data
    public function count_all() {
        return $this->db->count_all($this->table);
    }

    // Ambil data dengan pagination
    public function get_paginated($limit, $start) {
        $this->db->select('
            w.id_wisata,
            w.nama_wisata,
            w.alamat,
            w.jumlah_karyawan,
            w.id_kategori,
            p.nama_pemilik,
            p.no_telp,
            k.nama_kecamatan,
            kw.nama_kategori as nama_jenis_wisata
        ');
        $this->db->from('wisata w');
        $this->db->join('pemilik p', 'w.id_pemilik = p.id_pemilik', 'left');
        $this->db->join('kecamatan k', 'w.id_kecamatan = k.id_kecamatan', 'left');
        $this->db->join('kategori_wisata kw', 'w.id_kategori = kw.id_kategori', 'left');
        $this->db->limit($limit, $start);
        $this->db->order_by('w.id_wisata', 'DESC');
        
        $query = $this->db->get();
        return $query->result();
    }

    // Ambil semua data
    public function get_all() {
        $this->db->select('
            w.id_wisata,
            w.nama_wisata,
            w.alamat,
            w.jumlah_karyawan,
            w.id_kategori,
            p.nama_pemilik,
            p.no_telp,
            k.nama_kecamatan,
            kw.nama_kategori as nama_jenis_wisata
        ');
        $this->db->from('wisata w');
        $this->db->join('pemilik p', 'w.id_pemilik = p.id_pemilik', 'left');
        $this->db->join('kecamatan k', 'w.id_kecamatan = k.id_kecamatan', 'left');
        $this->db->join('kategori_wisata kw', 'w.id_kategori = kw.id_kategori', 'left');
        $this->db->order_by('w.id_wisata', 'DESC');
        
        $query = $this->db->get();
        return $query->result();
    }

    // Ambil data berdasarkan ID
    public function get_by_id($id) {
        $this->db->select('
            w.id_wisata,
            w.nama_wisata,
            w.alamat,
            w.jumlah_karyawan,
            w.id_pemilik,
            w.id_kecamatan,
            w.id_kategori,
            p.nama_pemilik,
            p.nik_pemilik,
            p.no_telp,
            k.nama_kecamatan,
            kw.nama_kategori as nama_jenis_wisata
        ');
        $this->db->from('wisata w');
        $this->db->join('pemilik p', 'w.id_pemilik = p.id_pemilik', 'inner');
        $this->db->join('kecamatan k', 'w.id_kecamatan = k.id_kecamatan', 'left');
        $this->db->join('kategori_wisata kw', 'w.id_kategori = kw.id_kategori', 'left');
        $this->db->where('w.id_wisata', $id);

        $query = $this->db->get();
        return $query->row();
    }

    // Tambah data wisata
    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    // Update data wisata
    public function update($id, $data) {
        $this->db->where('id_wisata', $id);
        return $this->db->update($this->table, $data);
    }

    // Hapus data wisata
    public function delete($id) {
        $this->db->where('id_wisata', $id);
        return $this->db->delete($this->table);
    }

    public function get_detail($id) {
        $this->db->select('
            w.id_wisata,
            w.nama_wisata,
            w.alamat,
            w.jumlah_karyawan,
            w.id_pemilik,
            w.id_kecamatan,
            w.id_kategori,
            p.nama_pemilik,
            p.nik_pemilik,
            p.no_telp,
            k.nama_kecamatan,
            kw.nama_kategori as nama_jenis_wisata,
            GROUP_CONCAT(f.nama_fasilitas SEPARATOR ", ") AS fasilitas
        ');
        $this->db->from('wisata w');
        $this->db->join('pemilik p', 'w.id_pemilik = p.id_pemilik', 'left');
        $this->db->join('kecamatan k', 'w.id_kecamatan = k.id_kecamatan', 'left');
        $this->db->join('kategori_wisata kw', 'w.id_kategori = kw.id_kategori', 'left');
        $this->db->join('wisata_fasilitas wf', 'w.id_wisata = wf.id_wisata', 'left');
        $this->db->join('fasilitas f', 'wf.id_fasilitas = f.id_fasilitas', 'left');
        $this->db->where('w.id_wisata', $id);
        $this->db->group_by('w.id_wisata');
        
        $query = $this->db->get();
        return $query->row();
    }
}
?>