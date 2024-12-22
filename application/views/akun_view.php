<?php $this->load->view('header'); ?>

<?php
// Cek jika ada session error atau success
if ($this->session->flashdata('error')) {
    echo "<div class='alert alert-danger'>" . $this->session->flashdata('error') . "</div>";
}
if ($this->session->flashdata('success')) {
    echo "<div class='alert alert-success'>" . $this->session->flashdata('success') . "</div>";
}
?>
<div class="hero-wrap hero-bread" style="background-image: url('home/images/fc2.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url(); ?>index.php">Home</a></span> <span>Akun</span></p>
                <h1 class="mb-0 bread">Akun</h1>
            </div>
        </div>
    </div>
</div>
<section id="home-section" class="hero">
    <!-- Form untuk Update Profil -->
    <form method="post" enctype="multipart/form-data" action="<?= base_url('index.php/akun/update'); ?>">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nama</label>
                        <input value="<?= isset($pengguna['nama']) ? $pengguna['nama'] : ''; ?>" type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input value="<?= isset($pengguna['email']) ? $pengguna['email'] : ''; ?>" type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input value="<?= isset($pengguna['telepon']) ? $pengguna['telepon'] : ''; ?>" type="number" class="form-control" name="telepon" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="5" required><?= isset($pengguna['alamat']) ? $pengguna['alamat'] : ''; ?></textarea>
                        <script>
                            CKEDITOR.replace('alamat');
                        </script>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                        <input type="hidden" class="form-control" name="passwordlama" value="<?= isset($pengguna['password']) ? $pengguna['password'] : ''; ?>">
                        <span class="text-primary">Kosongkan password jika tidak ingin mengganti</span>
                    </div>
                    <!-- Tombol Submit -->
                    <button type="submit" class="btn btn-danger float-right" name="ubah" value="ubah">
                        <i class="glyphicon glyphicon-saved"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </form>
</section>
<br>
<br>
<?php $this->load->view('footer'); ?>
