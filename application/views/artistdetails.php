<?php
$artistdata = $this->db->select('*')->get_where('artist', ['id' => $artistid])->row();
$socialAccountsJson = $artistdata->socialaccount;

// Convert JSON string to an array
$socialAccountsArray = json_decode($socialAccountsJson, true);
?>
			<section class="breadcrumb-container paira-margin-bottom-3">
				<div class=" breadcrumb" style="
				 background: linear-gradient(#070606b3, rgba(30, 23, 23, 0)) 
				 ,url(<?=base_url()?>assets/images/banner/home-banner-big.jpg); ">
					<div class="container-fluid padding-fix">

						<ul class="list-inline text-center" style="padding-top: 100px; padding-bottom: 100px;">
							<h1 class="" style="color:white;">Artist Details</h1>
							<li><a href="<?=base_url()?>" style="font-size: larger;color: white;">Home <i
										class="fa fa-angle-right"></i></a></li>
							<li class="" style="color:#c66b15;">Artist</li>
						</ul>
					</div>
				</div>
			</section>



		<!--=================== Main Content Container ===================-->
		<main class="product-page">
			<!--=================== Breadcrumb Section ===================-->

			<section class="single-product paira-margin-bottom-3">

				<div class="container">
					<div class="row">

						<div class="col-md-5 col-sm-12 col-xs-12">
							<div class="paira-product single-varients-product">
								<div class="position-r pull-left full-width margin-bottom-40">
									<div class="single-product-image paira-single-product-image">
										<img src="<?=base_url().$artistdata->profileimage?>"  onerror="this.onerror=null; this.src='<?=base_url()?>artistassets/altuser.jpg'"  alt=""
											class="paira-product-image img-responsive">
									</div>
									<div class="single-product-container"></div>
								</div>

							</div>
						</div>
						<div class="col-md-7 col-sm-12 col-xs-12">
							<div class="product-detles">
								<ul class="nav nav-tabs single-product-tabs product-tabs text-center">
									<li class="active col-lg-6">
										<h1 class="text-left  
										margin-clear"><?=$artistdata->name?></h1>

									</li>
									<li>
										<button class="text-right btn btn-primary btn-lg text-capitalize 
										"><?=$artistdata->category?></button>
									</li>
								</ul>
							</div>
							<div class="product-detles">
								<ul class="nav nav-tabs single-product-tabs product-tabs text-center">
									<li class="active col-lg-6">
										<h6 class="text-left  margin-bottom-15 
										margin-clear">Overall Rating :
											<i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star-o"></i><i
												class="fa fa-star-o"></i>
											3/5 (<i
											class="fa fa-users"></i> 223)
										</h6>

										<h5 class="text-left  margin-bottom-15 
										margin-clear">Rate Artist :
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
										</h5>

									</li>
									<!-- <li>
										<button class="text-right btn btn-primary btn-lg text-capitalize 
										margin-bottom-20">3D Artist</button>
									</li> -->
								</ul>
							</div>
							<!--=================== tab content Section ===================-->
							<div class="tabs margin-bottom-30">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs single-product-tabs product-tabs text-center">
									<li class="active"><a href="#description" class="text-capitalize"
											data-toggle="tab">Description</a></li>

								</ul>
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane active margin-top-20" id="description">
										<p class="rale-light margin-bottom-0"><?=$artistdata->description?></p>										
									</div>

								</div>
							</div>

							<div class="sicoal-share-widget margin-top-10  full-width pull-left">
								<label class=" pull-left">Category :</label>
								<ul class="social-li list-inline">
									<li><a href="https://www.facebook.com" target="_blank"><i class="fa fa-image"
												style="color: black;"></i>
											<?=$artistdata->category?>
										</a></li>


								</ul>
							</div>

							<div class="sicoal-share-widget margin-top-10  full-width pull-left">
								<label class=" pull-left">Artist :</label>
								<ul class="social-li list-inline">
									<li><a href="https://www.facebook.com" target="_blank">
											<?=$artistdata->name?>
										</a></li>
									<li><a href="#" target="_blank"><i class="fa fa-phone"
												style="color: black;"></i>
											<?= $artistdata->numbervisibly == 1 ? $artistdata->number : '**********'; ?>
										</a>
									</li>
									<li><a href="#" target="_blank"><i class="fa fa-whatsapp"
												style="color: black;"></i>
											<?= $artistdata->wpnumbervisibly == 1 ? $artistdata->wpnumber : '**********'; ?>
										</a>
									</li>

								</ul>
							</div>
							<div class="sicoal-share-widget margin-top-10 full-width pull-left">
								<label class="pull-left">Follow :</label>
								<ul class="social-li list-inline">
										<li><a href="<?= $socialAccountsArray[0] ?>" target="_blank"><i class="fa fa-facebook font-size-18"></i></a></li>
										<li><a href="<?= $socialAccountsArray[1] ?>" target="_blank"><i class="fa fa-instagram font-size-18"></i></a></li>
										<li><a href="<?= $socialAccountsArray[2] ?>" target="_blank"><i class="fa fa-twitter font-size-18"></i></a></li>
										<li><a href="<?= $socialAccountsArray[3] ?>" target="_blank"><i class="fa fa-pinterest font-size-18"></i></a></li>
										<li><a href="<?= $socialAccountsArray[4] ?>" target="_blank"><i class="fa fa-linkedin font-size-18"></i></a></li>
										<li><a href="<?= $socialAccountsArray[5] ?>" target="_blank"><i class="fa fa-youtube font-size-18"></i></a></li>
									
								</ul>
							</div>

							<div class="sicoal-share-widget margin-top-10  full-width pull-left">

								<label class=" pull-left">Share :</label>
								<ul class="social-li list-inline">
									<li><a href="https://www.facebook.com" target="_blank" ><i
												class="fa fa-facebook font-size-18"></i></a></li>
									<li><a href="https://www.google.com" target="_blank"><i
												class="fa fa-instagram font-size-18"></i></a></li>
									<li><a href="https://twitter.com" target="_blank"><i
												class="fa fa-twitter font-size-18" ></i></a></li>
									<li><a href="https://www.linkedin.com" target="_blank"><i
												class="fa fa-whatsapp font-size-18" ></i></a></li>

									<li><a href="https://www.linkedin.com" target="_blank"><i
												class="fa fa-linkedin font-size-18" ></i></a>
									</li>
									<li><a href="https://www.linkedin.com" target="_blank"><i
												class="fa fa-telegram font-size-18" ></i></a></li>
								</ul>
							</div>

							<div class="sicoal-share-widget margin-top-10  full-width pull-left">
								<h4 class="list-group full-width text-capitalize margin-bottom-15 
								margin-clear">Expertise</h4>
								<ul class="social-li list-inline">
                                    <?php
                                    if($artistdata->skills != null){
										$skillsArray = explode(",", $artistdata->skills);
                                    }else{
                                    	$skillsArray =array();
                                    }
									foreach ($skillsArray as $skill) {
									    echo '<li class="list-group-item list-group-item-primary" style="margin-right: 4px">'.$skill.'</li>';
									}
									?>
                                </ul>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section>
				<div class="container">
					<div class="row">
						<div class="col-md-12 heading-title">
							<h2 class="text-capitalize margin-clear text-center" style="padding-bottom: 60px;">
								<span>Arts</span>
							</h2>
						</div>
						<?php if (!empty($artdata)) : ?>
						    <?php foreach ($artdata as $art) : ?>
						        <div class="single-varients-product gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter">
						            <a href="#">
						                <img src="<?=base_url($art->mainimage)?>" class="img-responsive" style="width: 350px;height:300px;object-fit: cover;">
						                <h4 class="text-center"><?=$art->title?></h4>
						                <h6 class="text-center"><?=$art->shortdescription?></h6>
						            </a>
						        </div>
						    <?php endforeach; ?>
						<?php endif; ?>
					</div>
					<style>
						.gallery-title {
							font-size: 36px;
							color: black;
							text-align: center;
							font-weight: 500;
							margin-bottom: 70px;
						}

						.gallery-title:after {
							content: "";
							position: absolute;
							width: 22.5%;
							left: 38.5%;
							height: 45px;
							border-bottom: 1px solid #5e5e5e;
						}

						.filter-button {
							font-size: 18px;
							border: 1px solid black;
							border-radius: 5px;
							text-align: center;
							color: darkblue;
							margin-bottom: 30px;

						}

						.filter-button:hover {
							font-size: 18px;
							border: 1px solid black;
							border-radius: 5px;
							text-align: center;
							color: #ffffff;
							background-color: black;

						}

						.btn-default:active .filter-button:active {
							background-color: #FFA500;
							color: white;
						}

						.port-image {
							width: 100%;
						}

						.gallery_product {
							margin-bottom: 30px;
						}

						/*img {
							box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.1);
							border-radius: 5px;
						}*/
					</style>
					<script>
						$(document).ready(function () {

							$(".filter-button").click(function () {
								var value = $(this).attr('data-filter');

								if (value == "all") {

									$('.filter').show('1000');
								}
								else {

									$(".filter").not('.' + value).hide('3000');
									$('.filter').filter('.' + value).show('3000');

								}
							});

							if ($(".filter-button").removeClass("active")) {
								$(this).removeClass("active");
							}
							$(this).addClass("active");

						});
					</script>
				</div>


			</section>

		</main>