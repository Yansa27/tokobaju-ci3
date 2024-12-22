<?php $this->load->view('header'); ?>

<section class="custom-section mt-5">
    <div class="container">
        <h2 class="text-center">Riwayat Custom Order</h2>
        <p class="text-center">Berikut adalah daftar pesanan custom yang telah Anda buat.</p>
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jenis Kain</th>
                        <th>Warna</th>
                        <th>Size</th>
                        <th>Jenis Sarung</th>
                        <th>Jumlah</th>
                        <th>Foto</th>
                        <th>Tanggal Order</th>
                        <th>Status</th>
                        <th> catatan </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($orders)): ?>
                        <?php foreach ($orders as $index => $order): ?>
                            <tr>
                                <td><?= $index + 1; ?></td>
                                <td><?= htmlspecialchars($order['jenis_kain']); ?></td>
                                <td><?= htmlspecialchars($order['warna']); ?></td>
                                <td><?= htmlspecialchars($order['size']); ?></td>
                                <td><?= htmlspecialchars($order['jenis_sarung']); ?></td>
                                <td><?= htmlspecialchars($order['jumlah']); ?></td>
                                <td>
                                    <?php if (!empty($order['foto_baju'])): ?>
                                        <img src="<?= base_url('assets/foto/' . $order['foto_baju']); ?>" alt="Foto Baju" style="width: 100px;">
                                    <?php else: ?>
                                        Tidak ada foto
                                    <?php endif; ?>
                                </td>
                                <td><?= htmlspecialchars($order['created_at']); ?></td>
                                <td><?= htmlspecialchars($order['status']); ?></td>
                                <td><?= htmlspecialchars($order['catatan']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada riwayat pesanan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<br>
<br>
<br>
<?php $this->load->view('footer'); ?>
