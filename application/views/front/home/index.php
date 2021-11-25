<?php $meta = $this->meta_model->get_meta(); ?>
<section class="pt-2 pb-2 mt-0 align-items-center d-flex bg-dark" style="min-height: 550px; background-size: cover; background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.9)), url(<?php echo base_url('assets/img/galery/' . $homepage->hero_img); ?>);">
    <div class="container ">
        <div class="row">
            <div class="col-md-9 h-50 ">
                <h1 class="fw-bold   text-light display-1 mb-2 mt-5">
                    <?php if ($this->session->userdata('language') == 'EN') : ?>
                        <?php echo $homepage->hero_title_en; ?>
                    <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                        <?php echo $homepage->hero_title_id; ?>
                    <?php else : ?>
                        <?php echo $homepage->hero_title_id; ?>
                    <?php endif; ?>
                </h1>
                <p>
                    <a href="#" class="btn btn-success btn-lg mt-5 mb-5 text-white">
                        <?php if ($this->session->userdata('language') == 'EN') : ?>
                            <?php echo $homepage->hero_button_en; ?> <i class="feather-arrow-right"></i>
                        <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                            <?php echo $homepage->hero_button_id; ?> <i class="feather-arrow-right"></i>
                        <?php else : ?>
                            <?php echo $homepage->hero_button_id; ?> <i class="feather-arrow-right"></i>
                        <?php endif; ?>

                    </a>
                </p>

            </div>
        </div>

    </div>
</section>

