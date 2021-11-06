<div class="container d-grid gap-2 d-sm-flex justify-content-sm-center my-auto">
    <div class="col-md-4">
        <div class="card m-3">
            <div class="card-body p-5">
                <div class="p-5">
                    <div class="text-muted">
                        <h1 class="h4 text-muted mb-4"><i class="feather-lock"></i> Lupa Password?</h1>
                        <?php echo $this->session->flashdata('message');
                        unset($_SESSION['message']); ?>
                    </div>
                    <?php
                    echo form_open_multipart('auth/forgotpassword',  array('class' => 'needs-validation', 'novalidate' => 'novalidate'))
                    ?>
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1"><i class="feather-mail"></i></span>
                        <input type="text" class="form-control form-control-user" name="email" id="email" placeholder="Masukan Email Terdaftar..." value="<?php echo set_value('email'); ?>" style="text-transform: lowercase" required>
                        <div class="invalid-feedback">Silahkan masukan Email</div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            Kirim
                        </button>
                    </div>
                    <?php echo form_close() ?>

                </div>
            </div>
        </div>

    </div>