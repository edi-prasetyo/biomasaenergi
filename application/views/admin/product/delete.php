<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Delete<?php echo $data->id ?>">
    <i class="fa fa-trash"></i> Hapus
</button>
<!-- Modal -->
<div class="modal fade" id="Delete<?php echo $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus Data <b><?php echo $data->product_name ?></b>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="<?php echo base_url('admin/product/delete/' . $data->id) ?>" class="btn btn-danger text-white">Ya, Hapus Data</a>
            </div>
        </div>
    </div>
</div>