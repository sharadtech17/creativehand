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
									<li><a href="https://www.facebook.com" target="_blank"><i class="fa fa-phone"
												style="color: black;"></i>
											<?= $artistdata->numbervisibly == 1 ? $artistdata->number : '**********'; ?>
										</a></li>


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
			<!--=================== Related Product Section ===================-->
			<!-- <section class="related-product latest-picture heading-title  paira-margin-bottom-3">
				<div class="container">
					<div class="row">
						<div class="col-md-12 heading-title">
							<h2 class="text-capitalize margin-clear text-center"><span>Related products</span></h2>
						</div>
					</div>
				</div>
				<div class="margin-bottom-30">
					<div class="container">
						
						<div class="row">
							<ul class="social-li list-inline">
								<li class="list-group-item list-group-item-primary ">
									<a href="#Action" class="text-capitalize" data-toggle="tab">Action
								</li>
								<li class="list-group-item list-group-item-primary ">
									<a href="#description" class="text-capitalize" data-toggle="tab">Pointillism
								</li>
								<li class="list-group-item list-group-item-primary ">
									<a href="#description" class="text-capitalize" data-toggle="tab">color field
								</li>
								<li class="list-group-item list-group-item-primary ">
									<a href="#description" class="text-capitalize" data-toggle="tab">cubism
								</li>
								<li class="list-group-item list-group-item-primary ">
									<a href="#description" class="text-capitalize" data-toggle="tab">Actiimpressionismon
								</li>
							</ul>
							<div class="col-sm-2 col-md-2 col-xs-12 margin-top-30"  id="Action">
								<div class="product text-center" id="description">
									<div class="product-image position-r">
										<a href="#">
											<div class="" id="#Action"></div>
											<img src="<?=base_url()?>assets/images/product/product-5.jpg" alt=""
												class="img-responsive">
										</a>
									</div>
									<div class="product-hover">
										<h4 class="margin-clear">
											<a href="collection.html">Looking big eyes look</a>
										</h4>
										<div class="text-center prices">
											<h3 class="pull-left margin-right-5 del"><del><span
														class="money">$170.00</span></del></h3>
											<h3 class="pull-left margin-left-5"><span class="money">$120.00</span></h3>
										</div>
										<div class="paira-wish-compare-con wish-compare-view-cart">
											<a href="#" class="product-cart-con btn btn-success"><i
													class="fa fa-shopping-cart"></i></a>
											<a href="#paira-quick-view"
												class="paira-quick-view quick-view  btn btn-default"><i
													class="fa fa-search-plus"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-2 col-md-2 col-xs-12 margin-top-30">
								<div class="product text-center">
									<div class="product-image position-r">
										<a href="#">
											<div class="" id="#Action"></div>
											<img src="<?=base_url()?>assets/images/product/product-5.jpg" alt=""
												class="img-responsive">
										</a>
									</div>
									<div class="product-hover">
										<h4 class="margin-clear">
											<a href="collection.html">Looking big eyes look</a>
										</h4>
										<div class="text-center prices">
											<h3 class="pull-left margin-right-5 del"><del><span
														class="money">$170.00</span></del></h3>
											<h3 class="pull-left margin-left-5"><span class="money">$120.00</span></h3>
										</div>
										<div class="paira-wish-compare-con wish-compare-view-cart">
											<a href="#" class="product-cart-con btn btn-success"><i
													class="fa fa-shopping-cart"></i></a>
											<a href="#paira-quick-view"
												class="paira-quick-view quick-view  btn btn-default"><i
													class="fa fa-search-plus"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-2 col-md-2 col-xs-12 margin-top-30">
								<div class="product text-center">
									<div class="product-image position-r">
										<a href="#">
											<div class=""></div>
											<img src="<?=base_url()?>assets/images/product/product-6.jpg" alt=""
												class="img-responsive">
										</a>
									</div>
									<div class="product-sale"><span>Sale</span></div>
									<div class="product-stock-out"><span>Sold</span></div>
									<div class="product-hover">
										<h4 class="margin-clear"><a href="collection.html">Looking big eyes look</a>
										</h4>
										<div class="text-center prices">
											<h3 class="pull-left margin-right-5 del"><del><span
														class="money">$170.00</span></del></h3>
											<h3 class="pull-left margin-left-5"><span class="money">$120.00</span></h3>
										</div>
										<div class="paira-wish-compare-con wish-compare-view-cart">
											<a href="#" class="product-cart-con btn btn-success"><i
													class="fa fa-shopping-cart"></i></a>
											<a href="#paira-quick-view"
												class="paira-quick-view quick-view  btn btn-default"><i
													class="fa fa-search-plus"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-2 col-md-2 col-xs-12 margin-top-30">
								<div class="product text-center">
									<div class="product-image position-r">
										<a href="#">
											<div class=""></div>
											<img src="<?=base_url()?>assets/images/product/product-7.jpg" alt=""
												class="img-responsive">
										</a>
									</div>
									<div class="product-hover">
										<h4 class="margin-clear"><a href="collection.html">Looking big eyes look</a>
										</h4>
										<div class="text-center prices">
											<h3 class="pull-left margin-right-5 del"><del><span
														class="money">$170.00</span></del></h3>
											<h3 class="pull-left margin-left-5"><span class="money">$120.00</span></h3>
										</div>
										<div class="paira-wish-compare-con wish-compare-view-cart">
											<a href="#" class="product-cart-con btn btn-success"><i
													class="fa fa-shopping-cart"></i></a>
											<a href="#paira-quick-view"
												class="paira-quick-view quick-view  btn btn-default"><i
													class="fa fa-search-plus"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-2 col-md-2 col-xs-12 margin-top-30">
								<div class="product text-center">
									<div class="product-image position-r">
										<a href="#">
											<div class=""></div>
											<img src="<?=base_url()?>assets/images/product/product-7.jpg" alt=""
												class="img-responsive">
										</a>
									</div>
									<div class="product-hover">
										<h4 class="margin-clear"><a href="collection.html">Looking big eyes look</a>
										</h4>
										<div class="text-center prices">
											<h3 class="pull-left margin-right-5 del"><del><span
														class="money">$170.00</span></del></h3>
											<h3 class="pull-left margin-left-5"><span class="money">$120.00</span></h3>
										</div>
										<div class="paira-wish-compare-con wish-compare-view-cart">
											<a href="#" class="product-cart-con btn btn-success"><i
													class="fa fa-shopping-cart"></i></a>
											<a href="#paira-quick-view"
												class="paira-quick-view quick-view  btn btn-default"><i
													class="fa fa-search-plus"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-2 col-md-2 col-xs-12 margin-top-30">
								<div class="product text-center">
									<div class="product-image position-r">
										<a href="#">
											<div class=""></div>
											<img src="<?=base_url()?>assets/images/product/product-7.jpg" alt=""
												class="img-responsive">
										</a>
									</div>
									<div class="product-hover">
										<h4 class="margin-clear"><a href="collection.html">Looking big eyes look</a>
										</h4>
										<div class="text-center prices">
											<h3 class="pull-left margin-right-5 del"><del><span
														class="money">$170.00</span></del></h3>
											<h3 class="pull-left margin-left-5"><span class="money">$120.00</span></h3>
										</div>
										<div class="paira-wish-compare-con wish-compare-view-cart">
											<a href="#" class="product-cart-con btn btn-success"><i
													class="fa fa-shopping-cart"></i></a>
											<a href="#paira-quick-view"
												class="paira-quick-view quick-view  btn btn-default"><i
													class="fa fa-search-plus"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="product-container"></div>
				</div>
			</section> -->


			<section>

				<div class="container">
					<div class="row">
						<div class="col-md-12 heading-title">
							<h2 class="text-capitalize margin-clear text-center" style="padding-bottom: 60px;">
								<span>Arts</span>
							</h2>
						</div>

						<?php
							if (!empty($artdata)) {
							    $allSubcategories = [];

							    // Collect all unique subcategories
							    foreach ($artdata as $art) {
							        $subcategories = json_decode($art->subcategories, true);
							        $allSubcategories = array_merge($allSubcategories, $subcategories);
							    }

							    // Remove duplicates and sort the subcategories
							    $uniqueSubcategories = array_unique($allSubcategories);
							    sort($uniqueSubcategories);
							    ?>

							    <div align="center">
							        <button class="btn btn-default filter-button" data-filter="all">All</button>

							        <?php foreach ($uniqueSubcategories as $subcategory) : ?>
							            <button class="btn btn-default filter-button" data-filter="<?= str_replace(' ', '_', $subcategory) ?>"><?= $subcategory ?></button>
							        <?php endforeach; ?>
							    </div>

							<?php } ?>

						<br />


						<?php if (!empty($artdata)) : ?>
						    <?php foreach ($artdata as $art) : ?>
						        <?php
						        $subcategories = json_decode($art->subcategories, true);

						        // Remove spaces from individual subcategories
						        $cleanedSubcategories = array_map(function($subcategory) {
						            return str_replace(' ', '_', $subcategory);
						        }, $subcategories);

						        // Combine cleaned subcategories with spaces between them
						        $classValue = implode(' ', $cleanedSubcategories);
						        ?>
						        <div class="single-varients-product gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter <?= $classValue; ?>">
						            <a href="<?=base_url('art-details/'.$art->id)?>">
						                <img src="<?=base_url($art->mainimage)?>" class="img-responsive">
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