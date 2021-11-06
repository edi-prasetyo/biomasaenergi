<?php
$id = $this->session->userdata('id');
$user = $this->user_model->user_detail($id);
$meta = $this->meta_model->get_meta();
?>


<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <!-- Sidebar -->
    <div class="border-end pb-5" id="sidebar-wrapper">
        <div class="sidebar-heading text-transparent"> </div>
        <div class="py-4 px-3">
            <div class="media">
                <img src="<?php echo base_url('assets/img/avatars/' . $user->user_image); ?>" alt="..." width="65" class="mr-3 rounded-circle shadow-sm">
                <div class="media-body my-3">
                    <h5 class="m-0 text-muted"><?php echo $user->user_name; ?></h5>
                    <small class="font-weight-light mb-0 text-success"><i class="fas fa-circle text-success"></i> Online</small>
                </div>
            </div>
        </div>
        <p class="text-muted font-weight-bold text-uppercase px-3 small pb-2 mb-0"><b>Main</b></p>

        <ul class="nav flex-column  mb-0">

            <li class="nav-item">
                <a href="<?php echo base_url('admin/dashboard'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "dashboard") {
                                                                                            echo 'active';
                                                                                        } ?>">
                    <i class="feather-home  fa-fw"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="<?php echo base_url('admin/product'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "product") {
                                                                                        echo 'active';
                                                                                    } ?>">
                    <i class="feather-shopping-cart mr-3  fa-fw"></i>
                    Produk
                </a>
            </li>

            <li class="nav-item">
                <a href="<?php echo base_url('admin/transaction'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "transaction") {
                                                                                            echo 'active';
                                                                                        } ?>">
                    <i class="feather-credit-card mr-3  fa-fw"></i>
                    Transaksi
                </a>
            </li>
            <li class="nav-item disabled">
                <a href="<?php echo base_url('admin/report'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "report") {
                                                                                        echo 'active';
                                                                                    } ?>">
                    <i class="feather-pie-chart mr-3  fa-fw"></i>
                    Laporan
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('admin/customer'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "customer") {
                                                                                        echo 'active';
                                                                                    } ?>">
                    <i class="feather-users mr-3  fa-fw"></i>
                    Customer
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('admin/province'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "province") {
                                                                                        echo 'active';
                                                                                    } ?>">
                    <i class="feather-package mr-3  fa-fw"></i>
                    Data Kota
                </a>
            </li>

            <p class="text-muted font-weight-bold text-uppercase px-3 small py-2 mb-0"><b>Web Front</b></p>
            <li class="nav-item">
                <a href="<?php echo base_url('admin/berita'); ?>" class="nav-link disabled <?php if ($this->uri->segment(2) == "berita") {
                                                                                                echo 'active';
                                                                                            } ?>">
                    <i class="feather-rss mr-3  fa-fw"></i>
                    Berita
                </a>
                <a href="<?php echo base_url('admin/category'); ?>" class="nav-link disabled <?php if ($this->uri->segment(2) == "category") {
                                                                                                    echo 'active';
                                                                                                } ?>">
                    <i class="feather-tag mr-3  fa-fw"></i>
                    Kategori
                </a>
            </li>
            <p class="text-muted font-weight-bold text-uppercase px-3 small py-2 mb-0"><b>Pengaturan</b></p>

            <li class="nav-item">
                <a href="<?php echo base_url('admin/user'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "user") {
                                                                                    echo 'active';
                                                                                } ?>">
                    <i class="feather-user mr-3  fa-fw"></i>
                    User
                </a>
            </li>

            <li class="nav-item">
                <a href="<?php echo base_url('admin/meta'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "meta") {
                                                                                    echo 'active';
                                                                                } ?>">
                    <i class="feather-settings mr-3  fa-fw"></i>
                    Profile Web
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('admin/pengaturan'); ?>" class="nav-link <?php if ($this->uri->segment(2) == "meta") {
                                                                                            echo 'active';
                                                                                        } ?>">
                    <i class="feather-mail mr-3  fa-fw"></i>
                    Email Manajemen
                </a>
            </li>
        </ul>
    </div>
    <!-- End Sidebar -->