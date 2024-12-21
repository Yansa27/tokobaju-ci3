<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Link CSS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/home/css/open-iconic-bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/home/css/animate.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/home/css/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/home/css/owl.theme.default.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/home/css/magnific-popup.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/home/css/aos.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/home/css/ionicons.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/home/css/bootstrap-datepicker.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/home/css/jquery.timepicker.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/home/css/flaticon.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/home/css/icomoon.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/home/css/style.css'); ?>">

</head>
<body>

<!-- Nav -->
<div class="py-1 bg-black">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">+ 1235 2355 98</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text">youremail@email.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" style="background-color: #FF7F7F !important;">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>"> 
            <img src="" width="30px" style="border-radius: 10px;">&nbsp;<span class="">&nbsp; FCBRANDSTORE</span>
        </a> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="<?= base_url('/') ?>" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="<?= site_url('produk') ?>" class="nav-link">Produk</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <?php foreach ($datakategori as $value) : ?>
                            <a href="<?= base_url('index.php/kategori/' . $value["id_kategori"]) ?>" class="dropdown-item"><?= $value["nama_kategori"] ?></a>
                        <?php endforeach; ?>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Akun</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <?php if ($this->session->userdata('pengguna')) : ?>
                            <a class="dropdown-item" href="<?= base_url('akun') ?>">Profil Akun</a>
                            <a class="dropdown-item" href="<?= base_url('index.php/keranjang') ?>">Keranjang</a>
                            <a class="dropdown-item" href="<?= base_url('riwayat') ?>">Riwayat Pembelian</a>
                            <a class="dropdown-item" href="<?= site_url('login/logout') ?>">Logout</a>
                        <?php else : ?>
                            <a class="dropdown-item" href="<?= base_url('index.php/login') ?>">Login</a>
                            <a class="dropdown-item" href="<?= base_url('index.php/login/register') ?>">Daftar</a>
                        <?php endif; ?>
                    </div>
                </li>
                <?php
$keranjang = $this->session->userdata('keranjang');
$keranjang_total = isset($keranjang) ? array_sum($keranjang) : 0;
?>

<?php if ($this->session->userdata('pengguna')) : ?>
    <li class="nav-item cta cta-colored">
        <a href="<?= base_url('index.php/keranjang') ?>" class="nav-link">
            <span class="icon-shopping_cart"></span>[<span class="cart-item-total"><?= $keranjang_total; ?></span>]
        </a>
    </li>
<?php endif; ?>

            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
