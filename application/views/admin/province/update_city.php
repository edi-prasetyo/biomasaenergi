<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Edit<?php echo $city->id; ?>">
    <i class="feather-edit"></i>
</button>

<div class="modal modal-default fade" id="Edit<?php echo $city->id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Kota</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <?php
                //Error warning
                echo validation_errors('<div class="alert alert-warning">', '</div>');
                echo form_open(base_url('admin/province/update_city/' . $city->id));

                ?>

                <div class="form-group mb-3">
                    <label class="form-label"> Nama Kota</label>
                    <input type="text" class="form-control" name="city_name" value="<?php echo $city->city_name ?>">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Simpan Data">
                </div>


                <?php
                //Form Close
                echo form_close();
                ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary pull-right" data-bs-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->