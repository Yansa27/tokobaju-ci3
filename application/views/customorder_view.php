<?php $this->load->view('header'); ?>

<section class="custom-section mt-5">
    <div class="container">
        <h2 class="text-center">Custom Baju Bodo</h2>
        <p class="text-center">Buatlah baju bodo versi kamu!</p>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        
        <div class="row">
            <!-- Form Section -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-4" style="background-color: #fce0e0;">
                        <form action="<?= site_url('CustomOrderController/store') ?>" method="post" enctype="multipart/form-data" >
                            <div class="mb-3">
                                <label for="jenis-kain" class="form-label">Jenis Kain</label>
                                <select id="jenis-kain" name="jenis_kain" class="form-select custom-input">
                                    <option value="">Pilih Jenis Kain</option>
                                    <option value="Sutra">SUtra</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="custom" class="form-label">Upload Foto Baju</label>
                                <input type="file" id="custom" name="foto_baju" class="form-control custom-input" onchange="previewImage(event)">
                            </div>

                            <!-- Preview Image -->
                            <div id="preview-container" class="mb-3 text-center" style="display: none;">
                                <img id="preview" src="" alt="Preview" class="img-fluid" style="max-width: 100%;">
                            </div>

                            <div class="mb-3">
                                <label for="warna" class="form-label">Warna</label>
                                <div>
                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-color="Hitam">Hitam</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-color="Dusty Blue">Dusty Blue</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-color="Coffe">Coffe</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-color="Milo">Milo</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-color="Coconut">Coconut</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-color="Grey">Grey</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-color="Nude">Nude</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-color="Navy">Navy</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-color="White">White</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-color="Stone">Stone</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-color="Krem">Krem</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-color="Latte">Latte</button>
                                </div>
                                <!-- Hidden input field to store the selected color -->
                                <input type="hidden" id="selected-color" name="warna" value="">
                            </div>

                            <div class="mb-3">
                                <label for="size" class="form-label">Size</label>
                                <select id="size" name="size" class="form-select custom-input">
                                    <option value="">Pilih Size</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="jenis-sarung" class="form-label">Jenis Sarung</label>
                                <select id="jenis-sarung" name="jenis_sarung" class="form-select custom-input">
                                    <option value="">Pilih Jenis Sarung</option>
                                    <option value="sarung">Sarung</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" id="jumlah" name="jumlah" class="form-control custom-input" value="1">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Order Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Model Reference Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5>Referensi Model</h5>
                        <img id="preview-image" src="model.jpeg" alt="Model Baju Bodo" class="img-fluid">
                    </div>
                </div>
            </div>

<!-- Add JavaScript to preview the image -->


        </div>
    </div>
</section>

<script>
    document.querySelectorAll('.btn-outline-secondary').forEach(button => {
    button.addEventListener('click', function() {
        var color = this.getAttribute('data-color'); // Ambil nilai warna dari atribut data-color
        document.getElementById('selected-color').value = color; // Set nilai input hidden
        alert('Warna yang dipilih: ' + color); // Opsional, untuk menampilkan warna yang dipilih
    });
});

    document.getElementById('custom').addEventListener('change', function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var previewImage = document.getElementById('preview-image');
            previewImage.src = reader.result; // Set the source of the preview image
        };
        if (event.target.files.length > 0) {
            reader.readAsDataURL(event.target.files[0]); // Read the selected image
        }
    });
</script>


<?php $this->load->view('footer'); ?>

<!-- Custom CSS -->
<style>
    .custom-section {
        padding: 30px 0;
    }

    .custom-input {
        background-color: #fff;
        border: 1px solid #d5a6d1;
        border-radius: 5px;
        padding: 10px;
        font-size: 14px;
        transition: border-color 0.3s ease;
    }

    .custom-input:focus {
        border-color: #e1a9c1;
        box-shadow: 0 0 5px rgba(225, 169, 193, 0.5);
    }

    .btn-outline-secondary {
        border-color: #d5a6d1;
        color: #d5a6d1;
    }

    .btn-outline-secondary:hover {
        background-color: #d5a6d1;
        color: white;
    }
</style>
