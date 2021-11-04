<div class="card">
    <div class="card-header bg-white d-flex justify-content-between">
        <h4 class="card-title my-auto"><?php echo $title; ?></h4>
        <a href="<?php echo base_url('admin/report/filter'); ?>" class="btn btn-primary text-white"><i class="fa fa-filter"></i> Filter Laporan</a>
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
                            <td><?php echo number_format($data->qty, 0, ",", "."); ?> Kg</td>
                            <td>Rp <?php echo number_format($data->price_buy, 0, ",", "."); ?></td>
                            <td>Rp <?php echo number_format($data->price_sell, 0, ",", "."); ?></td>
                            <td>Rp <?php echo number_format($data->profit, 0, ",", "."); ?></td>
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
                        <td class="fw-bold"><?php echo number_format($total_unit, 0, ",", "."); ?> Kg</td>
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