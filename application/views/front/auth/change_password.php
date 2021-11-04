<div class="container d-grid gap-2 d-sm-flex justify-content-sm-center my-auto">
    <div class="col-md-4">
        <div class="card m-3">
            <div class="card-body p-5">


                <div class="p-5">
                    <div class="text-muted">
                        <h1 class="h4"><i class="feather-lock"></i> Buat password baru?</h1>
                        <h5 class="mb-4"><?php echo $this->session->userdata('reset_email'); ?></h5>
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                    <?php

                    echo form_open_multipart('auth/changepassword',  array('class' => 'needs-validation', 'novalidate' => 'novalidate'))
                    ?>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control form-control-user" name="password1" id="password1" placeholder="Masukan Password..." required>
                        <div class="invalid-feedback">Silahkan Buat password Baru</div>
                    </div>

                    <div class="form-group mb-3">
                        <input type="password" class="form-control form-control-user" name="password2" id="password2" placeholder="Ulangi Password..." required>
                        <div class="invalid-feedback">Silahkan Ulangi password Baru</div>
                    </div>


                    <button type="submit" class="btn btn-primary btn-block">
                        Ganti Password
                    </button>

                    <?php echo form_close() ?>


                </div>

            </div>
        </div>
    </div>

</div>