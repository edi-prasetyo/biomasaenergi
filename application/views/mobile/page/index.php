<nav class="site-header bg-white sticky-top py-1 shadow-sm">
    <div class="container py-2 d-flex justify-content-between align-items-center">
        <a style="text-decoration:none;" class="text-dark text-left" href="javascript:history.back()"><i style="font-size: 25px;" class="ri-arrow-left-line"></i></a>
        <span class="text-dark text-center font-weight-bold">
            <?php echo $title; ?>
        </span>
        <div style="color:transparent;"></div>
    </div>
</nav>
<div class="container my-3 pb-5">
    <?php foreach ($page as $page) : ?>
        <div class="col-md-6">
            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body">
                    <h2><a href="<?php echo base_url('page/detail/' . $page->page_slug); ?>" class="text-muted"><?php echo substr($page->page_title, 0, 20); ?></a> </h2>
                    <p><?php echo substr($page->page_desc, 0, 117); ?>..</p>
                    <a class="btn btn-outline-info" href="<?php echo base_url('page/detail/' . $page->page_slug); ?>">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>