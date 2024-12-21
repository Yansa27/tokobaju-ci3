<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function updatePembelian($idpem, $data)
    {
        $this->db->where('idbeli', $idpem);
        return $this->db->update('pembayaran', $data);
    }
    public function updateStatusPembelian($id, $status) {
        $this->db->where('idbeli', $id);
        $this->db->update('pembelian', ['statusbeli' => $status]);
    }


    public function getPembelian_ById($idpem) {
        $this->db->select('pembelian.*, pengguna.nama, pengguna.telepon, pengguna.email');
        $this->db->from('pembelian');
        $this->db->join('pengguna', 'pengguna.id = pembelian.id', 'left');
        $this->db->where('pembelian.idbeli', $idpem);
        $query = $this->db->get();
        return $query->row_array();
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
    public function update_status($idbeli, $statusbeli) {
        $this->db->set('statusbeli', $statusbeli);
        $this->db->where('idbeli', $idbeli);
        return $this->db->update('pembelian');
    }



    public function getPembelianById($id) {
        return $this->db->get_where('pembelian', ['idbeli' => $id])->row_array();
    }

    public function getProdukByPembelian($id) {
        return $this->db->get_where('pembelianproduk', ['idbeli' => $id])->result_array();
    }

    public function insertPembayaran($data)
{
    // Menyimpan data ke tabel pembayaran
    $this->db->insert('pembayaran', $data);
    return $this->db->affected_rows() > 0;
}


}


