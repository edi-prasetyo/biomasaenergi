<nav class="site-header bg-white sticky-top py-1 shadow-sm">
    <div class="container py-2 d-flex justify-content-between align-items-center">
        <a style="text-decoration:none;" class="text-dark text-left" href="javascript:history.back()"><i style="font-size: 25px;" class="ri-arrow-left-line"></i></a>
        <span class="text-dark text-center font-weight-bold">
            <?php echo $title; ?>
        </span>
        <div style="color:transparent;"></div>
    </div>
</nav>

<div class="container my-3 mb-5 pb-3">
    <?php if ($transaksi->status_bayar == 'Done') : ?>
        <div class="card alert alert-success">
            <div class="card-body text-center">
                Order Anda sudah di konfirmasi<br>
                <a href="<?php echo base_url('transaksi'); ?>" class="btn btn-info btn-block my-3">Kembali</a>
            </div>
        </div>
    <?php elseif ($transaksi->status_bayar == 'Process') : ?>
        <div class="card alert alert-success">
            <div class="card-body text-center">
                Order Anda sudah di konfirmasi<br>
                <a href="<?php echo base_url('transaksi'); ?>" class="btn btn-info btn-block my-3">Kembali</a>
            </div>
        </div>
    <?php else : ?>
        <div class="card shadow-sm border-0">

            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h3><?php echo $transaksi->nama_mobil ?></h3>
                    <span class="badge badge-info badge-pill"><?php echo $transaksi->nama_paket; ?></span>
                </div>

                <?php echo $transaksi->lama_sewa; ?> Hari
                IDR. <?php echo number_format($transaksi->harga_satuan, 0, ',', '.'); ?> + <?php echo $transaksi->kode_unik; ?> ( Kode Unik ) <br>

                Jumlah yang harus di Transfer
                <div class="font-weight-bold"> IDR. <?php echo number_format($transaksi->total_harga, 0, ",",  "."); ?></div>
                Silahkan Transfer Pembayaran ke Rekening

                <div class="list-group mb-5 mt-3 p-2">
                    <?php foreach ($bank as $bank) : ?>
                        <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">
                                    <img src="<?php echo base_url('assets/img/bank/' . $bank->bank_logo); ?>" class="img-fluid" width="30%">
                                </h5>
                            </div>
                            <p class="mb-1" style="font-size: 14px;font-weight:700;"><?php echo $bank->bank_number; ?></p>
                            <small><?php echo $bank->bank_account; ?></small>
                        </div>
                    <?php endforeach; ?>
                </div>




                Upload Bukti Struk Pembayaran : <br>

                <?php echo form_open_multipart('transaksi/konfirmasi/' . $transaksi->id); ?>
                <div class="form-group row mt-3">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="file" class="form-control border-0" name="bukti_bayar">

                        </div>
                    </div>
                </div>
                <input type="hidden" value="Process" name="transaction_status">

                <div style="z-index: 9999;" class="carbook-menu-fotter fixed-bottom bg-white px-3 py-2 text-center shadow">
                    <button type="submit" class="btn-order-block">
                        <i class="ri-wallet-line"></i> Simpan
                    </button>
                </div>

                <?php echo form_close(); ?>


            </div>
        </div>

    <?php endif; ?>
</div>