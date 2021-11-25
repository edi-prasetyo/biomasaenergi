<div class="breadcrumb">
    <div class="container">
        <ul class="breadcrumb my-3">
            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"><i class="ti ti-home"></i> Home</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ul>
    </div>
</div>

<div class="container mb-3">

    <div class="row">

        <div class="col-md-9">
            <div class="row">
                <?php foreach ($berita as $berita) : ?>
                    <div class="col-md-4">
                        <div class="post-slide3">
                            <div class="post-img">
                                <img src="<?php echo base_url('assets/img/artikel/' . $berita->berita_gambar); ?>" alt="">
                                <span class="post-icon">
                                    <i class="fa fa-book"></i>
                                </span>
                            </div>
                            <div class="post-body">
                                <ul class="post-bar">
                                    <li><?php echo date('j M Y', strtotime("$berita->date_created")); ?></li>
                                    <li>
                                        <a href="<?php echo base_url('category/item/' . $berita->category_slug); ?>"><?php echo $berita->category_name; ?></a>

                                    </li>
                                </ul>
                                <h3 class="post-title"><a href="<?php echo base_url('berita/detail/' . $berita->berita_slug); ?>">
                                        <?php if ($this->session->userdata('language') == 'EN') : ?>
                                            <?php echo $berita->berita_title_en; ?>
                                        <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                                            <?php echo $berita->berita_title_id; ?>
                                        <?php else : ?>
                                            <?php echo $berita->berita_title_id; ?>
                                        <?php endif; ?>
                                    </a></h3>
                                <p class="post-description">
                                    <?php if ($this->session->userdata('language') == 'EN') : ?>
                                        <?php echo substr($berita->berita_desc_en, 0, 95); ?>
                                    <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                                        <?php echo substr($berita->berita_desc_id, 0, 95); ?>
                                    <?php else : ?>
                                        <?php echo substr($berita->berita_desc_id, 0, 95); ?>
                                    <?php endif; ?> </p>
                                <a href="<?php echo base_url('berita/detail/' . $berita->berita_slug); ?>" class="read-more">
                                    <i class="fa fa-long-arrow-right"></i>
                                    <span>
                                        <?php if ($this->session->userdata('language') == 'EN') : ?>
                                            Read More
                                        <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                                            Selengkapnya
                                        <?php else : ?>
                                            Selengkapnya
                                        <?php endif; ?>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="pagination col-md-12 text-center">
                <?php if (isset($pagination)) {
                    echo $pagination;
                } ?>
            </div>
        </div>
        <div class="col-md-3">
            <?php include "sidebar.php"; ?>
        </div>
    </div>











    <div class="pagination col-md-12 text-center">
        <?php if (isset($paginasi)) {
            echo $paginasi;
        } ?>
    </div>
</div>