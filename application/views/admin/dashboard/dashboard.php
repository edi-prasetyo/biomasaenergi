<div class="row">
    <div class="col-md-12 mb-3">
        <a href="<?php echo base_url('admin/transaction/create'); ?>">
            <div class="card border-0 shadow-sm bg-primary">
                <div class="card-body d-flex w-100 justify-content-between">
                    <div class="col">
                        <h4 class="card-title mb-0 fw-bold my-auto text-white">Tambah Penjualan</h4>
                    </div>
                    <div class="icon icon-shape bg-warning text-white rounded-circle">
                        <i class="feather-plus"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <div class="card mb-4 mb-xl-0 border-0 shadow-sm">
            <div class="card-body d-flex w-100 justify-content-between">
                <div class="col">
                    <h5 class="card-title text-muted mb-0">Total Penjualan</h5>
                    <span class="h4 font-weight-bold mb-0"><?php echo count($transaction); ?></span>
                </div>
                <div class="icon icon-shape bg-success text-white rounded-circle">
                    <i class="feather-shopping-cart"></i>
                </div>

            </div>
            <div class="card-footer">
                <a href="<?php echo base_url('admin/transaction'); ?>" class="mb-0 text-muted text-sm">
                    <span class="text-nowrap">Lihat Data</span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-4 mb-xl-0 border-0 shadow-sm">
            <div class="card-body d-flex w-100 justify-content-between">
                <div class="col">
                    <h5 class="card-title text-muted mb-0">Pembelian</h5>
                    <span class="h4 font-weight-bold mb-0">Rp. <?php echo number_format($pembelian, 0, ",", "."); ?></span>
                </div>
                <div class="icon icon-shape bg-danger text-white rounded-circle">
                    <i class="feather-download"></i>
                </div>
            </div>
            <div class="card-footer">
                <a href="" class="mb-0 text-muted text-sm">
                    <span class="text-nowrap">Lihat Data</span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card  mb-4 mb-xl-0 border-0 shadow-sm">
            <div class="card-body d-flex w-100 justify-content-between">

                <div class="col">
                    <h5 class="card-title text-muted mb-0">Penjualan</h5>
                    <span class="h4 font-weight-bold mb-0">Rp. <?php echo number_format($penjualan, 0, ",", "."); ?></span>
                </div>

                <div class="icon icon-shape bg-warning text-white rounded-circle">
                    <i class="feather-upload"></i>
                </div>

            </div>
            <div class="card-footer">
                <a href="" class="mb-0 text-muted text-sm">
                    <span class="text-nowrap">Lihat Data</span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-4 mb-xl-0 border-0 shadow-sm">
            <div class="card-body d-flex w-100 justify-content-between">

                <div class="col">
                    <h5 class="card-title text-muted mb-0">Profit</h5>
                    <span class="h4 font-weight-bold mb-0">Rp. <?php echo number_format($profit, 0, ",", "."); ?></span>
                </div>

                <div class="icon icon-shape bg-info text-white rounded-circle">
                    <i class="feather-pie-chart"></i>
                </div>


            </div>
            <div class="card-footer">
                <a href="" class="mb-0 text-muted text-sm">
                    <span class="text-nowrap">Lihat Data</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card my-3 shadow-sm">
    <div class="card-header bg-white">
        Data Penjualan Per Bulan
    </div>
    <div class="card-body">
        <canvas id="myChart" width="400" height="100"></canvas>
    </div>
</div>


<script src="<?php echo base_url('assets/template/web/vendor/chart/chart.min.js'); ?>"></script>

<?php
$alltransaction         = $this->transaction_model->get_chart();

foreach ($alltransaction as $data) {
    $tanggal[] =  date('M-Y', strtotime($data->created_at));
    $order[] = (float) $data->total;
    // var_dump($order);
    // die;
}
?>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($tanggal); ?>,
            datasets: [{
                label: 'Total Sales ',
                data: <?php echo json_encode($order); ?>,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    beginAtZero: true,
                    callback: function(value) {
                        if (value % 1 === 0) {
                            return value;
                        }
                    }
                }],
            }
        }
    });
</script>