<section class="bg-white py-5">
    <div class="container py-5">
        <h1 class="py-3"><?php if ($this->session->userdata('language') == 'EN') : ?>
                <?php echo $homepage->product_title_en; ?>
            <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                <?php echo $homepage->product_title_id; ?>
            <?php else : ?>
                <?php echo $homepage->product_title_id; ?>
            <?php endif; ?>
        </h1>
        <div style="font-size:18px;">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo base_url('assets/img/galery/' . $homepage->product_img); ?>" class="d-block mx-lg-auto img-fluid rounded-3" alt="<?php echo $homepage->product_title_id; ?>" loading="lazy">
                </div>
                <div class="col-md-8">
                    <?php if ($this->session->userdata('language') == 'EN') : ?>
                        <?php echo $homepage->product_desc_en; ?>
                    <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                        <?php echo $homepage->product_desc_id; ?>
                    <?php else : ?>
                        <?php echo $homepage->product_desc_id; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="pt-5 pb-5 bg-light">
    <div class="container">
        <div class="row mb-md-4">
            <div class="col-12 col-lg-8 text-center text-lg-start">
                <h4 class="text-mutted">
                    <?php if ($this->session->userdata('language') == 'EN') : ?>
                        Welcome To
                    <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                        Selamat Datang di
                    <?php else : ?>
                        Selamat Datang di
                    <?php endif; ?>
                </h4>
                <h2 class="display-4">
                    <?php if ($this->session->userdata('language') == 'EN') : ?>
                        <?php echo $homepage->service_title_en; ?>
                    <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                        <?php echo $homepage->service_title_id; ?>
                    <?php else : ?>
                        <?php echo $homepage->service_title_id; ?>
                    <?php endif; ?>
                </h2>
                <p class="lead">
                    <?php if ($this->session->userdata('language') == 'EN') : ?>
                        <?php echo $homepage->service_desc_en; ?>
                    <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                        <?php echo $homepage->service_desc_id; ?>
                    <?php else : ?>
                        <?php echo $homepage->service_desc_id; ?>
                    <?php endif; ?>
                </p>
            </div>
        </div>
        <div class="row d-flex mb-5">

            <?php foreach ($layanan as $layanan) : ?>
                <div class="col-10 mx-auto col-md-4">
                    <div class="my-3 card card-body shadow p-4 ">
                        <div class="row align-items-center d-flex text-md-center text-lg-start">
                            <div class="col-12 col-sm-3 col-md-3 text-center px-0">
                                <div class="icon-wrap text-primary my-3 display-3">
                                    <?php echo $layanan->layanan_icon; ?>
                                </div>
                            </div>
                            <div class="col-12 col-md-9 mt-3 mt-lg-0">
                                <h4 class="">
                                    <?php if ($this->session->userdata('language') == 'EN') : ?>
                                        <?php echo $layanan->layanan_name_en; ?>
                                    <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                                        <?php echo $layanan->layanan_name_id; ?>
                                    <?php else : ?>
                                        <?php echo $layanan->layanan_name_id; ?>
                                    <?php endif; ?>
                                </h4>
                                <p class=" mb-0">
                                    <?php if ($this->session->userdata('language') == 'EN') : ?>
                                        <?php echo $layanan->layanan_desc_en; ?>
                                    <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                                        <?php echo $layanan->layanan_desc_id; ?>
                                    <?php else : ?>
                                        <?php echo $layanan->layanan_desc_id; ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<section class="pt-5 pb-5 my-5">
    <div class="container">

        <h2 class="display-5 mb-5">
            <?php if ($this->session->userdata('language') == 'EN') : ?>
                Our Product
            <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                Produk Kami
            <?php else : ?>
                Produk Kami
            <?php endif; ?>
        </h2>
        <div class="row mb-2">


            <?php foreach ($product as $product) : ?>

                <div class="col-md-6">
                    <div class="card shadow flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-success"><?php if ($this->session->userdata('language') == 'EN') : ?>
                                    Product
                                <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                                    Produk
                                <?php else : ?>
                                    Produk
                                <?php endif; ?></strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="#">
                                    <?php if ($this->session->userdata('language') == 'EN') : ?>
                                        <?php echo $product->product_name_en; ?>
                                    <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                                        <?php echo $product->product_name; ?>
                                    <?php else : ?>
                                        <?php echo $product->product_name; ?>
                                    <?php endif; ?>
                                </a>
                            </h3>
                            <p class="card-text mb-auto">
                                <?php if ($this->session->userdata('language') == 'EN') : ?>
                                    <?php echo $product->description_en; ?>
                                <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                                    <?php echo $product->description; ?>
                                <?php else : ?>
                                    <?php echo $product->description; ?>
                                <?php endif; ?>

                            </p>
                            <a href="<?php echo base_url('product/detail/' . $product->product_slug); ?>">Detail Product</a>
                        </div>
                        <img class="card-img-right flex-auto d-none d-md-block rounded-3" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" src="<?php echo base_url('assets/img/product/' . $product->product_img); ?>" data-holder-rendered="true" style="width: 200px; height: 250px;">
                    </div>
                </div>

            <?php endforeach; ?>


        </div>
    </div>
</section>

<section>
    <div class="container px-4 py-5 my-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-10 col-sm-8 col-lg-6">
                        <img src="<?php echo base_url('assets/img/galery/' . $homepage->about_img); ?>" class="d-block mx-lg-auto img-fluid rounded-3" width="100%" alt="<?php echo $homepage->about_title_id; ?>" loading=" lazy">
                    </div>
                    <div class="col-lg-6">
                        <h1 class="display-5 fw-bold">

                            <?php if ($this->session->userdata('language') == 'EN') : ?>
                                <?php echo $homepage->about_title_en; ?>
                            <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                                <?php echo $homepage->about_title_id; ?>
                            <?php else : ?>
                                <?php echo $homepage->about_title_id; ?>
                            <?php endif; ?>

                        </h1>
                        <p style="font-size:18px;">
                            <?php if ($this->session->userdata('language') == 'EN') : ?>
                                <?php echo $homepage->about_desc_en; ?>
                            <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                                <?php echo $homepage->about_desc_id; ?>
                            <?php else : ?>
                                <?php echo $homepage->about_desc_id; ?>
                            <?php endif; ?>

                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="my-5 mt-5">
    <div class="container">
        <h2 class="display-5 mb-5">
            <?php if ($this->session->userdata('language') == 'EN') : ?>
                News Updates
            <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                Berita Terkini
            <?php else : ?>
                Berita Terkini
            <?php endif; ?>
        </h2>
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
    </div>
</section>