<?php $this->load->view('header'); ?>
<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/home/images/fc2.jpg') ?>');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Login</span></p>
                <h1 class="mb-0 bread">Login</h1>
            </div>
        </div>
    </div>
</div>

<section id="home-section" class="ftco-section">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <img width="100%" src="<?= base_url('assets/foto/daftar.png') ?>" alt="">
            </div>
            <div class="col-md-7 my-auto">
                <h1><span>Login</span></h1>
                <form method="post" action="<?= site_url('login/authenticate') ?>">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <br>
                    <button class="btn btn-danger btn-block" name="simpan">Masuk</button>
                </form>
            </div>
        </div>
</section>

<?php $this->load->view('footer'); ?>