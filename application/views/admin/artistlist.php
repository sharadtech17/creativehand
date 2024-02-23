<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0">List of Artist</h4>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header border-0 rounded">
			<div class="row g-2">
				<div class="col-xl-4">
					<div class="search-box">
						<input type="text" class="form-control search" id="searchartist" onkeyup="searchfun()" placeholder="Search for artist name..."> <i class="ri-search-line search-icon"></i>
					</div>
				</div>
				<div class="col-xxl-4 ms-auto">
					<div>
						<select class="form-control" id="categoryFilter" onchange="searchfun()" data-choices data-choices-search-false>
							<option value="">Select Arts Category</option>
							<option value="Hand Made Arts">Hand Made Products</option>
							<option value="Painting">Painting</option>
							<option value="Not selected">Not selected</option>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="noResultsMessage" style="display: none; margin-top: 10px; text-align: center;">No Artist found.</div>
	<div class="row mt-4" id="artistlist">
		<?php foreach ($artistlist as $artist): ?>
			<div class="col-xl-3 col-lg-6 artistlistdata">
				<div class="card ribbon-box right overflow-hidden">
					<div class="card-body text-center p-4">
						<img src="<?=base_url().$artist->profileimage?>" onerror="this.onerror=null; this.src='<?=base_url()?>artistassets/altuser.jpg'" alt="" height="45">
						<h5 class="mb-1 mt-4"><a href="<?=base_url()?>administrator/artist-detail/<?=$artist->id?>" class="link-primary"><?=$artist->name?></a></h5>
						<p class="text-muted mb-3"><?= !empty($artist->category) ? $artist->category : 'Not selected' ?></p>
						<?php if($artist->verificationstatus === '0'){
							echo '<span class="badge bg-secondary">Registered</span>';
						}else if($artist->verificationstatus === '1'){
							echo '<span class="badge bg-success">Approved</span>';
						}else if($artist->verificationstatus === '2'){
							echo '<span class="badge bg-danger">Rejected</span>';
						}?>
						<div class="mt-4">
							<a href="<?=base_url()?>administrator/artist-detail/<?=$artist->id?>" class="btn btn-light w-100">View
							Details</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<script>
    function searchfun() {
        var filterName = document.getElementById('searchartist').value.toUpperCase();
        var filterCategory = document.getElementById('categoryFilter').value.toUpperCase();
        
        var list = document.getElementById('artistlist');
        var listItem = list.getElementsByClassName('artistlistdata');

        var noResultsMessage = document.getElementById('noResultsMessage');
        var resultsFound = false;

        for (var i = 0; i < listItem.length; i++) {
            var artist = listItem[i];
            var artistName = artist.querySelector('h5 a').innerText.toUpperCase();
            var artistCategory = artist.querySelector('.text-muted').innerText.toUpperCase();

            if ((artistName.indexOf(filterName) > -1) && (filterCategory === '' || artistCategory.indexOf(filterCategory) > -1)) {
                artist.style.display = "";
                resultsFound = true;
            } else {
                artist.style.display = "none";
            }
        }

        // Display no results message if no matching artists are found
        noResultsMessage.style.display = resultsFound ? 'none' : 'block';
    }
</script>