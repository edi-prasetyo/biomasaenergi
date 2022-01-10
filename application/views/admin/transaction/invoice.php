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
            /* size: 210mm 297mm; */
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

    .product_table {
        width: 100%;
        margin: 15px 0 15px 0;
    }

    .product_table tbody tr td {
        font-size: 15px;
        padding: 5px;
    }
</style>
<div class="col-md-9 mx-auto">
    <div class="card">
        <div class="card-header bg-white">
            <a href="javascript:;" onclick="window.print()" class="btn btn-outline-secondary"><i class="feather-printer"></i> Print</a>
            <!-- <a href="<?php echo base_url('admin/transaction/pdf/' . $transaction->id); ?>" class="btn btn-success">Save Pdf</a> -->
        </div>
        <div id="section-to-print">
            <div id="source-html">
                <div class="card-body mb-5" style="height: 1000px;">
                    <div class="row">
                        <div class="col-6">
                            <img width="90%" src="<?php echo base_url('assets/img/logo/' . $meta->logo); ?>" class="img-fluid">

                        </div>


                        <hr class="mt-3">


                        <div class="col-6 text-start">
                            <small>Tagihan kepada</small>
                            <address class="m-t-5 m-b-5">
                                <strong class="text-inverse"><?php echo $transaction->company; ?></strong><br>
                                <?php echo $transaction->address; ?><br>
                                <?php echo $transaction->city_name; ?>, <?php echo $transaction->province_name; ?>, <?php echo $transaction->postal_code; ?><br>
                                <?php if ($transaction->po_number == null) : ?>
                                <?php else : ?>
                                    PO Number : <?php echo $transaction->po_number; ?><br>
                                <?php endif; ?>
                                <?php if ($transaction->phone == null) : ?>
                                <?php else : ?>
                                    Phone: <?php echo $transaction->phone; ?><br>
                                <?php endif; ?>
                                <?php if ($transaction->whatsapp == null) : ?>
                                <?php else : ?>
                                    Whatsapp: <?php echo $transaction->whatsapp; ?>
                                <?php endif; ?>
                            </address>
                        </div>

                        <div class="col-6 text-end">
                            <h1 class="mt-3 fw-bold">INVOICE</h1>
                            No. Invoice: <?php echo $transaction->invoice_number; ?><br>
                            Tanggal Invoice: <?php echo date('d/m/Y', strtotime($transaction->created_at)); ?><br>
                            <?php if ($transaction->payment == 'transfer') : ?>
                                Status Bayar : <?php echo $transaction->payment_status; ?>
                            <?php else : ?>
                                Tanggal Jatuh Tempo: <span class="text-danger fw-bold"><?php echo date('d/m/Y', strtotime($transaction->due_date)); ?></span><br>
                                Status Bayar : <?php echo $transaction->payment_status; ?>
                            <?php endif; ?>
                        </div>

                    </div>
                    <!-- end invoice-header -->
                    <!-- begin invoice-content -->
                    <div class="invoice-content">
                        <!-- begin table-responsive -->
                        <div class="table-responsive">
                            <table class="product_table table-bordered border-dark" border="1">
                                <thead>
                                    <tr>

                                        <th scope="col">Produk</th>
                                        <th width="40%" scope="col">Spesifikasi</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td><?php echo $transaction->product_name; ?></td>
                                        <td><?php echo $transaction->product_spesification; ?></td>
                                        <td>
                                            <?php if ($transaction->product_id == 2) : ?>
                                                <?php echo number_format($transaction->qty, 0, ",", "."); ?> Unit
                                            <?php else : ?>
                                                <?php echo number_format($transaction->qty, 0, ",", "."); ?> KG
                                            <?php endif; ?>

                                        </td>
                                        <td>
                                            <?php if ($transaction->product_id == 2) : ?>
                                                Rp. <?php echo number_format($transaction->price_sell, 0, ",", "."); ?> /Unit
                                            <?php else : ?>
                                                Rp. <?php echo number_format($transaction->price_sell, 0, ",", "."); ?> /kg
                                            <?php endif; ?>
                                        </td>
                                        <td>Rp. <?php echo number_format($transaction->total_price_sell, 0, ",", "."); ?></td>
                                    </tr>
                                    <?php if ($transaction->value_1 == 0) : ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="2"><?php echo $transaction->field_1; ?></td>
                                            <td></td>
                                            <td></td>
                                            <td>Rp. <?php echo number_format($transaction->value_1, 0, ",", "."); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if ($transaction->value_2 == 0) : ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="2"><?php echo $transaction->field_2; ?></td>
                                            <td></td>
                                            <td></td>
                                            <td>Rp. <?php echo number_format($transaction->value_2, 0, ",", "."); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if ($transaction->value_3 == 0) : ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="2"><?php echo $transaction->field_3; ?></td>
                                            <td></td>
                                            <td></td>
                                            <td>Rp. <?php echo number_format($transaction->value_3, 0, ",", "."); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <tr>
                                        <td colspan="4" class="text-end fw-bold">Grand Total</td>
                                        <td colspan="2" class="fw-bold">Rp. <?php echo number_format($transaction->grand_total, 0, ",", "."); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-start my-5 mt-5 pt-5" style="position:absolute;bottom:180px;width:90%">
                        <div>
                            <?php foreach ($bank as $bank) : ?>
                                Bank : <b><?php echo $bank->bank_name; ?></b><br>
                                Nomor Rek. : <b><?php echo $bank->bank_number; ?></b> <br>
                                Atas Nama : <?php echo $bank->bank_account; ?>
                                <hr>
                            <?php endforeach; ?>
                        </div>
                        <div>
                            <p class="text-end pb-5 mb-5">
                                Hormat Kami
                            </p>
                            <br>
                            <br>


                            <p class="text-end mt-5">
                                <?php echo $transaction->user_name; ?><br>
                                (Finance)
                            </p>
                        </div>

                    </div>

                    <div class="text pt-5" style="z-index:9999;position:absolute;bottom:0;font-size:12px;">
                        <p class="text-center"><?php echo $meta->alamat; ?></p>
                        <p class="text-center">
                            <span class="m-r-10"><i class="feather-link-2"></i> <?php echo $meta->link; ?></span>
                            <span class="ms-5"><i class="feather-phone"></i> <?php echo $meta->telepon; ?></span>
                            <span class="ms-5"><i class="feather-mail"></i> <?php echo $meta->email; ?></span>
                        </p>
                    </div>
                    <img style="position:absolute;bottom:0;left:0;width:100%;background-size: 100% 100%; background-repeat: no-repeat;background-position: center;  background-image: url();" src="<?php echo base_url('assets/img/galery/bg-footer-invoice.png'); ?>">

                    <!-- end invoice-footer -->
                </div>

            </div>
        </div>
    </div>
</div>




<script>
    function exportHTML() {
        var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' " +
            "xmlns:w='urn:schemas-microsoft-com:office:word' " +
            "xmlns='http://www.w3.org/TR/REC-html40'>" +
            "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
        var footer = "</body></html>";
        var sourceHTML = header + document.getElementById("source-html").innerHTML + footer;

        var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
        var fileDownload = document.createElement("a");
        document.body.appendChild(fileDownload);
        fileDownload.href = source;
        fileDownload.download = 'document.doc';
        fileDownload.click();
        document.body.removeChild(fileDownload);
    }
</script>