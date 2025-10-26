<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata_model extends CI_Model {

    private $table = 'wisata';

    public function __construct() {
        parent::__construct();
    }

    // Hitung total data untuk pagination
    public function count_all() {
        return $this->db->count_all($this->table);
    }

    // Ambil semua data dengan join untuk pagination
    public function get_all($limit = 5, $start = 0) {
        $this->db->select('
            w.id_wisata,
            w.nama_wisata,
            w.jenis_wisata,
            w.alamat,
            w.jumlah_karyawan,
            w.id_pemilik,
            w.id_kecamatan,
            p.nama_pemilik AS pemilik_wisata,
            p.no_telp,
            k.nama_kecamatan AS kecamatan_wisata
        ');
        $this->db->from('wisata w');
        $this->db->join('pemilik p', 'w.id_pemilik = p.id_pemilik', 'left');
        $this->db->join('kecamatan k', 'w.id_kecamatan = k.id_kecamatan', 'left');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    // Ambil data berdasarkan ID
    public function get_by_id($id) {
    $this->db->select('
        w.id_wisata,
        w.nama_wisata,
        w.jenis_wisata,
        w.alamat,
        w.jumlah_karyawan,
        w.id_pemilik,
        w.id_kecamatan,
        p.nama_pemilik,
        p.nik_pemilik AS nik_pemilik,
        p.no_telp,
        k.nama_kecamatan
    ');
    $this->db->from('wisata w');
    $this->db->join('pemilik p', 'w.id_pemilik = p.id_pemilik', 'left');
    $this->db->join('kecamatan k', 'w.id_kecamatan = k.id_kecamatan', 'left');
    $this->db->where('w.id_wisata', $id);

    // Jalankan query
    $query = $this->db->get();
    $result = $query->row();

    return $result;
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

    // Ambil detail wisata lengkap dengan fasilitas
    public function get_detail($id) {
        $this->db->select('
            w.id_wisata,
            w.nama_wisata,
            w.jenis_wisata,
            w.alamat,
            w.jumlah_karyawan,
            w.id_pemilik,
            w.id_kecamatan,
            p.nama_pemilik,
            p.nik_pemilik AS nik_pemilik,
            p.no_telp,
            k.nama_kecamatan,
            GROUP_CONCAT(f.nama_fasilitas SEPARATOR ", ") AS fasilitas
        ');
        $this->db->from('wisata w');
        $this->db->join('pemilik p', 'w.id_pemilik = p.id_pemilik', 'left');
        $this->db->join('kecamatan k', 'w.id_kecamatan = k.id_kecamatan', 'left');
        $this->db->join('wisata_fasilitas wf', 'w.id_wisata = wf.id_wisata', 'left');
        $this->db->join('fasilitas f', 'wf.id_fasilitas = f.id_fasilitas', 'left');
        $this->db->where('w.id_wisata', $id);
        $this->db->group_by('w.id_wisata');
        return $this->db->get()->row();
    }

}
