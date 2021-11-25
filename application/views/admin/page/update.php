<div class="card">
    <div class="card-header">
        <?php echo $title; ?>
    </div>
    <div class="card-body">
        <?php
        //Form Open
        echo form_open('admin/page/update/' . $page->id,  array('class' => 'needs-validation', 'novalidate' => 'novalidate'));
        ?>

        <div class="form-group row mb-3">
            <label class="col-lg-3 col-form-label">Judul Halaman (ID)</label>

            <div class="col-lg-9">
                <input type="text" class="form-control" name="page_title" value="<?php echo $page->page_title; ?>" required>
                <div class="invalid-feedback">Judul Harus Di isi</div>
            </div>
        </div>
        <div class="form-group row mb-3">
            <label class="col-lg-3 col-form-label">Page Title (EN)</label>

            <div class="col-lg-9">
                <input type="text" class="form-control" name="page_title_en" value="<?php echo $page->page_title_en; ?>" required>
                <div class="invalid-feedback">Title Field must be Fill</div>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-lg-3 col-form-label">Deskripsi Halaman (ID)<span class="text-danger">*</span>
            </label>
            <div class="col-lg-9">
                <textarea class="form-control" id="summernote" name="page_desc" required><?php echo $page->page_desc; ?></textarea>
                <div class="invalid-feedback">Deskripsi halaman harus di isi</div>
            </div>
        </div>
        <div class="form-group row mb-3">
            <label class="col-lg-3 col-form-label">Page Description (EN) <span class="text-danger">*</span>
            </label>
            <div class="col-lg-9">
                <textarea class="form-control" id="summernote2" name="page_desc_en" required><?php echo $page->page_desc_en; ?></textarea>
                <div class="invalid-feedback">Page Description must be fill</div>
            </div>
        </div>

        <div class="form-group row mb-3">
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