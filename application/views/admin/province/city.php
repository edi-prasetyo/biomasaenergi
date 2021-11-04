<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-white py-4">
                <h4 class="mb-0"> <i class="feather-plus"></i> Tambah Kota</h4>
            </div>
            <div class="card-body">
                <?php echo form_open(); ?>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="city_name" placeholder="Nama Kota" required="required">
                    <?php echo form_error('city_name', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Simpan Data">
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white py-4">
                <h4 class="mb-0">Data Kota di <?php echo $province->province_name; ?></h4>
            </div>
            <?php
            //Notifikasi
            if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
                unset($_SESSION['message']);
            }
            echo validation_errors('<div class="alert alert-warning">', '</div>');

            ?>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nama Kota</th>
                            <th width="25%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($city as $city) : ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $city->city_name; ?></td>
                                <td>
                                    <?php include "update_city.php"; ?>
                                    <?php include "delete_city.php"; ?>
                                    <!-- <a href="<?php echo base_url('admin/city/' . $city->id); ?>" class="btn btn-danger text-white btn-sm"><i class="feather-trash-2"></i></a> -->
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>