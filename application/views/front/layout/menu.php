<?php
$id             = $this->session->userdata('id');
$user           = $this->user_model->user_detail($id);
$meta           = $this->meta_model->get_meta();
$menu           = $this->menu_model->get_menu();

?>


<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow-sm" aria-label="Main navigation">
  <div class="container">
    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img style="width:250px;" src="<?php echo $meta->link; ?>/assets/img/logo/<?php echo $meta->logo; ?>"></a>
    <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php foreach ($menu as $menu) : ?>
          <li class="nav-item">
            <?php if ($this->session->userdata('language') == 'EN') : ?>
              <a class="nav-link" aria-current="page" href="<?php echo base_url() . $menu->url; ?>"><?php echo $menu->name_en; ?></a>
            <?php elseif ($this->session->userdata('language') == 'ID') : ?>
              <a class="nav-link" aria-current="page" href="<?php echo base_url() . $menu->url; ?>"><?php echo $menu->name_id; ?></a>
            <?php else : ?>
              <a class="nav-link" aria-current="page" href="<?php echo base_url() . $menu->url; ?>"><?php echo $menu->name_id; ?></a>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>

        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?php echo base_url('contact'); ?>">
            <?php if ($this->session->userdata('language') == 'EN') : ?>
              contact Us
            <?php elseif ($this->session->userdata('language') == 'ID') : ?>
              Hubungi Kami
            <?php else : ?>
              Hubungi Kami
            <?php endif; ?>
          </a>
        </li>


      </ul>

      <ul class="nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php if ($this->session->userdata('language') == 'EN') : ?>
              <i class="flag-icon flag-icon-us mr-2 border"></i> <?php echo $this->session->userdata('language', 'EN'); ?> <i class="feather-chevron-down"></i>
            <?php elseif ($this->session->userdata('language') == 'ID') : ?>
              <i class="flag-icon flag-icon-id mr-2 border"></i> <?php echo $this->session->userdata('language', 'ID'); ?> <i class="feather-chevron-down"></i>
            <?php else : ?>
              <i class="flag-icon flag-icon-id mr-2 border"></i> ID <i class="feather-chevron-down"></i>
            <?php endif; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdown01">
            <li><a class="dropdown-item" href="<?php echo base_url('language/translate/ID'); ?>">Indonesia</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('language/translate/EN'); ?>">English</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary text-white" href="https://api.whatsapp.com/send?phone=<?php echo $meta->whatsapp; ?>">
            <?php if ($this->session->userdata('language') == 'EN') : ?>
              Get Quote
            <?php elseif ($this->session->userdata('language') == 'ID') : ?>
              Minta Penawaran
            <?php else : ?>
              Minta Penawaran
            <?php endif; ?>
          </a>
        </li>



      </ul>
    </div>
  </div>
</nav>