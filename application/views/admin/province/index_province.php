<div class="card">
    <div class="card-header d-flex justify-content-between align-items-start">
        <h4 class="my-auto"><?php echo $title; ?></h4>
        <div class="card-tools">
            <?php include "create_province.php"; ?>
        </div>
    </div>

    <?php
    //Notifikasi
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success">';
        echo $this->session->flashdata('message');
        unset($_SESSION['message']);
        echo '</div>';
    }
    echo validation_errors('<div class="alert alert-warning">', '</div>');

    ?>


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Provinsi</th>
                    <th width="30%">Data Kota</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($province as $province) { ?>
                    <tr>
                        <td><?php echo $province->province_name; ?></td>
                        <td> <a href="<?php echo base_url('admin/province/city/' . $province->id); ?>" class="btn btn-primary text-white btn-sm btn-block"><i class="fa fa-plus"></i> Tambah Kota / Kabupaten </a>
                        </td>
                        <td>
                            <?php include "update_province.php"; ?>
                            <?php include "delete_province.php"; ?>
                        </td>
                    </tr>

                <?php }; ?>


            </tbody>
        </table>
    </div>

    <div class="card-footer bg-white border-top">

        <div class="pagination col-md-12 text-center p-0 m-0">
            <?php if (isset($pagination)) {
                echo $pagination;
            } ?>
        </div>
    </div>
</div>