
<?php $this->load->view('admin/header'); ?>

                     <div class="container-fluid">
                        <div id="page-inner">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <center>
                                    <img src="<?= base_url('assets/foto/bgdepan.png') ?>" width="400px" style="border-radius: 10px">
                                </center>
                            </div>
                        </div>

                        <div class="row">
                                <div class="col-xl-6 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Kategori</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahkategori ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-list fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                            <a href="<?= site_url('admin/kategori'); ?>" class="btn btn-primary mt-3 btn-sm">Lihat Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Produk</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahproduk ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-list fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                            <a href="<?= site_url('admin/produk'); ?>" class="btn btn-primary mt-3 btn-sm">Lihat Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Member</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahmember ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                        <a href="<?= site_url('admin/pengguna'); ?>" class="btn btn-primary mt-3 btn-sm">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Transaksi</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahpembelian ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                        <a href="<?= site_url('admin/transaksi'); ?>" class="btn btn-primary mt-3 btn-sm">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>

<?php $this->load->view('admin/footer'); ?>

