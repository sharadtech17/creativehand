
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Category</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">

        <!-- end col -->

        <div class="col-xl-12 col-lg-8">
            <div class="card">
            <?php include('flash-message.php');?>
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Category</h5>
                        <div class="flex-shrink-0">
                            <div class="d-flex gap-2 flex-wrap">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCategory"><i class="ri-add-fill me-1 align-bottom"></i>Add Category</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card header -->
                <div class="card-body">

                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="productnav-all" role="tabpanel">
                            <div id="table-product-list-all" class="table-card gridjs-border-none">
                            </div>
                        </div>
                        <!-- end tab pane -->

                        <div class="tab-pane active show" id="productnav-published" role="tabpanel">
                            <div id="table-product-list-published"
                                class="table-card gridjs-border-none">
                                <div role="complementary" class="gridjs gridjs-container">
                                    <div class="gridjs-wrapper" style="height: auto;">
                                        <table id="tableExport" role="grid" class="gridjs-table" style="height: auto;">
                                            <thead class="gridjs-thead">
                                                <tr class="gridjs-tr ">
                                                    <th data-column-id="#" class="gridjs-th text-muted">
                                                        <div class="gridjs-th-content">Sr</div>
                                                    </th>
                                                    <th data-column-id="orders"
                                                        class="gridjs-th gridjs-th-sort text-muted"
                                                        tabindex="0" >
                                                        <div class="gridjs-th-content">Category Type</div>
                                                    </th>
                                                    <th data-column-id="orders" class="gridjs-th gridjs-th-sort text-muted" tabindex="0" >
                                                        <div class="gridjs-th-content">Category Name</div>
                                                    </th>
                                                    <th data-column-id="action" class="gridjs-th text-muted">
                                                        <div class="gridjs-th-content">Action</div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="gridjs-tbody">
                                                <?php 
                                                    $i=1;
                                                ?>
                                            <?php foreach ($categorylist as $Category): ?>
                                                <tr class="gridjs-tr Categorylistdata">
                                                    <td><?=$i++;?></td>
                                                    <td><?=$Category->category_type?></td>
                                                    <td><?=$Category->categoriesname?></td>
                                                    <td data-column-id="action" class=""><span>
                                                            <div class="">
                                                                <ul class="">
                                                                    <a href="" data-bs-toggle="modal" data-bs-target="#editCategory<?=$Category->id?>">
                                                                        <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    </a>
                                                                    <a href="<?=base_url('AdminController/deleteCategory/' . $Category->id)?>">
                                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                    </a>
                                                                </ul>
                                                            </div>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="gridjs-footer">
                                        <div class="gridjs-pagination">
                                                    
                                        </div>
                                    </div>
                                    <!-- <div id="gridjs-temp" class="gridjs-temp"></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
<!-- add Category -->
<div class="modal fade zoomIn" id="addCategory" tabindex="-1" aria-labelledby="addCategoryLabel"
                        aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  accept-charset="UTF-8" action="<?=base_url()?>addCategoryPost" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="contactnumberInput" class="form-label">
                                    Category Name</label>
                                <input type="text" class="form-control" name="name"
                                    id="contactnumberInput" placeholder="Enter Name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="stocks-input">Category Type</label>
                                <select class="form-select" id="choices-category-input" name="category_type" required data-choices data-choices-search-false>
                                    <option value="" selected disabled>Select category type</option>
                                    <option value="Hand Made Arts">Hand Made Arts</option>
                                    <option value="Painting Arts">Painting Arts</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button
                                    class="btn btn-link link-success text-decoration-none fw-medium"
                                    data-bs-dismiss="modal"><i
                                        class="ri-close-line me-1 align-middle"></i>
                                    Close</button>
                                <button type="submit" class="btn btn-primary"><i
                                        class="ri-save-3-line align-bottom me-1"></i>
                                    Save</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($categorylist as $Category): ?>
<!-- add Category -->
<div class="modal fade zoomIn" id="editCategory<?=$Category->id?>" tabindex="-1" aria-labelledby="addCategoryLabel"
                        aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  accept-charset="UTF-8" action="<?=base_url()?>editCategory" method="POST" enctype="multipart/form-data">
                    <div class="row">
                    <input type="hidden" class="form-control" name="category_id" value="<?=$Category->id?>">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="contactnumberInput" class="form-label">
                                    Category Name</label>
                                <input type="text" class="form-control" name="name"  value="<?=$Category->categoriesname?>"
                                    id="contactnumberInput" placeholder="Enter Name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="stocks-input">Category Type</label>
                                <select class="form-select" id="choices-category-input" name="category_type" required data-choices data-choices-search-false>
                                    <option value="" selected disabled>Select category type</option>
                                    <option value="Hand Made Arts" <?= $Category->category_type=='Hand Made Arts' ? 'selected' : '' ?>>Hand Made Arts</option>
                                    <option value="Painting Arts" <?= $Category->category_type=='Painting Arts' ? 'selected' : '' ?>>Painting Arts</option>
                                </select>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button
                                    class="btn btn-link link-success text-decoration-none fw-medium"
                                    data-bs-dismiss="modal"><i
                                        class="ri-close-line me-1 align-middle"></i>
                                    Close</button>
                                <button type="submit" class="btn btn-primary"><i
                                        class="ri-save-3-line align-bottom me-1"></i>
                                    Save</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<script>
    function searchfun() {
        var filterName = document.getElementById('searchCategory').value.toUpperCase();
        var listItem = list.getElementsByClassName('Categorylistdata');

        var noResultsMessage = document.getElementById('noResultsMessage');
        var resultsFound = false;

        for (var i = 0; i < listItem.length; i++) {
            var Category = listItem[i];
            console.log(Category);
            var CategoryName = Category.querySelector('h5 a').innerText.toUpperCase();
            var CategoryCategory = Category.querySelector('.text-muted').innerText.toUpperCase();

            if ((CategoryName.indexOf(filterName) > -1) && (filterCategory === '' || CategoryCategory.indexOf(filterCategory) > -1)) {
                Category.style.display = "";
                resultsFound = true;
            } else {
                Category.style.display = "none";
            }
        }

        // Display no results message if no matching Categorys are found
        noResultsMessage.style.display = resultsFound ? 'none' : 'block';
    }
</script>