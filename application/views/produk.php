<?php $this->load->view('header'); ?>
<div class="hero-wrap hero-bread" style="background-color: #dc3545;">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center text-white text-light ">
                <p class="breadcrumbs">
                    <span class="mr-2 text-light"><a class="text-light" href="<?= base_url(); ?>">Home</a></span> 
                    <span class="text-light">Products</span>
                </p>
                <h1 class="mb-0 bread text-light"><?= $title; ?></h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <?php if (!empty($produk)): ?>
                <?php foreach ($produk as $item): ?>
                    <div class="col-sm-6 col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="<?= base_url('index.php/produk/detail/' . $item['idproduk']); ?>" class="img-prod">
                                <img class="img-fluid" src="<?= base_url('assets/foto/' . $item['fotoproduk']); ?>" alt="">
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 px-3">
                                <h3><a href="<?= site_url('index.php/produk/detail/' . $item['idproduk']); ?>"><?= $item['namaproduk']; ?></a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span>Rp <?= number_format($item['hargaproduk']); ?></span></p>
                                    </div>
                                </div>
                                <p class="bottom-area d-flex px-3">
                                    <a href="<?= base_url('index.php/produk/detail/' . $item['idproduk']); ?>" 
                                    class="buy-now text-center py-2" 
                                    style="background-color: #dc3545; color: #fff; text-decoration: none;" 
                                    onmouseover="this.style.backgroundColor='#b02a37';" 
                                    onmouseout="this.style.backgroundColor='#dc3545';">
                                        Detail 
                                        <span><i class="ion-ios-cart ml-1"></i></span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p>No products available.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php $this->load->view('footer'); ?>