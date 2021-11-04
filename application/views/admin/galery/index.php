<div class="card">
    <div class="card-header bg-white d-flex flex-row align-items-center justify-content-between">
        <?php echo $title; ?>
        <a class="btn btn-primary" href="<?php echo base_url('admin/galery/create'); ?>"> Buat Galery</a>
    </div>

    <?php
    if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
        unset($_SESSION['message']);
    }
    ?>

    <div class="table-responsive">
        <table class="table table-flush">
            <thead class="thead-light">
                <tr>
                    <th width="5%">No</th>
                    <th width="10%">Gambar</th>
                    <th>Judul Gambar</th>
                    <th>Type</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($galery as $data) { ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><img class="img-fluid" src="<?php echo base_url('assets/img/galery/' . $data->galery_img); ?>"></td>
                    <td><?php echo $data->galery_title; ?></td>
                    <td>
                        <?php if ($data->galery_type == "Slider") : ?>
                            <div class="badge badge-success">Slider</div>
                        <?php elseif ($data->galery_type == "Halaman") : ?>
                            <div class="badge badge-danger">Halaman</div>
                        <?php else : ?>
                            <div class="badge badge-info">Featured</div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo base_url('admin/galery/update/' . $data->id); ?>" class="btn btn-info btn-sm"><i class="far fa-edit"></i> Edit</a>
                        <?php include "delete.php"; ?>
                    </td>
                </tr>

            <?php $no++;
            }; ?>
        </table>
        <hr>
        <div class="pagination col-md-12 text-center">
            <?php if (isset($pagination)) {
                echo $pagination;
            } ?>
        </div>

    </div>


</div>