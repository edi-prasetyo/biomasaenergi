<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <?php echo $title; ?>
            </div>
            <div class="card-body">
                <?php
                //Form Open
                echo form_open('admin/layanan/update/' . $layanan->id, array('class' => 'needs-validation', 'novalidate' => 'novalidate'));
                ?>

                <div class="form-group row mb-3">
                    <label class="col-lg-3 col-form-label">Nama Layanan (ID )</label>

                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="layanan_name_id" value="<?php echo $layanan->layanan_name_id; ?>" required>
                        <div class="invalid-feedback">Silahkan masukan nama Layanan.</div>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-lg-3 col-form-label">Service Name (EN )</label>

                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="layanan_name_en" value="<?php echo $layanan->layanan_name_en; ?>" required>
                        <div class="invalid-feedback">Silahkan masukan nama Layanan.</div>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-lg-3 col-form-label">Icon Layanan</label>

                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="layanan_icon" value='<?php echo $layanan->layanan_icon; ?>' required>
                        <div class="invalid-feedback">Silahkan masukan code Icon Layanan.</div>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-lg-3 col-form-label">Deskripsi Layanan (ID)<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9">
                        <textarea class="form-control" name="layanan_desc_id" required><?php echo $layanan->layanan_desc_id; ?></textarea>
                        <div class="invalid-feedback">Silahkan masukan Deskripsi Layanan.</div>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-lg-3 col-form-label">Service Description (EN)<span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9">
                        <textarea class="form-control" name="layanan_desc_en" required><?php echo $layanan->layanan_desc_en; ?></textarea>
                        <div class="invalid-feedback">Silahkan masukan Deskripsi Layanan.</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3"></label>
                    <div class="col-lg-9">
                        <input type="submit" class="btn btn-primary" name="submit" value="Update Data">
                    </div>
                </div>


                <?php
                //Form Close
                echo form_close();
                ?>

            </div>
        </div>
    </div>
    <div class="col-md-4">

        <div class="card">
            <div class="card-header">
                Code Icon
            </div>
            <div class="card-body">
                <h4>Remixicon</h4>
                Lihat Code Icon <a href="https://fontawesome.com/"> Disini</a><br>
                Cara Penggunaan : <br><br>
                <span class="alert alert-success"> &lt;i class="fas fa-home"&gt;&lt;/i&gt; </span><br><br>

                Preview : <br><br>
                <span class="alert alert-info"><i class="ri-home-2-line"></i> </span>
            </div>

        </div>
    </div>
</div>