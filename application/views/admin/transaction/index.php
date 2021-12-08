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
                    <th>Product</th>
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
                    <td><?php echo $data->product_name; ?></td>
                    <td>
                        <?php if ($data->product_id == 2) : ?>
                            <?php echo number_format($data->qty, 0, ",", "."); ?> Unit
                        <?php else : ?>
                            <?php echo number_format($data->qty, 0, ",", "."); ?> Kg
                        <?php endif; ?>
                    </td>
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
                    <td>


                        <!-- <a href="<?php echo base_url('admin/transaction/update/') . $data->id; ?>" class="btn btn-primary btn-sm text-white"><i class="feather-edit"></i></a> -->
                        <a href="<?php echo base_url('admin/transaction/detail/') . $data->id; ?>" class="btn btn-primary btn-sm text-white"><i class="feather-eye"></i></a>
                        <button type="button" class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#Cancel<?php echo $data->id; ?>">
                            <i class="fa fa-times"></i>
                        </button>

                        <div class="modal modal-default fade" id="Cancel<?php echo $data->id ?>">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Cancel Transaksi</h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>

                                    </div>
                                    <div class="modal-body">
                                        Anda Yakin akan membatalkan Transaksi ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary pull-right" data-bs-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
                                        <a href="<?php echo base_url('admin/transaction/cancel/' . $data->id); ?>" class="btn btn-danger text-white">Ya Batalkan</a>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->

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