<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_model extends CI_Model
{
    // Mengambil data riwayat pembelian berdasarkan ID pengguna
    public function get_riwayat_pembelian($id_pengguna)
    {
        $this->db->select('
            pembelian.idbeli,
            pembelian.notransaksi,
            pembelian.tanggalbeli,
            pembelian.totalbeli,
            pembelian.alamatpengiriman,
            pembelian.totalberat,
            pembelian.statusbeli,
            pembelian.metodepengiriman,
            pembelian.provinsi,
            pembelian.kota,
            pembelian.metodepembayaran,
            pembayaran.bukti,
            pembayaran.nama AS nama_pembayar,
            pembayaran.tanggaltransfer,
            pembayaran.tanggal AS tanggal_pembayaran
        ');
        $this->db->from('pembelian');
        $this->db->join('pembayaran', 'pembelian.idbeli = pembayaran.idbeli', 'left');
        $this->db->where('pembelian.id', $id_pengguna);
        $this->db->order_by('pembelian.tanggalbeli', 'desc');
        $this->db->order_by('pembelian.idbeli', 'desc');
        return $this->db->get()->result_array();
    }

    // Mengambil produk yang dibeli berdasarkan ID pembelian
    public function get_produk_pembelian($id_beli)
    {
        $this->db->select('
            produk.namaproduk,
            pembelianproduk.jumlah
        ');
        $this->db->from('pembelianproduk');
        $this->db->join('produk', 'pembelianproduk.idproduk = produk.idproduk');
        $this->db->where('pembelianproduk.idbeli', $id_beli);
        return $this->db->get()->result_array();
    }

    // Memperbarui status pesanan berdasarkan ID pembelian
    public function update_status_pesanan($id_beli, $status)
    {
        $this->db->set('statusbeli', $status);
        $this->db->where('idbeli', $id_beli);
        $this->db->update('pembelian');
    }
}
