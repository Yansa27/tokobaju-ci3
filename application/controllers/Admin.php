<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->model('Produk_model');
        $this->load->model('Transaksi_model');
        $this->load->model('Pembelian_model');
        $this->load->model('Pengguna_model');
        $this->load->helper(['url', 'form']);
        $this->load->helper('tanggal');

        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->database();

        $user = $this->session->userdata('pengguna');

        if (!$user || $user['level'] != 'Admin') {
            $this->session->sess_destroy();  
            redirect('login'); 
        }
    }

    public function index() {
        // Ambil data dari model
        $this->load->model('Dashboard_model'); // Memanggil model Dashboard_model

        // Ambil data untuk dashboard
        $data['jumlahkategori'] = $this->Dashboard_model->get_kategori_count();
        $data['jumlahproduk'] = $this->Dashboard_model->get_produk_count();
        $data['jumlahmember'] = $this->Dashboard_model->get_member_count();
        $data['jumlahpembelian'] = $this->Dashboard_model->get_pembelian_count();

        // Grafik penjualan bulanan
        $data['penjualangrafik'] = $this->Dashboard_model->get_penjualangrafik();

        // Set judul halaman
        $data['title'] = 'Dashboard Admin';

        // Load view dengan data
        $this->load->view('admin/dashboard', $data);
    }

    public function beranda()
    {
        $this->load->view('admin/beranda');
    }

    public function kategori() {
        $data['kategori'] = $this->Kategori_model->get_all_kategori(); // Ambil data kategori dari model
        $this->load->view('admin/kategori', $data); // Memuat view kategori
    }

    public function tambahkategori() {
        $this->load->view('admin/tambah_kategori');
    }

    public function simpan_kategori() {
        $nama_kategori = $this->input->post('kategori');
        $this->Kategori_model->insert_kategori($nama_kategori);
        redirect('admin/kategori');
    }

    public function ubahkategori($id) {
        $data['kategori'] = $this->Kategori_model->get_kategori_by_id($id);
        $this->load->view('admin/ubah_kategori', $data);
    }

    public function update_kategori($id) {
        $nama_kategori = $this->input->post('kategori');
        $this->Kategori_model->update_kategori($id, $nama_kategori);
        redirect('admin/kategori');
    }

    public function hapuskategori($id) {
        $this->Kategori_model->delete_kategori($id);
        redirect('admin/kategori');
    }


    public function tambahproduk() {
        $data['title'] = 'Dashboard Admin';
        $data['datakategori'] = $this->Kategori_model->getKategori();
        // Memuat halaman tambah produk
        $this->load->view('admin/tambah_produk', $data);
    }
    
    public function simpan_produk()
    {
        // Validasi input form
        $this->form_validation->set_rules('nama', 'Nama Produk', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        $this->form_validation->set_rules('berat', 'Berat', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke halaman form
            // Ambil data kategori dari database
            $datakategori = $this->db->get('kategori')->result_array();
            $this->load->view('admin/tambah_produk', ['datakategori' => $datakategori]);
        } else {
            // Ambil data dari form
            $data = [
                'namaproduk' => $this->input->post('nama'),
                'id_kategori' => $this->input->post('id_kategori'),
                'hargaproduk' => $this->input->post('harga'),
                'deskripsiproduk' => $this->input->post('deskripsi'),
                'stokproduk' => $this->input->post('stok'),
                'beratproduk' => $this->input->post('berat'),
            ];
        
            // Cek apakah ada file gambar yang diupload
            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path'] = './assets/foto/';  // Path yang diperbarui
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048; // 2MB
                $this->load->library('upload', $config);
        
                if ($this->upload->do_upload('foto')) {
                    // Jika upload berhasil, masukkan nama file ke dalam data
                    $data['fotoproduk'] =  $this->upload->data('file_name');
                } else {
                    // Jika upload gagal, beri pesan error
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin/tambahproduk');
                }
            }
            // Simpan data produk ke database
            $this->db->insert('produk', $data);
        
            // Setelah simpan produk, redirect ke halaman daftar produk
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan');
            redirect('admin/produk');  // Mengarahkan ke halaman daftar produk
        }
    }
    
    public function ubahproduk($id) {
        $data['title'] = 'Dashboard Admin';
        $data['datakategori'] = $this->Kategori_model->getKategori();
    
        // Ambil data produk berdasarkan ID yang diberikan
        $data['produk'] = $this->db->get_where('produk', ['idproduk' => $id])->row_array();
    
        // Jika produk tidak ditemukan, redirect ke halaman daftar produk dengan pesan error
        if (empty($data['produk'])) {
            $this->session->set_flashdata('error', 'Produk tidak ditemukan.');
            redirect('admin/produk');
        }
    
        // Memuat halaman form ubah produk
        $this->load->view('admin/ubah_produk', $data);
    }
    
    public function simpanubahproduk($id) {
        // Validasi input form
        $this->form_validation->set_rules('nama', 'Nama Produk', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        $this->form_validation->set_rules('berat', 'Berat', 'required|numeric');
    
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke halaman form
            // Ambil data kategori dari database
            $datakategori = $this->db->get('kategori')->result_array();
            $this->load->view('admin/ubah_produk', ['datakategori' => $datakategori, 'produk' => $this->input->post()]);
        } else {
            // Ambil data dari form
            $data = [
                'namaproduk' => $this->input->post('nama'),
                'id_kategori' => $this->input->post('id_kategori'),
                'hargaproduk' => $this->input->post('harga'),
                'deskripsiproduk' => $this->input->post('deskripsi'),
                'stokproduk' => $this->input->post('stok'),
                'beratproduk' => $this->input->post('berat'),
            ];
    
            // Cek apakah ada file gambar yang diupload
            if (!empty($_FILES['foto']['name'])) {
                // Cek apakah produk memiliki foto sebelumnya dan hapus jika ada
                $produk = $this->db->get_where('produk', ['idproduk' => $id])->row_array();
                if ($produk['fotoproduk'] && file_exists('./assets/foto/' . $produk['fotoproduk'])) {
                    unlink('./assets/foto/' . $produk['fotoproduk']);
                }
    
                // Proses upload foto baru
                $config['upload_path'] = './assets/foto/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048; // 2MB
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('foto')) {
                    // Jika upload berhasil, masukkan nama file ke dalam data
                    $data['fotoproduk'] =  $this->upload->data('file_name');
                } else {
                    // Jika upload gagal, beri pesan error
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin/ubahproduk/' . $id);
                }
            }
    
            // Update data produk ke database
            $this->db->update('produk', $data, ['idproduk' => $id]);
    
            // Setelah simpan perubahan, redirect ke halaman daftar produk
            $this->session->set_flashdata('success', 'Produk berhasil diubah');
            redirect('admin/produk');  // Mengarahkan ke halaman daftar produk
        }
    }
    

    public function hapusProduk($id)
    {
        $this->Produk_model->hapusProduk($id);

        $this->session->set_flashdata('success', 'Produk berhasil dihapus');
        redirect('admin/produk');
    }

    public function produk()
    {
        $data['title'] = 'Daftar Produk';
        $data['produk'] = $this->Produk_model->getAllProduk();
        $this->load->view('admin/produk_view', $data);
    }

    public function transaksi()
    {
        $data['title'] = 'Data Pembelian';
        $data['transaksi'] = $this->Transaksi_model->getAllTransaksi();
        $this->load->view('admin/transaksi', $data);
    }

    // Halaman detail transaksi
    public function detailTransaksi($idbeli)
    {
        $data['title'] = 'Detail Pembelian';

        // Mengambil data pembelian berdasarkan ID
        $data['detail'] = $this->Pembelian_model->get_detail_pembelian($idbeli);
        
        // Mengambil data produk terkait dengan pembelian
        $data['produk'] = $this->Pembelian_model->get_produk_pembelian($idbeli);
        
        // Mengambil data pembayaran untuk pembelian
        $data['pembayaran'] = $this->Pembelian_model->get_detail_pembayaran($idbeli);

        // Menampilkan halaman detail transaksi
        $this->load->view('admin/detail_transaksi', $data);
    }

    // Fungsi untuk mengupdate ongkir pembelian
    public function updateOngkir($idbeli)
    {
        // Ambil data ongkir dari input form
        $ongkir = $this->input->post('ongkir');

        // Memanggil model untuk mengupdate ongkir
        if ($this->Pembelian_model->update_ongkir($idbeli, $ongkir)) {
            $this->session->set_flashdata('success', 'Ongkir berhasil diperbarui');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui ongkir');
        }

        // Redirect ke halaman detail transaksi
        redirect('admin/transaksi/detailTransaksi/' . $idbeli);
    }

    // Fungsi untuk mengupdate status pembelian dan resi pengiriman
    public function updateStatusPembelian($idbeli)
    {
        // Ambil data status pembelian dan resi pengiriman dari input form
        $resi = $this->input->post('resi');
        $statusbeli = $this->input->post('statusbeli');

        // Memanggil model untuk mengupdate status pembelian
        if ($this->Pembelian_model->update_status($idbeli, $resi, $statusbeli)) {
            $this->session->set_flashdata('success', 'Status pembelian berhasil diperbarui');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui status pembelian');
        }

        // Redirect ke halaman detail transaksi
        redirect('admin/transaksi/detailTransaksi/' . $idbeli);
    }

    public function pengguna()
    {
        $data['title'] = 'Akun Member';
        $data['pengguna'] = $this->Pengguna_model->getPengguna(); // Ambil data pengguna

        // Load view dengan data
        $this->load->view('admin/pengguna', $data);
    }

    // Fungsi untuk menghapus pengguna
    public function hapusPengguna($id)
    {
        $this->Pengguna_model->hapusPengguna($id);
        $this->session->set_flashdata('message', 'Pengguna berhasil dihapus!');
        redirect('admin/pengguna');
    }


    public function pembelian()
    {
        $this->load->view('admin/pembelian');
    }

}
