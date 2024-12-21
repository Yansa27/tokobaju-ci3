<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->model('Kategori_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function view($id) {
        // Ambil data kategori berdasarkan ID
        $kategori = $this->Kategori_model->getKategoriById($id);

        // Ambil semua produk dalam kategori ini
        $produk = $this->Produk_model->getProdukByKategori($id);

        // Ambil semua kategori untuk navigasi
        $semua_kategori = $this->Kategori_model->getAllKategori();

        // Data yang akan dikirim ke view
        $data = [
            'kategori' => $kategori,
            'produk' => $produk,
            'semua_kategori' => $semua_kategori
        ];

        // Load view
        $this->load->view('kategori_view', $data);
    }
}
