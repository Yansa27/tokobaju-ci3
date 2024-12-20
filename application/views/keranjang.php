<?php $this->load->view('header'); ?>

<div class="hero-wrap hero-bread" style="background-image: url('home/images/fc2.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('') ?>">Home</a></span> <span>Keranjang</span></p>
                <h1 class="mb-0 bread"> Keranjang</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($keranjang)) : ?>
                                <?php foreach ($keranjang as $item) : ?>
                                    <tr class="text-center">
                                        <td class="product-remove">
                                            <a href="<?= base_url('keranjang/hapus/' . $item['idproduk']) ?>">
                                                <span class="ion-ios-close"></span>
                                            </a>
                                        </td>

                                        <td class="image-prod">
                                        <div class="img" style="background-image:url('<?= base_url('assets/foto/' . $item['fotoproduk']); ?>');"></div>

                                        </td>

                                        <td class="product-name">
                                            <h3><?= $item['namaproduk']; ?></h3>
                                        </td>

                                        <td class="price">Rp <?= number_format($item['hargaproduk']); ?></td>

                                        <td class="quantity"><?= $item['jumlah']; ?></td>

                                        <td class="total">Rp <?= number_format($item['totalharga']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text-center">Keranjang Anda kosong</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                <p class="text-center"> 
                    <a href="<?= base_url('') ?>" class="btn btn-warning"><i class="fa fa-cart-plus"></i> Lanjutkan Belanja</a>
                    &nbsp;
                    <a href="<?= base_url('checkout') ?>" class="btn btn-danger">Checkout</a>
                </p>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('footer'); ?>

