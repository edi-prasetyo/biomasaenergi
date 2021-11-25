<div class="card">
    <div class="card-header bg-white d-flex justify-content-between">
        <h4 class="card-title my-auto"><?php echo $title; ?></h4>
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
                        <th width="3%">Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($cancel as $data) { ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo date("d/m/Y", strtotime($data->created_at)); ?></td>
                            <td><?php echo $data->company; ?></td>
                            <td><?php echo number_format($data->qty, 0, ",", "."); ?> Kg</td>
                            <td>Rp <?php echo number_format($data->price_buy, 0, ",", "."); ?></td>
                            <td>Rp <?php echo number_format($data->price_sell, 0, ",", "."); ?></td>
                            <td>Rp <?php echo number_format($data->profit, 0, ",", "."); ?></td>
                            <td>
                                <?php if ($data->payment_status == 'Paid' && $data->status == 0) : ?>
                                    <div class="badge rounded-pill bg-danger bg-opacity-50">Cancel</div>
                                <?php else : ?>
                                    <div class="badge rounded-pill bg-danger bg-opacity-50">Unpaid</div>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php $no++;
                    }; ?>

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