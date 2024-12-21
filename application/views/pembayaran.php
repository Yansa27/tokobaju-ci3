<?php $this->load->view('header'); ?>

<div class="container mt-4">
    <h4 class="text-danger">Upload Bukti Pembayaran Sebelum <?= date('d-m-Y H:i', strtotime($deadline)); ?></h4>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-6">
            <strong>NO PEMBELIAN: <?= $detail['idbeli']; ?></strong><br>
            Status Pesanan: <?= $detail['statusbeli']; ?><br>
            Total Pemesanan: Rp. <?= number_format($detail['totalbeli']); ?><br>
            Total Bayar: Rp. <?= number_format($detail['totalbeli']); ?><br>
        </div>
        <div class="col-md-6">
            <strong>NAMA: <?= $detail['nama']; ?></strong><br>
            Telepon: <?= $detail['telepon']; ?><br>
            Email: <?= $detail['email']; ?><br>
            Alamat: <?= $detail['alamatpengiriman']; ?><br>
        </div>
    </div>
    
    <table class="table table-bordered mt-3">
        <thead class="bg-danger text-white">
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($produk as $item): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $item['nama']; ?></td>
                    <td>Rp. <?= number_format($item['harga']); ?></td>
                    <td><?= $item['jumlah']; ?></td>
                    <td>Rp. <?= number_format($item['subharga']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <div class="row mt-4">
        <div class="col-md-5">
            <img width="100%" src="<?= base_url('assets/foto/bayar.webp'); ?>" alt="Panduan Pembayaran">
        </div>
        <div class="col-md-7">
            <p>Kirim Bukti Pembayaran</p>
            <b>No.Rek BRI: 5665-0102-7653-530 (SITI MAISAROH)</b><br>
            <b>No.Rek Mandiri: 1140015104717 (SITI MAISAROH)</b><br>
            <b>No.Rek BCA: 6185172345 (SITI MAISAROH)</b>
            <br><br><br>
            
            <div class="alert alert-info">
                Total Tagihan Anda: <strong>Rp. <?= number_format($detail["totalbeli"]); ?> <br>(Sudah Termasuk biaya pengiriman)</strong>
            </div>
            
            <form method="post" action="<?= base_url('index.php/pembayaran/uploadBukti/' . $detail['idbeli']); ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Rekening</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Transfer</label>
                    <input type="date" name="tanggaltransfer" class="form-control" value="<?= date('Y-m-d'); ?>" required>
                </div>
                <div class="form-group">
                    <label>Foto Bukti</label>
                    <input type="file" name="bukti" class="form-control" required>
                </div>
                <button class="btn btn-danger float-right" name="kirim">Simpan</button>
            </form>
        </div>
    </div>
</div>

<br>
<br>
<br>

<?php $this->load->view('footer'); ?>
