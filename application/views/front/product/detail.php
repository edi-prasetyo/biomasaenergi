<div class="container mb-3 my-5">
    <div class="col-md-10 mx-auto">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2>
                            <?php if ($this->session->userdata('language') == 'EN') : ?>
                                <?php echo $product->product_name_en; ?>
                            <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                                <?php echo $product->product_name; ?>
                            <?php else : ?>
                                <?php echo $product->product_name; ?>
                            <?php endif; ?>
                        </h2>
                    </div>
                    <img class="img-fluid" src="<?php echo base_url('assets/img/product/' . $product->product_img); ?>">
                    <div class="card-body">

                        <?php if ($this->session->userdata('language') == 'EN') : ?>
                            <?php echo $product->description_en; ?>
                        <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                            <?php echo $product->description; ?>
                        <?php else : ?>
                            <?php echo $product->description; ?>
                        <?php endif; ?>


                    </div>
                    <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                        <span><i class="bi-person"></i> <?php echo $product->user_name; ?></span>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>