<?php
$id = $this->session->userdata('id');
$user = $this->user_model->user_detail($id);
$meta = $this->meta_model->get_meta();
?>

<div id="page-content-wrapper">
    <header class="py-3 mb-3 border-bottom bg-white">
        <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
            <a href="" class="ms-3 text-muted" id="menu-toggle"><i class="feather-menu fa-2x"></i>
            </a>

            <div class="d-flex align-items-center">
                <div class="w-100 me-3">

                </div>

                <div class="flex-shrink-0 dropdown me-3">
                    <a href="#" class="d-block link-dark text-decoration-none text-muted" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo base_url('assets/img/avatars/' . $user->user_image); ?>" alt="mdo" width="32" height="32" class="rounded-circle"> <b><?php echo $user->user_name; ?></b>
                    </a>
                    <ul class="dropdown-menu text-small shadow border-0 mt-3" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item p-2 text-muted" href="#"><i class="feather-user"></i> Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item p-2 text-muted" href="<?php echo base_url('auth/logout'); ?>"><i class="feather-log-out"></i> Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-3 me-3">