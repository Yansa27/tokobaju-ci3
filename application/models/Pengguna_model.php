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

    public function check_email_exists($email)
    {
        return $this->db->where('email', $email)->get('pengguna')->row_array();
    }

    public function insert_user($data)
    {
        $this->db->insert('pengguna', $data);
    }

    public function getPengguna()
    {
        $this->db->where_in('level', ['Pelanggan', 'Penjahit']);
        $query = $this->db->get('pengguna');
        return $query->result_array();
    }
    

    public function getPenggunaById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('pengguna');
        return $query->row_array(); // Mengembalikan data pengguna dalam bentuk array
    }

    public function insert($data)
{
    return $this->db->insert('pengguna', $data);
}


    public function updatePengguna($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('pengguna', $data); // Update data pengguna
    }

    // Fungsi untuk menghapus pengguna berdasarkan ID
    public function hapusPengguna($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pengguna');
    }

}
