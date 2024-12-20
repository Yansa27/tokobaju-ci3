<?php $this->load->view('header'); ?>
<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/home/images/fc2.jpg'); ?>');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url(); ?>">Home</a></span> <span>Daftar</span></p>
                <h1 class="mb-0 bread">Daftar</h1>
            </div>
        </div>
    </div>
</div>

<section id="home-section" class="ftco-section">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-5 my-auto">
                <img width="100%" src="<?= base_url('assets/foto/daftar.png'); ?>">
            </div>
            <div class="col-md-7">
                <h1><span>Daftar</span></h1>
                <?php if ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                <?php endif; ?>

                <form method="post" action="<?= site_url('register/process'); ?>">
                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Alamat</label>
                        <textarea class="form-control" name="alamat" required></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Telepon</label>
                        <input type="text" name="telepon" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger btn-block" name="daftar">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('footer'); ?>