<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testuser extends CI_Controller {
    public function index() {
        echo "TESTUSER CONTROLLER BERHASIL DIAKSES!";
        echo "<br>URL: " . current_url();
        die();
    }
}