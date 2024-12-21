<?php
class Produk_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_produk($idproduk) {
        $this->db->where('idproduk', $idproduk);
        $query = $this->db->get('produk');
        return $query->row_array();
    }

    public function getProdukByKategori($id_kategori) {
        $this->db->where('id_kategori', $id_kategori);
        $query = $this->db->get('produk');
        return $query->result_array();
    }

    // Mendapatkan semua data produk beserta kategori
    public function getAllProduk() {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDetailProduk($idproduk) {
        return $this->db->get_where('produk', ['idproduk' => $idproduk])->row_array();
    }

    // Mendapatkan produk berdasarkan ID
    public function getProdukById($id) {
        $this->db->where('idproduk', $id);
        $query = $this->db->get('produk');
        return $query->row_array();
    }

    // Mengupdate produk
    public function ubahProduk($id, $namaProduk, $kategori, $hargaProduk, $fotoProduk, $stokProduk, $beratProduk) {
        $data = [
            'namaproduk' => $namaProduk,
            'id_kategori' => $kategori,
            'hargaproduk' => $hargaProduk,
            'fotoproduk' => $fotoProduk,
            'stokproduk' => $stokProduk,
            'beratproduk' => $beratProduk
        ];
        $this->db->where('idproduk', $id);
        $this->db->update('produk', $data);
    }

    // Menghapus produk berdasarkan ID
    public function hapusProduk($id) {
        $this->db->where('idproduk', $id);
        $this->db->delete('produk');
    }
}


