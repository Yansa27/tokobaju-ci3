<?php $this->load->view('penjahit/header'); ?>

<section class="admin-section mt-5">
    <div class="container">
        <h2 class="text-center">Riwayat Custom Order - Admin</h2>
        <p class="text-center">Kelola status dan catatan untuk setiap pesanan custom order.</p>

        <!-- Flash Messages -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

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
                        <th>Status</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
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
                                <td><?= htmlspecialchars($order['status']); ?></td>
                                <td><?= htmlspecialchars($order['catatan']); ?></td>
                                <td>
                                    <!-- Form Update Status -->
                                    <form action="<?= base_url('index.php/penjahit/update-status/' . $order['id']); ?>" method="post">
                                        <div class="form-group">
                                            <select name="status" class="form-control" required>
                                                <option value="">Pilih Status</option>
                                                <option value="Diterima" <?= $order['status'] == 'Diterima' ? 'selected' : ''; ?>>Diterima</option>
                                                <option value="Ditolak" <?= $order['status'] == 'Ditolak' ? 'selected' : ''; ?>>Ditolak</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="catatan" class="form-control" rows="3" placeholder="Masukkan catatan"><?= htmlspecialchars($order['catatan']); ?></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="10" class="text-center">Tidak ada riwayat pesanan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php $this->load->view('penjahit/footer'); ?>
