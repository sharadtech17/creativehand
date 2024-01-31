
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">News</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <!-- end col -->
        <div class="col-xl-12 col-lg-8">
            <div class="card">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">News</h5>
                        <div class="flex-shrink-0">
                            <div class="d-flex gap-2 flex-wrap">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNews"><i class="ri-add-fill me-1 align-bottom"></i>Add News</button>
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
                                        <table role="grid" id="tableExport" class="gridjs-table" style="height: auto;">
                                            <thead class="gridjs-thead">
                                                <tr class="gridjs-tr ">
                                                    <th data-column-id="#" class="gridjs-th text-muted">
                                                        <div class="gridjs-th-content">Sr</div>
                                                    </th>
                                                    <th data-column-id="price"
                                                        class="gridjs-th gridjs-th-sort text-muted" tabindex="0">
                                                        <div class="gridjs-th-content">News Title</div>
                                                    </th>
                                                    <th data-column-id="action"
                                                        class="gridjs-th text-muted"
                                                        >
                                                        <div class="gridjs-th-content">Action</div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="gridjs-tbody">
                                                <?php 
                                                    $i=1;
                                                ?>
                                            <?php foreach ($Newslist as $News): ?>
                                                <tr class="gridjs-tr Newslistdata">
                                                    <td><?=$i++;?></td>
                                                    <td><?=$News->title?></td>
                                                    <td data-column-id="action" class=""><span>
                                                            <div class="">
                                                                <ul class="">
                                                                    <a href="" data-bs-toggle="modal" data-bs-target="#editNews<?=$News->id?>">
                                                                        <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    </a>
                                                                    <a href="<?=base_url('PromotiveController/deleteNews/' . $News->id)?>">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end tab content -->

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
<!-- removeItemModal -->
<div id="removeItemModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                id="btn-close"></button>
        </div>
        <div class="modal-body">
            <div class="mt-2 text-center">
                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                    colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                    <h4>Are you sure ?</h4>
                    <p class="text-muted mx-4 mb-0">Are you sure you want to remove this product ?</p>
                </div>
            </div>
            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn w-sm btn-danger " id="delete-product">Yes, Delete
                    It!</button>
            </div>
        </div>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- add News -->
<div class="modal fade zoomIn" id="addNews" tabindex="-1" aria-labelledby="addNewsLabel"
                        aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewsLabel">Add News</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  accept-charset="UTF-8" action="<?=base_url()?>addNewsPost" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="firstnameInput" class="form-label">Title</label>
                                <input type="text" class="form-control" name="name" id="firstnameInput"
                                    placeholder="Enter name" required>
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

<?php foreach ($Newslist as $News): ?>
<!-- add News -->
<div class="modal fade zoomIn" id="editNews<?=$News->id?>" tabindex="-1" aria-labelledby="addNewsLabel"
                        aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewsLabel">Edit News</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  accept-charset="UTF-8" action="<?=base_url()?>editNews" method="POST" enctype="multipart/form-data">
                    <div class="row">
                    <input type="hidden" class="form-control" name="News_id" value="<?=$News->id?>">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="firstnameInput" class="form-label">Title</label>
                                <input type="text" class="form-control" name="name" id="firstnameInput"
                                    placeholder="Enter name" required value="<?=$News->title?>">
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
        var filterName = document.getElementById('searchNews').value.toUpperCase();
        var listItem = list.getElementsByClassName('Newslistdata');

        var noResultsMessage = document.getElementById('noResultsMessage');
        var resultsFound = false;

        for (var i = 0; i < listItem.length; i++) {
            var News = listItem[i];
            console.log(News);
            var NewsName = News.querySelector('h5 a').innerText.toUpperCase();
            var NewsCategory = News.querySelector('.text-muted').innerText.toUpperCase();

            if ((NewsName.indexOf(filterName) > -1) && (filterCategory === '' || NewsCategory.indexOf(filterCategory) > -1)) {
                News.style.display = "";
                resultsFound = true;
            } else {
                News.style.display = "none";
            }
        }

        // Display no results message if no matching Newss are found
        noResultsMessage.style.display = resultsFound ? 'none' : 'block';
    }
</script>