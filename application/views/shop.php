<!--=================== Main Content Container ===================-->
<main class="collection-page">
	<section class="breadcrumb-container paira-margin-bottom-3">
		<div class=" breadcrumb"
			style="background: linear-gradient(#070606b3, rgba(30, 23, 23, 0)) ,url(<?= base_url() ?>assets/images/banner/home-banner-big.jpg); ">
			<div class="container-fluid padding-fix">

				<ul class="list-inline text-center" style="padding-top: 100px; padding-bottom: 100px;">
					<h1 class="" style="color:white;">Shop</h1>
					<li><a href="<?= base_url() ?>" style="font-size: larger;color: white;">Home <i
								class="fa fa-angle-right"></i></a>
					</li>
					<li class="" style="color:#c66b15;">Shop</li>
				</ul>
			</div>
		</div>
	</section>
	<section class="latest-picture paira-margin-bottom-3">
		<div class="margin-bottom-40">
			<div class="container ">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-xs-12">
						<div class="col-sm-12 col-md-12">
							<h6 class="p-1 border-bottom">Filter By</h6>
							<div id="" class=" sidebar-expanded d-none ">
								<ul class="list-group">
									<li class="list-group-item ">
										<div class="single-widget learts-mb-40">
											<div class="widget-search">
												<form method="GET" action="<?php echo base_url('ShopController'); ?>">
												<div class="row">
													<div class="col-md-11">
														<input type="text" name="query" class="form-control" placeholder="Search">
													</div>
													<div class="col-md-1">
														<button type="submit" class="btn"><i class="fa fa-search"></i></button>
													</div>
												</div>
												</form>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-12 col-md-12 col-xs-12" style="margin-top:30px ;">
						<?php foreach ($shoplist as $shop): ?>
							<div class="col-sm-4 col-md-4 col-xs-12" style="margin-bottom:30px ;">
								<div class="product text-center">
									<div class="product-image position-r">
										<a href="<?=base_url().'view-shop-detail/'.$shop->id?>">
											<div class=""></div>
											<img src="<?=base_url().$shop->mainimage?>" alt=""
												class="Shop img-responsive" style="height:250px;width:300px;object-fit: cover;">
											<div class="row">
												<div class=" col-lg-12">
													<h4 class="col-md-9 text-left">
													<?= $shop->title ?>
													</h4>
													<h6 class="col-md-3 text-center"
														style="font-size: smaller; display: flex;">
														4/5<span class="fa fa-star checked"
															style="color: orange;"></span>
													</h6>
												</div>
												<div class="row">
													<h6 class="col-lg-7" style="color: #023020;">
													<?= $shop->categoryname ?>
													</h6>
													<div class=" prices col-lg-5 ">
														<h6 class=""><span class="money">
																₹<?= $shop->price ?></span>
														</h6>
													</div>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="product-container"></div> -->
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 margin-top-30 text-center">
					<ul class="list-inline pagination margin-clear">
						<li><a href="#" class="next-page"><i class="fa fa-caret-left"></i></a></li>
						<li class="active font-bold"><span>1</span></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#" class="prev-page"><i class="fa fa-caret-right"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<style>
		.div-Shop {
			justify-content: center;
			align-items: center;
			display: flex;
			padding-top: 20%;
		}

		.Shop {
			transition: transform 0.4s;
			width: 20px;
			height: 20px;
			margin: 0 auto;
			background-color: rgb(173, 173, 237);
			border-radius: 10px;
			border: 1px solid black;
		}

		.Shop:hover {
			transform: scale(0.9);
		}
	</style>
</main>