<?php
if ($this->session->flashdata('message')) {
    echo $this->session->flashdata('message');
    unset($_SESSION['message']);
}
?>

<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                Pengaturan Email <?php echo $email_register->name; ?>
                <a href="<?php echo base_url('admin/pengaturan/update/' . $email_register->id); ?>" class="btn btn-info btn-sm"> Email Register</a>
            </div>
            <div class="card-body">

                <?php echo $email_register->protocol; ?><br>
                <?php echo $email_register->smtp_host; ?><br>
                <?php echo $email_register->smtp_port; ?><br>
                <?php echo $email_register->smtp_user; ?><br>

            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                Pengaturan Email <?php echo $email_order->name; ?>
                <a href="<?php echo base_url('admin/pengaturan/update/' . $email_order->id); ?>" class="btn btn-info btn-sm"> Email Order</a>
            </div>
            <div class="card-body">

                <?php echo $email_order->protocol; ?><br>
                <?php echo $email_order->smtp_host; ?><br>
                <?php echo $email_order->smtp_port; ?><br>
                <?php echo $email_order->smtp_user; ?><br>

            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-header">
                Pengaturan Pembayaran
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

                    <?php foreach ($payment as $data) : ?>
                        <tr>

                            <td><?php echo $data->nama_pembayaran; ?></td>

                            <td>

                                <?php if ($data->status == 1) : ?>
                                    <span class="badge badge-success">Aktif</span>
                                <?php else : ?>
                                    <span class="badge badge-danger">Tidak Aktif</span>
                                <?php endif; ?>

                            </td>

                            <td width="20%">
                                <?php if ($data->status == 0) : ?>
                                    <a class="btn btn-success btn-sm btn-block" href="<?php echo base_url('admin/pengaturan/payment_active/' . $data->id); ?>"><i class="fas fa-check"></i></a>
                                <?php else : ?>
                                    <a class="btn btn-danger btn-sm btn-block" href="<?php echo base_url('admin/pengaturan/payment_inactive/' . $data->id); ?>"><i class="fas fa-times"></i></a>
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
    <div class="col-md-4 mb-3">
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
                                    <span class="badge badge-success">Aktif</span>
                                <?php else : ?>
                                    <span class="badge badge-danger">Tidak Aktif</span>
                                <?php endif; ?>

                            </td>

                            <td width="20%">
                                <?php if ($data->status == 0) : ?>
                                    <a class="btn btn-success btn-sm btn-block" href="<?php echo base_url('admin/pengaturan/sendemail_active/' . $data->id); ?>"><i class="fas fa-times"></i></a>
                                <?php else : ?>
                                    <a class="btn btn-danger btn-sm btn-block" href="<?php echo base_url('admin/pengaturan/sendemail_inactive/' . $data->id); ?>"><i class="fas fa-times"></i></a>
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


<div class="col-md-7 mx-auto">


</div>