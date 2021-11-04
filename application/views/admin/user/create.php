<div class="col-md-6 mx-auto">
    <div class="card">
        <div class="card-header d-flex flex-row align-items-center justify-content-between bg-white">
            <h4 class="mb-0"><?php echo $title; ?></h4>
        </div>
        <div class="card-body">
            <?php
            echo form_open('admin/user/create',  array('class' => 'needs-validation', 'novalidate' => 'novalidate'))
            ?>

            <div class="form-group row">
                <label class="col-md-4 col-form-label my-2">Nama Lengkap</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="user_name" placeholder="Nama Lengkap" value="<?php echo set_value('user_name'); ?>" required>
                    <div class="invalid-feedback">Silahkan Masukan Nama Lengkap</div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label my-2">Email</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="email" placeholder="Email Address" value="<?php echo set_value('email'); ?>" style="text-transform: lowercase" required>
                    <div class="invalid-feedback">Silahkan Masukan Email</div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label my-2">Hak Akses <span class="text-danger">*</span>
                </label>
                <div class="col-lg-8">
                    <select name="role_id" class="form-select" required>
                        <option value="">Pilih Status</option>
                        <option value="1">Superadmin</option>
                        <option value="2">Admin</option>
                    </select>
                    <div class="invalid-feedback">Silahkan pilih status berita</div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label my-2">Password</label>
                <div class="col-md-8">
                    <input type="password" class="form-control" name="password1" placeholder="Password" required>
                    <div class="invalid-feedback">Buat Password</div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label my-2">Ulangi Password</label>
                <div class="col-md-8">
                    <input type="password" class="form-control" name="password2" placeholder="Repeat Password" required>
                    <div class="invalid-feedback">Ulangi Password</div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label my-2"></label>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>