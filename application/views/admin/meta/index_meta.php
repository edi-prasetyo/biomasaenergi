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

<section class="p-5 my-5">
    <div class="row">
        <div class="row mb-8">
            <div class="col-xl-3 col-lg-4 col-md-12 col-12">
                <div class="mb-4 mb-lg-0">
                    <h4 class="mb-1">General Setting</h4>
                    <p class="mb-0 fs-5 text-muted">Profile configuration settings </p>
                </div>

            </div>

            <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                <!-- card -->
                <div class="card">
                    <!-- card body -->
                    <div class="card-body">
                        <div class=" mb-6">
                            <h4 class="mb-1">General Settings</h4>

                        </div>
                        <div class="row align-items-center mb-8">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <h5 class="mb-0">Logo</h5>
                            </div>
                            <div class="col-md-8">
                                <?php
                                echo form_open_multipart(base_url('admin/meta/logo/' . $meta->id));
                                ?>
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="<?php echo base_url('assets/img/logo/' . $meta->logo); ?>" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-md-7">
                                        <input name="logo" type="file" />
                                        <input type="hidden" name="id" value="<?php echo $meta->id ?>">
                                        <button type="submit" class="btn btn-outline-white mt-2">Upload</button>
                                    </div>

                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                        <!-- col -->
                        <div class="row align-items-center mb-8">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <h5 class="mb-0">Icon</h5>
                            </div>
                            <div class="col-md-8">
                                <?php echo form_open_multipart(base_url('admin/meta/favicon/')); ?>
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="<?php echo base_url('assets/img/logo/' . $meta->favicon); ?>" width="50%" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-md-7">
                                        <input name="favicon" type="file" />
                                        <input type="hidden" name="id" value="<?php echo $meta->id ?>">
                                        <button type="submit" class="btn btn-outline-white mt-2">Upload</button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                        <!-- col -->

                        <div>
                            <!-- border -->
                            <div class="mb-6">
                                <h4 class="mb-1">Basic information</h4>

                            </div>
                            <?php
                            echo form_open('admin/meta/update/' . $meta->id);
                            ?>
                            <!-- row -->
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-4 col-form-label form-label">Nama Web</label>
                                <div class="col-md-8 col-12">
                                    <input type="text" class="form-control" value="<?php echo $meta->title; ?>" name="title" required>
                                </div>
                            </div>
                            <!-- row -->
                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-4 col-form-label form-label">Tagline </label>
                                <div class="col-md-8 col-12">
                                    <input type="text" class="form-control" value="<?php echo $meta->tagline; ?>" name="tagline" required>
                                </div>
                            </div>

                            <!-- row -->
                            <div class="mb-3 row">
                                <label for="addressLine" class="col-sm-4 col-form-label form-label">Deskripsi Web</label>
                                <div class="col-md-8 col-12">
                                    <input type="text" class="form-control" name="description" value="<?php echo $meta->description; ?>" required>
                                </div>
                            </div>
                            <!-- row -->
                            <div class="mb-3 row">
                                <label for="addressLineTwo" class="col-sm-4 col-form-label form-label">Link</label>
                                <div class="col-md-8 col-12">
                                    <input type="text" class="form-control" name="link" value="<?php echo $meta->link; ?>" required>
                                </div>
                            </div>
                            <!-- row -->
                            <div class="mb-3 row">
                                <label for="addressLineTwo" class="col-sm-4 col-form-label form-label">Email</label>
                                <div class="col-md-8 col-12">
                                    <input type="text" class="form-control" name="email" value="<?php echo $meta->email; ?>" required>
                                </div>
                            </div>
                            <!-- row -->
                            <div class="mb-3 row">
                                <label for="addressLineTwo" class="col-sm-4 col-form-label form-label">Telepon</label>
                                <div class="col-md-8 col-12">
                                    <input type="text" class="form-control" name="telepon" value="<?php echo $meta->telepon; ?>" required>
                                </div>
                            </div>
                            <!-- row -->
                            <div class="mb-3 row">
                                <label for="addressLineTwo" class="col-sm-4 col-form-label form-label">Whatsapp</label>
                                <div class="col-md-8 col-12">
                                    <input type="text" class="form-control" name="whatsapp" value="<?php echo $meta->whatsapp; ?>">
                                </div>
                            </div>
                            <!-- row -->
                            <div class="mb-3 row">
                                <label for="addressLineTwo" class="col-sm-4 col-form-label form-label">Alamat</label>
                                <div class="col-md-8 col-12">
                                    <textarea class="form-control" name="alamat"><?php echo $meta->alamat; ?></textarea>
                                </div>
                            </div>
                            <!-- row -->
                            <div class="mb-3 row">
                                <label for="addressLineTwo" class="col-sm-4 col-form-label form-label">Facebook</label>
                                <div class="col-md-8 col-12">
                                    <input type="text" class="form-control" name="facebook" value="<?php echo $meta->facebook; ?>">
                                </div>
                            </div>
                            <!-- row -->
                            <div class="mb-3 row">
                                <label for="addressLineTwo" class="col-sm-4 col-form-label form-label">Instagram</label>
                                <div class="col-md-8 col-12">
                                    <input type="text" class="form-control" name="instagram" value="<?php echo $meta->instagram; ?>">
                                </div>
                            </div>
                            <!-- row -->
                            <div class="mb-3 row">
                                <label for="addressLineTwo" class="col-sm-4 col-form-label form-label">Youtube</label>
                                <div class="col-md-8 col-12">
                                    <input type="text" class="form-control" name="youtube" value="<?php echo $meta->youtube; ?>">
                                </div>
                            </div>
                            <!-- row -->
                            <div class="mb-3 row">
                                <label for="addressLineTwo" class="col-sm-4 col-form-label form-label">Twitter</label>
                                <div class="col-md-8 col-12">
                                    <input type="text" class="form-control" name="twitter" value="<?php echo $meta->twitter; ?>">
                                </div>
                            </div>
                            <!-- row -->
                            <div class="mb-3 row">
                                <label for="addressLineTwo" class="col-sm-4 col-form-label form-label">Keywords</label>
                                <div class="col-md-8 col-12">
                                    <textarea class="form-control" name="keywords"><?php echo $meta->keywords; ?></textarea>
                                </div>
                            </div>
                            <!-- row -->
                            <div class="mb-3 row">
                                <label for="addressLineTwo" class="col-sm-4 col-form-label form-label">Google Webmaster</label>
                                <div class="col-md-8 col-12">
                                    <textarea class="form-control" name="google_meta"><?php echo $meta->google_meta; ?></textarea>
                                </div>
                            </div>
                            <!-- row -->
                            <div class="mb-3 row">
                                <label for="addressLineTwo" class="col-sm-4 col-form-label form-label">Google Analytics</label>
                                <div class="col-md-8 col-12">
                                    <textarea class="form-control" name="google_analytics"><?php echo $meta->google_analytics; ?></textarea>
                                </div>
                            </div>
                            <!-- row -->
                            <div class="mb-3 row">
                                <label for="addressLineTwo" class="col-sm-4 col-form-label form-label">Google Tag</label>
                                <div class="col-md-8 col-12">
                                    <textarea class="form-control" name="google_tag"><?php echo $meta->google_tag; ?></textarea>
                                </div>
                            </div>
                            <!-- row -->
                            <div class="mb-3 row">
                                <label for="addressLineTwo" class="col-sm-4 col-form-label form-label">Bing Meta</label>
                                <div class="col-md-8 col-12">
                                    <textarea class="form-control" name="bing_meta"><?php echo $meta->bing_meta; ?></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="addressLineTwo" class="col-sm-4 col-form-label form-label">Google Maps</label>
                                <div class="col-md-8 col-12">
                                    <textarea class="form-control" name="map"><?php echo $meta->map; ?></textarea>

                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="addressLineTwo" class="col-sm-4 col-form-label form-label"></label>
                                <div class="col-md-8 col-12">
                                    <button type="submit" class="btn btn-primary text-white btn-block">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                </div>
                            </div>


                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>