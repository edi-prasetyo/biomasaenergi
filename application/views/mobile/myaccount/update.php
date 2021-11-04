<?php if ($this->session->userdata('id')) : ?>

    <nav class="site-header bg-white sticky-top py-1 shadow-sm">
        <div class="container py-2 d-flex justify-content-between align-items-center">
            <a style="text-decoration:none;" class="text-dark text-left" href="javascript:history.back()"><i style="font-size: 25px;" class="ri-arrow-left-line"></i></a>
            <span class="text-dark text-center font-weight-bold">
                <?php echo $title; ?>
            </span>
            <div style="color:transparent;"></div>
        </div>
    </nav>

    <div class="container mb-5 my-3">
        <div class="row">
            <div class="card shadow-sm border-0">
                <?php
                echo form_open_multipart('myaccount/update');
                ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            Foto
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <input type="file" class="form-control border-0" name="user_image">

                            </div>

                        </div>

                        <div class="col-3">
                            Nama
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <input type="text" class="form-control" name="user_name" placeholder="Nama" value="<?php echo $user->user_name; ?>">
                                <?php echo form_error('user_name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                        </div>
                        <div class="col-3">
                            Email
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" value="<?php echo $user->email; ?>" readonly>
                            </div>

                        </div>
                        <div class="col-3">
                            Phone
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <input type="text" class="form-control" name="user_phone" placeholder="No. Handphone" value="<?php echo $user->user_phone; ?>">
                                <?php echo form_error('user_phone', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                        </div>
                        <div class="col-3">
                            Alamat
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <textarea class="form-control" name="user_address" placeholder="Alamat"><?php echo $user->user_address; ?></textarea>
                                <?php echo form_error('user_phone', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>


<?php else : ?>

    <?php redirect('auth'); ?>

<?php endif; ?>