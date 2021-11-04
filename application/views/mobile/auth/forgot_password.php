<nav class="site-header bg-white sticky-top py-1 shadow-sm">
    <div class="container py-2 d-flex justify-content-between align-items-center">
        <a style="text-decoration:none;" class="text-dark text-left" href="javascript:history.back()"><i style="font-size: 25px;" class="ri-arrow-left-line"></i></a>
        <span class="text-dark text-center font-weight-bold">
            <?php echo $title; ?>
        </span>
        <div style="color:transparent;"></div>
    </div>
</nav>

<div class="bg-white">
    <div class="container pb-5">
        <div class="p-0">
            <div class="p-5">
                <div class="text-muted">
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <?php

                echo form_open_multipart('auth/forgotpassword',  array('class' => 'needs-validation', 'novalidate' => 'novalidate'))
                ?>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="email" id="email" placeholder="Masukan Email Terdaftar..." value="<?php echo set_value('email'); ?>" style="text-transform: lowercase" required>
                    <div class="invalid-feedback">Silahkan masukan Email</div>
                </div>


                <div style="z-index: 9999;" class="carbook-menu-fotter fixed-bottom bg-white px-3 py-2 text-center shadow">
                    <button type="submit" name="submit" class="btn-order-block"> <i class="ri-mail-send-line"></i> Kirim</button>
                </div>

                <?php echo form_close() ?>
                <hr>

                <div class="text-center">
                    <a class="text-muted" href="<?php echo base_url('auth') ?> ">Kembali Ke halaman Login</a>
                </div>
            </div>

        </div>
    </div>
</div>