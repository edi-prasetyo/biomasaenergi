<?php
if ($this->session->flashdata('message')) {
    echo $this->session->flashdata('message');
    unset($_SESSION['message']);
}
?>

<div class="row">
    <div class="col-md-7 mb-3 mx-auto">
        <div class="card mb-3">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                Pengaturan Email <?php echo $email_register->name; ?>
                <a href="<?php echo base_url('admin/pengaturan/update/' . $email_register->id); ?>" class="btn btn-primary text-white btn-sm"><i class="feather-edit"></i> Edit</a>
            </div>
            <div class="card-body">

                <?php echo $email_register->protocol; ?><br>
                <?php echo $email_register->smtp_host; ?><br>
                <?php echo $email_register->smtp_port; ?><br>
                <?php echo $email_register->smtp_user; ?><br>

            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Pengaturan Pengiriman Email
                <!-- HTML to write -->
                <a href="#" data-toggle="tooltip" title="Set Status Aktif hanya untuk production di server hosting, utuk test di server lokal silahkan nonaktifkan agar dapat berjalan dengan baik"><i class="fa fa-info-circle"></i> Info</a>
            </div>

            <?php
            //Notifikasi
            if ($this->session->flashdata('message')) {
                echo $this->session->flashdata('message');
            }
            echo validation_errors('<div class="alert alert-warning">', '</div>');

            ?>
            <div class="table-responsive">
                <table class="table table-flush">

                    <?php foreach ($sendemail as $data) : ?>
                        <tr>

                            <td><?php echo $data->type; ?></td>

                            <td>

                                <?php if ($data->status == 1) : ?>
                                    <span class="me-2"><span class="badge badge-dot bg-success me-1"></span><span class="text-success">Aktif</span></span>
                                <?php else : ?>
                                    <span class="me-2"><span class="badge badge-dot bg-danger me-1"></span><span class="text-danger">Tidak Aktif</span></span>
                                <?php endif; ?>

                            </td>

                            <td width="20%">
                                <?php if ($data->status == 0) : ?>
                                    <a class="btn btn-success btn-sm btn-block" href="<?php echo base_url('admin/pengaturan/sendemail_active/' . $data->id); ?>"><i class="fas fa-check text-white"></i></a>
                                <?php else : ?>
                                    <a class="btn btn-danger btn-sm btn-block" href="<?php echo base_url('admin/pengaturan/sendemail_inactive/' . $data->id); ?>"><i class="fas fa-times text-white"></i></a>
                                <?php endif; ?>

                            </td>
                        </tr>

                    <?php endforeach; ?>
                </table>

                <div class="pagination col-md-12 text-center">
                    <?php if (isset($pagination)) {
                        echo $pagination;
                    } ?>
                </div>

            </div>
        </div>
    </div>


</div>