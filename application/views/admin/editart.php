<div class="container-fluid">

	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0">Edit Arts</h4>

			</div>
		</div>
	</div>
	<!-- end page title -->
	<form action="#" method="POST" autocomplete="off" enctype="multipart/form-data">
		<input type="hidden" name="art_id" value="<?= $artdata->id ?>">
		<input type="hidden" name="admin" value="1">
		<div class="row">
			<div class="col-lg-8">
				<div class="card">
					<div class="card-body">
						<div class="mb-3">
							<h5 class="card-title mb-0">Art Title :</h5>
							<input type="text" class="form-control" readonly name="title" id="title"
								placeholder="Enter Art title" required value="<?= $artdata->title ?>">
							<div class="invalid-feedback">Please Enter a Art title.</div>
						</div>
						<div>
							<h5 class="card-title mb-0">Arts Description :</h5>
							<textarea class="form-control" name="description" readonly id="ckeditor-classic">
										<?= $artdata->description ?>
									</textarea>
						</div>
					</div>
				</div>
				<!-- end card -->
				
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Art Image & Gallery</h5>
					</div>
					<div class="card-body">
						<div class="mb-4">
							<h5 class="fs-14 mb-1">Art Image</h5>
							<div class="text-center">
								<div class="position-relative d-inline-block">
									<div class="position-absolute top-100 start-100 translate-middle">
										<label for="product-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
											<div class="avatar-xs">
												<div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
													<i class="ri-image-fill"></i>
												</div>
											</div>
										</label>
										<input class="form-control d-none" value="" name="mainimage" id="product-image-input" type="file" accept="image/png, image/gif, image/jpeg">
									</div>
									<div class="avatar-lg">
										<div class="avatar-title bg-light rounded">
											<img src="<?= base_url() . $artdata->mainimage ?>" alt="" height="45">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div>
							<h5 class="fs-14 mb-1">Add Art Gallery Images</h5>
							<div class="mb-3">
								<!-- <h5 class="card-title mb-0">Upload </h5> -->
								<input type="file" class="form-control" name="galleryimage[]" multiple="multiple">
							</div>
							<?php
								$galleryimage_arr = json_decode($artdata->galleryimage);
								if (!empty($galleryimage_arr)) {
									foreach ($galleryimage_arr as $value) {
										?>
										<img data-dz-thumbnail class="img-fluid rounded" src="<?= base_url() . $value ?>" alt="Product-Image" style="padding:10px;" width="200px"/>
										<?php
									}
								}
							?>
						</div>
					</div>
				</div>
				<!-- <div class="text-end mb-3">
					<button type="submit" class="btn btn-success w-sm">Submit</button>
				</div> -->
			</div>
			<!-- end col -->
			<div class="col-lg-4">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Arts Categories</h5>
					</div>
					<div class="card-body">
						<label class="form-label" for="stocks-input">Select Arts category</label>
						<select class="form-select" id="categorySelect" name="categories">
							<option value="" selected disabled>Select Arts category</option>
							<?php foreach ($categoriesdata as $category): ?>
								<option value="<?= $category->id ?>" <?= $category->id == $artdata->categories ? 'selected' : '' ?>><?= $category->categoriesname ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<!-- end card body -->
				</div>
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Sub Catagary</h5>
					</div>
					<div class="card-body">
						<select class="form-select" id="subcategoriesSelect" name="subcategories">
							<option value="" selected disabled>Select Arts sub category</option>
							<?php foreach ($subcategoriesdata as $subcategory): ?>
								<option value="<?= $subcategory->id ?>" <?= $subcategory->id === $artdata->subcategories ? 'selected' : '' ?>>
									<?= $subcategory->subcategoriesname ?>
								</option>
							<?php endforeach ?>
						</select>
					</div>
					<!-- end card body -->
				</div>
				<!-- end card -->
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Arts Tags</h5>
					</div>
					<div class="card-body">
						<div class="hstack gap-3 align-items-start">
							<div class="flex-grow-1">
								<input class="form-control" data-choices data-choices-multiple-remove="true"
									placeholder="Enter tags" type="text" name="tags" value="<?= $artdata->tags ?>" />
							</div>
						</div>
					</div>
					<div class="card-header">
						<h5 class="card-title mb-0">Price:</h5>
					</div>
					<div class="card-body">
						<div class="hstack gap-3 align-items-start">
							<div class="flex-grow-1">
								<input class="form-control" name="price" data-choices
									data-choices-multiple-remove="true" placeholder="Enter Price" type="text"
									value="<?= $artdata->price ?>" />
							</div>
						</div>
					</div>
					<div class="card-header">
						<h5 class="card-title mb-0">Size:</h5>
					</div>
					<div class="card-body">
						<div class="hstack gap-3 align-items-start">
							<div class="flex-grow-1">
								<input class="form-control" name="size" value="<?= $artdata->size ?>" data-choices
									data-choices-multiple-remove="true" placeholder="Enter Size" type="text" />
							</div>
						</div>
					</div>
					<!-- end card body -->
				</div>
				<!-- end card -->
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Arts Short Description</h5>
					</div>
					<div class="card-body">
						<p class="text-muted mb-2">Add short description for Arts</p>
						<textarea class="form-control" name="shortdescription"
							placeholder="Must enter minimum of a 100 characters"
							rows="3"><?= $artdata->shortdescription ?></textarea>
					</div>
					<!-- end card body -->
				</div>
				<!-- end card -->
			</div>
			<!-- end col -->
		</div>
		<!-- end row -->
	</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
	 $(document).ready(function() {
        $('#categorySelect').change(function() {
            var category_id = $(this).val();
            // Make AJAX request to fetch subcategories
            $.ajax({
                url: '<?php echo base_url('ArtistController/getSubcategoriesByCategoryID'); ?>',
                type: 'post',
                dataType: 'json',
                data: {category_id: category_id},
                success: function(response) {
                    // Clear existing options
                    $('#subcategoriesSelect').empty();

                    // Add new subcategory options
                    $.each(response, function(index, value) {
                        $('#subcategoriesSelect').append('<option value="' + value.id + '">' + value.subcategoriesname + '</option>');
                    });
                }
            });
        });
    });
	$(document).ready(function () {
		$('#editartform').submit(function (e) {
			e.preventDefault();
			$('#submitBtn').prop('disabled', true);
			// Serialize form data
			var formData = new FormData($(this)[0]);

			if (validateForm()) {
				return true;
			} else {
				$('#submitBtn').prop('disabled', false);
			}
		});

		function validateForm() {
			var title = $('#title').val();
			var description = $('#ckeditor-classic').val();
			var subcategories = $('#subcategoriesSelect').val();
			var price = $('[name="price"]').val();
			if (!title.trim()) {
				alert('Please enter art title.');
				return false;
			}

			if (!description.trim()) {
				alert('Please enter art description.');
				return false;
			}

			if (!subcategories || subcategories.length === 0) {
				alert('Please select at least one subcategory.');
				return false;
			}

			if (!price.trim()) {
				alert('Please enter the art price.');
				return false;
			}

			return true;
		}
	});
</script>