<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model pengguna
        $this->load->model('Pengguna_model');
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');

    }

    // Menampilkan halaman login
    public function index()
    {
        // Menampilkan halaman login
        $this->load->view('login');
    }

    // Menangani autentikasi login
    public function authenticate()
    {
        // Ambil data dari form login
        $email = $this->input->post('email');
        $password = $this->input->post('password'); // Menggunakan MD5 untuk hashing password

        // Verifikasi login
        $user = $this->Pengguna_model->get_user($email, $password);

        if ($user) {
            // Set session berdasarkan level pengguna
            $this->session->set_userdata('pengguna', $user);

            if ($user['level'] == 'Pelanggan') {
                redirect('home'); // Arahkan ke halaman utama
            } elseif ($user['level'] == 'Admin') {
                redirect('admin/dashboard'); // Arahkan ke halaman admin
            }
        } else {
            // Jika login gagal, tampilkan pesan error
            $this->session->set_flashdata('error', 'Gagal login, cek akun Anda.');
            redirect('login'); // Kembali ke halaman login
        }
    }

    // Fungsi logout
    public function logout()
    {
        // Hapus semua session pengguna
        $this->session->unset_userdata('pengguna');
        $this->session->sess_destroy();
    
        // Arahkan kembali ke halaman login
        redirect('login');
    }
    
}
