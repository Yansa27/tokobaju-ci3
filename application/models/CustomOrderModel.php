<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomOrderModel extends CI_Model {

    protected $table = 'custom_orders';

    // Insert data
    public function create($data) {
        return $this->db->insert($this->table, $data);
    }

    // Get all data
    public function get_all() {
        return $this->db->get($this->table)->result();
    }

    public function getAll() {
        return $this->db->get('custom_orders')->result_array(); // Ganti 'custom_orders' dengan nama tabel Anda
    }
    

    // Get data by ID
    public function get_by_id($id) {
        return $this->db->where('id', $id)->get($this->table)->row();
    }

    // Update data
    public function update($id, $data) {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    // Delete data
    public function delete($id) {
        return $this->db->where('id', $id)->delete($this->table);
    }
}
