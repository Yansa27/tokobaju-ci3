<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    public function getKategori()
    {
        $query = $this->db->get('kategori');
        return $query->result_array();
    }

    // Mendapatkan semua kategori
    public function get_all_kategori() {
        $query = $this->db->get('kategori'); // Mengambil semua data dari tabel kategori
        return $query->result_array();
    }

    // Menambahkan kategori baru
    public function insert_kategori($nama_kategori) {
        $data = array(
            'nama_kategori' => $nama_kategori
        );
        return $this->db->insert('kategori', $data); // Menyimpan data kategori ke dalam tabel kategori
    }

    // Mendapatkan kategori berdasarkan id
    public function get_kategori_by_id($id) {
        $this->db->where('id_kategori', $id);
        $query = $this->db->get('kategori');
        return $query->row_array(); // Mengambil data kategori berdasarkan id
    }

    // Mengupdate kategori
    public function update_kategori($id, $nama_kategori) {
        $data = array(
            'nama_kategori' => $nama_kategori
        );
        $this->db->where('id_kategori', $id);
        return $this->db->update('kategori', $data); // Mengupdate data kategori berdasarkan id
    }

    // Menghapus kategori
    public function delete_kategori($id) {
        $this->db->where('id_kategori', $id);
        return $this->db->delete('kategori'); // Menghapus kategori berdasarkan id
    }
}
