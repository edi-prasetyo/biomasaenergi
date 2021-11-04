<?php
if (isset($error_upload)) {
  echo '<div class="alert alert-warning">' . $error_upload . '</div>';
}


// Form Open
echo form_open_multipart('admin/product/create', array('class' => 'needs-validation', 'novalidate' => 'novalidate'));
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
            <label>Upload Gambar</label>
          </div>
          <div class="col-md-9 my-2">
            <div class="form-group">
              <input type="file" name="product_img" required>
              <div class="invalid-feedback">Silahkan Pilih Gambar.</div>
            </div>
          </div>

          <div class="col-md-3">
            <label>Nama Produk</label>
          </div>
          <div class="col-md-9 my-2">
            <div class="form-group form-group-lg">
              <input type="text" name="product_name" class="form-control" placeholder="Nama Produk" value="<?php echo set_value('product_name') ?>" required>
              <div class="invalid-feedback">Silahkan masukan nama Produk.</div>
            </div>
          </div>
          <div class="col-md-3">
            <label>Spesifikasi</label>
          </div>
          <div class="col-md-9">
            <div class="form-group">
              <textarea name="spesification" class="form-control" placeholder="Spesifikasi Produk" required><?php echo set_value('spesification') ?></textarea>
              <div class="invalid-feedback">Silahkan masukan Spesifikasi Produk.</div>
            </div>
          </div>

          <div class="col-md-3">
            <label>Deskripsi</label>
          </div>
          <div class="col-md-9 my-2">
            <div class="form-group">
              <textarea name="description" class="form-control" id="summernote" placeholder="Deskripsi Produk" required><?php echo set_value('description') ?></textarea>
              <div class="invalid-feedback">Silahkan masukan Deskripsi Produk.</div>
            </div>
          </div>

          <div class="col-md-3">
            <label>Keyword (Untuk SEO google)</label>
          </div>
          <div class="col-md-9 my-2">
            <div class="form-group">
              <input type="text" name="product_keywords" class="form-control" placeholder="Keywords Produk">
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