<?php  
class Ulasan_model extends CI_Model {
    public function getUlasanProduk($idproduk, $limit, $offset) {
        return $this->db
            ->where('idproduk', $idproduk)
            ->order_by('tanggal', 'DESC')
            ->get('ulasan', $limit, $offset)
            ->result_array();
    }

    public function countUlasanProduk($idproduk) {
        return $this->db
            ->where('idproduk', $idproduk)
            ->count_all_results('ulasan');
    }

    public function tambahUlasan($idproduk, $nama_pengulas, $rating, $ulasan) {
        $data = [
            'idproduk' => $idproduk,
            'nama_pengulas' => $nama_pengulas,
            'rating' => $rating,
            'ulasan' => $ulasan,
            'tanggal' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('ulasan', $data);
    }
}

?>