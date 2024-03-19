
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Subscription</h4>
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
                        <h5 class="card-title mb-0 flex-grow-1">Subscription</h5>
                        <div class="flex-shrink-0">
                            <div class="d-flex gap-2 flex-wrap">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSubscription"><i class="ri-add-fill me-1 align-bottom"></i>Add Subscription</button>
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
                                                        <div class="gridjs-th-content">Subscription Title</div>
                                                    </th>
                                                    <th data-column-id="orders"
                                                        class="gridjs-th gridjs-th-sort text-muted"
                                                        tabindex="0" >
                                                        <div class="gridjs-th-content">Amount</div>
                                                    </th>
                                                    <th data-column-id="published"
                                                        class="gridjs-th gridjs-th-sort text-muted"
                                                        tabindex="0" >
                                                        <div class="gridjs-th-content">Subscription Type</div>
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
                                            <?php foreach ($Subscriptionlist as $Subscription): ?>
                                                <tr class="gridjs-tr Subscriptionlistdata">
                                                    <td><?=$i++;?></td>
                                                    <td><?=$Subscription->name?></td>
                                                    <td><?=$Subscription->amount?></td>
                                                    <td><?=$Subscription->type?></td>
                                                    <td class="status">
                                                    <?php if($Subscription->status === '0'){
                                                        echo '<span class="badge badge-soft-success text-uppercase">Active</span>';
                                                    }else{
                                                        echo '<span class="badge badge-soft-danger text-uppercase">In-Active</span>';
                                                    }?>
                                                    </td>
                                                    <td data-column-id="action" class=""><span>
                                                            <div class="">
                                                                <ul class="">
                                                                    <a href="" data-bs-toggle="modal" data-bs-target="#editSubscription<?=$Subscription->id?>">
                                                                        <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
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

<!-- add Subscription -->
<div class="modal fade zoomIn" id="addSubscription" tabindex="-1" aria-labelledby="addSubscriptionLabel"
                        aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSubscriptionLabel">Add Subscription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  accept-charset="UTF-8" action="<?=base_url()?>addSubscriptionPost" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="firstnameInput" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="firstnameInput"
                                    placeholder="Enter name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="firstnameInput" class="form-label">Amount</label>
                                <input type="text" class="form-control" name="amount" id="firstnameInput"
                                    placeholder="Enter Amount" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="contactnumberInput" class="form-label">
                                    Subscription type</label>
                                    <select class="form-select" id="choices-category-input" name="type" data-choices data-choices-search-false>
                                        <option value="Artist Subscription">Artist Subscription</option>
                                        <option value="Event Subscription">Event Subscription</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="firstnameInput" class="form-label"> QTY Per Event/Artist</label>
                                <input type="text" class="form-control" name="qty_value" id="firstnameInput"
                                    placeholder="Enter QTY" required>
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
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="contactnumberInput" class="form-label">Description</label>
                                <textarea class="form-control" name="description" placeholder="1 year unlimited event add , Add artist and create arts"></textarea>
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

<?php foreach ($Subscriptionlist as $Subscription): ?>
<!-- add Subscription -->
<div class="modal fade zoomIn" id="editSubscription<?=$Subscription->id?>" tabindex="-1" aria-labelledby="addSubscriptionLabel"
                        aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSubscriptionLabel">Edit Subscription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  accept-charset="UTF-8" action="<?=base_url()?>editSubscription" method="POST" enctype="multipart/form-data">
                    <div class="row">
                    <input type="hidden" class="form-control" name="subscription_id" value="<?=$Subscription->id?>">
                    <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="firstnameInput" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="firstnameInput"
                                    placeholder="Enter name" value="<?= $Subscription->name ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="firstnameInput" class="form-label">Amount</label>
                                <input type="text" class="form-control" name="amount" value="<?= $Subscription->amount ?>" id="firstnameInput"
                                    placeholder="Enter Amount" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="contactnumberInput" class="form-label">
                                    Subscription type</label>
                                    <select class="form-select" id="choices-category-input" name="type" data-choices data-choices-search-false>
                                        <option value="Artist Subscription"  <?= $Subscription->type==='Artist Subscription' ? 'selected' : '' ?>>Artist Subscription</option>
                                        <option value="Event Subscription"  <?= $Subscription->type==='Event Subscription' ? 'selected' : '' ?>>Event Subscription</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="firstnameInput" class="form-label"> QTY Per Event/Artist</label>
                                <input type="text" class="form-control" name="qty_value" id="firstnameInput" value="<?= $Subscription->qty_value ?>"
                                    placeholder="Enter QTY" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="contactnumberInput" class="form-label">
                                    Status</label>
                                    <select class="form-select" id="choices-category-input" name="status" data-choices data-choices-search-false>
                                        <option value="0" <?= $Subscription->status==='0' ? 'selected' : '' ?>>Active</option>
                                        <option value="1" <?= $Subscription->status==='1' ? 'selected' : '' ?>>In-Active</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="contactnumberInput" class="form-label">Description</label>
                                <textarea class="form-control" name="description"><?=$Subscription->description?></textarea>
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
        var filterName = document.getElementById('searchSubscription').value.toUpperCase();
        var listItem = list.getElementsByClassName('Subscriptionlistdata');

        var noResultsMessage = document.getElementById('noResultsMessage');
        var resultsFound = false;

        for (var i = 0; i < listItem.length; i++) {
            var Subscription = listItem[i];
            console.log(Subscription);
            var SubscriptionName = Subscription.querySelector('h5 a').innerText.toUpperCase();
            var SubscriptionCategory = Subscription.querySelector('.text-muted').innerText.toUpperCase();

            if ((SubscriptionName.indexOf(filterName) > -1) && (filterCategory === '' || SubscriptionCategory.indexOf(filterCategory) > -1)) {
                Subscription.style.display = "";
                resultsFound = true;
            } else {
                Subscription.style.display = "none";
            }
        }

        // Display no results message if no matching Subscriptions are found
        noResultsMessage.style.display = resultsFound ? 'none' : 'block';
    }
</script>