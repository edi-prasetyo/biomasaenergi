<div class="col-md-7 mx-auto">
    <div class="card">
        <!-- card header  -->
        <div class="card-header p-4 bg-white">
            <h4 class="mb-0"><?php echo $title; ?></h4>
        </div>
        <!-- card body  -->
        <div class="card-body">

            <?php echo form_open('admin/customer/update/' . $customer->id, array('class' => 'needs-validation', 'novalidate' => 'novalidate')); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Nama Perusahaan <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="company" placeholder="Nama Perusahaan" value="<?php echo $customer->company; ?>" required>
                        <?php echo form_error('company', '<span class="text-danger">', '</span>'); ?>
                        <div class=" invalid-feedback">Nama Perusahaan harus di isi.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Nama PIC <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="fullname" placeholder="Nama PIC" value="<?php echo $customer->fullname; ?>" required>
                        <div class=" invalid-feedback">PIC harus di isi.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">No. Handphone / Whatsapp <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="whatsapp" placeholder="Nomor Handphone Atau Whatsapp" value="<?php echo $customer->whatsapp; ?>" required>
                        <?php echo form_error('phone', '<span class="text-danger">', '</span>'); ?>
                        <div class=" invalid-feedback">Harga Jual harus di isi.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Telepon Perusaahaan <small class="text-success">( Optional )</small></label>
                        <input class="form-control" type="text" name="phone" value="<?php echo $customer->phone; ?>" placeholder=" Telepon">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Email <small class="text-success">( Optional )</small></label>
                        <input class="form-control" type="text" name="email" placeholder="Email" value="<?php echo $customer->email; ?>">

                    </div>
                </div>

                <!-- Provinsi -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Provinsi</label>
                        <select class="form-control select2bs4" id='sel_province' name="province_id">
                            <option>-- Pilih Provinsi --</option>
                            <?php
                            foreach ($province as $province) {
                                echo "<option value='" . $province['id'] . "'>" . $province['province_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- Kota -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Kota</label>
                        <select class="form-control custom-select" id='sel_city' name="city_id">
                            <option>-- Pilih Kota --</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Kode Pos <small class="text-success">( Optional )</small></label>
                        <input class="form-control" type="text" name="postal_code" value="<?php echo $customer->postal_code; ?>" placeholder=" Kode Pos">

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Alamat <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="address" placeholder="Alamat Perusahaan" required><?php echo $customer->address; ?></textarea>
                        <div class=" invalid-feedback">Alamat harus di isi.</div>
                    </div>
                </div>

                <div class="col-md-6 my-3">
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Update Data</button>
                    </div>
                </div>
            </div>

            <?php echo form_close(); ?>


        </div>
    </div>
</div>

<!-- Script -->
<script src="<?php echo base_url('assets/template/web/vendor/jquery/jquery.min.js'); ?>"></script>

<script type='text/javascript'>
    // baseURL variable
    var baseURL = "<?php echo base_url(); ?>";

    $(document).ready(function() {

        // Provinsi change
        $('#sel_province').change(function() {
            var province = $(this).val();

            // AJAX request
            $.ajax({
                url: '<?= base_url() ?>admin/region/getCity',
                method: 'post',
                data: {
                    province: province
                },
                dataType: 'json',
                success: function(response) {

                    // Remove options 
                    $('#sel_kecamatan').find('option').not(':first').remove();
                    $('#sel_city').find('option').not(':first').remove();

                    // Add options
                    $.each(response, function(index, data) {
                        $('#sel_city').append('<option value="' + data['id'] + '">' + data['city_name'] + '</option>');
                    });
                }
            });
        });

    });
</script>