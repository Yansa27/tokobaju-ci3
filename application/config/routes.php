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

// Route untuk autentikasi login
$route['login/authenticate'] = 'login/authenticate';  // Autentikasi login
$route['logout'] = 'login/logout';
