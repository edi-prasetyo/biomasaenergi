<div class="row">
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header">
                <?php echo $title; ?>
            </div>
            <div class="card-body">
                <?php
                //Form Open
                echo form_open('admin/layanan/create/', array('class' => 'needs-validation', 'novalidate' => 'novalidate'));
                ?>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Nama Layanan</label>

                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="layanan_name" placeholder="Nama Layanan" required>
                        <div class="invalid-feedback">Silahkan masukan nama Layanan.</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Icon Layanan</label>

                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="layanan_icon" placeholder="Code Icon" required>
                        <div class="invalid-feedback">Silahkan masukan code Icon Layanan.</div>
                    </div>
                </div>

                <!-- Color Picker -->
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Warna Icon</label>
                    <div class="col-lg-9">
                        <div class="input-group my-colorpicker2">
                            <input type="text" class="form-control" name="layanan_color">

                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-square"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Deskripsi Layanan <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-9">
                        <textarea class="form-control" name="layanan_desc" placeholder="Deskripsi Halaman" required></textarea>
                        <div class="invalid-feedback">Silahkan masukan Deskripsi Layanan.</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3"></label>
                    <div class="col-lg-9">
                        <input type="submit" class="btn btn-primary" name="submit" value="Simpan Data">
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
                Lihat Code Icon <a href="https://remixicon.com/"> Disini</a><br>
                Cara Penggunaan : <br><br>
                <span class="alert alert-success"> &lt;i class="ri-home-2-line"&gt;&lt;/i&gt; </span><br><br>

                Preview : <br><br>
                <span class="alert alert-info"><i class="ri-home-2-line"></i> </span>
            </div>

        </div>
    </div>
</div>