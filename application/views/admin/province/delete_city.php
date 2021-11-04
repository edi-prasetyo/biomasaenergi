<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Delete<?php
                                                                                                    echo $city->id ?>">
    <i class="feather-trash-2"></i>
</button>

<div class="modal modal-danger fade" id="Delete<?php echo $city->id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Menghapus Data</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus Data Kategori <b><?php echo $city->city_name ?></b>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
                <a href="<?php echo base_url('admin/city/delete/' . $city->id) ?>" class="btn btn-danger pull-right text-white"><i class="fa fa-trash-o"></i> Ya, Hapus data ini</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->