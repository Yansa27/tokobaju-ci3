<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    // Mendapatkan detail pembelian berdasarkan ID
    public function get_detail_pembelian($idbeli) {
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->join('pengguna', 'pembelian.id = pengguna.id');
        $this->db->where('pembelian.idbeli', $idbeli);
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan data sebagai array
    }

    // Mendapatkan daftar produk pembelian berdasarkan ID pembelian
    public function get_produk_pembelian($idbeli) {
        $this->db->select('*');
        $this->db->from('pembelianproduk');
        $this->db->where('idbeli', $idbeli);
        $query = $this->db->get();
        return $query->result_array(); // Mengembalikan data sebagai array
    }

    // Mendapatkan detail pembayaran berdasarkan ID pembelian
    public function get_detail_pembayaran($idbeli) {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->where('idbeli', $idbeli);
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan data sebagai array
    }

    // Update Ongkir
    public function update_ongkir($idbeli, $ongkir) {
        $this->db->set('ongkir', $ongkir);
        $this->db->where('idbeli', $idbeli);
        return $this->db->update('pembelian');
    }

    // Update status pembelian dan resi
    public function update_status($idbeli, $resi, $statusbeli) {
        $this->db->set('resipengiriman', $resi);
        $this->db->set('statusbeli', $statusbeli);
        $this->db->where('idbeli', $idbeli);
        return $this->db->update('pembelian');
    }
}
