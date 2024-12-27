<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Checkout_model');
        $this->load->model('Produk_model');
        $this->load->model('Kategori_model');
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
        if (!$this->session->userdata('pengguna')) {
            redirect('login');
        }
    }

        public function index() {
            // Ambil data keranjang dan pengguna dari session
            $data['keranjang'] = $this->session->userdata('keranjang');
            $data['pengguna'] = $this->session->userdata('pengguna');
            
        
            // Load view checkout
            $this->load->view('checkout_view', $data);
        }
    
        
    

        public function proses_checkout() {
            $post = $this->input->post();
        
            // Data utama checkout
            $notransaksi = '#TP' . date("Ymdhis");
            $id_user = $this->session->userdata('pengguna')['id'];
            $tanggalbeli = date("Y-m-d");
            $waktu = date("Y-m-d H:i:s");
        
            // Menghitung status berdasarkan metode pembayaran
            $statusbeli = ($post['metodepembayaran'] == 'COD') ? 'Belum di Konfirmasi' : 'Belum Bayar';
        
            // Data untuk pembelian
            $data_pembelian = [
                'notransaksi' => $notransaksi,
                'id' => $id_user,
                'tanggalbeli' => $tanggalbeli,
                'totalbeli' => $post['totalbelanja'],
                'alamatpengiriman' => $post['alamatpengiriman'],
                'totalberat' => $post['berat'],
                'kota' => $post['nama_distrik'], // Input manual
                'provinsi' => $post['nama_provinsi'], // Input manual
                'statusbeli' => $statusbeli,
                'waktu' => $waktu,
                'metodepembayaran' => $post['metodepembayaran']
            ];
        
            // Simpan data pembelian ke database
            $idpembelian = $this->Checkout_model->simpan_pembelian($data_pembelian);
        
            if ($idpembelian) {
                // Simpan detail pembelian
                $keranjang = $this->session->userdata('keranjang');
                foreach ($keranjang as $idproduk => $jumlah) {
                    $produk = $this->Checkout_model->get_produk($idproduk);
        
                    if ($produk) {
                        $data_detail = [
                            'idbeli' => $idpembelian, // Sesuai dengan foreign key idbeli
                            'idproduk' => $idproduk,
                            'nama' => $produk['namaproduk'],
                            'harga' => $produk['hargaproduk'],
                            'jumlah' => $jumlah,
                            'subharga' => $produk['hargaproduk'] * $jumlah
                        ];
        
                        $this->Checkout_model->simpan_detail($data_detail);
        
                        // Kurangi stok produk
                        $stokbaru = $produk['stokproduk'] - $jumlah;
                        if ($stokbaru < 0) {
                            // Stok tidak mencukupi
                            $this->session->set_flashdata('error', 'Stok untuk produk ' . $produk['namaproduk'] . ' tidak mencukupi.');
                            redirect('keranjang');
                        }
                        $this->Checkout_model->update_stok_produk($idproduk, $stokbaru);
                    }
                }
        
                // Hapus keranjang dari session
                $this->session->unset_userdata('keranjang');
                redirect('riwayat');
            } else {
                redirect('checkout');
            }
        }
        
        
        

    public function sukses($idpembelian) {
        $data['pembelian'] = $this->Checkout_model->get_pembelian($idpembelian);
        $data['detail'] = $this->Checkout_model->get_detail($idpembelian);
        $this->load->view('checkout_sukses', $data);
    }
}
