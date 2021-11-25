<div class="breadcrumb">
    <div class="container">
        <ul class="breadcrumb my-3">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>"><i class="ti ti-home"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('page') ?>"> Page</a></li>

            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="card mb-3 shadow-sm">
        <div class="card-body">

            <h2>
                <?php if ($this->session->userdata('language') == 'EN') : ?>
                    <?php echo $page->page_title_en; ?>
                <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                    <?php echo $page->page_title; ?>
                <?php else : ?>
                    <?php echo $page->page_title; ?>
                <?php endif; ?>
            </h2>
            <?php if ($this->session->userdata('language') == 'EN') : ?>
                <?php echo $page->page_desc_en; ?>
            <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                <?php echo $page->page_desc; ?>
            <?php else : ?>
                <?php echo $page->page_desc; ?>
            <?php endif; ?>
        </div>
    </div>


</div>