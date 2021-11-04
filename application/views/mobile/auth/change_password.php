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
    <div class="container">

        <div class="my-5">
            <div class="p-0">
                <!-- Nested Row within Card Body -->

                <div class="p-5">
                    <div class="text-muted">
                        <h5 class="mb-4"><?php echo $this->session->userdata('reset_email'); ?></h5>
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                    <?php

                    echo form_open_multipart('auth/changepassword',  array('class' => 'needs-validation', 'novalidate' => 'novalidate'))
                    ?>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password1" id="password1" placeholder="Enter new Password..." required>
                        <div class="invalid-feedback">Silahkan Buat passwprd Baru</div>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" name="password2" id="password2" placeholder="Repeat new Password..." required>
                        <div class="invalid-feedback">Silahkan Ulangi passwprd Baru</div>
                    </div>


                    <div style="z-index: 9999;" class="carbook-menu-fotter fixed-bottom bg-white px-3 py-2 text-center shadow">
                        <button type="submit" name="submit" class="btn-order-block"> <i class="ri-lock-2-line"></i> Ubah password</button>
                    </div>

                    <?php echo form_close() ?>


                </div>

            </div>
        </div>
    </div>

</div>