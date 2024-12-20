<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    // Fungsi untuk mendapatkan jumlah kategori
    public function get_kategori_count() {
        $query = $this->db->count_all('kategori');
        return $query;
    }

    // Fungsi untuk mendapatkan jumlah produk
    public function get_produk_count() {
        $query = $this->db->count_all('produk');
        return $query;
    }

    // Fungsi untuk mendapatkan jumlah member dengan level 'Pelanggan'
    public function get_member_count() {
        $this->db->where('level', 'Pelanggan');
        $query = $this->db->count_all_results('pengguna');
        return $query;
    }

    // Fungsi untuk mendapatkan jumlah pembelian
    public function get_pembelian_count() {
        $query = $this->db->count_all('pembelian');
        return $query;
    }

    // Fungsi untuk grafik penjualan bulanan
    public function get_penjualangrafik() {
        $tahunini = date('Y');
        $bulanini = date('m');
        $penjualangrafik = array();

        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $this->db->select_sum('totalbeli');
            $this->db->where('MONTH(tanggalbeli)', $bulan);
            $this->db->where('YEAR(tanggalbeli)', $tahunini);
            $this->db->where_not_in('statusbeli', ['Menunggu Konfirmasi Admin', 'Belum Bayar', 'Pesanan Di Tolak']);
            $query = $this->db->get('pembelian');
            $result = $query->row();
            $penjualangrafik[] = $result->totalbeli;
        }

        return $penjualangrafik;
    }
}
