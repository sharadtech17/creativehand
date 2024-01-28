<section class="breadcrumb-container paira-margin-bottom-3">
	<div class=" breadcrumb"
		style="background: linear-gradient(#070606b3, rgba(30, 23, 23, 0)) ,url(<?= base_url() ?>assets/images/banner/home-banner-big.jpg); ">
		<div class="container-fluid padding-fix">

			<ul class="list-inline text-center" style="padding-top: 100px; padding-bottom: 100px;">
				<h1 class="" style="color:white;">Shop Details</h1>
				<li><a href="<?= base_url() ?>" style="font-size: larger;color: white;">Home <i
							class="fa fa-angle-right"></i></a>
				</li>
				<li class="" style="color:#c66b15;">Shop Details</li>
			</ul>
		</div>
	</div>
</section>
<main class="product-page">
	<!--=================== Product Section ===================-->
	<section class="single-product paira-margin-bottom-3">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="paira-product single-varients-product">
                        <div class="position-r pull-left full-width margin-bottom-40">
                            <div class="single-product-image paira-single-product-image">
                                <img src="<?=base_url().$shoplist->mainimage?>" alt=""
                                    class="paira-product-image img-responsive">
                            </div>
                            <div class="single-product-container"></div>
                        </div>
                        <div class=" pull-left small-verient-product">
                            <div class="col-md-12">
                                <div style="display:flex ;gap: 2px; justify-content: space-evenly;margin-top: 20px;">
                                <?php
                                    $galleryimage_arr=json_decode($shoplist->galleryimage);
                                    if (!empty($galleryimage_arr)) {
                                        foreach ($galleryimage_arr as $value) {
                                            ?>
                                            <div>
                                                <a href="#" data-image="assets/images/product/product-big-1.jpg">
                                                    <img src="<?=base_url().$value?>" alt="product-14" class="img-responsive center-block" />
                                                </a>
                                            </div>
                                        <?php
                                        }
                                    }
                                ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <div class="product-detles">
                        <h1 class="full-width text-capitalize margin-bottom-15 margin-clear"><?= $shoplist->title ?></h1>
                        <div class="full-width pull-left margin-bottom-15">
                            <h3 class="margin-left-5 pull-left margin-top-0 margin-bottom-0">₹<?= $shoplist->price ?></h3>
                        </div>
                        <div class="pull-left full-width margin-bottom-15">
                            <label class="margin-bottom-10 pull-left full-width">Size :<span
                                    style="font-size: small;"><?= $shoplist->size ?><span></span></label>
                        </div>
                        <div class=" sicoal-share-widget margin-top-10  full-width pull-left">
                            <!-- <label class="pull-left ">Arts :</label> -->
                            <ul class="social-li list-inline">
                        <li> <h4 class="list-group full-width text-capitalize margin-bottom-15 
                            margin-clear">Tag:</h4></li>

                                <li class="list-group-item list-group-item-primary "><?= $shoplist->tags ?></li>
                            </ul>
                        </div>
                        <div class="sicoal-share-widget margin-top-10  full-width pull-left">
                            <label class=" pull-left">Category :</label>
                            <ul class="social-li list-inline">
                                <li><a href="#">
                                <?php $shoplist->categoryname?>
                                    </a></li>
                            </ul>
                        </div>

                        <div class="sicoal-share-widget margin-top-10  full-width pull-left">
                            <label class=" pull-left">Artist :</label>
                            <ul class="social-li list-inline">
                                <li><a href="#">
                                    <?= $shoplist->name ?>
                                    </a></li>
                                <li><a href="#"><i class="fa fa-phone"
                                            style="color: black;"></i>
                                            <?= $shoplist->number ?>
                                    </a>
								</li>
                            </ul>
							<a href="<?= base_url().'addToCart/'.$shoplist->price.'/'.$shoplist->shop_id?>" class="product-cart-con btn
                             btn-primary btn-lg text-capitalize margin-bottom-30">Add To Cart</a>
                        </div>
                    </div>
                    <!--=================== tab content Section ===================-->
                    <div class="tabs margin-bottom-30">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs single-product-tabs product-tabs text-center">
                            <li class="active"><a href="#description" class="text-capitalize"
                                    data-toggle="tab">Description</a></li>
                            <li><a href="#shippingreturns" data-toggle="tab" class="text-capitalize">Artist
                                    Details</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active margin-top-20" id="description">
                                    <?= $shoplist->art_desc ?>
                            </div>
                            <div class="tab-pane margin-top-20" id="shippingreturns">
                                <?= $shoplist->artist_desc ?>
                            </div>
                        </div>
                    </div>
                    <div class="tabs margin-bottom-30">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs single-product-tabs product-tabs text-center">
                            <li class="active"><a href="#description" class="text-capitalize"
                                    data-toggle="tab">Ratings & Reviews</a></li>

                        </ul>
                        <div>
                            <div class="">
                                <br>
                                <!-- <h>Star Rating</h6> -->
                                <i class="fa fa-star" style="color: #c66b15;"></i>
                                <i class="fa fa-star" style="color: #c66b15;"></i>
                                <i class="fa fa-star" style="color: #c66b15;"></i>
                                <i class="fa fa-star" style="color: #c66b15;"></i>
                                <i class="fa fa-star"></i>
                                <i>4.3 Out of 5</i>
                                <h5><i class="fa fa-user"></i> Dhruvi 
                                    <i class="fa fa-star" style="color: #c66b15;"></i>
                                    <i class="fa fa-star" style="color: #c66b15;"></i>
                                    <i class="fa fa-star" style="color: #c66b15;"></i>
                                    <i class="fa fa-star" style="color: #c66b15;"></i>
                                    <i class="fa fa-star"></i></h5>
                        
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam
                                    possimus.</p>
                            </div>
                        </div>
                    </div>


                    <div class="sicoal-share-widget margin-top-10  full-width pull-left">
                        <label class=" pull-left">Share :</label>
                        <ul class="social-li list-inline">
                            <li><a href="#" target="_blank"><i
                                        class="fa fa-facebook font-size-18"></i></a></li>
                            <li><a href="https://www.google.com" target="_blank"><i
                                        class="fa fa-google-plus font-size-18"></i></a></li>
                            <li><a href="https://twitter.com" target="_blank"><i
                                        class="fa fa-twitter font-size-18"></i></a></li>
                            <li><a href="https://www.pinterest.com" target="_blank"><i
                                        class="fa fa-pinterest font-size-18"></i></a></li>
                            <li><a href="https://www.linkedin.com" target="_blank"><i
                                        class="fa fa-linkedin font-size-18"></i></a></li>
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
					<div class="col-sm-4 col-md-4 col-xs-12 margin-top-30">
						<div class="product text-center">
							<div class="product-image position-r">
								<a href="#">
									<div class=""></div>
									<img src="assets/images/product/product-5.jpg" alt="" class="img-responsive">
								</a>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-md-4 col-xs-12 margin-top-30">
						<div class="product text-center">
							<div class="product-image position-r">
								<a href="#">
									<div class=""></div>
									<img src="assets/images/product/product-6.jpg" alt="" class="img-responsive">
								</a>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-md-4 col-xs-12 margin-top-30">
						<div class="product text-center">
							<div class="product-image position-r">
								<a href="#">
									<div class=""></div>
									<img src="assets/images/product/product-7.jpg" alt="" class="img-responsive">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="product-container"></div>
		</div>
	</section> -->
</main>