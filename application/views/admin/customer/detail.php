<div class="row mt-6">
    <div class="offset-xl-2 col-xl-8 offset-lg-1 col-lg-10 col-md-12
              col-12">
        <div class="row">
            <div class="col-12 mb-6">
                <!-- card  -->
                <div class="card">
                    <!-- card header  -->
                    <div class="card-header p-4 bg-white">
                        <h4 class="mb-0"><?php echo $title; ?></h4>
                    </div>
                    <!-- card body  -->
                    <div class="card-body">
                        <!-- row  -->
                        <div class="row">
                            <div class="col-xl-8 col-lg-6 col-md-12 col-12">
                                <div class="mb-2">
                                    <!-- content  -->

                                    <h3 class="mt-2 mb-3 fw-bold"><?php echo $customer->company; ?> </h3>
                                    <p><?php echo $customer->address; ?>,
                                        <?php echo $customer->city_name; ?>, <?php echo $customer->province_name; ?>, <?php echo $customer->postal_code; ?></p>
                                    <p class="mb-3 text-muted"><i class="feather-phone"></i> <?php echo $customer->whatsapp; ?> <i class="feather-mail ms-3"></i> <?php echo $customer->email; ?></p>
                                </div>
                            </div>
                            <!-- col  -->
                            <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                                <!-- content  -->
                                <div>
                                    <p class="text-muted mb-0"><b>PIC : </b><?php echo $customer->fullname; ?></p>
                                    <p class="mb-3 text-muted"><b>HP/WA :</b> <?php echo $customer->phone; ?></p>
                                    <a href="#" class="btn btn-outline-white text-success">
                                        <i class="fab fa-whatsapp"></i> Telepon Whatsapp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card footer  -->
                    <div class="card-footer bg-white">
                        <div class="d-md-flex justify-content-between
                        align-items-center">
                            <!-- text  -->

                            <div class="text-center text-md-start">

                                <a href="<?php echo base_url('admin/customer/update/' . $customer->id); ?>" class="btn btn-outline-white text-muted ms-2">Ubah
                                    Data</a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>