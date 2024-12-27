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
        <!-- Sidebar code -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:rgb(191, 50, 95);">
            <a class="sidebar-brand d-flex align-items-center justify-content-center text-white" href="<?= site_url('admin/beranda'); ?>">
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
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown no-arrow">
                                <a onclick="return confirm('Apakah Anda Yakin Ingin Keluar ?');" class="nav-link" href="<?= base_url('index.php/login/logout')?>">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"> Keluar</span>
                                </a>
                            </li>
                        </ul>
                </nav>

                <div class="container-fluid">
                    <div id="page-inner">

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori</h6>
                                    </div>
                                    <div class="card-body">
                                        <?= form_open('admin/simpan_kategori'); ?> <!-- Form menggunakan CodeIgniter -->
                                            <div class="form-group">
                                                <label>Nama Kategori</label>
                                                <input type="text" class="form-control" name="kategori" value="<?= set_value('kategori'); ?>" required>
                                                <?= form_error('kategori', '<small class="text-danger">', '</small>'); ?> <!-- Menampilkan error jika ada -->
                                            </div>
                                            <button class="btn btn-danger" type="submit">Simpan</button>
                                        <?= form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="<?= base_url('assets/admin/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/jquery.metisMenu.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/morris/raphael-2.1.0.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/morris/morris.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/sb-admin-2.min.js'); ?>"></script>

    <!-- DataTables JS -->
    <script src="<?= base_url('assets/admin/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js'); ?>"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();  // Initialize DataTables on the table
        });
    </script>
</body>

</html>
