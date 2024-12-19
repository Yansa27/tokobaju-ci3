<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Memuat library database
        $this->load->database();
    }

    public function getProduk() {
        // Query untuk mengambil produk dari database
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
        $this->db->order_by('idproduk', 'desc');
        $this->db->limit(4);
        $query = $this->db->get();
        
        return $query->result_array(); // Mengembalikan hasil dalam bentuk array
    }
}
