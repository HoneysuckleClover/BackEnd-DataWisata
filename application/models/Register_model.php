<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function insert_user($data) {
        $this->db->insert('user', $data);
    }
}
?>
