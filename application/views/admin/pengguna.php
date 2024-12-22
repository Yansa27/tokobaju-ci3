
<?php $this->load->view('admin/header'); ?>

                     <div class="container-fluid">
                        <div id="page-inner">
                        <div id="wrapper">
                        <!-- Sidebar code -->
                        <div id="content-wrapper" class="d-flex flex-column">

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12 mb-4">
                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                                                </div>
                                                <a href="<?= site_url('admin/createPengguna'); ?>" class="btn btn-primary">Tambah Pengguna</a>


                                                </div>
                                                <div class="card-body">
                                                    <!-- Flash Message -->
                                                    <?php if ($this->session->flashdata('message')): ?>
                                                        <div class="alert alert-success" role="alert">
                                                            <?= $this->session->flashdata('message'); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    
                                                    <table class="table table-bordered" id="table">
                                                        <thead class="bg-danger text-white">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>Email</th>
                                                                <th>Telepon</th>
                                                                <th>Alamat</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $nomor = 1; ?>
                                                            <?php foreach ($pengguna as $row): ?>
                                                                <tr>
                                                                    <td><?= $nomor++; ?></td>
                                                                    <td><?= $row['nama']; ?></td>
                                                                    <td><?= $row['email']; ?></td>
                                                                    <td><?= $row['telepon']; ?></td>
                                                                    <td><?= $row['alamat']; ?></td>
                                                                    <td>
                                                                        <a href="<?= site_url('admin/hapusPengguna/'.$row['id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>

<?php $this->load->view('admin/footer'); ?>

