<div class="col-md-7 mx-auto">
    <div class="card mb-4">
        <div class="card-header">
            <?php echo $title; ?>
        </div>
        <div class="card-body">


            <div class="text-center">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
            <?php
            echo form_open('admin/menu/create', array('class' => 'needs-validation', 'novalidate' => 'novalidate'));
            ?>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Menu <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="nama_menu_ind" placeholder="Nama Menu.." required>
                    <div class="invalid-feedback">Silahkan masukan nama Menu</div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Url <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="url" placeholder="Url.." required>
                    <div class="invalid-feedback">Silahkan masukan Url Link.</div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Urutan <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="number" class="form-control" name="urutan" placeholder="Urutan.." required>
                    <div class="invalid-feedback">Silahkan masukan Urutan Menu</div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Create Menu
                    </button>
                </div>
            </div>

            <?php echo form_close() ?>



        </div>
    </div>
</div>