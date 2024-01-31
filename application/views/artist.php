		<section class="breadcrumb-container paira-margin-bottom-3">
				<div class=" breadcrumb" style="background: linear-gradient(#070606b3, rgba(30, 23, 23, 0)) ,url(<?=base_url()?>assets/images/banner/home-banner-big.jpg); ">
					<div class="container-fluid padding-fix">

						<ul class="list-inline text-center" style="padding-top: 100px; padding-bottom: 100px;">
							<h1 class="" style="color:white;">Artist</h1>
							<li><a href="<?=base_url()?>" style="font-size: larger;color: white;">Home <i
										class="fa fa-angle-right"></i></a>
							</li>
							<li class="" style="color:#c66b15;">Artist gallery</li>
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
												<form method="GET" action="<?php echo base_url('HomeController/artist'); ?>">
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
						<div id="noMatchMessage" style="display: none;"><p class="text-center" style="padding: 50px 0px;">No match found</p></div>
						<?php foreach ($artistlist as $artist): ?>
						<div class="single-varients-product gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation artist-card" data-artist-name="<?= strtolower($artist->name) ?>">
							<img src="<?=base_url().$artist->profileimage?>" onerror="this.onerror=null; this.src='<?=base_url()?>artistassets/altuser.jpg'" class="img-responsive" style="height:350px;object-fit: cover;"></a>
							<div class="">
								<div style="display: flex; justify-content:space-between ;">
									<h5> <i class="fa fa-user"></i> <?=$artist->name?></h5>
									<h6> <i class="fa fa-image"></i># arts</h6>
								</div>
								<div style="display: flex; justify-content:space-between ;">
									<h6><i class="fa fa-phone"></i> <?= $artist->number !== '' ? $artist->number : '**********' ?></h6>
									<h6>Artist</h6>
									<a href="<?=base_url()?>artist-details/<?=$artist->id?>">
										<button class="text-right btn btn-primary  text-capitalize 
										margin-bottom-20">View</button>
									</a>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

		</section>

	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Search input change event
        $('#artistSearch').on('input', function () {
            var searchTerm = $(this).val().toLowerCase();
            var $artistCards = $('.artist-card');
            var $noMatchMessage = $('#noMatchMessage');

            // Hide all cards
            $artistCards.hide();

            // Show cards that match the search term
            $artistCards.each(function () {
                var artistName = $(this).data('artist-name');
                if (artistName.includes(searchTerm)) {
                    $(this).show();
                }
            });

            // Display "No match found" message if no cards are visible
            if ($artistCards.filter(':visible').length === 0) {
                $noMatchMessage.show();
            } else {
                $noMatchMessage.hide();
            }
        });
    });
</script>