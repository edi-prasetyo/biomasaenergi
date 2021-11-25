<div class="col-md-7 mx-auto my-5">
    <?php
    if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
        unset($_SESSION['message']);
    }
    ?>

    <?php echo form_open('admin/transaction/update/' . $transaction->id, array('class' => 'needs-validation', 'novalidate' => 'novalidate')); ?>
    <div class="card my-3">
        <!-- card header  -->
        <div class="card-header p-4 bg-white d-flex justify-content-between">
            <h4 class="mb-0">Customer <?php echo $transaction->company; ?></h4>
            <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/customer/create'); ?>">Add Cusromer</a>
        </div>
        <!-- card body  -->
        <div class="card-body">
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Nama Perusahaan <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="company" value="<?php echo $transaction->company; ?>" id="company" readonly>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Nomor Telepon <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="phone" value="<?php echo $transaction->phone; ?>" readonly>
                        <div class="invalid-feedback">Data Customer Harus Di isi.</div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Nama PIC <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="fullname" value="<?php echo $transaction->fullname; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Email <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="email" value="<?php echo $transaction->email; ?>" readonly>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Alamat </label>
                        <textarea class="form-control" type="text" name="address" readonly><?php echo $transaction->address; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <!-- card header  -->
        <div class="card-header p-4 bg-white">
            <h4 class="mb-0">Produk yang di beli</h4>


        </div>
        <!-- card body  -->
        <div class="card-body">


            <input class="form-control" type="hidden" name="customer_id" readonly>
            <input class="form-control" type="hidden" name="whatsapp" readonly>
            <input class="form-control" type="hidden" name="province_name" readonly>
            <input class="form-control" type="hidden" name="city_name" readonly>
            <input class="form-control" type="hidden" name="postal_code" readonly>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Nama Produk <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="product_name" value="<?php echo $transaction->product_name; ?>" readonly>
                        <div class="invalid-feedback">Data Produk Harus Di isi.</div>
                    </div>
                </div>


                <input class="form-control" type="hidden" name="product_id" value="<?php echo $transaction->product_id; ?>">
                <input class="form-control" type="hidden" name="product_spesification" value="<?php echo $transaction->product_spesification; ?>">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Quantity <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="qty" placeholder="Quantity" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="<?php echo $transaction->qty; ?>" required>
                        <div class="invalid-feedback">Quantity harus di isi.</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Harga Beli <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="price_buy" placeholder="Harga Beli" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="<?php echo $transaction->price_buy; ?>" required>
                        <div class="invalid-feedback">Harga Beli harus di isi.</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Harga Jual <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="price_sell" placeholder="Harga Jual" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" value="<?php echo $transaction->price_sell; ?>" required>
                        <div class="invalid-feedback">Harga Jual harus di isi.</div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Pembayaran<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="payment" value="<?php echo $transaction->payment; ?>" readonly>
                        <div class="invalid-feedback">Data Produk Harus Di isi.</div>
                    </div>
                </div>

                <!-- <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Pembayaran <span class="text-danger">*</span></label>
                        <select class="form-select" name="payment" aria-label="Default select example" required>
                            <option value="">-Pilih Pembayaran-</option>
                            <option value="transfer">Transfer</option>
                            <option value="7">7 Hari</option>
                            <option value="14">14 Hari</option>
                        </select>
                        <div class="invalid-feedback">Pilih Pembayaran.</div>
                    </div>
                </div> -->

                <div class="col-md-6 my-3">
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo form_close(); ?>

</div>


<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>

            <?php echo form_open('admin/customer/add', array('class' => 'needs-validation', 'novalidate' => 'novalidate')); ?>

            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Nama Perusahaan <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="company" placeholder="Nama Perusahaan" value="<?php echo set_value('company'); ?>" required>
                            <?php echo form_error('company', '<span class="text-danger">', '</span>'); ?>
                            <div class=" invalid-feedback">Nama Perusahaan harus di isi.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Nama PIC <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="fullname" placeholder="Nama PIC" value="<?php echo set_value('fullname'); ?>" required>
                            <div class=" invalid-feedback">PIC harus di isi.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">No. HP / Whatsapp <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="phone" placeholder="Nomor HP Atau Whatsapp" value="<?php echo set_value('phone'); ?>" required>
                            <?php echo form_error('phone', '<span class="text-danger">', '</span>'); ?>
                            <div class=" invalid-feedback">Harga Jual harus di isi.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Telepon <small class="text-success">( Optional )</small></label>
                            <input class="form-control" type="text" name="office_number" value="<?php echo set_value('office_number'); ?>" placeholder=" Telepon">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Email <small class="text-success">( Optional )</small></label>
                            <input class="form-control" type="text" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Alamat <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="address" placeholder="Alamat Perusahaan" required><?php echo set_value('address'); ?></textarea>
                            <div class=" invalid-feedback">Alamat harus di isi.</div>
                        </div>
                    </div>


                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>



    <script type="text/javascript">
        function tandaPemisahTitik(b) {
            var _minus = false;
            if (b < 0) _minus = true;
            b = b.toString();
            b = b.replace(".", "");
            b = b.replace("-", "");
            c = "";
            panjang = b.length;
            j = 0;
            for (i = panjang; i > 0; i--) {
                j = j + 1;
                if (((j % 3) == 1) && (j != 1)) {
                    c = b.substr(i - 1, 1) + "." + c;
                } else {
                    c = b.substr(i - 1, 1) + c;
                }
            }
            if (_minus) c = "-" + c;
            return c;
        }

        function numbersonly(ini, e) {
            if (e.keyCode >= 49) {
                if (e.keyCode <= 57) {
                    a = ini.value.toString().replace(".", "");
                    b = a.replace(/[^\d]/g, "");
                    b = (b == "0") ? String.fromCharCode(e.keyCode) : b + String.fromCharCode(e.keyCode);
                    ini.value = tandaPemisahTitik(b);
                    return false;
                } else if (e.keyCode <= 105) {
                    if (e.keyCode >= 96) {
                        //e.keycode = e.keycode - 47;
                        a = ini.value.toString().replace(".", "");
                        b = a.replace(/[^\d]/g, "");
                        b = (b == "0") ? String.fromCharCode(e.keyCode - 48) : b + String.fromCharCode(e.keyCode - 48);
                        ini.value = tandaPemisahTitik(b);
                        //alert(e.keycode);
                        return false;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else if (e.keyCode == 48) {
                a = ini.value.replace(".", "") + String.fromCharCode(e.keyCode);
                b = a.replace(/[^\d]/g, "");
                if (parseFloat(b) != 0) {
                    ini.value = tandaPemisahTitik(b);
                    return false;
                } else {
                    return false;
                }
            } else if (e.keyCode == 95) {
                a = ini.value.replace(".", "") + String.fromCharCode(e.keyCode - 48);
                b = a.replace(/[^\d]/g, "");
                if (parseFloat(b) != 0) {
                    ini.value = tandaPemisahTitik(b);
                    return false;
                } else {
                    return false;
                }
            } else if (e.keyCode == 8 || e.keycode == 46) {
                a = ini.value.replace(".", "");
                b = a.replace(/[^\d]/g, "");
                b = b.substr(0, b.length - 1);
                if (tandaPemisahTitik(b) != "") {
                    ini.value = tandaPemisahTitik(b);
                } else {
                    ini.value = "";
                }

                return false;
            } else if (e.keyCode == 9) {
                return true;
            } else if (e.keyCode == 17) {
                return true;
            } else {
                //alert (e.keyCode);
                return false;
            }

        }
    </script>