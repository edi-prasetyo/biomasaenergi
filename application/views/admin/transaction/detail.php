<div class="row mt-6">
    <div class="offset-xl-2 col-xl-8 offset-lg-1 col-lg-10 col-md-12
              col-12">
        <div class="row">
            <div class="col-12 mb-6">
                <!-- card  -->
                <div class="card">
                    <!-- card header  -->
                    <div class="card-header p-4 bg-white">
                        <h4 class="mb-0">Info Barang</h4>
                    </div>
                    <!-- card body  -->
                    <div class="card-body">
                        <?php
                        if ($this->session->flashdata('message')) {
                            echo $this->session->flashdata('message');
                            unset($_SESSION['message']);
                        }
                        ?>
                        <!-- row  -->
                        <div class="row">
                            <div class="col-xl-7 col-lg-6 col-md-12 col-12">
                                <div class="mb-2">
                                    <!-- content  -->
                                    <p class="text-muted mb-0"><?php echo $transaction->invoice_number; ?></p>
                                    <h3 class="mt-2 mb-3 fw-bold"><?php echo $transaction->product_name; ?></h3>
                                    <?php echo $transaction->product_spesification; ?>
                                </div>
                            </div>
                            <!-- col  -->
                            <div class="col-xl-5 col-lg-6 col-md-12 col-12">
                                <!-- content  -->
                                <div>
                                    <?php if ($transaction->payment_status == 'Unpaid') : ?>
                                        <small class="text-danger">
                                            <?php echo $transaction->payment_status; ?>
                                        </small>
                                    <?php else : ?>
                                        <small class="text-success">
                                            <?php echo $transaction->payment_status; ?>
                                        </small>
                                    <?php endif; ?>
                                    <h2 class="fw-bold text-primary">Rp. <?php echo number_format($transaction->price_sell, 0, ",", "."); ?></h2>
                                    <?php if ($transaction->payment == "transfer") : ?>
                                    <?php else : ?>
                                        <p class="mb-3 text-muted text-primary-hover d-block">Jatuh Tempo <?php echo date("d/m/Y", strtotime($transaction->due_date)); ?></p>
                                    <?php endif; ?>
                                    <div class="d-grid gap-2">
                                        <a href="<?php echo base_url('admin/transaction/invoice/' . $transaction->id); ?>" class="btn btn-primary btn-block text-white mb-2">
                                            <i class="feather-printer"></i> Print Invoice
                                        </a>
                                        <a href="<?php echo base_url('admin/transaction/delivery/' . $transaction->id); ?>" class="btn btn-outline-white">
                                            <i class="feather-truck"></i> Print Surat Jalan
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card footer  -->
                    <div class="card-footer bg-white">
                        <div class="d-md-flex justify-content-between
                        align-items-center">
                            <!-- text  -->
                            <div class="mb-3 mb-lg-0 text-center text-sm-start">
                                <h5 class="text-uppercase mb-0">Pembayaran</h5>
                                <div class="mt-2">
                                    <?php if ($transaction->payment == 'transfer') : ?>
                                        <span class="text-muted"><?php echo $transaction->payment; ?></span>
                                    <?php else : ?>
                                        <span class="text-muted"><?php echo $transaction->payment; ?> Hari</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="text-center text-md-start">
                                <?php if ($transaction->payment_status == "Unpaid") : ?>
                                    <a href="<?php echo base_url('admin/transaction/paid/' . md5($transaction->id)); ?>" class="btn btn-success text-white">Sudah Dibayar</a>
                                <?php else : ?>
                                <?php endif; ?>

                                <a href="<?php echo base_url('admin/transaction/update/' . $transaction->id); ?>" class="btn btn-outline-white ms-2">Ubah Data</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-6">
                <!-- card  -->
                <div class="card">
                    <!-- card header  -->
                    <div class="card-header p-4 bg-white">
                        <h4 class="mb-0">Alamat Pengiriman</h4>
                    </div>
                    <!-- card body  -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-12 col-12 mb-4 mb-lg-0">
                                <div class="mb-3 mb-lg-0">



                                    <span class="d-block text-dark fw-medium fs-4">
                                        <?php echo $transaction->company; ?>
                                    </span>
                                    <span class="d-block mb-4">
                                        <?php echo $transaction->address; ?>, <?php echo $transaction->city_name; ?>, <?php echo $transaction->province_name; ?>, <?php echo $transaction->postal_code; ?>
                                    </span>


                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-12 d-flex
                          justify-content-lg-end">
                                <!-- text  -->
                                <div class="mb-2">
                                    <p class="mb-1">E-mail: <a href="#"><?php echo $transaction->email; ?></a></p>
                                    <p class="mb-1">Phone: <?php echo $transaction->phone; ?></p>
                                    <p>Whatsapp : <?php echo $transaction->whatsapp; ?></p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>