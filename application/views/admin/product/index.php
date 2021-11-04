<?php
if ($this->session->flashdata('message')) {
  echo $this->session->flashdata('message');
  unset($_SESSION['message']);
}
?>

<div class="card">
  <div class="card-header d-flex flex-row align-items-center justify-content-between bg-white">
    <h4 class="mb-0"><?php echo $title; ?></h4>
    <a href="<?php echo base_url('admin/product/create') ?>" title="Tambah Product baru" class="btn btn-primary text-white"><i class="fa fa-plus"></i> Tambah Produk</a>

  </div>

  <div class="table-responsive">
    <table class="table table-flush">
      <thead>
        <tr>
          <th width="5%">No</th>
          <th width="5%">img</th>
          <th>Nama Produk</th>
          <th width="25%">Action</th>
        </tr>
      </thead>
      <tbody>

        <?php $i = 1;
        foreach ($product as $data) { ?>

          <tr>
            <td><?php echo $i ?></td>
            <td><img src="<?php echo base_url('assets/img/product/' . $data->product_img) ?>" width="90" class="img img-fluid"></td>
            <td><?php echo $data->product_name; ?></td>
            <td>
              <a href="<?php echo base_url('admin/product/update/' . $data->id) ?>" title="Edit Mobil" class="btn btn-primary btn-sm text-white"><i class="fa fa-pencil"></i> Edit</a>
              <?php
              //link Delete
              include('delete.php');
              ?>
            </td>
          </tr>

        <?php $i++;
        } ?>

      </tbody>
    </table>
  </div>
</div>