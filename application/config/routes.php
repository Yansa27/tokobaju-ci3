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
$route['admin/createPengguna'] = 'admin/createPengguna';
$route['admin/storePengguna'] = 'admin/storePengguna';
$route['admin/hapusPengguna/(:num)'] = 'admin/hapusPengguna/$1';


// Pengguna
$route['produk'] = 'home/produk';
$route['produk/detail/(:num)'] = 'home/detail/$1';

$route['keranjang'] = 'keranjang/index';
$route['keranjang/hapus/(:num)'] = 'keranjang/hapus/$1';
$route['keranjang/tambah'] = 'keranjang/tambah';
$route['keranjang/hapus/(:num)'] = 'keranjang/hapus/$1';
$route['checkout'] = 'keranjang/checkout';

$route['kategori/(:num)'] = 'kategori/view/$1';

$route['checkout'] = 'Checkout/index';
$route['checkout/process'] = 'Checkout/process';
$route['riwayat'] = 'Riwayat/index';
$route['riwayat/selesai'] = 'Riwayat/selesai';

$route['pembayaran/(:num)'] = 'Pembayaran/index/$1';
$route['pembayaran/upload'] = 'Pembayaran/uploadBukti';
$route['pembayaran/success'] = 'Pembayaran/success';

$route['akun'] = 'Akun/index'; // Menampilkan halaman profil
$route['akun/update'] = 'Akun/update'; // Menyimpan perubahan profil



$route['customorders'] = 'CustomOrderController/index'; // Menampilkan semua custom orders
$route['custom-order/history'] = 'CustomOrderController/history';

$route['customorders/create'] = 'CustomOrderController/create'; // Form untuk tambah order
$route['customorders/store'] = 'CustomOrderController/store'; // Proses tambah order
$route['customorders/edit/(:num)'] = 'CustomOrderController/edit/$1'; // Form untuk edit order berdasarkan ID
$route['customorders/update/(:num)'] = 'CustomOrderController/update/$1'; // Proses update order berdasarkan ID
$route['customorders/delete/(:num)'] = 'CustomOrderController/delete/$1'; // Proses hapus order berdasarkan ID

$route['custom-order/history-admin'] = 'CustomOrderController/historyAdmin'; // Menampilkan halaman riwayat admin
$route['custom-order/update-status/(:num)'] = 'CustomOrderController/updateStatus/$1'; // Mengupdate status dan catatan

$route['penjahit/history'] = 'CustomOrderController/historyPenjahit';
$route['penjahit/update-status/(:num)'] = 'CustomOrderController/updateStatusPenjahit/$1';

$route['penjahit/dashboard'] = 'admin/indexPenjahit';