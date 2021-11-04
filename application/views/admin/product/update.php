<?php
if (isset($error_upload)) {
  echo '<div class="alert alert-warning">' . $error_upload . '</div>';
}


// Form Open
echo form_open_multipart('admin/product/update/' . $product->id, array('class' => 'needs-validation', 'novalidate' => 'novalidate'));
?>

<div class="row">
  <div class="col-md-8 mx-auto">
    <div class="card">
      <div class="card-header p-4 bg-white">
        <h4 class="mb-0"><?php echo $title; ?></h4>
      </div>
      <div class="card-body">

        <div class="row">

          <div class="col-md-3">
            <label>Ganti Gambar</label>
          </div>
          <div class="col-md-9 my-2">
            <div class="form-group">
              <input type="file" name="product_img"><br>
              <img src="<?php echo base_url('assets/img/product/' . $product->product_img); ?>" class="my-2">
              <div class="invalid-feedback">Silahkan Pilih Gambar.</div>
            </div>
          </div>

          <div class="col-md-3">
            <label>Nama Produk</label>
          </div>
          <div class="col-md-9 my-2">
            <div class="form-group form-group-lg">
              <input type="text" name="product_name" class="form-control" placeholder="Nama Produk" value="<?php echo $product->product_name; ?>" required>
              <div class="invalid-feedback">Silahkan masukan nama Produk.</div>
            </div>
          </div>

          <div class="col-md-3">
            <label>Spesifikasi</label>
          </div>
          <div class="col-md-9">
            <div class="form-group">
              <textarea name="spesification" class="form-control" placeholder="Spesifikasi Produk" required><?php echo $product->spesification; ?></textarea>
              <div class="invalid-feedback">Silahkan masukan Spesifikasi Produk.</div>
            </div>
          </div>

          <div class="col-md-3">
            <label>Deskripsi</label>
          </div>
          <div class="col-md-9 my-2">
            <div class="form-group">
              <textarea name="description" class="form-control" id="summernote" placeholder="Deskripsi Produk" required><?php echo $product->description; ?></textarea>
              <div class="invalid-feedback">Silahkan masukan Deskripsi Produk.</div>
            </div>
          </div>

          <div class="col-md-3">
            <label>Keyword (Untuk SEO google)</label>
          </div>
          <div class="col-md-9 my-2">
            <div class="form-group">
              <input type="text" name="product_keywords" class="form-control" value="<?php echo $product->product_keywords; ?>">
            </div>
          </div>

          <div class="col-md-3"></div>
          <div class="col-md-9">
            <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Simpan</button>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?php
//Form close
echo form_close();
?>