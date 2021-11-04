<nav class="site-header bg-white sticky-top py-1 shadow-sm">
    <div class="container py-2 d-flex justify-content-between align-items-center">
        <a style="text-decoration:none;" class="text-dark text-left" href="javascript:history.back()"><i style="font-size: 25px;" class="ri-arrow-left-line"></i></a>
        <span class="text-dark text-center font-weight-bold">
            <?php echo $title; ?>
        </span>
        <div style="color:transparent;"></div>
    </div>
</nav>

<div class="container mb-5 pb-2 my-3">
    <div class="card shadow-sm border-0">
        <div class="d-flex align-items-center border-bottom p-3">
            <div class="left mr-3">
                <h6 class="font-weight-bold m-0"><?php echo $listpaket->mobil_name ?></h6>
                <h6 class="font-weight-bold mb-1">IDR. <strong><?php echo number_format($listpaket->paket_price, '0', ',', '.'); ?></strong></h6>
                <p class="small m-0"><?php echo $listpaket->paket_name ?></p>
            </div>
            <div class="right ml-auto">

            </div>
        </div>
    </div>

    <div class="mb-5 my-2">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white">
                Detail Penumpang
            </div>
            <div class="card-body">

                <?php
                echo form_open_multipart('rental-mobil/booking/' . md5($listpaket->id), array('class' => 'needs-validation', 'novalidate' => 'novalidate'));
                $kode_transaksi = date('dmY') . strtoupper(random_string('alnum', 5));
                ?>
                <input type="hidden" name="kode_transaksi" value="<?php echo $kode_transaksi ?>">
                <input type="hidden" name="mobil_id" value="<?php echo $listpaket->mobil_id ?>">
                <input type="hidden" name="nama_mobil" value="<?php echo $listpaket->mobil_name ?>">

                <input type="hidden" name="harga_satuan" value="<?php echo $listpaket->paket_price; ?>">
                <input type="hidden" name="nama_paket" value="<?php echo $listpaket->paket_name; ?>">
                <input type="hidden" name="ketentuan" value="<?php echo $listpaket->ketentuan_desc; ?>">
                <div class="row">

                    <?php if ($this->session->userdata('id')) : ?>

                        <?php $id = $this->session->userdata('id');
                        $user = $this->user_model->user_detail($id);
                        ?>

                        <div class="col-md-3">
                            <label>Title <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="user_title" placeholder="Nama Lengkap" value="<?php echo $user->user_title; ?>" readonly>
                            <?php echo form_error('user_title', '<span class="text-danger">', '</span>'); ?>
                        </div>

                        <div class="col-md-5">
                            <label>Nama Lengkap <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="user_name" placeholder="Nama Lengkap" value="<?php echo $user->user_name; ?>" required>
                            <div class="invalid-feedback">Silahkan masukan nama Lengkap.</div>
                        </div>

                        <input type="hidden" name="email">

                        <div class="col-md-4">
                            <label>Email <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="user_email" placeholder="Email" value="<?php echo $user->email; ?>" required>
                            <div class="invalid-feedback">Silahkan masukan Alamat Email.</div>
                        </div>
                        <div class="col-md-12">
                            <label>Nomor Handphone <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="user_phone" placeholder="Nomor Handphone" value="<?php echo $user->user_phone; ?>" required>
                            <div class="invalid-feedback">Silahkan masukan Nomor Handphone.</div>
                        </div>





                    <?php else : ?>



                        <div class="col-md-3">
                            <label>Title <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="form-control form-control-chosen" name="user_title" value="<?php echo set_value('user_title'); ?>" required>
                                    <option value="">-- Pilih Title --</option>
                                    <option value="Bapak">Bapak</option>
                                    <option value="Ibu">Ibu</option>
                                    <option value="Saudara">Saudara</option>
                                    <option value="Saudari">Saudari</option>
                                </select>
                                <div class="invalid-feedback">Silahkan Pilih title.</div>
                            </div>
                        </div>


                        <div class="col-md-5">
                            <label>Nama Lengkap <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="user_name" placeholder="Nama Lengkap" value="<?php echo set_value('user_name'); ?>" required>
                            <div class="invalid-feedback">Silahkan Masukan Nama Lengkap</div>
                        </div>
                        <div class="col-md-4">
                            <label>Email <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="user_email" placeholder="Email" value="<?php echo set_value('user_email'); ?>" required>
                            <div class="invalid-feedback">Silahkan Masukan Alamat Email</div>
                        </div>
                        <div class="col-md-12">
                            <label>Nomor Handphone <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="user_phone" placeholder="Nomor Handphone" value="<?php echo set_value('user_phone'); ?>" required>
                            <div class="invalid-feedback">Silahkan Masukan Nomor Handphone</div>
                        </div>



                    <?php endif; ?>

                    <div class="col-md-4">
                        <label>Tanggal Jemput <span class="text-danger">*</span></label>
                        <input type="text" name="tanggal_jemput" class="form-control" placeholder="Tanggal" id="id_tanggal" required>
                    </div>
                    <div class="col-md-4">
                        <div class='form-group'>
                            <label>Jam Jemput <span class="text-danger">*</span></label>
                            <select class="form-control form-control-chosen" name="jam_jemput" value="<?php echo set_value('jam_jemput'); ?>" required>
                                <option value="">--Pilih Jam Jemput --</option>
                                <?php foreach ($jamsewa as $data) : ?>
                                    <option value="<?php echo $data->jam; ?>"><?php echo $data->jam; ?> </option>
                                <?php endforeach; ?>

                            </select>
                            <div class="invalid-feedback">Silahkan Jam Penjemputan</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Lama Sewa <span class="text-danger">*</span></label>
                        <div class="form-group">
                            <select class="form-control form-control-chosen" name="lama_sewa" value="<?php echo set_value('lama_sewa'); ?>" required>
                                <option value="">-- Pilih Durasi --</option>
                                <?php foreach ($lamasewa as $data) : ?>
                                    <option value="<?php echo $data->lama_sewa; ?>"><?php echo $data->lama_sewa; ?> Hari</option>
                                <?php endforeach; ?>

                            </select>
                            <div class="invalid-feedback">Silahkan pilih Durasi Sewa</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>Alamat Penjemputan <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="alamat_jemput" value="<?php echo set_value('alamat_jemput'); ?>" required></textarea>
                        <div class="invalid-feedback">Silahkan Masukan Alamat Penjemputan</div>
                    </div>
                    <div class="col-md-12">
                        <label>Permintaan Khusus (Optional)</label>
                        <input class="form-control" type="text" name="permintaan_khusus" placeholder="Permintaan Khusus">
                    </div>


                    <div class="col-md-12 my-3">
                        <div class="form-group">
                            <label for="optionA">Pilih Metode Pembayaran!</label><br>

                            <?php foreach ($pembayaran as $data) : ?>

                                <div class="custom-control custom-radio">
                                    <input class="form-check-input" type="radio" name="tipe_pembayaran" id="emailConsentRadio" value="<?php echo $data->nama_pembayaran; ?>" required>
                                    <label class="form-check-label" for="optionB">
                                        <?php echo $data->nama_pembayaran; ?>
                                    </label>

                                    <div class="invalid-feedback">
                                        Silahkan Pilih Metode Pembayaran
                                    </div>
                                </div>

                            <?php endforeach; ?>

                        </div>

                    </div>
                </div>

                <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg">
                    Syarat dan Ketentuan Sewa
                </a>

                <div style="z-index: 9999;" class="carbook-menu-fotter fixed-bottom bg-white px-3 py-2 text-center shadow">
                    <button type="submit" name="submit" class="btn-order-block"> <i class="ri-shopping-bag-line"></i> Pesan Sekarang</button>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $listpaket->ketentuan_name ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $listpaket->ketentuan_desc ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>