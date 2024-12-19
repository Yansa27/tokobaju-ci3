
<?php $this->load->view('header'); ?>
<section id="home-section" class="hero">
    <div class="home-slider js-fullheight owl-carousel">
        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
                    <div class="one-third order-md-last img js-fullheight" style="background-image:url(<?php echo base_url('assets/home/images/fc1.jpg'); ?>);"></div>
                    <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <span class="subheading">FCBRANDSTORE</span>
                            <div class="horizontal">
                                <h3 class="vr" style="background-image: url(<?php echo base_url('assets/home/images/divider.jpg'); ?>);">Best eCommerce Online Shop</h3>
                                <h1 class="mb-4 mt-3">Catch Your Own <br><span>Stylish &amp; Look</span></h1>
                                <p><a href="<?php echo base_url('produk'); ?>" class="btn btn-primary px-5 py-3 mt-3">Discover Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div class="row d-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
                    <div class="one-third order-md-last img js-fullheight" style="background-image:url(<?php echo base_url('assets/home/images/fc4.jpg'); ?>);"></div>
                    <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <span class="subheading">FCBRANDSTORE</span>
                            <div class="horizontal">
                                <h3 class="vr" style="background-image: url(<?php echo base_url('assets/home/images/divider.jpg'); ?>);">Best eCommerce Online Shop</h3>
                                <h1 class="mb-4 mt-3">A Thouroughly <span>Modern</span> Woman</h1>
                                <p><a href="<?php echo base_url('produk'); ?>" class="btn btn-primary px-5 py-3 mt-3">Shop Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-5 img img-2 d-flex justify-content-center align-items-center">
                <img src="<?php echo base_url('assets/home/images/fc3.jpg'); ?>" width="100%" style="border-radius: 10px">
            </div>
            <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section-bold mb-4 mt-md-5">
                    <h2 class="mb-4">Better Way to Ship Your Products</h2>
                </div>
                <div class="pb-md-5">
                    <p>But nothing the copy said could convince her and so it didn’t take long until a few insidious...</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Products</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach ($produk as $perproduk): ?>
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="product">
                        <a href="<?php echo base_url('detail/'.$perproduk['idproduk']); ?>" class="img-prod">
                            <img class="img-fluid" src="<?php echo base_url('assets/foto/'.$perproduk['fotoproduk']); ?>" alt="">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="<?php echo base_url('detail/'.$perproduk['idproduk']); ?>"><?php echo $perproduk['namaproduk']; ?></a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span>Rp <?php echo number_format($perproduk['hargaproduk']); ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php $this->load->view('footer'); ?>

