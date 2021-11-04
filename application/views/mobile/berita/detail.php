<nav class="site-header bg-white sticky-top py-1 shadow-sm">
    <div class="container py-2 d-flex justify-content-between align-items-center">
        <a style="text-decoration:none;" class="text-dark text-left" href="javascript:history.back()"><i style="font-size: 25px;" class="ri-arrow-left-line"></i></a>
        <span class="text-dark text-center font-weight-bold">
            <?php echo substr($title, 0, 25); ?>..
        </span>
        <div style="color:transparent;"></div>
    </div>
</nav>
<div class="container my-3 mb-5">
    <div class="row">
        <div class="col-md-9">
            <div class="card mb-3">
                <div class="card-body">
                    <h2><?php echo $berita->berita_title; ?></h2>
                </div>
                <img class="img-fluid" src="<?php echo base_url('assets/img/artikel/' . $berita->berita_gambar); ?>">
                <div class="card-body">
                    <?php echo $berita->berita_desc; ?>
                </div>
                <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                    <span><i class="bi-person"></i> <?php echo $berita->user_name; ?></span>
                    <span><i class="bi-eye"></i> <?php echo $berita->berita_views; ?></span>
                    <span><i class="bi-calendar"></i><?php echo date('d/m/Y', strtotime($berita->date_created)); ?>
                </div>
            </div>
        </div>



    </div>
</div>