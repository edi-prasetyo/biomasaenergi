<style>
    table.print-friendly tr td,
    table.print-friendly tr th {
        page-break-inside: avoid;
    }

    @media print {
        body * {
            visibility: hidden;
        }

        #section-to-print,
        #section-to-print * {
            visibility: visible;
        }

        #section-to-print {
            position: relative;
            left: 0;
            top: 0;
            margin: 0mm;
            padding: 0mm;
            /* size: 210mm 297mm; */
        }

        .hidden-print {
            visibility: hidden;
        }

    }

    @page {
        size: auto;
        margin: 0mm;
        padding: 0mm;
        /* size: 210mm 297mm; */
    }
</style>
<div class="card">
    <div class="card-header bg-white d-flex justify-content-between">
        <h4 class="card-title my-auto"><?php echo $title; ?></h4>
        <!-- <a href="javascript:;" onclick="window.print()" class="btn btn-outline-secondary"><i class="feather-printer"></i> Print</a> -->

    </div>

    <?php
    if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
        unset($_SESSION['message']);
    }
    ?>

    <div class="card-body">
        <!-- <a href="<?php //echo base_url('admin/report/export'); 
                        ?>">Export ke Excel</a> -->
        <?php echo form_open('admin/report/filter'); ?>
        <div class="row">

            <div class="col-md-6 my-2">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="start_date" id="startDate" placeholder="Start Date" aria-label="StartDate" autocomplete="off">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    <input type="text" class="form-control" name="end_date" id="endDate" placeholder="End Date" aria-label="EndDate" autocomplete="off">
                </div>
            </div>
            <div class="col-md-3 my-2">
                <select class="form-select" name="customer_id" aria-label="Default select example">
                    <option value="">All</option>
                    <?php foreach ($customer as $customer) : ?>
                        <option value="<?php echo $customer->id; ?>"><?php echo $customer->company; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3 my-2">
                <button type="submit" class="btn btn-primary text-white">Filter</button>
            </div>
        </div>
        <?php echo form_close(); ?>
        <div id="section-to-print">
            <?php
            if ($start_date == null && $end_date == null && $company_name == null) : ?>
            <?php else : ?>
                <div class="alert alert-success">Data Penjualan dari tanggal <?php echo $start_date; ?> sampai <?php echo $end_date; ?> <?php echo $company_name; ?> </div>
            <?php endif; ?>


            <div class="table-responsive">
                <table class="table table-striped table-bordered print-friendly">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th width="7%">tanggal</th>
                            <th>Customer</th>
                            <th>Qty</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Profit</th>
                            <th width="3%">Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($report as $data) { ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo date("d/m/Y", strtotime($data->created_at)); ?></td>
                                <td><?php echo $data->company; ?></td>
                                <td><?php echo number_format($data->qty, 0, ",", "."); ?> </td>
                                <td>Rp <?php echo number_format($data->total_price_buy, 0, ",", "."); ?></td>
                                <td>Rp <?php echo number_format($data->total_price_sell, 0, ",", "."); ?></td>
                                <td>Rp <?php echo number_format($data->total_profit, 0, ",", "."); ?></td>
                                <td>
                                    <?php if ($data->payment_status == 'Paid') : ?>
                                        <div class="badge rounded-pill bg-success bg-opacity-50">Paid</div>
                                    <?php else : ?>
                                        <div class="badge rounded-pill bg-danger bg-opacity-50">Unpaid</div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php $no++;
                        }; ?>
                        <tr>
                            <th colspan="3" scope="row" class="text-end">Jumlah</th>
                            <td class="fw-bold"><?php echo number_format($total_unit, 0, ",", "."); ?> </td>
                            <td class="fw-bold">Rp. <?php echo number_format($total_pembelian, 0, ",", "."); ?></td>
                            <td class="fw-bold">Rp. <?php echo number_format($total_penjualan, 0, ",", "."); ?></td>
                            <td class="fw-bold">Rp. <?php echo number_format($total_profit, 0, ",", "."); ?></td>
                            <td></td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="card-footer bg-white p-0 m-0 pt-3 ps-5">
        <div class="pagination col-md-12 text-center">
            <?php if (isset($pagination)) {
                echo $pagination;
            } ?>
        </div>
    </div>
</div>