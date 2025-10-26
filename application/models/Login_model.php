<?php
    class Login_model extends CI_Model {
        // Melakukan cek id dan password login
        function auth_login ($username, $password) {
            $query=$this->db->query ("SELECT * FROM user WHERE username='$username' AND password=md5('$password')");
            return $query;
        }
    }

?>