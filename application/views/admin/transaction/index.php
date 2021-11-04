<div class="card">
    <div class="card-header bg-white d-flex justify-content-between">
        <h4 class="card-title my-auto"><?php echo $title; ?></h4>
        <a href="<?php echo base_url('admin/transaction/create'); ?>" class="btn btn-primary text-white"><i class="fa fa-plus"></i> Penjualan</a>
    </div>

    <?php
    if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
        unset($_SESSION['message']);
    }
    ?>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="3%">No</th>
                    <th>tanggal</th>
                    <th>Customer</th>
                    <th>Qty</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Profit</th>
                    <th>payment</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($transaction as $data) { ?>
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
                    <td>


                        <a href="<?php echo base_url('admin/transaction/update/') . $data->id; ?>" class="btn btn-primary btn-sm text-white"><i class="feather-edit"></i></a>
                        <a href="<?php echo base_url('admin/transaction/detail/') . $data->id; ?>" class="btn btn-primary btn-sm text-white"><i class="feather-eye"></i></a>

                        <!-- <a href="<?php echo base_url('admin/transaction/invoice/') . $data->id; ?>" class="btn btn-warning btn-sm text-dark"><i class="feather-file-text"></i> Invoice</a> -->
                        <!-- <a href="<?php echo base_url('admin/transaction/shipping/') . $data->id; ?>" class="btn btn-danger btn-sm text-white"><i class="feather-printer"></i> Surat Jalan</a> -->
                        <?php include "delete.php"; ?>
                    </td>
                </tr>

            <?php $no++;
            }; ?>
        </table>
    </div>
    <div class="card-footer bg-white p-0 m-0 pt-3 ps-5">
        <div class="pagination col-md-12 text-center">
            <?php if (isset($pagination)) {
                echo $pagination;
            } ?>
        </div>
    </div>
</div>