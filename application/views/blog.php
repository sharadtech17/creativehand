<!--=================== Main Content Container ===================-->
<main class="blog-page">
	<section class="breadcrumb-container paira-margin-bottom-3">
        <div class=" breadcrumb" style="background: linear-gradient(#070606b3, rgba(30, 23, 23, 0)) ,url(<?=base_url()?>assets/images/banner/home-banner-big.jpg); ">
            <div class="container-fluid padding-fix">

                <ul class="list-inline text-center" style="padding-top: 100px; padding-bottom: 100px;">
                    <h1 class="" style="color:white;">Our Latest Blog</h1>
                    <li><a href="<?=base_url()?>" style="font-size: larger;color: white;">Home <i
                                class="fa fa-angle-right"></i></a>
                    </li>
                    <li class="" style="color:#c66b15;">Blog</li>
                </ul>
            </div>
        </div>
    </section>
	<!--=================== latest Collection Section ===================-->
	<section class="latest-blog paira-margin-bottom-3">
		<div class="container">
			<div class="row">
				<?php foreach ($bloglist as $blog): ?>
					<div class="col-md-4 col-xs-12 col-sm-6 margin-top-30">
						<div class="blog">
							<div class="blog-image position-r">
								<a href="#">
									<div class="background-overlay"></div>
									<img src="<?=base_url().$blog->image?>" alt="" class="img-responsive">
								</a>
							</div>
							<div class="blog-hover">
								<a href="<?=base_url('BlogController/viewblogdetails/' . $blog->id)?>" class="margin-top-10">- See The blog -</a>
							</div>
							<div class="margin-top-15 text-left">
								<p class="margin-bottom-5"><?= date('M d,Y', strtotime($blog->date)) ?></p>
								<h4 class="margin-top-0 margin-bottom-10"><a href="<?=base_url()?>viewblogdetails"><?=$blog->name?></a></h4>
								<a href="<?=base_url('BlogController/viewblogdetails/' . $blog->id)?>" class="text-uppercase read-more">Read More<i
										class="fa fa-long-arrow-right margin-left-5"></i></a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
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
</main>