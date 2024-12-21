<?php $this->load->view('admin/header'); ?>

<div class="container-fluid">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Pembelian</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Pembelian</h3>
                                <hr>
                                <strong>NO PEMBELIAN: <?php echo $detail['idbeli']; ?></strong><br>
                                Tanggal : <?= tanggal(date('Y-m-d', strtotime($detail['tanggalbeli']))) ?><br>
                                Status Pesanan: <?php echo $detail['statusbeli']; ?><br>
                                Total Pembelian : Rp. <?php echo number_format($detail['totalbeli']); ?><br>
                                Total Bayar : Rp. <?php echo number_format($detail['totalbeli']); ?><br>
                            </div>
                            <div class="col-md-6">
                                <h3>Pelanggan</h3>
                                <hr>
                                <strong>NAMA : <?php echo $detail['nama']; ?></strong><br>
                                Telepon : <?php echo $detail['telepon']; ?><br>
                                Email : <?php echo $detail['email']; ?><br>
                                Kota : <?php echo $detail['kota']; ?><br>
                                Provinsi : <?php echo $detail['provinsi']; ?><br>
                                Alamat Pengiriman : <?php echo $detail['alamatpengiriman']; ?><br>
                                Metode Pengiriman : <?php echo $detail['metodepengiriman']; ?><br>
                                Metode Pembayaran : <?php echo $detail['metodepembayaran']; ?><br>
                            </div>
                        </div>
                        <br>
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1; ?>
                            <?php foreach ($produk as $pecah) { ?>
                                <tr>
                                    <td><?php echo $nomor; ?></td>
                                    <td><?php echo $pecah['nama']; ?></td>
                                    <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                                    <td><?php echo $pecah['jumlah']; ?></td>
                                    <td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
                                </tr>
                                <?php $nomor++; ?>
                            <?php } ?>
                        </tbody>
                    </table>


                      

        <div class="row">
            <?php if ($detail['statusbeli'] != "Selesai") { ?>
                <div class="col-md-6 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Konfirmasi</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <?php if (!empty($detail)): ?>
                                            <tr>
                                                <th>Nama</th>
                                                <th><?= isset($detail['nama']) ? $detail['nama'] : '' ?></th>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Transfer</th>
                                                <th><?= isset($pembayaran['tanggaltransfer']) ? tanggal(date('Y-m-d', strtotime($pembayaran['tanggaltransfer']))) : '' ?></th>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Upload Bukti Pembayaran</th>
                                                <th><?= isset($pembayaran['tanggal']) ? tanggal(date('Y-m-d', strtotime($pembayaran['tanggal']))) : '' ?></th>
                                            </tr>
                                        <?php endif; ?>
                                    </table>
                                    <form method="post" action="<?php echo base_url('index.php/admin/updateStatusPembelian/'.$detail['idbeli']); ?>">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="statusbeli">
                                                <option value="">Pilih Status</option>
                                                <option <?php if ($detail['statusbeli'] == 'Pesanan Di Tolak') echo 'selected'; ?> value="Pesanan Di Tolak">Pesanan Di Tolak</option>
                                                <option <?php if ($detail['statusbeli'] == 'Pesanan Sedang Di Proses') echo 'selected'; ?> value="Pesanan Sedang Di Proses">Pesanan Sedang Di Proses</option>
                                                <option <?php if ($detail['statusbeli'] == 'Pesanan Di Kirim') echo 'selected'; ?> value="Pesanan Di Kirim">Pesanan Di Kirim</option>
                                                <option <?php if ($detail['statusbeli'] == 'Pesanan Telah Sampai ke Pemesan') echo 'selected'; ?> value="Pesanan Telah Sampai ke Pemesan">Pesanan Telah Sampai ke Pemesan</option>
                                            </select>
                                        </div>
                                        <button class="btn btn-danger float-right" name="proses">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="col-md-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Bukti Pembayaran</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Bukti Pembayaran</h4>
                                <img src="<?= base_url('assets/foto/'.$pembayaran['bukti']); ?>" alt="" class="img-responsive" width="100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/footer'); ?>
