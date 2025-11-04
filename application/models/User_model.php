<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function count_all()
    {
        return $this->db->count_all('user');
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

    // Tambahkan method untuk manage user
    public function get_all_users()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('id_user', 'DESC');
        return $this->db->get()->result();
    }

    public function get_paginated($limit, $offset)
    {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->order_by('id_user', 'DESC');
    $this->db->limit($limit, $offset);
    return $this->db->get()->result();
    }


    public function get_user_by_id($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('user')->row();
    }

    public function insert_user($data)
    {
        return $this->db->insert('user', $data);
    }

    public function update_user($id, $data)
    {
        $this->db->where('id_user', $id);
        return $this->db->update('user', $data);
    }

    public function delete_user($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->delete('user');
    }

    public function count_active_users()
    {
        // Karena tidak ada field is_active, kita hitung semua user sebagai active
        return $this->db->count_all('user');
    }

    public function check_username_exists($username, $exclude_id = null)
    {
        $this->db->where('username', $username);
        if ($exclude_id) {
            $this->db->where('id_user !=', $exclude_id);
        }
        return $this->db->get('user')->num_rows() > 0;
    }

    // Tambahkan field lain jika diperlukan (email, role, dll)
    public function get_user_role($user_id)
    {
        $this->db->select('role');
        $this->db->where('id_user', $user_id);
        $result = $this->db->get('user')->row();
        return $result ? $result->role : 'user';
    }
}