<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {

    public function savePembayaran($data) {
        $this->db->insert('pembayaran', $data);
    }

    public function insertPembayaran($data)
{
    // Menyimpan data ke tabel pembayaran
    $this->db->insert('pembayaran', $data);
    return $this->db->affected_rows() > 0;
}

}
