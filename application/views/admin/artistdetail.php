<?php
$this->db->select('artist.*, GROUP_CONCAT(DISTINCT categories.categoriesname) as category_names, GROUP_CONCAT(DISTINCT subcategories.subcategoriesname) as subcategory_names');
$this->db->from('artist');
$this->db->join('categories', 'FIND_IN_SET(categories.id, artist.categories)', 'left');
$this->db->join('subcategories', 'FIND_IN_SET(subcategories.id, artist.subcategories)', 'left');
$this->db->where('artist.id', $artistid);
$this->db->group_by('artist.id');
$query = $this->db->get();
$artistdata = $query->row();

$jsonData = json_decode($artistdata->socialaccount);
?>
<div class="container-fluid">
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
					<div class="hstack text-white-50 gap-1">
						<h5 class="me-1 text-white-75 fs-16 align-middle">Account Status -</h5>
						<?php
							if ($artistdata->verificationstatus==0) {
								echo '<h5 class="text-warning mb-1">Pandding</h5>';
							}elseif ($artistdata->verificationstatus==1) {
								echo '<h5 class="text-success mb-1">Approved</h5>';
							}elseif($artistdata->verificationstatus==2){
								echo '<h5 class="text-danger mb-1">Rejected</h5>';
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div>
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
											<?php if (!empty($artistdata->category_names)) {
												$category_names = explode(',', $artistdata->category_names); foreach ($category_names as $category_name): ?>
												<a href="javascript:void(0);" class="badge badge-soft-primary"><?= htmlspecialchars($category_name) ?></a>
											<?php endforeach; } ?>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-body">
										<h5 class="card-title mb-4">Sub Categories</h5>
										<div class="d-flex flex-wrap gap-2 fs-15">
											<?php if (!empty($artistdata->subcategory_names)) { $subcategory_names = explode(',', $artistdata->subcategory_names); foreach ($subcategory_names as $category_name): ?>
												<a href="javascript:void(0);" class="badge badge-soft-primary"><?= htmlspecialchars($category_name) ?></a>
											<?php endforeach; } ?>
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
							<div class="card-header border-0">										
								<div class="col-sm">
									<?php if($artistdata->verificationstatus === '0'){?>
										<div class="d-flex justify-content-sm-end">
											<div class="search-box ms-2">
												<button type="button" class="btn btn-success waves-effect waves-light" onclick="verificationstatus(<?=$artistdata->id?>,'1')"><i class="ri-check-fill align-bottom me-1" ></i>Verify</button>
												<button type="button" class="btn btn-danger waves-effect waves-light" onclick="verificationstatus(<?=$artistdata->id?>,'2')"><i class="ri-check-fill align-bottom me-1" ></i>Reject</button>
											</div>
										</div>
									<?php }elseif($artistdata->verificationstatus === '1'){?>
										<div class="d-flex justify-content-sm-end">
											<div class="search-box ms-2">
												<button type="button" class="btn btn-danger waves-effect waves-light" onclick="verificationstatus(<?=$artistdata->id?>,'2')"><i class="ri-check-fill align-bottom me-1" ></i>Reject</button>
											</div>
										</div>
									<?php }elseif($artistdata->verificationstatus === '2'){?>
									<div class="d-flex justify-content-sm-end">
										<div class="search-box ms-2">
										<button type="button" class="btn btn-success waves-effect waves-light" onclick="verificationstatus(<?=$artistdata->id?>,'1')"><i class="ri-check-fill align-bottom me-1" ></i>Verify</button>
										</div>
									</div>
									<?php } ?>
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
<script>
	function verificationstatus($artistid,$status) {
		$confirm = confirm("Are you sure?");		
		if($confirm){
			$.ajax({
				url: '<?= base_url('AdminController/verificationstatus') ?>',
				type: 'POST',
				data: { 'artistid': $artistid, 'status': $status},
				success: function (response) {
					if (response) {
						alert('Successfully updated!!!');
						location.reload();
					} else {
						alert('Failed to update. Please try again.');
					}
				},
				error: function () {
					console.log('Error updating profile.');
				},
				complete: function () {
					$('#submitBtn').prop('disabled', false);
				}
			});
		}else{
			return false;
		}
	}
</script>