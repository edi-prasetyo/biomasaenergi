<nav class="site-header bg-white sticky-top py-1 shadow-sm">
    <div class="container py-2 d-flex justify-content-between align-items-center">
        <a style="text-decoration:none;" class="text-dark text-left" href="javascript:history.back()"><i style="font-size: 25px;" class="ri-arrow-left-line"></i></a>
        <span class="text-dark text-center font-weight-bold">
            <?php echo $title; ?>
        </span>
        <div style="color:transparent;"></div>
    </div>
</nav>

<div class="container mb-5 my-3">
    <?php if ($mobil == NULL) : ?>
        <div class="card">
            <div class="card-body text-center">
                <h2><i class="bi-x-circle my-auto text-danger display-1"></i><br> Oops</h2>
                Maaf Mobil Yang Anda cari Saat ini tidak tersedia, Silahkan Gunakan Mobil Lainnya<br>
                <a href="<?php echo base_url('rental-mobil'); ?>" class="btn btn-info my-4">Lihat List Mobil</a>

            </div>
        </div>
    <?php else : ?>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-2 shadow-sm border-0">

                    <div class="card-body">
                        <div class="img-wrap"><img class="img-fluid" src="<?php echo base_url('assets/img/mobil/') . $mobil->mobil_gambar; ?>"></div>
                        <div class="badge badge-success"><?php echo $mobil->merek_name; ?></div>
                        <h2><?php echo $mobil->mobil_name; ?></h2>
                        <span class="mr-5"><i class="ri-user-follow-line"></i> <?php echo $mobil->mobil_penumpang; ?> Penumpang</span>
                        <i class="ri-briefcase-line"></i> <?php echo $mobil->mobil_bagasi; ?> Bagasi
                        <div class="col-md-12">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <h6>Pilih Paket</h6>

                <div class="bg-white rounded shadow-sm mt-3 profile-details my-3">
                    <?php foreach ($listpaket as $listpaket) : ?>
                        <a href="<?php echo base_url('rental-mobil/booking/' . md5($listpaket->id)); ?>" class="text-decoration-none text-muted">
                            <div class="d-flex align-items-center border-bottom p-3">
                                <div class="left mr-3">
                                    <h6 class="font-weight-bold mb-1">IDR. <strong><?php echo number_format($listpaket->paket_price, '0', ',', '.'); ?></strong></h6>
                                    <p class="small m-0"><?php echo $listpaket->paket_name ?></p>
                                </div>
                                <div class="right ml-auto">
                                    <h6 class="font-weight-bold m-0"><i class="ri-arrow-right-s-line"></i></h6>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>

                <div class="card shadow-sm border-0 mb-5">
                    <div class="card-header bg-white">
                        Deskripsi Mobil
                    </div>
                    <div class="card-body">
                        <?php echo $mobil->mobil_desc; ?>

                    </div>
                </div>


            </div>



        </div>

    <?php endif; ?>

</div>