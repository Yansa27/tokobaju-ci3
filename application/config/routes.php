<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Halaman utama (home)
$route['default_controller'] = 'home'; // Routing default ke controller 'home'
$route['404_override'] = ''; // Jika route tidak ditemukan
$route['translate_uri_dashes'] = FALSE; // Untuk mengizinkan URL dengan tanda hubung (-)

// Route untuk kategori berdasarkan ID
$route['kategori/(:num)'] = 'kategori/index/$1'; // Menangani kategori berdasarkan ID yang diterima

// Route untuk akun pengguna (profil, keranjang, dll)
$route['akun'] = 'akun/index'; // Menampilkan halaman akun pengguna
$route['keranjang'] = 'keranjang/index'; // Menampilkan halaman keranjang belanja
$route['riwayat'] = 'riwayat/index'; // Menampilkan riwayat pembelian

// Route untuk login dan daftar pengguna
$route['login'] = 'login';  // Halaman login
$route['login/authenticate'] = 'login/authenticate';  // Autentikasi login
$route['logout'] = 'login/logout';  // Logout pengguna

// Route untuk register
$route['register'] = 'login/register';  // Halaman register
$route['register/process'] = 'login/process_register';  // Proses registrasi


// Admin
$route['admin/dashboard'] = 'admin/index';

// application/config/routes.php
$route['admin/kategori'] = 'admin/kategori';
$route['admin/tambahkategori'] = 'admin/tambahkategori';
$route['admin/simpan_kategori'] = 'admin/simpan_kategori';
$route['admin/ubahkategori/(:num)'] = 'admin/ubahkategori/$1';
$route['admin/update_kategori/(:num)'] = 'admin/update_kategori/$1';
$route['admin/hapuskategori/(:num)'] = 'admin/hapuskategori/$1';

$route['admin/produk'] = 'admin/produk';
$route['admin/tambahproduk'] = 'admin/tambahproduk';  // Menampilkan form tambah produk
$route['admin/simpan_produk'] = 'admin/simpan_produk'; // Menyimpan data produk

$route['admin/ubahproduk/(:num)'] = 'admin/ubahproduk/$1';
$route['admin/simpanubahproduk/(:num)'] = 'admin/simpanubahproduk/$1';

$route['admin/transaksi'] = 'admin/transaksi';
$route['admin/detailTransaksi/(:num)'] = 'admin/detailTransaksi/$1'; // Menampilkan detail transaksi berdasarkan ID
$route['admin/updateOngkir/(:num)'] = 'admin/updateOngkir/$1'; // Update ongkir pembelian
$route['admin/updateStatusPembelian/(:num)'] = 'admin/updateStatusPembelian/$1';
// Route untuk menghapus produk
$route['admin/hapusproduk/(:num)'] = 'admin/hapusProduk/$1'; // Jika Anda menggunakan logout sebagai metode terpisah

$route['admin/pengguna'] = 'admin/pengguna'; // Menampilkan daftar pengguna
$route['admin/hapusPengguna/(:num)'] = 'admin/hapusPengguna/$1';


// Pengguna
$route['produk'] = 'home/produk';
$route['produk/detail/(:num)'] = 'home/detail/$1';

$route['keranjang'] = 'keranjang/index';
$route['keranjang/hapus/(:num)'] = 'keranjang/hapus/$1';
$route['keranjang/tambah'] = 'keranjang/tambah';
$route['keranjang/hapus/(:num)'] = 'keranjang/hapus/$1';
$route['checkout'] = 'keranjang/checkout';

