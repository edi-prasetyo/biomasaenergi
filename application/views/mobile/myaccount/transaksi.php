<?php if ($this->session->userdata('id')) : ?>

  <nav class="site-header bg-white sticky-top py-1 shadow-sm">
    <div class="container py-2 d-flex justify-content-between align-items-center">
      <a style="text-decoration:none;" class="text-dark text-left" href="javascript:history.back()"><i style="font-size: 25px;" class="ri-arrow-left-line"></i></a>
      <span class="text-dark text-center font-weight-bold">
        Transaksi
      </span>
      <div style="color:transparent;"></div>
    </div>
  </nav>

  <div class="container ">
    <div class="list-group shadow-sm mb-5 mt-3">
      <?php
      foreach ($transaksi as $transaksi) : ?>
        <a href="<?php echo base_url('myaccount/detail_transaksi/' . $transaksi->id); ?>" class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?php echo $transaksi->nama_mobil; ?></h5>
            <small><?php if ($transaksi->status_bayar == "Pending") : ?>
                <div class="badge badge-warning badge-pill px-3"> <?php echo $transaksi->status_bayar; ?> </div>
              <?php elseif ($transaksi->status_bayar == "Process") : ?>
                <div class="badge badge-info badge-pill px-3"> <?php echo $transaksi->status_bayar; ?> </div>
              <?php elseif ($transaksi->status_bayar == "Cancel") : ?>
                <div class="badge badge-danger badge-pill px-3"> <?php echo $transaksi->status_bayar; ?> </div>
              <?php else : ?>
                <div class="badge badge-success badge-pill px-3"> <?php echo $transaksi->status_bayar; ?> </div>
              <?php endif; ?>
            </small>
          </div>
          <p class="mb-1">Rp. <?php
                              echo number_format($transaksi->total_harga, '0', ',', '.'); ?></p>
          <small><?php echo date('d/m/Y', strtotime($transaksi->date_created)); ?></small>
        </a>

      <?php
      endforeach; ?>



    </div>


    <div class="pagination col-md-12 text-center">
      <?php if (isset($pagination)) {
        echo $pagination;
      } ?>
    </div>
  </div>



<?php else : ?>

  <?php redirect('auth'); ?>

<?php endif; ?>