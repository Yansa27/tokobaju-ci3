<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model pengguna
        $this->load->model('Pengguna_model');
        $this->load->model('Kategori_model');
        $this->load->database();
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'form_validation']);
    }

    // Menampilkan halaman login
    public function index()
    {
        $data['datakategori'] = $this->Kategori_model->get_all_kategori();
        $this->load->view('login', $data);
    }

    // Menangani autentikasi login
    public function authenticate()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password'); // Password langsung dibandingkan
    
        // Cek user berdasarkan email dan password
        $user = $this->Pengguna_model->get_user($email, $password);
    
        if ($user) {
            // Set session pengguna
            $this->session->set_userdata('pengguna', $user);
    
            // Arahkan berdasarkan level pengguna
            switch ($user['level']) {
                case 'Pelanggan':
                    redirect('home');
                    break;
                case 'Admin':
                    redirect('admin/dashboard');
                    break;
                case 'Penjahit':
                    redirect('penjahit/dashboard');
                    break;
                default:
                    // Jika level tidak dikenal
                    $this->session->set_flashdata('error', 'Level pengguna tidak valid.');
                    redirect('login');
                    break;
            }
        } else {
            // Email atau password salah
            $this->session->set_flashdata('error', 'Email atau password salah.');
            redirect('login');
        }
    }
    


    // Fungsi logout
    public function logout()
    {
        $this->session->unset_userdata('pengguna');
        $this->session->sess_destroy();
        redirect('login');
    }

    // Menampilkan halaman register
    public function register()
{
    $data['datakategori'] = $this->Kategori_model->get_all_kategori();
    // Tampilkan halaman register
    $this->load->view('register', $data);
}

public function process_register()
{
    // Ambil data dari form registrasi
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $alamat = $this->input->post('alamat');
    $telepon = $this->input->post('telepon');

    // Validasi apakah email sudah terdaftar
    $this->load->model('Pengguna_model');
    $existing_user = $this->Pengguna_model->check_email_exists($email);

    if ($existing_user) {
        $this->session->set_flashdata('error', 'Pendaftaran gagal, email sudah digunakan.');
        redirect('register');  // Kembali ke halaman register
    } else {
        // Simpan data pengguna ke database
        $data = [
            'nama' => $nama,
            'email' => $email,
            'password' => $password, // Enkripsi password
            'alamat' => $alamat,
            'telepon' => $telepon,
            'level' => 'Pelanggan',
        ];
        $this->Pengguna_model->insert_user($data);

        $this->session->set_flashdata('success', 'Pendaftaran berhasil, silakan login.');
        redirect('login');  // Arahkan ke halaman login
    }
}

}
