<?php
$meta = $this->meta_model->get_meta();
?>

<style>
    #table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #table td,
    #table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #table tr:hover {
        background-color: #ddd;
    }

    #table th {
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }

    .text-end {
        text-align: right;
    }

    .row {
        display: flex;

    }
</style>

<div class="col-md-8 mx-auto">
    <div class="card">
        <div id="section-to-print">
            <div id="source-html">
                <div class="card-body">
                    <div class="row">

                        <div class="col-6 text-end">
                            <h1 class="mt-3 fw-bold">INVOICE</h1>
                            No. Invoice: <?php echo $transaction->invoice_number; ?><br>
                            Tanggal Invoice: <?php echo date('d/m/Y', strtotime($transaction->created_at)); ?><br>
                            <?php if ($transaction->payment == 'transfer') : ?>
                                Status Bayar : <?php echo $transaction->payment_status; ?>
                            <?php else : ?>
                                Tanggal Jatuh Tempo: <?php echo date('d/m/Y', strtotime($transaction->due_date)); ?><br>
                                Status Bayar : <?php echo $transaction->payment_status; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-6" style="width:48%">
                            <small>Informasi Perusahaan</small>
                            <address class="m-t-5 m-b-5">
                                <strong class="text-inverse"><?php echo $meta->title; ?></strong><br>
                                <?php echo $meta->alamat; ?><br>
                                City, Zip Code<br>
                                Phone: <?php echo $meta->telepon; ?><br>
                                Whatsapp: <?php echo $meta->whatsapp; ?>
                            </address>
                        </div>
                        <div class="col-6 text-end" style="width:48%">
                            <small>Tagihan kepada</small>
                            <address class="m-t-5 m-b-5">
                                <strong class="text-inverse"><?php echo $transaction->company; ?></strong><br>
                                <?php echo $transaction->address; ?><br>
                                <?php echo $transaction->city_name; ?>, <?php echo $transaction->province_name; ?>, <?php echo $transaction->postal_code; ?><br>
                                Phone: <?php echo $transaction->phone; ?><br>
                                Whatsapp: <?php echo $transaction->whatsapp; ?>
                            </address>
                        </div>
                    </div>


                    <!-- end invoice-header -->
                    <!-- begin invoice-content -->
                    <div class="invoice-content">
                        <!-- begin table-responsive -->
                        <div class="table-responsive">
                            <table class="product_table table-bordered border-dark" id="table">
                                <thead>
                                    <tr>
                                        <th scope="col" width="5%">No</th>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Spesifikasi</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td><?php echo $transaction->product_name; ?></td>
                                        <td><?php echo $transaction->product_spesification; ?></td>
                                        <td><?php echo number_format($transaction->qty, 0, ",", "."); ?> KG</td>
                                        <td>Rp. <?php echo number_format($transaction->price_sell, 0, ",", "."); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-end fw-bold">Grand Total</td>
                                        <td>Rp. <?php echo number_format($transaction->price_sell, 0, ",", "."); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <!-- begin invoice-note -->
                    <!-- <div class="invoice-note">
                    * Make all cheques payable to [Your Company Name]<br>
                    * Payment is due within 30 days<br>
                    * If you have any questions concerning this invoice, contact [Name, Phone Number, Email]
                </div> -->
                    <!-- end invoice-note -->
                    <!-- begin invoice-footer -->
                    <div class="invoice-footer">
                        <p class="text-end mb-5 f-w-600">
                            Hormat Kami
                        </p>

                        <p class="text-end pt-5 f-w-600">
                            <?php echo $transaction->user_name; ?><br>
                            (Finance)
                        </p>

                    </div>
                    <!-- end invoice-footer -->
                </div>
                <div class="card-footer bg-white">
                    <p class="text-center">
                        <span class="m-r-10"><i class="feather-link-2"></i> <?php echo $meta->link; ?></span>
                        <span class="ms-5"><i class="feather-phone"></i> <?php echo $meta->telepon; ?></span>
                        <span class="ms-5"><i class="feather-mail"></i> <?php echo $meta->email; ?></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>