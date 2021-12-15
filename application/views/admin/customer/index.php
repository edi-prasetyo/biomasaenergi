<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title my-auto"><?php echo $title; ?></h4>
        <a href="<?php echo base_url('admin/customer/create'); ?>" class="btn btn-primary text-white"><i class="fa fa-plus"></i> Tambah Customer</a>
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
                    <th>Perusahaan</th>
                    <th>PIC</th>
                    <th>No. Hp</th>
                    <th>Order</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($customer as $data) { ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data->company; ?></td>
                    <td><?php echo $data->fullname; ?></td>
                    <td><?php echo $data->phone; ?></td>
                    <td><?php echo $data->customer_order; ?></td>
                    <td>
                        <a href="<?php echo base_url('admin/customer/update/') . $data->id; ?>" class="btn btn-primary btn-sm text-white"><i class="feather-edit"></i></a>
                        <a href="<?php echo base_url('admin/customer/detail/') . $data->id; ?>" class="btn btn-success btn-sm text-white"><i class="feather-eye"></i></a>
                        <?php include "delete.php"; ?>
                    </td>
                </tr>

            <?php $no++;
            }; ?>
        </table>
    </div>
    <div class="card-footer bg-white">
        <div class="pagination col-md-12 text-center">
            <?php if (isset($pagination)) {
                echo $pagination;
            } ?>
        </div>
    </div>
</div>