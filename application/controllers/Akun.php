<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Pastikan pengguna sudah login
        if (!$this->session->userdata('pengguna')) {
            $this->session->set_flashdata('error', 'Harap login terlebih dahulu');
            redirect('login');
        }
        $this->load->model('Pengguna_model');
        $this->load->helper(['url', 'form']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $id = $this->session->userdata('pengguna')['id'];
        $data['pengguna'] = $this->Pengguna_model->getPenggunaById($id);

        $this->load->view('akun_view', $data);
    }

    public function update()
    {
        // Ambil ID pengguna dari session
        $pengguna = $this->session->userdata('pengguna');
        if (!$pengguna) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect('login');
        }
    
        $id = $pengguna['id']; // Ambil ID dari session
    
        // Cek apakah form update di-submit
        if ($this->input->post('ubah')) {
            // Cek password baru, gunakan password lama jika kosong
            $password = $this->input->post('password') ? $this->input->post('password') : null;
    
            // Data yang akan diupdate
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat')
            ];
    
            // Jika password baru diisi, tambahkan ke data
            if ($password !== null) {
                $data['password'] = $password; // Gunakan hashing untuk password
            }
    
            // Update data pengguna menggunakan model
            $update = $this->Pengguna_model->updatePengguna($id, $data);
    
            // Cek hasil update
            if ($update) {
                $this->session->set_flashdata('success', 'Profil berhasil diubah');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengubah profil. Silakan coba lagi.');
            }
    
            // Redirect ke halaman akun setelah proses update
            redirect('akun');
        } else {
            // Ambil data pengguna untuk ditampilkan di form
            $data['pengguna'] = $pengguna; // Menyediakan data pengguna untuk form
    
            // Load view untuk edit akun
            $this->load->view('akun_view', $data);
        }
    }
    
    

}
?>
