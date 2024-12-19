<?php $this->load->view('header'); ?>
<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/home/images/fc2.jpg'); ?>');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('index'); ?>">Home</a></span> <span>Login</span></p>
                <h1 class="mb-0 bread">Login</h1>
            </div>
        </div>
    </div>
</div>

<section id="home-section" class="ftco-section">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <img width="100%" src="<?= base_url('assets/foto/daftar.png'); ?>">
            </div>
            <div class="col-md-7 my-auto">
                <h1><span>Login</span></h1>
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?= base_url('index.php/login/authenticate'); ?>">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <br>
                    <button class="btn btn-danger btn-block" type="submit">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('footer'); ?>