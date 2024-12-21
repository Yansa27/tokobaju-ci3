<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Produk_model'); // Load model untuk produk
        $this->load->model('Kategori_model');
        $this->load->library('session'); // Pastikan library session terload
        $this->load->helper(['url', 'form']);
    }

    public function index()
    {
        $data['keranjang'] = [];
        $data['datakategori'] = $this->Kategori_model->get_all_kategori();
        if (!empty($this->session->userdata('keranjang'))) {
            $keranjang = $this->session->userdata('keranjang');
            foreach ($keranjang as $idproduk => $jumlah) {
                $produk = $this->Produk_model->getProdukById($idproduk);
                if ($produk) {
                    $produk['jumlah'] = $jumlah;
                    $produk['totalharga'] = $produk['hargaproduk'] * $jumlah;
                    $data['keranjang'][] = $produk;
                }
            }
        }

        $this->load->view('keranjang', $data);
    }

    public function tambah()
    {
        $idproduk = $this->input->post('idproduk');
        $jumlah = (int) $this->input->post('jumlah');

        if (!$idproduk || $jumlah <= 0) {
            $this->session->set_flashdata('error', 'Gagal menambahkan ke keranjang, data tidak valid.');
            redirect('keranjang');
        }

        // Ambil data keranjang dari session
        $keranjang = $this->session->userdata('keranjang');

        // Tambahkan atau perbarui item dalam keranjang
        if (isset($keranjang[$idproduk])) {
            $keranjang[$idproduk] += $jumlah;
        } else {
            $keranjang[$idproduk] = $jumlah;
        }

        // Simpan kembali ke session
        $this->session->set_userdata('keranjang', $keranjang);

        $this->session->set_flashdata('success', 'Produk berhasil ditambahkan ke keranjang!');
        redirect('keranjang');
    }

    public function hapus($idproduk)
    {
        $keranjang = $this->session->userdata('keranjang');

        // Hapus item dari keranjang jika ada
        if (isset($keranjang[$idproduk])) {
            unset($keranjang[$idproduk]);
            $this->session->set_userdata('keranjang', $keranjang);
            $this->session->set_flashdata('success', 'Produk berhasil dihapus dari keranjang!');
        } else {
            $this->session->set_flashdata('error', 'Produk tidak ditemukan di keranjang.');
        }

        redirect('keranjang');
    }

    public function kosongkan()
    {
        $this->session->unset_userdata('keranjang');
        $this->session->set_flashdata('success', 'Keranjang berhasil dikosongkan!');
        redirect('keranjang');
    }
}
?>
