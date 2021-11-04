<div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <?php echo $title; ?>
        <a href="<?php echo base_url('admin/layanan/create'); ?>" class="btn btn-success btn-sm text-white">Buat Layanan baru</a>
    </div>
    <?php
    if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
        unset($_SESSION['message']);
    }
    ?>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Layanan</th>
                    <th>Warna Icon</th>
                    <th>Icon</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($layanan as $data) : ?>
                    <tr>
                        <td class="text-info"><?php echo $no; ?></td>
                        <td><?php echo $data->layanan_name; ?></td>
                        <td>
                            <div style="color:<?php echo $data->layanan_color; ?>"> <i class="ri-focus-fill"></i></div>
                        </td>
                        <td><?php echo $data->layanan_icon; ?></td>

                        <td>
                            <a href="<?php echo base_url('admin/layanan/update/' . $data->id); ?>" class="btn btn-sm btn-success text-white"><i class="ti-edit"></i> Edit</a>
                            <?php include "delete.php"; ?>
                        </td>
                    </tr>
                <?php $no++;
                endforeach; ?>

            </tbody>
        </table>
    </div>
</div>