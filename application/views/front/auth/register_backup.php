<?php
$meta = $this->meta_model->get_meta();
?>

<div class="container">
    <div class="col-md-12 mx-auto">
        <div class="card my-5">

            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-md-7 border-right">
                    <div class="card-body">
                        <div style="line-height: 35px;">
                            <h3><b>Daftar Gratis dan Mudah</b></h3>
                            Cukup beberapa langkah anda bisa menikmati layanan sewa mobil dari kami.<br><br>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card-body">
                        <div class="text-muted">
                            <h1 class="h4 text-gray-900 mb-4"><i class="bi-person-check" style="font-size: 2rem;"></i> Buat Akun Gratis!</h1>
                        </div>
                        <?php
                        echo form_open('auth/register',  array('class' => 'needs-validation', 'novalidate' => 'novalidate'))
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
                        <button type="submit" class="btn btn-info btn-block">
                            Daftar Sekarang
                        </button>

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
        </div>
    </div>
</div>

</div>