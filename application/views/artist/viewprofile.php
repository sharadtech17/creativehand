<?php
$artistdata = $this->db->select('*')->get_where('artist', ['id' => $artistid])->row();
$jsonData = json_decode($artistdata->socialaccount);
?>
<div class="profile-foreground position-relative mx-n4 mt-n4">
	<div class="profile-wid-bg">
		<img src="<?=base_url()?>artistassets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
	</div>
</div>
<div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
	<div class="row g-4">
		<div class="col-auto">
			<div class="avatar-lg">
				<img src="<?=base_url().$artistdata->profileimage?>" onerror="this.onerror=null; this.src='<?=base_url()?>artistassets/altuser.jpg'" alt="user-img" class="img-thumbnail rounded-circle" />
			</div>
		</div>
		<div class="col">
			<div class="p-2">
				<h3 class="text-white mb-1"><?=$artistdata->name?></h3>
				<div class="hstack text-white-50 gap-1">
					<div class="me-2"><i class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle">
					</i><?=$artistdata->address?></div>
					<div class="me-2">
						<i class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i><?=$artistdata->companyname?>
					</div>
					<div>
						<i class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i><?=$artistdata->representing?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div>
			<div class="d-flex profile-wrapper">
				<ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
					<li class="nav-item">
						<a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
							<i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Overview</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link fs-14" data-bs-toggle="tab" href="#projects" role="tab">
							<i class="ri-price-tag-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Arts</span>
						</a>
					</li>
				</ul>
				<div class="flex-shrink-0">
					<a href="<?=base_url()?>artist-panel/edit-profile" class="btn btn-success"><i class="ri-edit-box-line align-bottom"></i> Edit Profile</a>
				</div>
			</div>
			<div class="tab-content pt-4 text-muted">
				<div class="tab-pane active" id="overview-tab" role="tabpanel">
					<div class="row">
						<div class="col-xxl-3">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title mb-3">Information</h5>
									<div class="table-responsive">
										<table class="table table-borderless mb-0">
											<tbody>
												<tr>
													<th class="ps-0" scope="row">Name :</th>
													<td class="text-muted"><?=$artistdata->name?></td>
												</tr>
												<tr>
													<th class="ps-0" scope="row">Mobile :</th>
													<td class="text-muted"><?=$artistdata->number?></td>
												</tr>
												<tr>
													<th class="ps-0" scope="row">WhatsApp:</th>
													<td class="text-muted"><?=$artistdata->wpnumber?></td>
												</tr>
												<tr>
													<th class="ps-0" scope="row">Email :</th>
													<td class="text-muted"><?=$artistdata->email?></td>
												</tr>
												<tr>
													<th class="ps-0" scope="row">City:</th>
													<td class="text-muted"><?=$artistdata->city?></td>
												</tr>
												<tr>
													<th class="ps-0" scope="row">Zip code:</th>
													<td class="text-muted"><?=$artistdata->zipcode?></td>
												</tr>
												<tr>
													<th class="ps-0" scope="row">State:</th>
													<td class="text-muted"><?=$artistdata->state?></td>
												</tr>
												<tr>
													<th class="ps-0" scope="row">Country:</th>
													<td class="text-muted"><?=$artistdata->country?></td>
												</tr>
												<tr>
													<th class="ps-0" scope="row">Join Date</th>
													<td class="text-muted"><?=date('d M Y', strtotime($artistdata->cr_dt))?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<h5 class="card-title mb-4">Portfolio</h5>

									<div class="d-flex flex-wrap gap-2">
										<div>
											<a <?php if ($jsonData[0]) { ?>href="<?=$jsonData[0]?>" target="_blank" <?php } else { ?>href="javascript:void(0);"<?php } ?> class="avatar-xs d-block">
												<span class="avatar-title rounded-circle fs-16 " style="background-color:#ff1493;">
													<span class="avatar-title rounded-circle fs-16 " style="background-color:#ff1493;">
														<i class="ri-instagram-fill"></i>
													</span>
												</a>
											</div>
											<div>
												<a <?php if ($jsonData[1]) { ?>href="<?=$jsonData[1]?>" target="_blank"<?php } else { ?>href="javascript:void(0);"<?php } ?> class="avatar-xs d-block">
													<span class="avatar-title rounded-circle fs-16 bg-primary">
														<i class="ri-facebook-fill"></i>
													</span>
												</a>
											</div>
											<div>
												<a <?php if ($jsonData[2]) { ?>href="<?=$jsonData[2]?>" target="_blank" <?php } else { ?>href="javascript:void(0);"<?php } ?> class="avatar-xs d-block" >
													<span class="avatar-title rounded-circle fs-16  " style="background-color: red;">
														<span class="avatar-title rounded-circle fs-16  " style="background-color: red;">
															<i class="ri-youtube-fill"></i>
														</span>
													</a>
												</div>
												<div>
													<a <?php if ($jsonData[3]) { ?>href="<?=$jsonData[3]?>" target="_blank" <?php } else { ?>href="javascript:void(0);"<?php } ?> class="avatar-xs d-block">
														<span class="avatar-title rounded-circle fs-16 bg-danger">
															<i class="ri-pinterest-fill"></i>
														</span>
													</a>
												</div>
												<div>
													<a <?php if ($jsonData[4]) { ?>href="<?=$jsonData[4]?>" target="_blank" <?php } else { ?>href="javascript:void(0);"<?php } ?> class="avatar-xs d-block">
														<span class="avatar-title rounded-circle fs-16 bg-success">
															<i class="ri-linkedin-fill"></i>
														</span>
													</a>
												</div>
												<div>
													<a <?php if ($jsonData[5]) { ?>href="<?=$jsonData[5]?>" target="_blank" <?php } else { ?>href="javascript:void(0);"<?php } ?> class="avatar-xs d-block">
														<span class="avatar-title rounded-circle fs-16 " style="background-color: #1DA1F2;">
															<i class="ri-twitter-fill"></i>
														</span>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-body">
											<h5 class="card-title mb-4">Skills</h5>
											<div class="d-flex flex-wrap gap-2 fs-15">
												<?php
				                                    if($artistdata->skills != null){
														$skillsArray = explode(",", $artistdata->skills);
				                                    }else{
				                                    	$skillsArray =array();
				                                    }
													foreach ($skillsArray as $skill) {
													    echo '<a href="javascript:void(0);" class="badge badge-soft-primary">' . htmlspecialchars($skill) . '</a>';
													}
													?>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-body">
											<h5 class="card-title mb-4">Categories</h5>
											<div class="d-flex flex-wrap gap-2 fs-15">
												<?php
												$categories = json_decode($artistdata->categories);						
												if (is_array($categories)) {
													foreach ($categories as $category) {
														echo '<a href="javascript:void(0);" class="badge badge-soft-primary">' . htmlspecialchars($category) . '</a>';
													}
												}
												?>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-body">
											<h5 class="card-title mb-4">Sub Categories</h5>
											<div class="d-flex flex-wrap gap-2 fs-15">
												<?php
												$subcategories = json_decode($artistdata->subcategories);						
												if (is_array($subcategories)) {
													foreach ($subcategories as $subcategory) {
														echo '<a href="javascript:void(0);" class="badge badge-soft-primary">' . htmlspecialchars($subcategory) . '</a>';
													}
												}
												?>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xxl-9">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title mb-3">About</h5>
											<p><?= nl2br($artistdata->description) ?></p>
											<div class="row">
												<div class="col-6 col-md-4">
													<div class="d-flex mt-4">
														<div class="flex-shrink-0 avatar-xs align-self-center me-3">
															<div class="avatar-title bg-light rounded-circle fs-16 text-primary">
																<i class="ri-user-2-fill"></i>
															</div>
														</div>
														<div class="flex-grow-1 overflow-hidden">
															<p class="mb-1">your Arts Category :</p>
															<h6 class="text-truncate mb-0"><?=$artistdata->category?>
														</h6>
													</div>
												</div>
											</div>
											<div class="col-6 col-md-4">
												<div class="d-flex mt-4">
													<div class="flex-shrink-0 avatar-xs align-self-center me-3">
														<div class="avatar-title bg-light rounded-circle fs-16 text-primary">
															<i class="ri-global-line"></i>
														</div>
													</div>
													<div class="flex-grow-1 overflow-hidden">
														<p class="mb-1">Website :</p>
														<a href="javascript:void(0);" class="fw-semibold"><?=$artistdata->website?></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="projects" role="tabpanel">
						<div class="card">
							<div class="card-body">
								<div class="card">
									<div class="card-header border-0">
										<div class="row g-4">
											<div class="col-sm-auto">
												<div>
													<a href="apps-ecommerce-add-product.html" class="btn btn-success" id="addproduct-btn"><i class="ri-add-line align-bottom me-1"></i>
													Add Arts</a>
												</div>
											</div>
											<div class="col-sm">
												<div class="d-flex justify-content-sm-end">
													<div class="search-box ms-2">
														<input type="text" class="form-control" id="searchProductList" placeholder="Search Arts...">
														<i class="ri-search-line search-icon"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="card-header">
										<div class="row align-items-center">
											<div class="col">
												<ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
													<li class="nav-item">
														<a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all" role="tab">
															All <span class="badge badge-soft-danger align-middle rounded-pill ms-1">12</span>
														</a>
													</li>
													<li class="nav-item">
														<a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-published" role="tab">
															Published <span class="badge badge-soft-danger align-middle rounded-pill ms-1">5</span>
														</a>
													</li>
													<li class="nav-item">
														<a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-draft" role="tab">
															Pending
														</a>
													</li>
												</ul>
											</div>
											<div class="col-auto">
												<div id="selection-element">
													<div class="my-n1 d-flex align-items-center text-muted">
														Select <div id="select-content" class="text-body fw-semibold px-1">
														</div>
														Result <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal" data-bs-target="#removeItemModal">Remove</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="tab-content text-muted">
											<div class="tab-pane active" id="productnav-all" role="tabpanel">
												<div id="table-product-list-all" class="table-card gridjs-border-none">
												</div>
											</div>
											<div class="tab-pane" id="productnav-published" role="tabpanel">
												<div id="table-product-list-published" class="table-card gridjs-border-none"></div>
											</div>
											<div class="tab-pane" id="productnav-draft" role="tabpanel">
												<div class="py-4 text-center">
													<lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px">
													</lord-icon>
													<h5 class="mt-4">Sorry! No Result Found</h5>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>