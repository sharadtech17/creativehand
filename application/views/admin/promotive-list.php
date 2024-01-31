
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Promotive</h4>
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
                        <h5 class="card-title mb-0 flex-grow-1">Promotive</h5>
                        <div class="flex-shrink-0">
                            <div class="d-flex gap-2 flex-wrap">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPromotive"><i class="ri-add-fill me-1 align-bottom"></i>Add Promotive</button>
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
                                                        <div class="gridjs-th-content">Promotive Name</div>
                                                    </th>
                                                    <th data-column-id="orders"
                                                        class="gridjs-th gridjs-th-sort text-muted"
                                                        tabindex="0" >
                                                        <div class="gridjs-th-content">Image</div>
                                                    </th>
                                                    <th data-column-id="published"
                                                        class="gridjs-th gridjs-th-sort text-muted"
                                                        tabindex="0" >
                                                        <div class="gridjs-th-content">Link</div>
                                                    </th>
                                                    <th data-column-id="action"
                                                        class="gridjs-th text-muted"
                                                        >
                                                        <div class="gridjs-th-content">Status</div>
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
                                            <?php foreach ($Promotivelist as $Promotive): ?>
                                                <tr class="gridjs-tr Promotivelistdata">
                                                    <td><?=$i++;?></td>
                                                    <td><?=$Promotive->name?></td>
                                                    <td>
                                                        <div class="flex-shrink-0 me-3">
                                                            <div class="avatar-sm bg-light rounded p-1">
                                                                <img src="<?=base_url().$Promotive->image?>" onerror="this.onerror=null; this.src='<?=base_url()?>Promotiveassets/altuser.jpg'" alt="" height="45">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?=$Promotive->link?></td>
                                                    <td class="status">
                                                    <?php if($Promotive->status === '0'){
                                                        echo '<span class="badge badge-soft-success text-uppercase">Active</span>';
                                                    }else{
                                                        echo '<span class="badge badge-soft-danger text-uppercase">In-Active</span>';
                                                    }?>
                                                    </td>
                                                    <td data-column-id="action" class=""><span>
                                                            <div class="">
                                                                <ul class="">
                                                                    <a href="" data-bs-toggle="modal" data-bs-target="#editPromotive<?=$Promotive->id?>">
                                                                        <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    </a>
                                                                    <a href="<?=base_url('PromotiveController/deletePromotive/' . $Promotive->id)?>">
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

<!-- add Promotive -->
<div class="modal fade zoomIn" id="addPromotive" tabindex="-1" aria-labelledby="addPromotiveLabel"
                        aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPromotiveLabel">Add Promotive</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  accept-charset="UTF-8" action="<?=base_url()?>addPromotivePost" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="firstnameInput" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="firstnameInput"
                                    placeholder="Enter name" required>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="lastnameInput" class="form-label">Last
                                    Image</label>
                                <input type="file" class="form-control" name="image" id="lastnameInput"
                                    placeholder="" required>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="contactnumberInput" class="form-label">
                                    Link</label>
                                <input type="text" class="form-control" name="link"
                                    id="contactnumberInput" placeholder="Enter Link" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="contactnumberInput" class="form-label">
                                    Status</label>
                                    <select class="form-select" id="choices-category-input" name="status" data-choices data-choices-search-false>
                                        <option value="0">Active</option>
                                        <option value="1">In-Active</option>
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

<?php foreach ($Promotivelist as $Promotive): ?>
<!-- add Promotive -->
<div class="modal fade zoomIn" id="editPromotive<?=$Promotive->id?>" tabindex="-1" aria-labelledby="addPromotiveLabel"
                        aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPromotiveLabel">Edit Promotive</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  accept-charset="UTF-8" action="<?=base_url()?>editPromotive" method="POST" enctype="multipart/form-data">
                    <div class="row">
                    <input type="hidden" class="form-control" name="Promotive_id" value="<?=$Promotive->id?>">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="firstnameInput" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="firstnameInput"
                                    placeholder="Enter name" required value="<?=$Promotive->name?>">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="lastnameInput" class="form-label">Last
                                    Image</label>
                                <input type="file" class="form-control" name="image" id="lastnameInput"
                                    placeholder="">
                                    <img src="<?=base_url().$Promotive->image?>" onerror="this.onerror=null; this.src='<?=base_url()?>Promotiveassets/altuser.jpg'" alt="" height="45">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="contactnumberInput" class="form-label">
                                    Link</label>
                                <input type="text" class="form-control" name="link" value="<?=$Promotive->link?>"
                                    id="contactnumberInput" placeholder="Enter Link" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="contactnumberInput" class="form-label">
                                    Status</label>
                                    <select class="form-select" id="choices-category-input" name="status" data-choices data-choices-search-false>
                                        <option value="0" <?= $Promotive->status==='0' ? 'selected' : '' ?>>Active</option>
                                        <option value="1" <?= $Promotive->status==='1' ? 'selected' : '' ?>>In-Active</option>
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
        var filterName = document.getElementById('searchPromotive').value.toUpperCase();
        var listItem = list.getElementsByClassName('Promotivelistdata');

        var noResultsMessage = document.getElementById('noResultsMessage');
        var resultsFound = false;

        for (var i = 0; i < listItem.length; i++) {
            var Promotive = listItem[i];
            console.log(Promotive);
            var PromotiveName = Promotive.querySelector('h5 a').innerText.toUpperCase();
            var PromotiveCategory = Promotive.querySelector('.text-muted').innerText.toUpperCase();

            if ((PromotiveName.indexOf(filterName) > -1) && (filterCategory === '' || PromotiveCategory.indexOf(filterCategory) > -1)) {
                Promotive.style.display = "";
                resultsFound = true;
            } else {
                Promotive.style.display = "none";
            }
        }

        // Display no results message if no matching Promotives are found
        noResultsMessage.style.display = resultsFound ? 'none' : 'block';
    }
</script>