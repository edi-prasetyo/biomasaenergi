<nav class="site-header bg-transparent sticky-top py-1" style="position: absolute;">
    <div class="container py-2 d-flex justify-content-between align-items-center">
        <a style="text-decoration:none;" class="text-white text-left" href="javascript:history.back()"><i style="font-size: 25px;" class="ri-arrow-left-line"></i></a>
        <span class="text-dark text-center font-weight-bold">

        </span>
        <div style="color:transparent;"></div>
    </div>
</nav>


<section class="boot-elemant-bg py-md-5 py-4 hero" style="height: 160px;background-color:rgba(0, 80, 184)">
    <div class="container position-relative py-md-5 py-0">
        <div class="row">
            <div class="container" style="position: absolute;">
                <div class="row">
                    <div class="col-md-7">
                        <div class="text-center text-white mt-3" style="font-size:x-large;">
                            <p><i class="ri-file-paper-2-line"></i> <span class="font-weight-bold"> <?php echo $transaksi->kode_transaksi; ?></span></p>
                        </div>
                    </div>
                    <div class="col-md-5">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="elemant-bg-overlay black"></div>
    <svg class="hero-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
        <path d="M0 10 0 0 A 90 59, 0, 0, 0, 100 0 L 100 10 Z"></path>
    </svg>
</section>


<div class="container mb-5 pb-3">
    <div class="card productcat mb-3 border-0 shadow-sm">
        <div class="row">
            <div class="col-5">
                <div class="card border-0 bg-white m-2">
                    <div class="p-2">
                        <span style="font-size: 12px;"> <?php echo $transaksi->user_title; ?></span>
                        <span style="font-size: 16px;font-weight:700;"> <?php echo $transaksi->user_name; ?></span>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="card border-0 bg-light m-2">
                    <div class="p-2">
                        <span style="font-size: 17px;font-weight:700;">IDR. <?php echo number_format($transaksi->total_harga, 0, ",", "."); ?></span>
                        <div style="font-size:12px">
                            <?php if ($transaksi->status_bayar == "Pending") : ?>
                                <span class="text-warning"> <i class="ri-checkbox-blank-circle-fill"></i> <?php echo $transaksi->status_bayar; ?> </span>
                            <?php elseif ($transaksi->status_bayar == "Process") : ?>
                                <span class="text-info"><i class="ri-checkbox-blank-circle-fill"></i> <?php echo $transaksi->status_bayar; ?> </span>
                            <?php elseif ($transaksi->status_bayar == "Cancel") : ?>
                                <span class="text-danger"><i class="ri-checkbox-blank-circle-fill"></i> <?php echo $transaksi->status_bayar; ?> </span>
                            <?php else : ?>
                                <span class="text-success"><i class="ri-checkbox-blank-circle-fill"></i> <?php echo $transaksi->status_bayar; ?> </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0" style="z-index: 9999999;">
        <div class="card-body">
            <div class="row">
                <div class="col-6"><?php echo $transaksi->nama_mobil; ?></div>
                <div class="col-6 text-right font-weight-bold">IDR. <?php echo number_format($transaksi->harga_satuan, 0, ",", "."); ?></div>
                <div class="col-6">Kode Unik</div>
                <div class="col-6 text-right font-weight-bold"><?php echo $transaksi->kode_unik; ?></div>
                <div class="col-6">Lama Sewa</div>
                <div class="col-6 text-right font-weight-bold border-bottom"><?php echo $transaksi->lama_sewa; ?></div>

                <hr>
                <div class="col-6"></div>
                <div class="col-6 text-right">
                    <span style="font-size: 12px;">Total Amount</span><br>
                    <span class="font-weight-bold">IDR. <?php echo number_format($transaksi->total_harga, 0, ",", "."); ?></span>
                </div>

            </div>

            <div class="row border-top mt-3">
                <div class="col-6">
                    Alamat :
                </div>
                <div class="col-6 text-right">
                    <?php echo $transaksi->alamat_jemput; ?>
                </div>
                <div class="col-6">
                    Phone : </div>
                <div class="col-6 text-right">
                    <?php echo $transaksi->user_phone; ?>
                </div>
                <div class="col-6">
                    Email :
                </div>
                <div class="col-6 text-right">
                    <?php echo $transaksi->user_email; ?>
                </div>
            </div><!-- /.col -->

            <div class="row border-top mt-3">
                <div class="col-6">
                    Kode :
                </div>
                <div class="col-6 text-right">
                    <?php echo $transaksi->kode_transaksi; ?>
                </div>
                <div class="col-6">
                    Payment : </div>
                <div class="col-6 text-right">
                    <?php echo $transaksi->tipe_pembayaran; ?>
                </div>
                <div class="col-6">
                    Status :
                </div>
                <div class="col-6 text-right">
                    <?php echo $transaksi->status_bayar; ?>
                </div>
                <div class="col-6">
                    Paket :
                </div>
                <div class="col-6 text-right">
                    <?php echo $transaksi->nama_paket; ?>
                </div>
            </div><!-- /.col -->


        </div><!-- /.row -->


        <div class="row">

            <?php if ($transaksi->tipe_pembayaran == "Cash") : ?>
                <div style="z-index: 9999;" class="carbook-menu-fotter fixed-bottom bg-white px-3 py-2 text-center shadow">
                    <a href="javascript:history.back()" class="btn-order-block text-decoration-none"><i class="ri-arrow-left-line"></i> Kembali</a>
                </div>
            <?php else : ?>
                <div class="col-md-6">

                    <?php foreach ($bank as $bank) : ?>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo $bank->bank_name; ?>
                                : <span><?php echo $bank->bank_number; ?></span>
                                <span><?php echo $bank->bank_account; ?></span>
                            </li>
                        </ul>
                    <?php endforeach; ?>

                </div>
                <div class="col-md-6">

                    <div style="z-index: 9999;" class="carbook-menu-fotter fixed-bottom bg-white px-3 py-2 text-center shadow">
                        <a href="<?php echo base_url('transaksi/konfirmasi/' . $transaksi->id); ?>" class="btn-order-block"><i class="fa fa-credit-card"></i> Konfirmasi Pembayaran</a>
                    </div>

                </div>
            <?php endif; ?>
        </div><!-- /.row -->


    </div>
</div>