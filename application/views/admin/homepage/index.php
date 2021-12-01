<div class="row mt-6">

    <div class="offset-xl-2 col-xl-8 offset-lg-1 col-lg-10 col-md-12
              col-12">
        <?php

        //Error warning
        echo validation_errors('<div class="alert alert-warning">', '</div>');
        //Error Upload Gabar
        if (isset($error_upload)) {
            echo '<div class="alert alert-warning">' . $error_upload . '</div>';
        }

        if ($this->session->flashdata('message')) {
            echo $this->session->flashdata('message');
            unset($_SESSION['message']);
        }
        ?>
        <div class="row">
            <div class="col-12 mb-6">
                <!-- card  -->
                <div class="card">
                    <!-- card header  -->
                    <div class="card-header p-4 bg-white">
                        <h4 class="mb-0">Background Header</h4>
                    </div>
                    <!-- card body  -->
                    <div class="card-body">
                        <?php echo form_open_multipart('admin/homepage/image_hero/' . $homepage->id); ?>
                        <div class="form-group row">
                            <label class="col-md-3 text-end">Ubah Background</label>
                            <div class="col-md-6">
                                <input type="file" name="hero_img">
                                <img src="<?php echo base_url('assets/img/galery/' . $homepage->hero_img); ?>" class="img-fluid mt-2">
                                <div class="invalid-feedback">Silahkan Pilih Gambar.</div>

                                <button type="submit" class="btn btn-primary mt-3">Upload</button>
                            </div>
                            <div class="col-md-3">

                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <hr>
                        <?php echo form_open('admin/homepage/hero_content/' . $homepage->id); ?>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end">Judul Indonesia</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="hero_title_id" value="<?php echo $homepage->hero_title_id; ?>" required>
                                <div class="invalid-feedback">Silahkan Masukan Text.</div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end">Judul Inggris</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="hero_title_en" value="<?php echo $homepage->hero_title_en; ?>" required>
                                <div class="invalid-feedback">Silahkan Pilih Gambar.</div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end">Tombol Indonesia</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="hero_button_id" value="<?php echo $homepage->hero_button_id; ?>" required>
                                <div class="invalid-feedback">Silahkan Masukan Text.</div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end">Tombol Inggris</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="hero_button_en" value="<?php echo $homepage->hero_button_en; ?>" required>
                                <div class="invalid-feedback">Silahkan Masukan Text.</div>
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end">Url</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="hero_url" value="<?php echo $homepage->hero_url; ?>" required>
                                <div class="invalid-feedback">Silahkan Masukan Url Link.</div>
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end"></label>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>

                    </div>

                </div>


                <!-- Service Section -->

                <div class="card mt-3">
                    <!-- card header  -->
                    <div class="card-header p-4 bg-white">
                        <h4 class="mb-0">Layanan</h4>
                    </div>
                    <!-- card body  -->
                    <div class="card-body">
                        <?php echo form_open('admin/homepage/service/' . $homepage->id); ?>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end">Judul Layanan ( ID )</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="service_title_id" value="<?php echo $homepage->service_title_id; ?>" required>
                                <div class="invalid-feedback">Silahkan Masukan Text.</div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end">Service Title ( EN )</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="service_title_en" value="<?php echo $homepage->service_title_en; ?>" required>
                                <div class="invalid-feedback">Silahkan Pilih Gambar.</div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end">Deskripsi Layanan ( ID ) </label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="service_desc_id" required><?php echo $homepage->service_desc_id; ?></textarea>
                                <div class="invalid-feedback">Silahkan Masukan Text.</div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end">Service Description ( EN )</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="service_desc_en" required><?php echo $homepage->service_desc_en; ?></textarea>
                                <div class="invalid-feedback">Silahkan Masukan Text.</div>
                            </div>
                        </div>



                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end"></label>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>

                    </div>

                </div>





                <div class="card mt-3">
                    <!-- card header  -->
                    <div class="card-header p-4 bg-white">
                        <h4 class="mb-0">About</h4>
                    </div>
                    <!-- card body  -->
                    <div class="card-body">
                        <?php echo form_open_multipart('admin/homepage/about/' . $homepage->id); ?>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end">Ubah Gambar</label>
                            <div class="col-md-8">
                                <input type="file" name="about_img">
                                <img src="<?php echo base_url('assets/img/galery/' . $homepage->about_img); ?>" class="img-fluid mt-2">
                                <div class="invalid-feedback">Silahkan Pilih Gambar.</div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end">Tentang Perusahaan ( ID )</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="about_title_id" value="<?php echo $homepage->about_title_id; ?>" required>
                                <div class="invalid-feedback">Silahkan Masukan Text.</div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end">About Title ( EN )</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="about_title_en" value="<?php echo $homepage->about_title_en; ?>" required>
                                <div class="invalid-feedback">Silahkan Pilih Gambar.</div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end">Deskripsi ( ID ) </label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="about_desc_id" required><?php echo $homepage->about_desc_id; ?></textarea>
                                <div class="invalid-feedback">Silahkan Masukan Text.</div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end"> Description ( EN )</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="about_desc_en" required><?php echo $homepage->about_desc_en; ?></textarea>
                                <div class="invalid-feedback">Silahkan Masukan Text.</div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end"> Teks Tombol ( ID )</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="about_button_id" value="<?php echo $homepage->about_button_id; ?>" required>
                                <div class="invalid-feedback">Silahkan Masukan Text.</div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end"> Button Text ( EN )</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="about_button_en" value="<?php echo $homepage->about_button_en; ?>" required>
                                <div class="invalid-feedback">Silahkan Masukan Text.</div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end"> Url</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="about_url" value="<?php echo $homepage->about_url; ?>" required>
                                <div class="invalid-feedback">Silahkan Masukan Text.</div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end"></label>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>

                    </div>

                </div>



                <div class="card mt-3">
                    <!-- card header  -->
                    <div class="card-header p-4 bg-white">
                        <h4 class="mb-0">Produk unggulan</h4>
                    </div>
                    <!-- card body  -->
                    <div class="card-body">
                        <?php echo form_open_multipart('admin/homepage/product/' . $homepage->id); ?>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end">Ubah Gambar</label>
                            <div class="col-md-8">
                                <input type="file" name="product_img">
                                <img src="<?php echo base_url('assets/img/galery/' . $homepage->product_img); ?>" class="img-fluid mt-2">
                                <div class="invalid-feedback">Silahkan Pilih Gambar.</div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end">Nama Produk ( ID )</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="product_title_id" value="<?php echo $homepage->product_title_id; ?>" required>
                                <div class="invalid-feedback">Silahkan Masukan Text.</div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end">Product Name ( EN )</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="product_title_en" value="<?php echo $homepage->product_title_en; ?>" required>
                                <div class="invalid-feedback">Silahkan Pilih Gambar.</div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end">Deskripsi ( ID ) </label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="product_desc_id" id="summernote" required><?php echo $homepage->product_desc_id; ?></textarea>
                                <div class="invalid-feedback">Silahkan Masukan Text.</div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end"> Description ( EN )</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="product_desc_en" id="summernote2" required><?php echo $homepage->product_desc_en; ?></textarea>
                                <div class="invalid-feedback">Silahkan Masukan Text.</div>
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label class="col-md-4 text-end"></label>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>

                    </div>

                </div>



            </div>


        </div>
    </div>
</div>