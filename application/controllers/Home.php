<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Memuat model
        $this->load->model('Produk_model');
        $this->load->model('Kategori_model');
        $this->load->library('session');
        
        // Memuat helper URL untuk base_url()
        $this->load->helper('url');
    }

    public function index() {
        // Ambil data kategori untuk ditampilkan di halaman utama
        $data['datakategori'] = $this->Kategori_model->get_all_kategori();
        $data['title'] = 'Welcome to Our Shop';
        $data['produk'] = $this->Produk_model->getAllProduk();
        // Muat tampilan halaman utama
        $this->load->view('home', $data);
    }

    public function produk() {
        // Ambil keyword pencarian dari input GET (jika ada)
        $keyword = $this->input->get('search', TRUE);
    
        // Ambil data produk berdasarkan pencarian dari model
        $data['produk'] = $this->Produk_model->get_produkk($keyword);
    
        // Ambil data kategori dari model
        $data['datakategori'] = $this->Kategori_model->get_all_kategori();
    
        // Set judul halaman
        $data['title'] = 'Collection Products';
    
        // Muat tampilan halaman produk
        $this->load->view('produk', $data); // View khusus halaman produk
    }
    

    public function detail($idproduk) {
        // Load model dan library yang dibutuhkan
        $this->load->model('Produk_model');
        $this->load->model('Ulasan_model');
        $data['datakategori'] = $this->Kategori_model->get_all_kategori();
        
        // Ambil data produk berdasarkan ID
        $data['detail'] = $this->Produk_model->getDetailProduk($idproduk);
        
        // Ambil ulasan dengan pagination
        $jumlah_ulasan_per_halaman = 5;
        $halaman_saat_ini = $this->input->get('halaman') ?: 1;
        $offset = ($halaman_saat_ini - 1) * $jumlah_ulasan_per_halaman;

        $data['ulasan'] = $this->Ulasan_model->getUlasanProduk($idproduk, $jumlah_ulasan_per_halaman, $offset);
        $data['total_halaman'] = ceil($this->Ulasan_model->countUlasanProduk($idproduk) / $jumlah_ulasan_per_halaman);
        $data['halaman_saat_ini'] = $halaman_saat_ini;
        
        // Load view
        $this->load->view('detail', $data);
    }

    public function tambahUlasan($idproduk) {
        // Tangkap data ulasan dari form
        $nama_pengulas = $this->input->post('nama_pengulas');
        $rating = $this->input->post('rating');
        $ulasan = $this->input->post('ulasan');

        // Simpan ulasan ke database
        $this->Ulasan_model->tambahUlasan($idproduk, $nama_pengulas, $rating, $ulasan);

        // Redirect kembali ke detail produk
        $this->session->set_flashdata('success', 'Ulasan berhasil disimpan');
        redirect("produk/detail/$idproduk");
    }
}
