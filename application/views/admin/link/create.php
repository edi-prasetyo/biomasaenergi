<div class="col-md-7 mx-auto">
    <div class="card">
        <div class="card-header">
            <?php echo $title; ?>
        </div>
        <div class="card-body">

            <div class="text-center">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
            <?php
            echo form_open('admin/link/create', array('class' => 'needs-validation', 'novalidate' => 'novalidate'));
            ?>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Link <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="link_name" placeholder="Nama Link" required>
                    <div class="invalid-feedback">Silahkan masukan nama Link.</div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Url <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="link_url" placeholder="Url.." required>
                    <div class="invalid-feedback">Silahkan masukan Url</div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Create Link
                    </button>
                </div>
            </div>

            <?php echo form_close() ?>
        </div>
    </div>
</div>