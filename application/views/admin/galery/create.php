<div class="col-md-8 mx-auto">
    <div class="card mb-4">
        <div class="card-header bg-white py-3">
            <?php echo $title; ?>
        </div>
        <div class="card-body">






        </div>
    </div>



    <div class="mb-10 card">
        <ul class="nav nav-line-bottom nav-example" id="pills-tabTwo" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-accordions-design-tab" data-bs-toggle="pill" href="#pills-accordions-design" role="tab" aria-controls="pills-accordions-design" aria-selected="true">Foto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-accordions-html-tab" data-bs-toggle="pill" href="#pills-accordions-html" role="tab" aria-controls="pills-accordions-html" aria-selected="false">Video</a>
            </li>
        </ul>
        <div class="tab-content p-4" id="pills-tabTwoContent">
            <div class="tab-pane tab-example-design fade show active" id="pills-accordions-design" role="tabpanel" aria-labelledby="pills-accordions-design-tab">
                <div class="accordion" id="accordionExample">

                    <div class="text-center">
                        <?php
                        echo $this->session->flashdata('message');
                        if (isset($errors_upload)) {
                            echo '<div class="alert alert-warning">' . $error_upload . '</div>';
                        }
                        ?>
                    </div>
                    <?php
                    echo form_open_multipart('admin/galery/create');
                    ?>

                    <div class="form-group row mb-3">
                        <label class="col-lg-3 col-form-label">Judul <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="galery_title" placeholder="Judul" value="<?php echo set_value('galery_title'); ?>">
                            <?php echo form_error('galery_title', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-lg-3 col-form-label">Tipe <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-9">
                            <select name="galery_type" class="form-control form-control-chosen">
                                <option value="Halaman">Halaman</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-lg-3 col-form-label">Upload Gambar <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-9">
                            <div class="input-group mb-3">
                                <input type="file" name="galery_img">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-lg-3 col-form-label">Embed Youtube <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="galery_embed" placeholder="Youtube Embed" value="<?php echo set_value('galery_embed'); ?>"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-lg-3 col-form-label">Deskripsi <span class="text-success">Optional</span>
                        </label>
                        <div class="col-lg-9">

                            <textarea class="form-control" id="summernote" name="galery_desc" placeholder="Deskripsi Galery"></textarea>
                            <?php echo form_error('galery_desc', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Publish
                            </button>
                        </div>
                    </div>

                    <?php echo form_close() ?>


                </div>
            </div>
            <div class="tab-pane tab-example-html fade" id="pills-accordions-html" role="tabpanel" aria-labelledby="pills-accordions-html-tab">


                <div class="text-center">
                    <?php
                    echo $this->session->flashdata('message');
                    if (isset($errors_upload)) {
                        echo '<div class="alert alert-warning">' . $error_upload . '</div>';
                    }
                    ?>
                </div>
                <?php
                echo form_open_multipart('admin/galery/create_video');
                ?>

                <div class="form-group row mb-3">
                    <label class="col-lg-3 col-form-label">Judul <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="galery_title" placeholder="Judul" value="<?php echo set_value('galery_title'); ?>">
                        <?php echo form_error('galery_title', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-lg-3 col-form-label">Tipe <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9">
                        <select name="galery_type" class="form-control form-control-chosen">
                            <option value="Halaman">Halaman</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-lg-3 col-form-label">Embed Youtube <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9">
                        <textarea class="form-control" name="galery_embed" placeholder="Youtube Embed" value="<?php echo set_value('galery_embed'); ?>"></textarea>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-lg-3 col-form-label">Deskripsi <span class="text-success">Optional</span>
                    </label>
                    <div class="col-lg-9">

                        <textarea class="form-control" id="summernote" name="galery_desc" placeholder="Deskripsi Galery"></textarea>
                        <?php echo form_error('galery_desc', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Publish
                        </button>
                    </div>
                </div>

                <?php echo form_close() ?>

            </div>
        </div>
    </div>

</div>