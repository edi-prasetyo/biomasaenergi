<nav class="site-header bg-white sticky-top py-1 shadow-sm">
    <div class="container py-2 d-flex justify-content-between align-items-center">
        <a style="text-decoration:none;" class="text-dark text-left" href="javascript:history.back()"><i style="font-size: 25px;" class="ri-arrow-left-line"></i></a>
        <span class="text-dark text-center font-weight-bold">
            <?php echo $title; ?>
        </span>
        <div style="color:transparent;"></div>
    </div>
</nav>

<div class="container my-3 mb-5">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <?php foreach ($category as $category) : ?>
                    <div class="col-md-4">
                        <div class="card mb-2 shadow-sm border-0">
                            <a class="text-decoration-none text-muted" href="<?php echo base_url('category/item/' . $category->category_slug); ?>">
                                <div class="card-body">
                                    <i class="ri-price-tag-3-line"></i> <?php echo $category->category_name; ?>
                                </div>
                            </a>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>