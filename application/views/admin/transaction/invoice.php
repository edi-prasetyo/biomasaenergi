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
<div class="col-md-8 mx-auto">
    <div class="card">
        <div class="card-header bg-white">
            <a href="javascript:;" onclick="window.print()" class="btn btn-outline-secondary"><i class="feather-printer"></i> Print</a>
            <!-- <a href="<?php echo base_url('admin/transaction/pdf/' . $transaction->id); ?>" class="btn btn-success">Save Pdf</a> -->
        </div>
        <div id="section-to-print">
            <div id="source-html">
                <div class="card-body">
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
                                Phone: <?php echo $transaction->phone; ?><br>
                                Whatsapp: <?php echo $transaction->whatsapp; ?>
                            </address>
                        </div>

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
                    <!-- end invoice-header -->
                    <!-- begin invoice-content -->
                    <div class="invoice-content">
                        <!-- begin table-responsive -->
                        <div class="table-responsive">
                            <table class="product_table table-bordered border-dark" border="1">
                                <thead>
                                    <tr>

                                        <th scope="col">Produk</th>
                                        <th scope="col">Spesifikasi</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td><?php echo $transaction->product_name; ?></td>
                                        <td><?php echo $transaction->product_spesification; ?></td>
                                        <td><?php echo number_format($transaction->qty, 0, ",", "."); ?> KG</td>
                                        <td>Rp. <?php echo number_format($transaction->price_sell, 0, ",", "."); ?> /kg</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end fw-bold">Grand Total</td>
                                        <td colspan="2">Rp. <?php echo number_format($transaction->total_price_sell, 0, ",", "."); ?></td>
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
                    <p class="text-center"><?php echo $meta->alamat; ?></p>
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