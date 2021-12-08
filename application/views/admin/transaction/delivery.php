<?php
$meta = $this->meta_model->get_meta();
?>

<style>
    @media print {
        body * {
            visibility: hidden;
        }

        #section-to-print,
        #section-to-print * {
            visibility: visible;
        }

        #section-to-print {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            margin-top: 0;
            size: 210mm 297mm;
        }

        .hidden-print {
            visibility: hidden;
        }

    }

    @page {
        size: auto;
        margin: 0mm;
        size: 210mm 297mm;
    }

    .mytable {
        width: 100%;
    }

    .mytable tbody tr td {
        font-size: 5px;
    }

    .product_table {
        width: 100%;
        margin: 15px 0 15px 0;
    }

    .product_table tbody tr td {
        font-size: 15px;
        padding: 5px;
    }
</style>
<div class="col-md-12 mx-auto">
    <div class="card">
        <div class="card-header bg-white">
            <a href="javascript:;" onclick="window.print()" class="btn btn-outline-secondary"><i class="feather-printer"></i> Print</a>
        </div>
        <div id="section-to-print">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <img width="80%" src="<?php echo base_url('assets/img/logo/' . $meta->logo); ?>" class="img-fluid"><br>

                        <p><?php echo $meta->alamat; ?></p>
                    </div>
                    <div class="col-6 text-end">
                        <h1 class="mt-3 fw-bold">DELIVERY ORDER</h1>
                        Nomor: <?php echo $transaction->delivery_number; ?><br>
                        Tanggal Kirim: <?php echo date('d/m/Y', strtotime($transaction->created_at)); ?><br>
                        <?php if ($transaction->payment == 'transfer') : ?>
                            Status Bayar : <?php echo $transaction->payment_status; ?>
                        <?php else : ?>

                        <?php endif; ?>
                    </div>

                    <hr class="mt-3">

                    <div class="col-6">
                        <small>Delivery to</small>
                        <address class="m-t-5 m-b-5">
                            <strong class="text-inverse"><?php echo $transaction->company; ?></strong><br>
                            <?php echo $transaction->address; ?><br>
                            <?php echo $transaction->city_name; ?>, <?php echo $transaction->province_name; ?>, <?php echo $transaction->postal_code; ?><br>
                        </address>
                    </div>
                    <div class="col-6 text-end">
                        <small>Contact</small>
                        <address class="m-t-5 m-b-5">
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
                        <table class="product_table table-bordered border-dark">
                            <thead>
                                <tr>
                                    <th width="20%" style="font-size: 15px;" scope="col">Nama Barang</th>
                                    <th width="38%" style="font-size: 15px;" scope="col">Spesifikasi</th>
                                    <th width="20%" style="font-size: 15px;" scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td><?php echo $transaction->product_name; ?></td>
                                    <td><?php echo $transaction->product_spesification; ?></td>
                                    <td>
                                        <?php if ($transaction->product_id == 1) : ?>
                                            <?php echo number_format($transaction->qty, 0, ",", "."); ?> Kg
                                        <?php else : ?>
                                            <?php echo number_format($transaction->qty, 0, ",", "."); ?> Unit
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-end fw-bold"> Total</td>
                                    <td>
                                        <?php if ($transaction->product_id == 1) : ?>
                                            <?php echo number_format($transaction->qty, 0, ",", "."); ?> Kg
                                        <?php else : ?>
                                            <?php echo number_format($transaction->qty, 0, ",", "."); ?> Unit
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <span style="font-size: 13px;font-weight:bold;">Catatan :</span>
                        <ul style="font-size: 10px;">
                            <li>Periksa Kembali barang barang sesuai pesanan anda ketika sampai di lokasi</li>
                            <li>Surat jalan ini sah bila ada stempel dari <?php echo $meta->title; ?></li>
                        </ul>
                    </div>
                    <div class="col-8">
                        <div class="">
                            <table class="mytable table-bordered border-dark text-center">
                                <thead>
                                    <tr>
                                        <th width="20%" style="font-size: 10px;">No. Kendaraan</th>
                                        <th width="20%" style="font-size: 10px;">Driver/Kurir</th>
                                        <th width="20%" style="font-size: 10px;">Staf Pengirim</th>
                                        <th width="20%" style="font-size: 10px;">Tanggal Diterima</th>
                                        <th width="20%" style="font-size: 10px;">Penerima</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td height="80px"></td>
                                        <td height="80px"></td>
                                        <td height="80px"> </td>
                                        <td height="80px"></td>
                                        <td height="80px"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>






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