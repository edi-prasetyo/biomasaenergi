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
    <div class="card mb-5 shadow-sm border-0">
        <div class="card-body">
            <h2><?php echo $title; ?></h2>
            <?php echo $page->page_desc; ?>

        </div>
    </div>


</div>