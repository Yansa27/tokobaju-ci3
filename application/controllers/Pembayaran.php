<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pembelian_model');
        $this->load->model('Pembayaran_model');
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
        $this->load->library('form_validation');
    }

    public function index($idpem) {
        if (!$this->session->userdata('pengguna')) {
            $this->session->set_flashdata('error', 'Anda belum login.');
            redirect('login');
        }
    
        $id_login = $this->session->userdata('pengguna')['id'];
        $detpem = $this->Pembelian_model->getPembelian_ById($idpem);
    
        if (!$detpem || $id_login != $detpem['id']) {
            $this->session->set_flashdata('error', 'Gagal.');
            redirect('riwayat');
        }
    
        $deadline = date('Y-m-d H:i', strtotime($detpem['waktu'] . ' +1 day'));
        if (date('Y-m-d H:i') >= $deadline) {
            $this->session->set_flashdata('error', 'Waktu pembayaran telah habis.');
            redirect('riwayat');
        }
    
        $data['detail'] = $detpem;
        $data['produk'] = $this->Pembelian_model->getProdukByPembelian($idpem);
        $data['deadline'] = $deadline;
    
        $this->load->view('pembayaran', $data);
    }
    

    public function uploadBukti($idpem)
    {
        // Pastikan pengguna sudah login
        if (!$this->session->userdata('pengguna')) {
            $this->session->set_flashdata('error', 'Anda belum login.');
            redirect('login');
        }
    
        $id_login = $this->session->userdata('pengguna')['id'];
    
        // Ambil detail pembelian
        $detpem = $this->Pembelian_model->getPembelianById($idpem);
    
        if (!$detpem || $id_login != $detpem['id']) {
            $this->session->set_flashdata('error', 'Gagal.');
            redirect('riwayat');
        }
    
        // Validasi jika batas waktu sudah habis
        $deadline = date('Y-m-d H:i', strtotime($detpem['waktu'] . ' +1 day'));
        if (date('Y-m-d H:i') >= $deadline) {
            $this->session->set_flashdata('error', 'Waktu pembayaran telah habis.');
            redirect('riwayat');
        }
    
        // Validasi input
        $this->form_validation->set_rules('nama', 'Nama Rekening', 'required');
        $this->form_validation->set_rules('tanggaltransfer', 'Tanggal Transfer', 'required');
    
        if (empty($_FILES['bukti']['name'])) {
            $this->form_validation->set_rules('bukti', 'Bukti Pembayaran', 'required');
        }
    
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('pembayaran/index/' . $idpem);
        }
    
        // Proses upload file
        $config['upload_path']   = './assets/foto/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size']      = 2048; // Maksimal 2MB
        $config['file_name']     = 'bukti_' . $idpem . '_' . time();
    
        $this->load->library('upload', $config);
    
        if (!$this->upload->do_upload('bukti')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('pembayaran/index/' . $idpem);
        }
    
        // Jika berhasil upload, ambil data file
        $fileData = $this->upload->data();
        $filePath = $fileData['file_name'];
    
        // Simpan data ke database
        $data = [
            'idbeli'           => $idpem,
            'nama'             => $this->input->post('nama'),
            'tanggaltransfer'  => $this->input->post('tanggaltransfer'),
            'bukti'            => $filePath,
            'tanggal'          => date('Y-m-d H:i:s'),  // Tanggal pembayaran saat ini
        ];
    
        // Simpan data pembayaran ke tabel pembayaran
        if ($this->Pembelian_model->insertPembayaran($data)) {
            // Update status pembelian
            $this->Pembelian_model->updateStatusPembelian($idpem, 'Sudah Upload Bukti Pembayaran');
            $this->session->set_flashdata('success', 'Bukti pembayaran berhasil diunggah. Silakan tunggu konfirmasi.');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    
        redirect('riwayat');
    }
    
    
}
