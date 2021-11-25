<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title my-auto"><?php echo $title; ?></h4>
        <a href="<?php echo base_url('admin/menu/create'); ?>" class="btn btn-primary text-white">Tambah Menu</a>
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
                    <th>Nama Menu (ID)</th>
                    <th>Url</th>
                    <th>Urutan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php foreach ($list_menu as $data) { ?>
                <tr>
                    <td><?php echo $data->name_id; ?><br><i><?php echo $data->name_en; ?></i></td>
                    <td><?php echo $data->url; ?></td>
                    <td><?php echo $data->urutan; ?></td>
                    <td>
                        <a href="<?php echo base_url('admin/menu/update/') . $data->id; ?>" class="btn btn-info btn-sm"><i class="icon-note"></i> Ubah</a>
                        <?php include "delete.php"; ?>
                    </td>
                </tr>

            <?php }; ?>
        </table>
    </div>

</div>