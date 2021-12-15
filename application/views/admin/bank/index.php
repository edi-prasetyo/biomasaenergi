<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <?php echo $title; ?>
        <a href="<?php echo base_url('admin/bank/create'); ?>" class="btn btn-info btn-sm text-white">Buat Data Bank</a>
    </div>

    <?php
    if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
        unset($_SESSION['message']);
    }
    ?>

    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama Bank</th>
                    <th>No. Rekening</th>
                    <th>Atas Nama</th>
                    <th>Cabang</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($bank as $data) { ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data->bank_name; ?></td>
                    <td><?php echo $data->bank_number; ?></td>
                    <td><?php echo $data->bank_account; ?></td>
                    <td><?php echo $data->bank_branch; ?></td>
                    <td>
                        <a href="<?php echo base_url('admin/bank/update/' . $data->id); ?>" class="btn btn-info btn-sm text-white"><i class="ti-pencil-alt"></i> Edit</a>
                        <?php include "delete.php"; ?>

                    </td>
                </tr>

            <?php $no++;
            }; ?>
        </table>

        <div class="pagination col-md-12 text-center">
            <?php if (isset($pagination)) {
                echo $pagination;
            } ?>
        </div>

    </div>

</div>