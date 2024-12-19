<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Memuat model
        $this->load->model('Produk_model');
        $this->load->model('Kategori_model');
        
        // Memuat helper URL untuk base_url()
        $this->load->helper('url');
    }

    public function index() {
        // Ambil data produk dan kategori dari model
        $data['produk'] = $this->Produk_model->getProduk();
        $data['datakategori'] = $this->Kategori_model->get_all_kategori();

        // Muat tampilan halaman dengan data
        $this->load->view('home', $data);  // Pass data ke view
    }
}
