<?php $this->load->view('header'); ?>
<div class="container">
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
                                <a href="<?php echo base_url('keranjang/hapus/') . $item['idproduk']; ?>"><span class="ion-ios-close"></span></a>
                            </td>
                            <td class="image-prod">
                                <div class="img" style="background-image:url(<?php echo base_url('assets/foto/') . $item['fotoproduk']; ?>);"></div>
                            </td>
                            <td class="product-name">
                                <h3><?php echo $item['namaproduk']; ?></h3>
                            </td>
                            <td class="price">Rp <?php echo number_format($item['hargaproduk']); ?></td>
                            <td class="quantity"><?php echo $item['jumlah']; ?></td>
                            <td class="total">Rp <?php echo number_format($item['totalharga']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="text-center">Keranjang kosong</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <p class="text-center">
            <a href="<?php echo base_url('produk'); ?>" class="btn btn-warning">Lanjutkan Belanja</a>
            <a href="<?php echo base_url('checkout'); ?>" class="btn btn-danger">Checkout</a>
        </p>
    </div>
</div>

<?php $this->load->view('footer'); ?>