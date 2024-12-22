<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link href="<?= base_url('assets/admin/css/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url('assets/admin/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/admin/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css'); ?>">
    <script src="<?= base_url('assets/admin/ckeditor/ckeditor.js'); ?>"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:rgb(191, 50, 95);">
            <a class="sidebar-brand d-flex align-items-center justify-content-center text-white" href="<?= site_url('admin/dashboard'); ?>">
                <div class="sidebar-brand-text mx-3">HR SHOPKU BAJU BONDO</div>
            </a>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= site_url('admin/dashboard'); ?>">
                    <i class="fas fa-fw fa-book text-white"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= site_url('admin/kategori'); ?>">
                    <i class="fas fa-fw fa-list text-white"></i>
                    <span>Kategori</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= site_url('admin/produk'); ?>">
                    <i class="fas fa-fw fa-pen text-white"></i>
                    <span>Produk</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= site_url('admin/transaksi'); ?>">
                    <i class="fas fa-fw fa-home text-white"></i>
                    <span>Transaksi</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link text-white" href="<?= site_url('admin/pengguna'); ?>">
                    <i class="fas fa-fw fa-users text-white"></i>
                    <span>Akun Member</span>
                </a>
            </li>
        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a onclick="return confirm('Apakah Anda Yakin Ingin Keluar ?');" class="nav-link" href="<?= site_url('admin/logout'); ?>">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Keluar</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    <div id="page-inner">
                        <!-- Display Flash Messages -->
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success">
                                <?= $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Form to Edit Product -->
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Ubah Produk</h6>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data" action="<?= base_url('index.php/admin/simpanubahproduk/' . $produk['idproduk']); ?>">
                                            <!-- Product Name -->
                                            <div class="form-group">
                                                <label for="nama">Nama Produk</label>
                                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $produk['namaproduk']; ?>" required>
                                            </div>

                                            <!-- Product Category -->
                                            <div class="form-group">
                                                <label for="id_kategori">Nama Kategori</label>
                                                <select class="form-control" name="id_kategori" id="id_kategori" required>
                                                    <option value="">Pilih Kategori</option>
                                                    <?php foreach ($datakategori as $kategori) : ?>
                                                        <option value="<?= $kategori['id_kategori']; ?>" <?= ($produk['id_kategori'] == $kategori['id_kategori']) ? 'selected' : ''; ?>><?= $kategori['nama_kategori']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <!-- Product Price -->
                                            <div class="form-group">
                                                <label for="harga">Harga (Rp)</label>
                                                <input type="number" class="form-control" name="harga" id="harga" value="<?= $produk['hargaproduk']; ?>" required>
                                            </div>

                                            <!-- Product Description -->
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10" required><?= $produk['deskripsiproduk']; ?></textarea>
                                                <script>
                                                    CKEDITOR.replace('deskripsi');
                                                </script>
                                            </div>

                                            <!-- Product Image -->
                                            <div class="form-group">
                                                <label for="foto">Foto Produk</label>
                                                <input type="file" class="form-control" name="foto" id="foto">
                                                <img src="<?= base_url('assets/foto/' . $produk['fotoproduk']); ?>" alt="Foto Produk" style="width: 150px;">
                                            </div>

                                            <!-- Product Stock -->
                                            <div class="form-group">
                                                <label for="stok">Stok Produk</label>
                                                <input type="number" class="form-control" name="stok" id="stok" value="<?= $produk['stokproduk']; ?>" required>
                                            </div>

                                            <!-- Product Weight -->
                                            <div class="form-group">
                                                <label for="berat">Berat Produk (g)</label>
                                                <input type="number" class="form-control" name="berat" id="berat" value="<?= $produk['beratproduk']; ?>" required>
                                            </div>

                                            <button class="btn btn-danger" name="save">Perbarui</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?= base_url('assets/admin/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/jquery.metisMenu.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/morris/raphael-2.1.0.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/morris/morris.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/sb-admin-2.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js'); ?>"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); // Initialize DataTables on the table
        });
    </script>
</body>

</html>
