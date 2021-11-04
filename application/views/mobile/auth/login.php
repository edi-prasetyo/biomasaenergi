<nav class="site-header bg-white sticky-top py-1 shadow-sm">
    <div class="container py-2 d-flex justify-content-between align-items-center">
        <a style="text-decoration:none;" class="text-dark text-left" href="javascript:history.back()"><i style="font-size: 25px;" class="ri-arrow-left-line"></i></a>
        <span class="text-dark text-center font-weight-bold">
            <?php echo $title; ?>
        </span>
        <div style="color:transparent;"></div>
    </div>
</nav>



<div class="bg-white py-5 border-0">

    <div class="container">

        <!-- Nested Row within Card Body -->
        <div class="col-md-5">
            <div class="">
                <div class="text-muted">
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <?php
                echo form_open_multipart('auth',  array('class' => 'needs-validation', 'novalidate' => 'novalidate'))
                ?>
                <div class=" form-group">
                    <input type="text" class="form-control form-control-user" name="email" placeholder="Email..." value="<?php echo set_value('email'); ?>" style="text-transform: lowercase" required>
                    <div class="invalid-feedback">Silahkan masukan Email</div>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
                    <div class="invalid-feedback">Silahkan masukan Password</div>
                </div>

                <div style="z-index: 9999;" class="carbook-menu-fotter fixed-bottom bg-white px-3 py-2 text-center shadow">
                    <button type="submit" name="submit" class="btn-order-block"> <i class="ri-login-box-line"></i> Login</button>
                </div>

                <?php echo form_close() ?>
                <hr>
                <div class="text-center">
                    <a class="text-muted" href="<?php echo base_url('auth/forgotpassword'); ?>">Lupa Password?</a>
                </div>
                <div class="text-center">
                    Belum Punya Akun? <a class="text-muted" href="<?php echo base_url('auth/register') ?> ">Daftar Sekarang!</a>
                </div>

            </div>
        </div>
    </div>
</div>