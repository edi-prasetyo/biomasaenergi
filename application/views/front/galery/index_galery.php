<div class="breadcrumb-default">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"><i class="ti ti-home"></i> Home</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ul>
    </div>
</div>

<div class="container">
    
            
        <h1><?php echo $title;?></h1>
        <div class="row">
                <?php foreach ($galery as $galery) : ?>
                    <div class="col-md-4">
                        <figure class="card">
                        <a href="" data-toggle="modal" data-target="#View<?php echo $galery->id ?>">
                                <img class="card-img-top" src="<?php echo base_url('assets/img/galery/'. $galery->galery_img); ?>">
                            

                            <div class="card-body text-center">                           
                                <!-- <h5 class="title"><?php echo substr($galery->galery_title, 0, 25); ?></h5>    -->
                            </div> 
                            </a>                                                     
                        </figure>
                    </div> <!-- col // -->

                    <div class="modal fade" id="View<?php echo $galery->id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title"> </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-window-close"></i></span></button>
            </div>
            <div class="modal-body">
                <img class="img-fluid" src="<?php echo base_url('assets/img/galery/' .$galery->galery_img); ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
                    
                            
                <?php endforeach; ?>

                <div class="pagination col-md-12 text-center">
                <?php if (isset($pagination)) {
                    echo $pagination;
                } ?>
                </div>
    </div>
</div>



      

        


  




