<?php $meta = $this->meta_model->get_meta(); ?>
<nav class="site-header sticky-top py-1" style="background-color: transparent;position:absolute">
	<div class="container py-2 d-flex justify-content-between align-items-center">
		<a class="text-white text-center" href="#" aria-label="Product">
		</a>
	</div>
</nav>


<section class="boot-elemant-bg py-md-5 py-4 hero" style="height: 130px;background-color:rgba(0, 80, 184)">
	<div class="container position-relative py-md-5 py-0">
		<div class="row">
			<div class="container" style="position: absolute;">
				<div class="row">
					<div class="col-md-7">
						<div class="text-center text-white mt-3" style="font-size:x-large;">
							<p><i class="ri-roadster-line"></i> <span class="font-weight-bold"><?php echo $meta->title; ?></span></p>
						</div>
					</div>
					<div class="col-md-5">

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="elemant-bg-overlay black"></div>
	<svg class="hero-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
		<path d="M0 10 0 0 A 90 59, 0, 0, 0, 100 0 L 100 10 Z"></path>
	</svg>
</section>




<!-- <section class="boot-elemant-bg py-md-5 py-4 hero" style="background-color:darkblue;height: 150px; background-image: linear-gradient(rgba(0, 116, 131,.5), rgba(0,0,0,.9)), url('<?php //foreach ($galery_featured as $data) : 
																																														?> <?php // echo base_url('assets/img/galery/' . //$data->galery_img) 
																																															?> <?php //endforeach; 
																																																?>');">
	<div class="container position-relative py-md-5 py-0">
		<div class="row">
			<div class="container" style="position: absolute;">
				<div class="row">
					<div class="col-md-7">
						<div class="text-left text-white">
							<p>Rental Mobil.</p>
						</div>
					</div>
					<div class="col-md-5">

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="elemant-bg-overlay black"></div>
	<svg class="hero-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none">
		<path d="M0 10 0 0 A 90 59, 0, 0, 0, 100 0 L 100 10 Z"></path>
	</svg>
</section> -->

<div class="container productcat">
	<div class="row my-3">
		<div class="col-6">
			<a href="<?php echo base_url('rental-mobil'); ?>" class="text-dark small font-weight-bold text-decoration-none">
				<div class="card shadow-sm text-center border-0">
					<div class="card-body">
						<p class="h3 m-0 text-info"><i class="ri-car-line"></i></p>
						Rental Car
					</div>
				</div>
			</a>
		</div>

		<div class="col-6">
			<a href="<?php echo base_url('berita'); ?>" class="text-dark small font-weight-bold text-decoration-none">
				<div class="card shadow-sm text-center border-0">
					<div class="card-body">
						<p class="h3 m-0 text-danger"><i class="ri-newspaper-line"></i></p>
						Berita

					</div>
				</div>
			</a>
		</div>

		<div class="col-6 mt-3">
			<a href="<?php echo base_url('contact'); ?>" class="text-dark small font-weight-bold text-decoration-none">
				<div class="card shadow-sm text-center border-0">
					<div class="card-body">
						<p class="h3 m-0 text-success"><i class="ri-mail-send-line"></i></p>
						Contact Us

					</div>
				</div>
			</a>
		</div>

		<div class="col-6 mt-3">
			<a href="<?php echo base_url('transaksi'); ?>" class="text-dark small font-weight-bold text-decoration-none">
				<div class="card shadow-sm text-center border-0">
					<div class="card-body">
						<p class="h3 m-0 text-primary"><i class="ri-file-paper-line"></i></p>
						Cek Order

					</div>
				</div>
			</a>
		</div>

	</div>
</div>

<!-- Most sales -->

<!-- <section class="bg-white">

	<div class="p-3 title d-flex align-items-center">
		<h5 class="m-0 pt-3">Promo</h5>
		<a class="pt-3 font-weight-bold ml-auto" href="#">Detail Promo <i class="feather-chevrons-right"></i></a>
	</div>

	<div class="offer-slider bg-white border-bottom">

		<div class="cat-item px-1 py-3">
			<a class="bg-white d-block text-center shadow" href="trending.html">
				<img src="assets/img/promo/pro1.jpg" class="img-fluid rounded">
			</a>
		</div>
		<div class="cat-item px-1 py-3">
			<a class="bg-white d-block text-center shadow" href="trending.html">
				<img src="assets/img/promo/pro2.jpg" class="img-fluid rounded">
			</a>
		</div>
		<div class="cat-item px-1 py-3">
			<a class="bg-white d-block text-center shadow" href="trending.html">
				<img src="assets/img/promo/pro3.jpg" class="img-fluid rounded">
			</a>
		</div>
		<div class="cat-item px-1 py-3">
			<a class="bg-white d-block text-center shadow" href="trending.html">
				<img src="assets/img/promo/pro4.jpg" class="img-fluid rounded">
			</a>
		</div>
	</div>

</section> -->


<!-- Most sales -->
<div class="p-3 title d-flex align-items-center">
	<h5 class="m-0 pt-3">Berita Terbaru</h5>
	<a class="pt-3 font-weight-bold ml-auto" href="<?php echo base_url('berita'); ?>">Lihat Semua <i class="feather-chevrons-right"></i></a>
</div>


<div class="most_sale px-3 pb-3 mb-5">
	<div class="row">

		<?php foreach ($berita as $data) : ?>

			<div class="col-12 pt-2">
				<a href="<?php echo base_url('berita/detail/' . $data->berita_slug); ?>" class="text-muted text-decoration-none">
					<div class="d-flex align-items-center list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
						<div class="list-card-image">
							<img src="<?php echo base_url('assets/img/artikel/' . $data->berita_gambar); ?>" class="img-fluid item-img w-100">
						</div>
						<div class="p-3 position-relative">
							<div class="list-card-body">
								<h6 class="mb-1"><?php echo substr($data->berita_title, 0, 30); ?>..</h6>
								<p class="text-gray mb-3"><?php echo date('F j, Y', strtotime($data->date_created)); ?></p>
							</div>
							<div class="list-card-badge">
								<span class="badge badge-success"><?php echo $data->category_name; ?></span>
							</div>
						</div>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>