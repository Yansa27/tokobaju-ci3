<?php $this->load->view('header'); ?>
<section class="ftco-section">
    <div class="container">
    <div class="row">
    <div class="col-lg-6 mb-5">
        <a href="<?php echo base_url('assets/foto/') . $detail['fotoproduk']; ?>" class="image-popup">
            <img src="<?php echo base_url('assets/foto/') . $detail['fotoproduk']; ?>" class="img-fluid" alt="">
        </a>
    </div>
    <div class="col-lg-6 product-details">
        <h3><?php echo $detail['namaproduk']; ?></h3>
        <p class="price"><span>Rp. <?php echo number_format($detail['hargaproduk']); ?></span></p>
        <p><?php echo $detail['deskripsiproduk']; ?></p>
        <form action="<?php echo base_url('index.php/keranjang/tambah'); ?>" method="post">
            <div class="row mt-4">
                <div class="input-group col-md-6 d-flex mb-3">
                    <input type="hidden" name="idproduk" value="<?php echo $detail['idproduk']; ?>">
                    <input type="number" name="jumlah" class="form-control" value="1" min="1" max="<?php echo $detail['stokproduk']; ?>">
                </div>
                <p>Sisa Produk: <?php echo $detail['stokproduk']; ?></p>
            </div>
            <button name="beli" class="btn btn-success" style="background-color: #000 !important; border-color: #fff !important;">Add to Cart</button>
        </form>
    </div>
</div>



        <div class="col-md-12 mt-5">
            <h4>Ulasan Produk</h4>
            <?php foreach ($ulasan as $review): ?>
                <div class="review">
                    <h5><?php echo $review['nama_pengulas']; ?></h5>
                    <p>Rating: <?php for ($i = 1; $i <= 5; $i++) echo $i <= $review['rating'] ? '★' : '☆'; ?></p>
                    <p><?php echo $review['ulasan']; ?></p>
                    <p><small><?php echo date('d M Y', strtotime($review['tanggal'])); ?></small></p>
                </div>
                <hr>
            <?php endforeach; ?>
        </div>
        <div class="col-md-12">
            <nav>
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $total_halaman; $i++): ?>
                        <li class="page-item <?php echo $i == $halaman_saat_ini ? 'active' : ''; ?>">
                            <a class="page-link" href="<?php echo site_url("produk/detail/$detail[idproduk]?halaman=$i"); ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </div>
</section>

<?php $this->load->view('footer'); ?>