<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {
    public function get_all_kategori() {
        $query = $this->db->get('kategori'); // Mengambil semua data kategori
        return $query->result_array();
    }
}


