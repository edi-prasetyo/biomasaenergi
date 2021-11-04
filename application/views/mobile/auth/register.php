<nav class="site-header bg-white sticky-top py-1 shadow-sm">
    <div class="container py-2 d-flex justify-content-between align-items-center">
        <a style="text-decoration:none;" class="text-dark text-left" href="javascript:history.back()"><i style="font-size: 25px;" class="ri-arrow-left-line"></i></a>
        <span class="text-dark text-center font-weight-bold">
            <?php echo $title; ?>
        </span>
        <div style="color:transparent;"></div>
    </div>
</nav>

<div class="container pb-5">
    <div class="my-3 border-0">
        <div class="card-body">

            <?php
            echo form_open_multipart('auth/register',  array('class' => 'needs-validation', 'novalidate' => 'novalidate'))
            ?>
            <div class="form-group">
                <select class="form-control custom-select" name="user_title" value="" required>
                    <option value=''>--Pilih Title --</option>
                    <option value='Bapak'>Bapak</option>
                    <option value='Ibu'>Ibu</option>
                    <option value='Saudara'>Saudara</option>
                    <option value='Saudari'>Saudari</option>

                </select>
                <div class="invalid-feedback">Silahkan Pilih Title</div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="user_name" placeholder="Nama Lengkap" value="<?php echo set_value('user_name'); ?>" required>
                <div class="invalid-feedback">Silahkan Masukan Nama Lengkap</div>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email Address" value="<?php echo set_value('email'); ?>" style="text-transform: lowercase" required>
                <div class="invalid-feedback">Silahkan Masukan Email</div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control" name="password1" placeholder="Password" required>
                    <div class="invalid-feedback">Buat Password</div>
                </div>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password2" placeholder="Repeat Password" required>
                    <div class="invalid-feedback">Ulangi Password</div>
                </div>
            </div>
            <div style="z-index: 9999;" class="carbook-menu-fotter fixed-bottom bg-white px-3 py-2 text-center shadow">
                <button type="submit" name="submit" class="btn-order-block"> <i class="ri-user-line"></i> Daftar Sekarang</button>
            </div>

            <?php echo form_close() ?>
            <hr>
            <div class="text-center">
                <a class="text-muted" href="<?php echo base_url('auth/forgotpassword'); ?>">Lupa Password?</a>
            </div>
            <div class="text-center">
                Sudah Punya Akun? <a class="text-muted" href="<?php echo base_url('auth') ?>"> Silahkan Login!</a>
            </div>
        </div>
    </div>
</div>