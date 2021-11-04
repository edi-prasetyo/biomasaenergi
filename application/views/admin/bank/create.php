<div class="col-md-7 mx-auto">
    <div class="card">
        <div class="card-header bg-white">
            <?php echo $title; ?>
        </div>
        <div class="card-body">


            <div class="text-center">
                <?php
                echo $this->session->flashdata('message');
                if (isset($error_upload)) {
                    echo '<div class="alert alert-warning">' . $error_upload . '</div>';
                    unset($_SESSION[$error_upload]);
                }
                ?>
            </div>
            <?php
            echo form_open_multipart('admin/bank/create',  array('class' => 'needs-validation', 'novalidate' => 'novalidate'));
            ?>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Bank <span class="text-danger">*</span>
                </label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="bank_name" placeholder="Nama Bank" value="<?php echo set_value('bank_name'); ?>" required>
                    <div class="invalid-feedback">Silahkan masukan nama Bank</div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nomor Rekening <span class="text-danger">*</span>
                </label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="bank_number" placeholder="Nomor rekening" value="<?php echo set_value('bank_number'); ?>" required>
                    <div class="invalid-feedback">Silahkan masukan Nomor Rekening.</div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Atas Nama <span class="text-danger">*</span>
                </label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="bank_account" placeholder="Atas Nama" value="<?php echo set_value('bank_account'); ?>" required>
                    <div class="invalid-feedback">Silahkan masukan nama Pemilik Rekening.</div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Cabang <span class="text-danger">*</span>
                </label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="bank_branch" placeholder="Cabang" value="<?php echo set_value('bank_branch'); ?>" required>
                    <div class="invalid-feedback">Silahkan masukan nama Cabang.</div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Upload Logo <span class="text-danger">*</span>
                </label>
                <div class="col-lg-9">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="bank_logo" class="custom-file-input" id="inputGroupFile02" aria-describedby="inputGroupFileAddon02" required>
                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                        </div>

                    </div>

                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-3"></div>
                <div class="col-lg-9">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Simpan Bank
                    </button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>