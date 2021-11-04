<nav class="site-header bg-transparent sticky-top py-1" style="position: absolute;">
   <div class="container py-2 d-flex justify-content-between align-items-center">
      <a style="text-decoration:none;" class="text-white text-left" href="javascript:history.back()"><i style="font-size: 25px;" class="ri-arrow-left-line"></i></a>
      <span class="text-dark text-center font-weight-bold">

      </span>
      <div style="color:transparent;"></div>
   </div>
</nav>


<section class="boot-elemant-bg py-md-5 py-4 hero" style="height: 200px;background-color:rgba(0, 80, 184)">
   <div class="container position-relative py-md-5 py-0">
      <div class="row">
         <div class="container" style="position: absolute;">

            <div class="text-center text-white mt-3">
               <div class="col-4 mx-auto">
                  <div class="img-profile">
                     <img src="<?php echo base_url('assets/img/avatars/' . $user->user_image); ?>">
                  </div>
               </div>
               <h6 class="mb-1 font-weight-bold"><?php echo $user->user_name; ?> <i class="feather-check-circle text-success"></i></h6>

            </div>
         </div>
      </div>
   </div>
   <div class="elemant-bg-overlay black"></div>
   <svg class="hero-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
      <path d="M0 10 0 0 A 90 59, 0, 0, 0, 100 0 L 100 10 Z"></path>
   </svg>
</section>

<?php if ($this->session->userdata('id')) : ?>
   <div class="container mb-3 my-3 mb-5 pb-3">

      <div class="p-3 osahan-profile">
         <div class="card bg-white rounded shadow-sm border-0 profilecat">
            <div class="card-body">
               <ul class="list-unstyled">
                  <li class="text-muted"><i class="ri-mail-open-line"></i> <?php echo $user->email; ?></li>
                  <li class="text-muted"><i class="ri-phone-line"></i> <?php echo $user->user_phone; ?></li>
                  <li class="text-muted"><i class="ri-map-pin-line"></i> <?php echo $user->user_address; ?></li>
               </ul>

            </div>
         </div>
         <!-- profile-details -->
         <div class="bg-white rounded shadow-sm mt-3 profile-details">
            <h6 class="pl-3 pt-2">Akun</h6>
            <a href="<?php echo base_url('myaccount/update'); ?>" class="d-flex w-100 align-items-center border-bottom px-3 py-3 text-decoration-none">
               <div class="left mr-3">
                  <h6 class="m-0 text-muted"><i class="ri-user-line mr-2"></i> Ubah Profile</h6>
               </div>
               <div class="right ml-auto">
                  <h6 class="font-weight-bold m-0"><i class="ri-arrow-right-s-line"></i></h6>
               </div>
            </a>

            <a href="<?php echo base_url('myaccount/transaksi'); ?>" class="d-flex w-100 align-items-center border-bottom px-3 py-3 text-decoration-none">
               <div class="left mr-3">
                  <h6 class="m-0 text-muted"><i class="ri-file-paper-2-line mr-2"></i> Transaksi</h6>
               </div>
               <div class="right ml-auto">
                  <h6 class="font-weight-bold m-0"><i class="ri-arrow-right-s-line"></i></h6>
               </div>
            </a>
         </div>

         <div class="bg-white rounded shadow-sm mt-3 profile-details">
            <h6 class="pl-3 pt-2">Keamanan</h6>

            <a href="<?php echo base_url('myaccount/update'); ?>" class="d-flex w-100 align-items-center border-bottom px-3 py-3 text-decoration-none">
               <div class="left mr-3">
                  <h6 class="m-0 text-muted"><i class="ri-lock-2-line mr-2"></i> Ubah Password</h6>
               </div>
               <div class="right ml-auto">
                  <h6 class="font-weight-bold m-0"><i class="ri-arrow-right-s-line"></i></h6>
               </div>
            </a>
         </div>

         <div class="bg-white rounded shadow-sm mt-3 profile-details">
            <h6 class="pl-3 pt-2">Tentang</h6>

            <a href="<?php echo base_url('myaccount/update'); ?>" class="d-flex w-100 align-items-center border-bottom px-3 py-3 text-decoration-none">
               <div class="left mr-3">
                  <h6 class="m-0 text-muted"><i class="ri-contacts-book-2-line mr-2"></i> Contact Us</h6>
               </div>
               <div class="right ml-auto">
                  <h6 class="font-weight-bold m-0"><i class="ri-arrow-right-s-line"></i></h6>
               </div>
            </a>
            <a href="<?php echo base_url('myaccount/update'); ?>" class="d-flex w-100 align-items-center border-bottom px-3 py-3 text-decoration-none">
               <div class="left mr-3">
                  <h6 class="m-0 text-muted"><i class="ri-file-list-line mr-2"></i> Syarat dan Ketentuan</h6>
               </div>
               <div class="right ml-auto">
                  <h6 class="font-weight-bold m-0"><i class="ri-arrow-right-s-line"></i></h6>
               </div>
            </a>
            <a href="<?php echo base_url('myaccount/update'); ?>" class="d-flex w-100 align-items-center border-bottom px-3 py-3 text-decoration-none">
               <div class="left mr-3">
                  <h6 class="m-0 text-muted"><i class="ri-shield-check-line mr-2"></i> Kebijakan Privasi</h6>
               </div>
               <div class="right ml-auto">
                  <h6 class="font-weight-bold m-0"><i class="ri-arrow-right-s-line"></i></h6>
               </div>
            </a>
            <a href="<?php echo base_url('myaccount/update'); ?>" class="d-flex w-100 align-items-center border-bottom px-3 py-3 text-decoration-none">
               <div class="left mr-3">
                  <h6 class="m-0 text-muted"><i class="ri-question-line mr-2"></i> Pusat Bantuan</h6>
               </div>
               <div class="right ml-auto">
                  <h6 class="font-weight-bold m-0"><i class="ri-arrow-right-s-line"></i></h6>
               </div>
            </a>

         </div>

         <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-danger btn-block my-2">Keluar</a>


      </div>


   </div>


<?php else : ?>

   <?php redirect('auth'); ?>


<?php endif; ?>