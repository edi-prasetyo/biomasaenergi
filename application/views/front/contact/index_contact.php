<?php
$meta = $this->meta_model->get_meta();

// error_reporting(0);
// ini_set('display_errors', 0);
?>
<div class="breadcrumb">
    <div class="container">
        <ul class="breadcrumb my-3">
            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"><i class="ti ti-home"></i> Home</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ul>
    </div>
</div>

<div class="container mb-3">

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <h2>Contact Us</h2>
                    <p>Untuk Informasi dan Pemesanan Silahkan Hubungi Kami melalui</p>
                    <ul class="list-unstyled">
                        <li>
                            <i class="bi-house"></i> <?php echo $meta->alamat; ?>
                        </li>
                        <li><i class="bi-telephone"></i> <?php echo $meta->telepon; ?></li>

                    </ul>
                </div>
                <div class="col-md-7">
                    <?php echo $meta->map; ?>
                </div>
            </div>
        </div>
    </div>

</div>