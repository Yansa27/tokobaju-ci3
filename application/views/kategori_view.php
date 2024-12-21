<?php $this->load->view('header'); ?>
<div class="hero-wrap hero-bread" style="background-image: url('<?php echo base_url("assets/images/fc2.jpg"); ?>');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url(); ?>">Home</a></span> <span>Kategori</span></p>
                <h1 class="mb-0 bread">Kategori</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row mb-3 pb-3">
            <div class="col-md-12 heading-section ftco-animate">
                <h3 class="mb-4">Kategori: <?php echo $kategori['nama_kategori']; ?></h3>
                <?php if (empty($produk)) : ?>
                    <div class="alert alert-danger">Produk <strong><?php echo $kategori['nama_kategori']; ?></strong> Kosong</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach ($produk as $value) : ?>
                <div class="col-sm-6 col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="<?php echo site_url('produk/detail/' . $value['idproduk']); ?>" class="img-prod">
                            <img class="img-fluid" src="<?php echo base_url('assets/foto/' . $value['fotoproduk']); ?>" alt="">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="<?php echo site_url('produk/detail/' . $value['idproduk']); ?>"><?php echo $value['namaproduk']; ?></a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span>Rp <?php echo number_format($value['hargaproduk']); ?></span></p>
                                </div>
                            </div>
                            <p class="bottom-area d-flex px-3">
                                <a href="<?php echo site_url('produk/detail/' . $value['idproduk']); ?>" class="buy-now text-center py-2">Detail<span><i class="ion-ios-cart ml-1"></i></span></a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php $this->load->view('footer'); ?>