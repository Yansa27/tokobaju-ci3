<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

    // Fungsi untuk mengambil data pengguna berdasarkan email dan password
    public function get_user($email, $password)
    {
        // Mengambil data pengguna yang cocok dengan email dan password
        $this->db->where('email', $email);
        $this->db->where('password', $password);  // Password diharapkan sudah di-hash
        $query = $this->db->get('pengguna'); // Pastikan nama tabel sesuai

        return $query->row_array(); // Mengembalikan hasil sebagai array
    }
}