<div class="breadcrumb-default">
    <div class="container my-5">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"><i class="ti ti-home"></i> Home</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php foreach ($video as $video) : ?>
            <div class="col-md-4">
                <figure class="card">
                    <a href="" data-bs-toggle="modal" data-bs-target="#View<?php echo $video->id ?>">
                        <div class="img-frame">
                            <?php echo $video->video_embed; ?>
                        </div>

                        <div class="card-body text-center">
                            <h5 class="title"><?php echo substr($video->video_title, 0, 25); ?></h5>
                        </div>
                    </a>
                </figure>
            </div> <!-- col // -->

            <div class="modal fade" id="View<?php echo $video->id ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><?php echo $video->video_title; ?> </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php echo $video->video_embed; ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>

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