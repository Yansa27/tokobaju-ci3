<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public function getAllTransaksi()
    {
        $this->db->select('pembelian.*, pengguna.nama');
        $this->db->from('pembelian');
        $this->db->join('pengguna', 'pengguna.id = pembelian.id');
        $this->db->order_by('pembelian.tanggalbeli', 'DESC');
        $this->db->order_by('pembelian.idbeli', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getDetailTransaksi($id)
    {
        $this->db->select('pembelian.*, pengguna.nama');
        $this->db->from('pembelian');
        $this->db->join('pengguna', 'pengguna.id = pembelian.id');
        $this->db->where('pembelian.idbeli', $id);
        return $this->db->get()->row_array();
    }

    public function getProdukByTransaksi($idbeli)
    {
        $this->db->select('pembelianproduk.*, produk.namaproduk');
        $this->db->from('pembelianproduk');
        $this->db->join('produk', 'produk.idproduk = pembelianproduk.idproduk');
        $this->db->where('pembelianproduk.idbeli', $idbeli);
        return $this->db->get()->result_array();
    }
    

    public function get_pembelian_detail($idbeli)
{
    $this->db->select('pembelian.*, pengguna.nama, pengguna.telepon, pengguna.email');
    $this->db->from('pembelian');
    $this->db->join('pengguna', 'pembelian.id = pengguna.id', 'left'); // Jika kolom `id` di pembelian berhubungan dengan `id` di pengguna
    $this->db->where('pembelian.idbeli', $idbeli);
    $query = $this->db->get();
    return $query->row_array(); // Mengembalikan hasil sebagai array
}

public function get_produk_pembelian($idbeli)
{
    $this->db->select('pembelian.*, produk.nama_produk, produk.harga_produk');
    $this->db->from('detail_pembelian');
    $this->db->join('produk', 'pembelian.id_produk = produk.id_produk', 'left'); // Sesuaikan kolom relasi
    $this->db->where('pembelian.idbeli', $idbeli);
    $query = $this->db->get();
    return $query->result_array(); // Mengembalikan hasil sebagai array
}

  

   
}
