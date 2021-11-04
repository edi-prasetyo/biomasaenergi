<?php
$meta = $this->meta_model->get_meta();

// error_reporting(0);
// ini_set('display_errors', 0);
?>

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
<?php $log_lat = 1;?>
    
<iframe 
  width="100%" 
  height="170" 
  frameborder="0" 
  scrolling="no" 
  marginheight="0" 
  marginwidth="0" 
  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.0235865120403!2d106.65151711458817!3d-6.127528195563287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a02695aaccb09%3A0x61dee98159fa3fe5!2sSoekarno-Hatta%20International%20Airport!5e0!3m2!1sen!2sus!4v1629440694793!5m2!1sen!2sus"
 >
 </iframe>

    <br />

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <ul class="list-unstyled">
                        <li>
                            <i class="ri-map-pin-line"></i> <?php echo $meta->alamat; ?>
                        </li>
                        <li><i class="ri-phone-line"></i> <?php echo $meta->telepon; ?></li>
                        <li><i class="ri-mail-send-line"></i> <?php echo $meta->email; ?></li>

                    </ul>
                </div>
                <div class="col-md-7">
                    <?php echo $meta->map; ?>
                </div>
            </div>
        </div>
    </div>

</div>



<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.0235865120403!2d106.65151711458817!3d-6.127528195563287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a02695aaccb09%3A0x61dee98159fa3fe5!2sSoekarno-Hatta%20International%20Airport!5e0!3m2!1sen!2sus!4v1629440694793!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->