<?php $this->load->view('header'); ?>

<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('home/images/fc2.jpg') ?>');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="<?= site_url('home') ?>">Home</a></span> <span>Checkout</span></p>
                <h1 class="mb-0 bread">Checkout</h1>
            </div>
        </div>
    </div>
</div>
<section id="home-section" class="hero">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="bg-danger text-white">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Produk</th>
                                <th>Berat (*g)</th>
                                <th>Harga</th>
                                <th>Jumlah Beli</th>
                                <th>SubBerat (*g)</th>
                                <th>SubHarga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $nomor = 1;
                            $totalbelanja = 0;
                            $totalberat = 0;
                            foreach ($this->session->userdata('keranjang') as $idproduk => $jumlah) : 
                                $produk = $this->Produk_model->getProdukById($idproduk); // Ganti dengan metode Anda
                                $totalharga = $produk['hargaproduk'] * $jumlah;
                                $subberat = $produk['beratproduk'] * $jumlah;
                                $totalberat += $subberat;
                                $berat = $totalberat / 1000;
                            ?>
                                <tr class="text-center">
                                    <td><?= $nomor++; ?></td>
                                    <td><?= $produk['namaproduk']; ?></td>
                                    <td><?= $produk['beratproduk']; ?></td>
                                    <td>Rp <?= number_format($produk['hargaproduk']); ?></td>
                                    <td><?= $jumlah; ?></td>
                                    <td><?= $subberat; ?></td>
                                    <td>Rp <?= number_format($totalharga); ?></td>
                                </tr>
                                <?php $totalbelanja += $totalharga; ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 ftco-animate">
                <?= form_open('checkout/proses_checkout') ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Pelanggan</label>
                                <input type="text" readonly value="<?= $this->session->userdata('pengguna')['nama'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>No. Handphone Pelanggan</label>
                                <input type="text" readonly value="<?= $this->session->userdata('pengguna')['telepon'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="mb-2">Alamat Lengkap Pengiriman</label>
                                <input type="hidden" name="totalberatnya" value="<?= $berat ?>" required>
                                <textarea class="form-control mb-2" name="alamatpengiriman" placeholder="Masukkan Alamat"><?= $this->session->userdata('pengguna')['alamat'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Provinsi</label>
                                <input type="text" name="nama_provinsi" class="form-control" placeholder="Masukkan Provinsi" required>
                            </div>
                            <div class="form-group">
                                <label>Kota</label>
                                <input type="text" name="nama_distrik" class="form-control" placeholder="Masukkan Kota" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" id="totalbelanja" name="totalbelanja" value="<?= $totalbelanja ?>" required>
                            <div class="form-group">
                                <label>Total Belanja</label>
                                <input class="form-control valid mb-3" type="number" readonly value="<?= $totalbelanja ?>">
                            </div>
                            <div class="form-group">
                                <label>Total Berat (*g)</label>
                                <input class="form-control mb-2" name="berat" type="number" value="<?= $totalberat ?>" readonly required id="berat">
                            </div>
                            <div class="form-group">
                                <label>Grandtotal</label>
                                <input class="form-control mb-2" id="grandtotal" value="<?= $totalbelanja ?>" required readonly type="number">
                            </div>
                            <div class="form-group">
                                <label>Metode Pembayaran</label>
                                <select class="form-control" name="metodepembayaran">
                                    <option value="Transfer">Transfer</option>
                                    <option value="COD">COD (Cash on Delivery)</option>
                                </select>
                            </div>
                            <button class="btn btn-danger pull-right btn-lg" type="submit" name="checkout">Checkout</button>
                        </div>
                    </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</section>

<script>
    // JavaScript untuk mendapatkan data kota berdasarkan provinsi yang dipilih
    document.getElementById('provinsi').addEventListener('change', function() {
        var provinsi_id = this.value;
        
        // Cek apakah provinsi dipilih
        if (provinsi_id) {
            fetchKota(provinsi_id);
        }
    });

    function fetchKota(provinsi_id) {
        fetch("https://api.rajaongkir.com/starter/city?province=" + provinsi_id, {
            method: 'GET',
            headers: {
                'key': 'e5d496b6b2b47102d8e64c69541abc30'
            }
        })
        .then(response => response.json())
        .then(data => {
            var kotaSelect = document.getElementById('kota');
            kotaSelect.innerHTML = '<option value="">--Pilih Kota--</option>';

            data.rajaongkir.results.forEach(function(kota) {
                var option = document.createElement('option');
                option.value = kota.city_id;
                option.textContent = kota.city_name;
                kotaSelect.appendChild(option);
            });
        })
        .catch(error => console.log('Error fetching cities:', error));
    }
</script>


<?php $this->load->view('footer'); ?>
