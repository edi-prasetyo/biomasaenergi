<div class="breadcrumb">
    <div class="container">
        <ul class="breadcrumb my-3">
            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"><i class="ti ti-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('berita') ?>"> Berita</a></li>

            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ul>
    </div>
</div>
<div class="container">
    <?php foreach ($page as $page) : ?>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2><a href="<?php echo base_url('page/detail/' . $page->page_slug); ?>" class="text-muted"><?php echo substr($page->page_title, 0, 20); ?></a> </h2>
                    <p><?php echo substr($page->page_desc, 0, 117); ?>..</p>
                    <a class="btn btn-outline-info" href="<?php echo base_url('page/detail/' . $page->page_slug); ?>">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>