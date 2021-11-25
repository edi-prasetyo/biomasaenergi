<?php
$meta = $this->meta_model->get_meta();
$berita  = $this->berita_model->berita_footer();
$menu      = $this->menu_model->get_menu();
$page      = $this->page_model->get_page();
$homepage  = $this->homepage_model->get_homepage();
?>
<footer class="bg-white mt-auto">
    <div class="bg-primary py-md-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-light"><span style="font-size:35px;font-weight:700;">
                        <?php if ($this->session->userdata('language') == 'EN') : ?>
                            Need help ? Contact us
                        <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                            Butuh Bantuan ? Hubungi Kami
                        <?php else : ?>
                            Butuh Bantuan ? Hubungi Kami
                        <?php endif; ?>

                    </span></div>
                <div class="col-md-4 text-light"><span style="font-size:30px;font-weight:700;"><i class="fab fa-whatsapp"></i> <?php echo $meta->whatsapp; ?></span></div>
            </div>
        </div>
    </div>
    <div class="container pt-4 pt-md-5 pb-md-5 border-top">
        <div class="row">

            <div class="col-12 col-md-3">
                <h4 class="fw-bold">Contact</h4>

                <i class="fa fa-phone"></i> <?php echo $meta->telepon ?><br>
                <i class="far fa-envelope"></i> <?php echo $meta->email ?>

            </div>


            <div class="col-10 col-md footer">
                <h4 class="fw-bold">Menu</h4>
                <ul class="list-unstyled text-small">
                    <?php foreach ($menu as $menu) : ?>
                        <li> <i class="far fa-circle small"></i> <a class="text-muted" href="<?php echo base_url() . $menu->url; ?>">
                                <?php if ($this->session->userdata('language') == 'EN') : ?>
                                    <?php echo $menu->name_en; ?>
                                <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                                    <?php echo $menu->name_id; ?>
                                <?php else : ?>
                                    <?php echo $menu->name_id; ?>
                                <?php endif; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    <li> <i class="far fa-circle small"></i> <a class="text-muted" href="<?php echo base_url('contact') ?>">
                            <?php if ($this->session->userdata('language') == 'EN') : ?>
                                Contact Us
                            <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                                Hubungi Kami
                            <?php else : ?>
                                Hubungi Kami
                            <?php endif; ?>
                        </a></li>
                </ul>
            </div>

            <div class="col-6 col-md-4">
                <h4 class="fw-bold"><?php echo $meta->title; ?></h4>
                <?php if ($this->session->userdata('language') == 'EN') : ?>
                    <?php echo $meta->description_en; ?>
                <?php elseif ($this->session->userdata('language') == 'ID') : ?>
                    <?php echo $meta->description; ?>
                <?php else : ?>
                    <?php echo $meta->description; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <div class="credit border-top py-3">
        <div class="container">
            <div class="credit bg-white text-muted py-md-3">Copyright &copy; <?php echo date('Y') ?> - <?php echo $meta->title ?> - <?php echo $meta->tagline ?></div>
        </div>
    </div>
</footer>



<!-- Load javascript Jquery -->
<script src="<?php echo base_url() ?>assets/template/web/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/web/vendor/popper/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/web/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/web/vendor/offcanvas/offcanvas.js" type="text/javascript"></script>

<!-- Color Picker JS -->


<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>


</body>

</html>