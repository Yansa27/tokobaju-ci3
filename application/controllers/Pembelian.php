<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pembelian_model'); // Memuat model
    }

    public function index() {
        $idbeli = $this->input->get('id'); // Mendapatkan ID pembelian dari URL

        // Mengambil data pembelian dan detail pengguna
        $data['detail'] = $this->Pembelian_model->get_detail_pembelian($idbeli);
        $data['produk'] = $this->Pembelian_model->get_produk_pembelian($idbeli);
        $data['pembayaran'] = $this->Pembelian_model->get_detail_pembayaran($idbeli);

        // Menampilkan view
        $this->load->view('pembelian_view', $data);
    }

    public function update_ongkir() {
        $idbeli = $this->input->post('idbeli');
        $ongkir = $this->input->post('ongkir');
        
        // Update ongkir
        $this->Pembelian_model->update_ongkir($idbeli, $ongkir);

        // Redirect setelah update
        redirect('pembelian/index?id=' . $idbeli);
    }

    public function update_status() {
        $idbeli = $this->input->post('idbeli');
        $resi = $this->input->post('resi');
        $statusbeli = $this->input->post('statusbeli');

        // Update status pembelian dan resi
        $this->Pembelian_model->update_status($idbeli, $resi, $statusbeli);

        // Redirect setelah update
        redirect('pembelian/index?id=' . $idbeli);
    }
}
