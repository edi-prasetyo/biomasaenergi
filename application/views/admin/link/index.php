<div class="card">
    <div class="card-header d-flex flex-row align-items-center justify-content-between">

        <?php echo $title; ?>
        <a href="<?php echo base_url('admin/link/create'); ?>" class="btn btn-rounded btn-info text-white">Tambah Link</a>

    </div>

    <?php
    if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
        unset($_SESSION['message']);
    }
    ?>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Link</th>
                    <th>Url</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php foreach ($list_link as $data) { ?>
                <tr>
                    <td><?php echo $data->link_name; ?></td>
                    <td><?php echo $data->link_url; ?></td>
                    <td>
                        <a href="<?php echo base_url('admin/link/update/') . $data->id; ?>" class="btn btn-info btn-sm text-white"> Ubah</a>
                        <?php include "delete.php"; ?>
                    </td>
                </tr>

            <?php }; ?>
        </table>
    </div>
</div>