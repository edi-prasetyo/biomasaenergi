<div class="card shadow-sm">
    <div class="card-header bg-white d-flex flex-row align-items-center justify-content-between">
        <?php echo $title; ?>
        <?php include "create.php"; ?>
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
        <table class="table table-flush">
            <thead>
                <tr>
                    <th>Nama Kategori</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($category as $data) { ?>
                    <tr>
                        <td><?php echo $data->category_name; ?></td>
                        <td><?php echo date('D, d F Y', $data->date_created); ?> <?php echo date('H:i', $data->date_created); ?></td>
                        <td>
                            <?php include "update.php"; ?>
                            <?php include "delete.php"; ?>
                        </td>
                    </tr>

                <?php }; ?>


            </tbody>
        </table>
    </div>

</div>