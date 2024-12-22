<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomOrderController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CustomOrderModel'); // Load model
        $this->load->model('Kategori_model');
        $this->load->helper(['url', 'form']);
    }

    // Halaman utama menampilkan semua custom orders
    public function index() {
        $data['datakategori'] = $this->Kategori_model->get_all_kategori();
        $data['orders'] = $this->CustomOrderModel->get_all(); // Ambil semua data
        $this->load->view('customorder_view', $data); // Tampilkan ke view
    }
    public function history() {
        $data['orders'] = $this->CustomOrderModel->getAll(); // Ambil semua data pesanan
        $this->load->view('custom_order_history', $data);
    }
    

    // Proses tambah order baru
    public function store() {
        $data = [
            'jenis_kain'   => $this->input->post('jenis_kain'),
            'warna'        => $this->input->post('warna'),
            'size'         => $this->input->post('size'),
            'jenis_sarung' => $this->input->post('jenis_sarung'),
            'jumlah'       => $this->input->post('jumlah'),
            'foto_baju'    => $this->_upload_image(), // Panggil fungsi upload gambar
        ];
    
        if ($this->CustomOrderModel->create($data)) {
            // Menambahkan pesan flash sukses
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
            redirect('CustomOrderController/history');
        } else {
            // Menambahkan pesan flash error
            $this->session->set_flashdata('error', 'Gagal menyimpan data!');
            redirect('CustomOrderController/index');
        }
    }
    

    // Form edit order
    public function edit($id) {
        $data['order'] = $this->CustomOrderModel->get_by_id($id); // Ambil data berdasarkan ID
        $this->load->view('custom_orders/edit', $data);
    }

    // Proses update order
    public function update($id) {
        $data = [
            'jenis_kain'   => $this->input->post('jenis_kain'),
            'warna'        => $this->input->post('warna'),
            'size'         => $this->input->post('size'),
            'jenis_sarung' => $this->input->post('jenis_sarung'),
            'jumlah'       => $this->input->post('jumlah'),
        ];

        // Cek jika ada gambar baru
        if (!empty($_FILES['foto_baju']['name'])) {
            $data['foto_baju'] = $this->_upload_image();
        }

        if ($this->CustomOrderModel->update($id, $data)) {
            redirect('CustomOrderController/index');
        } else {
            show_error('Gagal mengupdate data!');
        }
    }

    // Hapus order
    public function delete($id) {
        if ($this->CustomOrderModel->delete($id)) {
            redirect('CustomOrderController/index');
        } else {
            show_error('Gagal menghapus data!');
        }
    }

    // Fungsi upload gambar
    private function _upload_image() {
        $config['upload_path']   = './assets/foto/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048;
        $config['file_name']     = uniqid();

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_baju')) {
            return $this->upload->data('file_name');
        } else {
            show_error($this->upload->display_errors());
        }
    }

    public function historyAdmin() {
        $data['orders'] = $this->CustomOrderModel->getAll(); // Ambil semua data pesanan
        $this->load->view('admin/history_admin', $data);
    }
    public function historyPenjahit() {
        $data['orders'] = $this->CustomOrderModel->getAll(); // Ambil semua data pesanan
        $this->load->view('penjahit/historycostumorder', $data);
    }
    
    public function updateStatusPenjahit($id) {
        $status = $this->input->post('status');
        $catatan = $this->input->post('catatan');
        
        $data = [
            'status' => $status,
            'catatan' => $catatan,
        ];
    
        if ($this->CustomOrderModel->update($id, $data)) {
            $this->session->set_flashdata('success', 'Status berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui status.');
        }
    
        redirect('CustomOrderController/historyPenjahit');
    }
    public function updateStatus($id) {
        $status = $this->input->post('status');
        $catatan = $this->input->post('catatan');
        
        $data = [
            'status' => $status,
            'catatan' => $catatan,
        ];
    
        if ($this->CustomOrderModel->update($id, $data)) {
            $this->session->set_flashdata('success', 'Status berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui status.');
        }
    
        redirect('CustomOrderController/historyAdmin');
    }
}
