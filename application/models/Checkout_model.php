<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_model extends CI_Model {

    public function simpan_pembelian($data) {
        $this->db->insert('pembelian', $data);
        return $this->db->insert_id();
    }

    public function simpan_detail($data) {
        $this->db->insert('pembelianproduk', $data);
    }

    public function get_produk($idproduk) {
        return $this->db->get_where('produk', ['idproduk' => $idproduk])->row_array();
    }

    public function get_pembelian($idpembelian) {
        return $this->db->get_where('pembelian', ['idbeli' => $idpembelian])->row_array();
    }

    public function get_detail($idpembelian) {
        return $this->db->get_where('pembelianproduk', ['idbeli' => $idpembelian])->result_array();
    }
}
