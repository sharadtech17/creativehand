<section class="breadcrumb-container paira-margin-bottom-3">
	<div class=" breadcrumb"
		style="background: linear-gradient(#070606b3, rgba(30, 23, 23, 0)) ,url(<?= base_url() ?>assets/images/banner/home-banner-big.jpg); ">
		<div class="container-fluid padding-fix">

			<ul class="list-inline text-center" style="padding-top: 100px; padding-bottom: 100px;">
				<h1 class="" style="color:white;">Painting Arts</h1>
				<li><a href="<?= base_url() ?>" style="font-size: larger;color: white;">Home <i
							class="fa fa-angle-right"></i></a>
				</li>
				<li class="" style="color:#c66b15;">Painting Arts</li>
			</ul>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-xs-12">
				<div class="col-sm-12 col-md-12">
					<h6 class="p-1 border-bottom">Filter By</h6>
					<div id="" class=" sidebar-expanded d-none ">
						<ul class="list-group">
							<li class="list-group-item ">
								<div class="single-widget learts-mb-40">
									<div class="widget-search">
										<form method="GET" action="<?php echo base_url('HandArtController/viewPainting'); ?>">
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
				<div class="col-sm-12 col-md-12 col-xs-12 rowfix">
					<?php if (!empty($paintinglist)) : ?>
						<?php foreach ($paintinglist as $painting) : 
							$categories=json_decode($painting->subcategories);
							?>
							<div style="margin-bottom: 40px;" class="single-varients-product gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
								<a href="<?=base_url().'painting-details/'.$painting->id?>">
								<img src="<?=base_url().$painting->mainimage?>" class="img-responsive" style="height:350px;object-fit: cover;">
								</a>
								<div class="row">
									<h6 class="col-md-9 text-left" style="font-size: large;">
										<?=$painting->title?>
									</h6>
									<h6 class="col-md-3 text-center"
										style="font-size: smaller; display: flex;">
										4/5<span class="fa fa-star checked" style="color: orange;"></span>
									</h6>
									<h5 class="col-md-7"> <i class="fa fa-user"></i>
									<?=$painting->artistname?></h5>
									<h6 class="col-md-5"><?=$painting->categoriesname?></h6>
									<!-- <h6>Artist</h6> -->
									</h5>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
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