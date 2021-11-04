<div class="col-md-7 mx-auto">
    <div class="card">
        <div class="card-header bg-white">
            <?php echo $title; ?>
        </div>
        <div class="card-body">
            <?php
            echo form_open('admin/pengaturan/update/' . $pengaturan->id);
            ?>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Pengaturan <span class="text-danger">*</span>
                </label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="name" value="<?php echo $pengaturan->name; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Protocol <span class="text-danger">*</span>
                </label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="protocol" value="<?php echo $pengaturan->protocol; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">smtp_host <span class="text-danger">*</span>
                </label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="smtp_host" value="<?php echo $pengaturan->smtp_host; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">smtp_port <span class="text-danger">*</span>
                </label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="smtp_port" value="<?php echo $pengaturan->smtp_port; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">smtp_user <span class="text-danger">*</span>
                </label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="smtp_user" value="<?php echo $pengaturan->smtp_user; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">smtp_pass <span class="text-danger">*</span>
                </label>
                <div class="col-lg-9">
                    <input type="password" class="form-control" name="smtp_pass" value="<?php echo $pengaturan->smtp_pass; ?>">
                </div>
            </div>



            <div class="form-group row">
                <div class="col-lg-3"></div>
                <div class="col-lg-9">
                    <button type="submit" class="btn btn-info btn-block">
                        Update Email
                    </button>
                </div>
            </div>

            <?php echo form_close() ?>
        </div>
    </div>
</div>