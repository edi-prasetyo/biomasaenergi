<?php
$id             = $this->session->userdata('id');
$user           = $this->user_model->user_detail($id);
$meta           = $this->meta_model->get_meta();
$menu           = $this->menu_model->get_menu();

?>


<nav class="navbar navbar-light bg-white  fixed-top navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="<?php echo base_url('assets/img/logo/' . $meta->logo) ?>" alt="image" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav5" aria-controls="navbarNav5" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav5">
      <ul class="navbar-nav">
        <?php foreach ($menu as $data) : ?>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url($data->url); ?>"> <?php echo $data->nama_menu_ind; ?> </a></li>
        <?php endforeach; ?>
      </ul>
      <ul class="navbar-nav justify-content-end ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Docs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Log In</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-dark ms-md-3" href="#">Button</a>
        </li>
      </ul>

    </div>
  </div>
</nav>






























<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm" id="top">
  <div class="container">
    <a class="navbar-brand" href="<?php echo base_url() ?>"></a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">

      <ul class="navbar-nav ml-auto">

        <?php if ($this->session->userdata('email')) { ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ti-user"></i> <?php echo $user->user_name; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo base_url('myaccount') ?>"> <i class="ri-user-line"></i> Profile</a>
              <a class="dropdown-item" href="<?php echo base_url('myaccount/update') ?>"> <i class="ri-draft-line"></i> Ubah Profile</a>
              <a class="dropdown-item" href="<?php echo base_url('myaccount/ubah_password') ?>"> <i class="ri-lock-password-line"></i> Ubah Password</a>
              <a class="dropdown-item" href="<?php echo base_url('myaccount/transaksi') ?>"> <i class="ri-file-list-3-line"></i> Transaksi</a>

              <div class="dropdown-divider"></div>
              <?php if ($user->role_id == 1 || $user->role_id == 2) : ?>
                <a class="dropdown-item" href="<?php echo base_url('admin/dashboard'); ?>"> <i class="ri-dashboard-3-line"></i> Panel Admin</a>
              <?php endif; ?>
              <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>"> <i class="ri-shut-down-line"></i> Logout</a>
            </div>
          </li>
        <?php } else { ?>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('auth') ?>"><i class="bi-box-arrow-in-right" style="font-size: 1.5rem;"></i> Login</a></li>
          <span class=" border-left mr-3"></span>
          <!-- <li class="nav-item"><a class="nav-link" href="<?php echo base_url('auth/register') ?>"> Daftar</a></li> -->
          <a class="btn btn-info text-white my-auto" href="<?php echo base_url('transaksi'); ?>"> Cek Pesanan</a>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>