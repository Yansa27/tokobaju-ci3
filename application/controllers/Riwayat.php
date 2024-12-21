<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Riwayat_model');
        $this->load->model('Kategori_model');
        $this->load->helper(['url', 'form']);
        if (!$this->session->userdata('pengguna')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $id_pengguna = $this->session->userdata('pengguna')['id'];
        $data['riwayat'] = $this->Riwayat_model->get_riwayat_pembelian($id_pengguna);
        $data['datakategori'] = $this->Kategori_model->get_all_kategori();
        $this->load->view('riwayat', $data);
    }

    public function konfirmasi_selesai()
    {
        $id_beli = $this->input->post('idbeli');
        $this->Riwayat_model->update_status_pesanan($id_beli, 'Selesai');
        $this->session->set_flashdata('success', 'Pesanan berhasil dikonfirmasi selesai.');
        redirect('riwayat');
    }
}
