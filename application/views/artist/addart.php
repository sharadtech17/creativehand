<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box d-sm-flex align-items-center justify-content-between">
			<h4 class="mb-sm-0">Create Arts</h4>

		</div>
	</div>
</div>
<!-- end page title -->
<form id="addartform" method="POST" autocomplete="off" enctype="multipart/form-data">
	<div class="row">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-body">
					<div class="mb-3">
						<label class="form-label" for="title">Art Title</label>
						<input type="text" class="form-control" name="title" id="title" value=""
						placeholder="Enter art title">
					</div>
					<div>
						<label>Art Description</label>					
						<textarea id="ckeditor-classic" name="description"></textarea>
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
										<img src="#" id="product-img" class="avatar-md h-auto" />
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
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title mb-0">Arts Categories</h5>
				</div>
				<div class="card-body">
					<label class="form-label" for="stocks-input">Select Arts category</label>
					<select class="form-select" id="categorySelect" name="categories" required>
						<option value="" selected disabled>Select Arts category</option>
						<?php foreach($categoriesdata as $category): ?>
							<option value="<?=$category->id?>"><?=$category->categoriesname?></option>
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
					<select class="form-select" id="subcategoriesSelect" name="subcategories" required data-choices data-choices-search-false>
					</select>
				</div>
				<!-- end card body -->
			</div>
			<!-- end card -->
			<div class="card">
				<div class="card-header">
					<h5 class="card-title mb-0">Art Tags (separated by commas(,))</h5>
				</div>
				<div class="card-body">
					<div class="hstack gap-3 align-items-start">
						<div class="flex-grow-1">
							<input class="form-control" placeholder="e.g Art, Painting" name="tags" type="text"/>
						</div>
					</div>
				</div>
			</div>
			<!-- end card -->
			<div class="card">
				<div class="card-header">
					<h5 class="card-title mb-0">Size (inches) :</h5>
				</div>
				<div class="card-body">
					<div class="hstack gap-3 align-items-start">
						<div class="flex-grow-1">
							<input class="form-control" data-choices data-choices-multiple-remove="true" placeholder="18 x 20 inches" type="text" name="size"/>
						</div>
					</div>
				</div>
				<!-- end card body -->
			</div>
			<!-- end card -->
			<div class="card">
				<div class="card-header">
					<h5 class="card-title mb-0">Price:</h5>
				</div>
				<div class="card-body">
					<div class="hstack gap-3 align-items-start">
						<div class="flex-grow-1">
							<input class="form-control" data-choices data-choices-multiple-remove="true" placeholder="Enter Price" type="text" name="price"/>
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
					<textarea class="form-control" placeholder="Add short description for Arts" rows="3" name="shortdescription"></textarea>
				</div>
				<!-- end card body -->
			</div>
			<!-- end card -->
			<div class="text-end mb-3">
				<button type="submit" class="btn btn-success w-sm" id="submitBtn">Submit</button>
			</div>
		</div>
		<!-- end col -->
	</div>
	<!-- end row -->

</form>
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
		$('#addartform').submit(function (e) {
			e.preventDefault();
			$('#submitBtn').prop('disabled', true);

			// Serialize form data
			var formData = new FormData($(this)[0]);

			if (validateForm()) {
				$.ajax({
					url: '<?= base_url('ArtistController/addnewart') ?>',
					type: 'post',
					data: formData,
					dataType: 'json',
					contentType: false,
					processData: false,
					success: function (response) {
						if (response.success) {
							window.location.href = '<?= base_url('artist-panel/view-all-arts') ?>';
						} else {
							alert('Failed: ' + response.message);
						}
					},
					error: function () {
						console.log('Error!!');
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
			var title = $('#title').val();
			var description = $('#ckeditor-classic').val();
			var mainimage = $('#product-image-input').val();
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

			if (!mainimage) {
				alert('Please select an art image.');
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