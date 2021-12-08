<div class="row mb-3">
    <div class="col-md-3">
        <div class="card mb-4 mb-xl-0 border-0 shadow-sm bg-primary">
            <div class="card-body d-flex w-100 justify-content-between">
                <div class="col">
                    <h5 class="card-title text-white">Transaksi <?php echo
                                                                date('F Y'); ?></h5>
                    <span class="h3 font-weight-bold text-white"><?php echo count($transaction_month); ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-4 mb-xl-0 border-0 shadow-sm bg-success">
            <div class="card-body d-flex w-100 justify-content-between">
                <div class="col">
                    <h5 class="card-title text-white">Pembelian <?php echo
                                                                date('F Y'); ?></h5>
                    <span class="h3 font-weight-bold text-white">Rp. <?php echo number_format($pembelian_month, 0, ",", "."); ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-4 mb-xl-0 border-0 shadow-sm bg-warning">
            <div class="card-body d-flex w-100 justify-content-between">
                <div class="col">
                    <h5 class="card-title">Penjualan <?php echo
                                                        date('F Y'); ?></h5>
                    <span class="h3 font-weight-bold">Rp. <?php echo number_format($penjualan_month, 0, ",", "."); ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-4 mb-xl-0 border-0 shadow-sm bg-danger">
            <div class="card-body d-flex w-100 justify-content-between">
                <div class="col">
                    <h5 class="card-title text-white">Profit <?php echo
                                                                date('F Y'); ?></h5>
                    <span class="h3 font-weight-bold text-white">Rp. <?php echo number_format($profit_month, 0, ",", "."); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-white d-flex justify-content-between">
        <div>
            <h4 class="card-title my-auto"><?php echo $title; ?></h4>
        </div>
        <div>
            <a href="<?php echo base_url('admin/report/cancel'); ?>" class="btn btn-danger text-white"><i class="fa fa-times"></i> cancel Order</a>
            <a href="<?php echo base_url('admin/report/filter'); ?>" class="btn btn-primary text-white"><i class="fa fa-filter"></i> Filter Laporan</a>
        </div>
    </div>

    <?php
    if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
        unset($_SESSION['message']);
    }
    ?>



    <div class="card-body">
        <!-- <a href="<?php //echo base_url('admin/report/export'); 
                        ?>">Export ke Excel</a> -->

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="3%">No</th>
                        <th width="7%">tanggal</th>
                        <th>Customer</th>
                        <th>Qty</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Profit</th>
                        <th width="3%">payment</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($report as $data) { ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo date("d/m/Y", strtotime($data->created_at)); ?></td>
                            <td><?php echo $data->company; ?></td>
                            <td><?php echo number_format($data->qty, 0, ",", "."); ?> </td>
                            <td>Rp <?php echo number_format($data->total_price_buy, 0, ",", "."); ?></td>
                            <td>Rp <?php echo number_format($data->total_price_sell, 0, ",", "."); ?></td>
                            <td>Rp <?php echo number_format($data->total_profit, 0, ",", "."); ?></td>
                            <td>
                                <?php if ($data->payment_status == 'Paid') : ?>
                                    <div class="badge rounded-pill bg-success bg-opacity-50">Paid</div>
                                <?php else : ?>
                                    <div class="badge rounded-pill bg-danger bg-opacity-50">Unpaid</div>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php $no++;
                    }; ?>
                    <tr>
                        <th colspan="3" scope="row" class="text-end">Jumlah</th>
                        <td class="fw-bold"><?php echo number_format($total_unit, 0, ",", "."); ?></td>
                        <td class="fw-bold">Rp. <?php echo number_format($total_pembelian, 0, ",", "."); ?></td>
                        <td class="fw-bold">Rp. <?php echo number_format($total_penjualan, 0, ",", "."); ?></td>
                        <td class="fw-bold">Rp. <?php echo number_format($total_profit, 0, ",", "."); ?></td>
                        <td></td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
    <div class="card-footer bg-white p-0 m-0 pt-3 ps-5">
        <div class="pagination col-md-12 text-center">
            <?php if (isset($pagination)) {
                echo $pagination;
            } ?>
        </div>
    </div>
</div>