
<div class="row">
	<div class="col-lg-12">
		<div class="card">			
			<div class="card-header d-flex align-items-center">
				<h5 class="card-title mb-0">Add Rows</h5>
			</div>
			<div class="card-body">
				<table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
					<thead>
						<tr>
							<th>Artist Name</th>
							<th>Title</th>
							<th>Short Description</th>
							<th>Tags</th>
							<th>Price</th>
							<th>Date</th>
							<th style="width: 0px;">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($artsdata)) : ?>
							<?php foreach ($artsdata as $art) : ?>
								<tr>
									<td><?=$art->artistname?></td>
									<td><?=$art->title?></td>
									<td><?=$art->shortdescription?></td>
									<td><?=$art->tags?></td>
									<td><?=$art->price?></td>
									<td><?=date('d-m-Y', strtotime($art->cr_dt))?></td>
									<td>
										<div class="dropdown d-inline-block">
											<button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
												<i class="ri-more-fill align-middle"></i>
											</button>
											<ul class="dropdown-menu dropdown-menu-end">
												<li><a href="#!" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
												<!-- <li><a class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li> -->
												<li>
													<button class="dropdown-item remove-item-btn" onclick="DeleteArt(<?=$art->id?>)">
														<i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
													</button>
												</li>
											</ul>
										</div>
									</td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div><!--end col-->
</div>
<script>
  function DeleteArt(artId) {
    if (confirm("Are you sure you want to delete this art?")) {
      $.ajax({
        type: 'POST',
        url: '<?= base_url('Admin/deleteart') ?>',
        data: { artId: artId },
        success: function(response) {
        	location.reload();
        },
        error: function(xhr, status, error) {
          // Handle error (if needed)
          console.error(xhr.responseText);
        }
      });
    }
  }
</script>
