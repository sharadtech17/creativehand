<?php
$artistdata = $this->db->select('*')->get_where('artist', ['id' => $artistid])->row();
$jsonData = json_decode($artistdata->socialaccount);
?>
	<div class="position-relative mx-n4 mt-n4">
		<div class="profile-wid-bg profile-setting-img">
			<img src="<?=base_url()?>artistassets/images/profile-bg.jpg" class="profile-wid-img" alt="">
		</div>
	</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xxl-3">
			<div class="card mt-n5">
				<div class="card-body p-4">
					<div class="text-center">
						<form method="POST" id="editprofileform" enctype="multipart/form-data">
							<div class="profile-user position-relative d-inline-block mx-auto mb-4">
								<img src="<?=base_url().$artistdata->profileimage?>" onerror="this.onerror=null; this.src='<?=base_url()?>artistassets/altuser.jpg'" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
								<div class="avatar-xs p-0 rounded-circle profile-photo-edit">
									<input id="profile-img-file-input" type="file" class="profile-img-file-input" name="artistprofileimage">
									<label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
										<span class="avatar-title rounded-circle bg-light text-body">
											<i class="ri-camera-fill"></i>
										</span>
									</label>
								</div>
							</div>
							<h5 class="fs-16 mb-1"><?=$artistdata->name?></h5>
							<p class="text-muted mb-0"><?=$artistdata->category?></p>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<div class="d-flex align-items-center mb-4">
							<div class="flex-grow-1">
								<h5 class="card-title mb-0">Portfolio</h5>
							</div>
						</div>
						<div class="mb-3 d-flex">
							<div class="avatar-xs d-block flex-shrink-0 me-3">
								<span class="avatar-title rounded-circle fs-16 " style="background-color:#ff1493;">
									<i class="ri-instagram-fill"></i>
								</span>
							</div>
							<input type="text" class="form-control" id="gitUsername" placeholder="Instagram" value="<?=$jsonData[0]?>" name="socialaccount[]">
						</div>
						<div class="mb-3 d-flex">
							<div class="avatar-xs d-block flex-shrink-0 me-3">
								<span class="avatar-title rounded-circle fs-16 bg-primary">
									<i class="ri-facebook-fill"></i>
								</span>
							</div>
							<input type="text" class="form-control" id="websiteInput" placeholder="Facefook" value="<?=$jsonData[1]?>" name="socialaccount[]">
						</div>
						<div class="mb-3 d-flex">
							<div class="avatar-xs d-block flex-shrink-0 me-3">
								<span class="avatar-title rounded-circle fs-16" style="background-color: red;">
									<i class="ri-youtube-fill"></i>
								</span>
							</div>
							<input type="text" class="form-control" id="dribbleName" placeholder="youtube" value="<?=$jsonData[2]?>" name="socialaccount[]">
						</div>
						<div class="mb-3 d-flex">
							<div class="avatar-xs d-block flex-shrink-0 me-3">
								<span class="avatar-title rounded-circle fs-16 bg-danger">
									<i class="ri-pinterest-fill"></i>
								</span>
							</div>
							<input type="text" class="form-control" id="pinterestName" placeholder="Pinterest" value="<?=$jsonData[3]?>" name="socialaccount[]">
						</div>
						<div class="mb-3 d-flex">
							<div class="avatar-xs d-block flex-shrink-0 me-3">
								<span class="avatar-title rounded-circle fs-16 bg-success">
									<i class="ri-linkedin-fill"></i>
								</span>
							</div>
							<input type="text" class="form-control" id="linkedin" placeholder="Linkedin" value="<?=$jsonData[4]?>" name="socialaccount[]">
						</div>
						<div class="mb-3 d-flex">
							<div class="avatar-xs d-block flex-shrink-0 me-3">
								<span class="avatar-title rounded-circle fs-16 bg-success">
									<i class="ri-twitter-fill"></i>
								</span>
							</div>
							<input type="text" class="form-control" id="twitter" placeholder="Twitter" value="<?=$jsonData[5]?>" name="socialaccount[]">
						</div>
					</div>
				</div>
			</div>
			<div class="col-xxl-9">
				<div class="card mt-xxl-n5">
					<div class="card-header">
						<ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
									<i class="fas fa-home"></i> Personal Details
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
									<i class="far fa-user"></i> Change Password
								</a>
							</li>
						</ul>
					</div>
					<div class="card-body p-4">
						<div class="tab-content">
							<div class="tab-pane active" id="personalDetails" role="tabpanel">

								<div class="row">
									<div class="col-lg-4">
										<div class="mb-3">
											<label class="form-label">
											Select Arts Category</label>
											<select class="form-select" name="category_type" id="categoryTypeSelect" data-choices data-choices-search-false >
												<option value="">Select Category Type</option>
												<option value="Hand Made Arts" <?=$artistdata->category === 'Hand Made Arts' ? 'selected' : '';?>>Hand Made Products</option>
												<option value="Painting Arts" <?=$artistdata->category === 'Painting Arts' ? 'selected' : '';?>>Painting</option>
											</select>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="mb-3">
											<label class="form-label">Select Category</label>
											<select class="js-example-basic-multiple" name="artistcategories[]" id="categoriesSelect" multiple>
												<?php foreach($categoriesdata as $category): ?>
													<option value="<?= $category->id ?>" <?= in_array($category->id, explode(',', $artistdata->categories)) ? 'selected' : '' ?>>
														<?= $category->categoriesname ?>
													</option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="mb-3">
											<label class="form-label">Select Sub Category</label>
											<select class="js-example-basic-multiple" name="artistsubcategories[]" id="subcategoriesSelect" multiple>
												<?php foreach($subcategoriesdata as $subcategory): ?>
													<option value="<?= $subcategory->id ?>" <?= in_array($subcategory->id, explode(',', $artistdata->subcategories)) ? 'selected' : '' ?>>
														<?= $subcategory->subcategoriesname ?>
													</option>
												<?php endforeach ?>
											</select>
										</div>
									</div>

									<div class="col-lg-6">
										<div class="mb-3">
											<label for="firstnameInput" class="form-label">
											Name</label>
											<input type="text" class="form-control" id="firstnameInput" placeholder="Name" value="<?=$artistdata->name?>" name="artistname">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="mb-3">
											<label for="lastnameInput" class="form-label">Company Name</label>
											<input type="text" class="form-control" id="lastnameInput" placeholder="Company Name" value="<?=$artistdata->companyname?>" name="artistcompanyname">
										</div>
									</div>
									<div class="col-lg-12">
										<div class="mb-3">
											<label for="representing" class="form-label">Representing</label>
											<select class="form-select" id="choices-category-input" name="artistrepresenting">
												<option value="Self Represented" <?= $artistdata->representing=='Self Represented' ? 'selected' : '' ?>>Self Represented</option>
												<option value="Locally Represented" <?= $artistdata->representing=='Locally Represented' ? 'selected' : '' ?>>Locally Represented</option>
												<option value="Gallery Represented" <?= $artistdata->representing=='Gallery Represented' ? 'selected' : '' ?>>Gallery Represented</option>
												<option value="Nationally Represent" <?= $artistdata->representing=='Nationally Represent' ? 'selected' : '' ?>>Nationally Represent</option>
												<option value="Internationally Represented" <?= $artistdata->representing=='Internationally Represented' ? 'selected' : '' ?>>Internationally Represented</option>
											</select>
										</div>
									</div>
									<div class="col-lg-8">
										<div class="mb-3">
											<label for="phonenumberInput" class="form-label">Phone Number</label>
											<input type="text" class="form-control" id="phonenumberInput" placeholder="Enter your phone number" value="<?=$artistdata->number?>" name="artistnumber">
										</div>
									</div>
									<div class="col-lg-4">
										<div class="mb-3">
											<label class="form-check-label" for="switchnumber">visible on
											Your Profile</label>
											<div class="d-flex gap-2">
												<h4>No</h4>
												<a class="form-check form-switch form-switch-lg" dir="ltr">
													<input type="checkbox" class="form-check-input" name="artistnumbervisibly" id="switchnumber" <?=$artistdata->numbervisibly == 1 ? 'checked' : '';?>>
												</a>
												<h4>Yes</h4>
											</div>
										</div>
									</div>
									<div class="col-lg-8">
										<div class="mb-3">
											<label for="wpnumberInput" class="form-label">WhatsApp
											Number</label>
											<input type="text" class="form-control" name="artistwpnumber" id="wpnumberInput" placeholder="Enter your phone number" value="<?=$artistdata->wpnumber?>">
										</div>
									</div>
									<div class="col-lg-4">
										<div class="mb-3">
											<label class="form-check-label" for="customSwitchsizelg">visible on
											Your Profile</label>
											<div class="d-flex gap-2">
												<h4>No</h4>
												<a class="form-check form-switch form-switch-lg" dir="ltr">
													<input type="checkbox" class="form-check-input" name="artistwpnumbervisibly" id="customSwitchsizelg" <?=$artistdata->wpnumbervisibly == 1 ? 'checked' : '';?>>
												</a>
												<h4>Yes</h4>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="mb-3">
											<label for="emailInput" class="form-label">Email
											Address</label>
											<input type="email" class="form-control" name="artistemail" id="emailInput" placeholder="Enter your email" value="<?=$artistdata->email?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="mb-3">
											<label
											class="form-label">Website</label>
											<input type="text" class="form-control" name="artistwebsite" id="websiteInput1" placeholder="www.example.com" value="<?=$artistdata->website?>" />
										</div>
									</div>
									<div class="col-lg-12">
										<div class="mb-3">
											<label for="designationInput" class="form-label">More
											Skills (separated by commas(,))</label>
											<input type="text" class="form-control" name="artistskills" id="designationInput" placeholder="e.g. Drawing, Testing" value="<?=$artistdata->skills?>" />
										</div>
									</div>
									<div class="col-lg-12">
										<div class="mb-3">
											<label for="address" class="form-label">Address</label>
											<input type="text" class="form-control" name="artistaddress" id="address" placeholder="Address" value="<?=$artistdata->address?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="mb-3">
											<label for="cityInput" class="form-label">City</label>
											<input type="text" class="form-control" name="artistcity" id="cityInput" placeholder="City" value="<?=$artistdata->city?>" />
										</div>
									</div>
									<div class="col-lg-6">
										<div class="mb-3">
											<label for="stateInput" class="form-label">State</label>
											<input type="text" class="form-control" name="artiststate" id="stateInput" placeholder="State" value="<?=$artistdata->state?>" />
										</div>
									</div>
									<div class="col-lg-6">
										<div class="mb-3">
											<label for="countryInput" class="form-label">Country</label>
											<input type="text" class="form-control" name="artistcountry" id="countryInput" placeholder="Country" value="<?=$artistdata->country?>" />
										</div>
									</div>
									<div class="col-lg-6">
										<div class="mb-3">
											<label for="zipcodeInput" class="form-label">Zip
											Code</label>
											<input type="text" class="form-control" name="artistzipcode" id="zipcodeInput" placeholder="Enter zipcode" value="<?=$artistdata->zipcode?>">
										</div>
									</div>
									<div class="col-lg-12">
										<div class="mb-3 pb-2">
											<label for="exampleFormControlTextarea" class="form-label">Description</label>
											<textarea class="form-control" name="artistdescription" id="ckeditor-classic" placeholder="Enter your description" rows="6"><?=$artistdata->description?></textarea>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="hstack gap-2 justify-content-end">
											<button type="submit" class="btn btn-primary" id="submitBtn">Update</button>
											<a href="<?=base_url()?>artist-panel/view-profile" onclick="return confirm('Are you sure you want to leave the page?');" class="btn btn-soft-success">Cancel</a>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane" id="changePassword" role="tabpanel">
							<form method="POST" id="editpasswordform">
								<div class="row g-2">
									<div class="col-lg-4">
										<div>
											<label for="oldpasswordInput" class="form-label">Old
											Password*</label>
											<input type="password" class="form-control" name="oldpassword" id="oldpasswordInput" placeholder="Enter current password">
										</div>
									</div>
									<div class="col-lg-4">
										<div>
											<label for="newpasswordInput" class="form-label">New
											Password*</label>
											<input type="password" class="form-control" name="newpassword" id="newpasswordInput" placeholder="Enter new password">
										</div>
									</div>
									<div class="col-lg-4">
										<div>
											<label for="confirmpasswordInput" class="form-label">Confirm
											Password*</label>
											<input type="password" class="form-control" name="confirmpassword" id="confirmpasswordInput" placeholder="Confirm password">
										</div>
									</div>
									<div class="col-lg-12">
										<div class="text-end">
											<button type="submit" class="btn btn-success" id="fpsubmitBtn">Change
											Password</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
	$(document).ready(function () {
		$('#categoryTypeSelect').change(function () {
			var selectedCategory = $(this).val();
			$.ajax({
				url: '<?= base_url('ArtistController/getCategories') ?>',
				type: 'post',
				dataType: 'json',
				data: { category: selectedCategory },
				success: function (response) {								
					var categoriesSelect = $('#categoriesSelect');
					categoriesSelect.empty();
					$.each(response.categories, function (key, value) {
						categoriesSelect.append($('<option>', {
							value: value.id,
							text: value.categoriesname,
						}));
					});
					categoriesSelect.trigger('change');
					$('#subcategoriesSelect').empty();
				},
				error: function () {
					console.log('Error fetching categories.');
				}
			});
		});
		$('#categoriesSelect').change(function () {
			var selectedCategory = $(this).val();
			$.ajax({
				url: '<?= base_url('ArtistController/getSubcategories') ?>',
				type: 'post',
				dataType: 'json',
				data: { categories: selectedCategory },
				success: function (response) {								
					var subcategoriesSelect = $('#subcategoriesSelect');
					subcategoriesSelect.empty();
					$.each(response.subcategories, function (key, value) {
						subcategoriesSelect.append($('<option>', {
							value: value.id,
							text: value.subcategoriesname,
						}));
					});
					subcategoriesSelect.trigger('change');
				},
				error: function () {
					console.log('Error fetching categories.');
				}
			});
		});
		$('#editprofileform').submit(function (e) {
			e.preventDefault();
			$('#submitBtn').prop('disabled', true);
			if (validateForm()) {
				var formData = new FormData($(this)[0]);
				$.ajax({
					url: '<?= base_url('ArtistController/updateprofile') ?>',
					type: 'post',
					data: formData,
					dataType: "JSON",
					contentType: false,
					processData: false,
					success: function (response) {
						if (response) {
							window.location.href = '<?= base_url('artist-panel/view-profile') ?>';
						} else {
							alert('Failed to update profile. Please try again.');
						}
					},
					error: function () {
						console.log('Error updating profile.');
					},
					complete: function () {
						$('#submitBtn').prop('disabled', false);
					}
				});
			} else {
				$('#submitBtn').prop('disabled', false);
			}
		});
		function validateForm() {
			var artistName = $('#firstnameInput').val();
			if (artistName.trim() === '') {
				alert('Please enter the artist name.');
				return false;
			}
			return true;
		}
		$('#editpasswordform').submit(function (e) {
			e.preventDefault();
			$('#fpsubmitBtn').prop('disabled', true);
			if (validateprForm()) {
				var formData = new FormData($(this)[0]);
				$.ajax({
					url: '<?= base_url('ArtistController/editpassword') ?>',
					type: 'post',
					data: formData,
					contentType: false,
					processData: false,
					success: function (response) {
						if (response) {
							alert('Password successfully changed')
							window.location.href = '<?= base_url('artist-panel/view-profile') ?>';
						} else {
							alert('Failed to update password. Please try again!!');
						}
					},
					error: function () {
						console.log('Error updating profile.');
					},
					complete: function () {
						$('#fpsubmitBtn').prop('disabled', false);
					}
				});
			} else {
				$('#fpsubmitBtn').prop('disabled', false);
			}
		});
		function validateprForm() {
			var oldpassword = $('#oldpasswordInput').val();
			var newpassword = $('#newpasswordInput').val();
			var confirmpassword = $('#confirmpasswordInput').val();
			if (oldpassword.trim() === '') {
				alert('Please enter the old password.');
				return false;
			}
			else if (newpassword.trim() === '') {
				alert('Please enter the new password.');
				return false;
			}
			else if (confirmpassword.trim() === '') {
				alert('Please enter the confirm password.');
				return false;
			}
			else if (newpassword.trim() == oldpassword.trim()) {
				alert('Old password and new password cannot be same!');
				return false;
			}
			else if (confirmpassword.trim() != newpassword.trim()) {
				alert('Password not match!!!');
				return false;
			}
			return true;
		}
	});
</script>