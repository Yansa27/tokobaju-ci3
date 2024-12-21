<?php $this->load->view('header'); ?>
<div class="hero-wrap hero-bread" style="background-image: url('home/images/fc2.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= site_url('home') ?>">Home</a></span> <span>Riwayat</span></p>
                <h1 class="mb-0 bread">Riwayat Pembelian</h1>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="bg-danger text-white">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Daftar Produk</th>
                                <th>Tanggal Pembelian</th>
                                <th>Total Pembelian</th>
                                <th>Status Pembelian</th>
                                <th>Metode Pembayaran</th>
                                <th>Aksi</th>
                                <th>Bukti Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($riwayat)) : ?>
                                <?php $nomor = 1; ?>
                                <?php foreach ($riwayat as $item) : ?>
                                    <tr class="text-center">
                                        <td><?= $nomor++ ?></td>
                                        <td>
                                            <ul>
                                                <?php
                                                $produk = $this->Riwayat_model->get_produk_pembelian($item['idbeli']);
                                                foreach ($produk as $p) : ?>
                                                    <li><?= $p['namaproduk'] ?> x <?= $p['jumlah'] ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </td>
                                        <td><?= date('d-m-Y', strtotime($item['tanggalbeli'])) ?></td>
                                        <td>Rp. <?= number_format($item['totalbeli'], 0, ',', '.') ?></td>
                                        <td><?= $item['statusbeli'] ?></td>
                                        <td><?= $item['metodepembayaran'] ?></td>
                                        <td>
                                            <?php if ($item['statusbeli'] == 'Belum Bayar') : ?>
                                                <a href="<?= site_url('pembayaran/index/' . $item['idbeli']) ?>" class="btn btn-danger">Bayar</a>
                                            <?php elseif ($item['statusbeli'] == 'Sudah Upload Bukti Pembayaran') : ?>
                                                <span class="btn btn-success">Menunggu Konfirmasi Admin</span>
                                            <?php else : ?>
                                                <span class="btn btn-secondary"><?= $item['statusbeli'] ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($item['bukti'])) : ?>
                                                <img width="100px" src="<?= base_url('assets/foto/' . $item['bukti']) ?>" alt="Bukti Pembayaran">
                                            <?php else : ?>
                                                <span class="text-danger">Belum Upload</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada riwayat pembelian.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('footer'); ?>
