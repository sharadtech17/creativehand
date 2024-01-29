<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Shop Arts</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <?php include('flash-message.php'); ?>
        <div class="col-lg-12">
            <div class="card" id="invoiceList">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Shop Arts</h5>
                        <div class="flex-shrink-0">
                            <div class="d-flex gap-2 flex-wrap">
                                <button class="btn btn-primary" id="remove-actions" onClick="deleteMultiple()"><i
                                        class="ri-delete-bin-2-line"></i></button>
                                <a href="<?= base_url() ?>ShopController/addViewArtShop" class="btn btn-success"><i
                                        class="ri-add-line align-bottom me-1"></i> Add art</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content text-muted">
                        <div class="tab-pane" id="productnav-all" role="tabpanel">
                            <div id="table-product-list-all" class="table-card gridjs-border-none">
                            </div>
                        </div>
                        <!-- end tab pane -->
                        <div class="tab-pane active show" id="productnav-published" role="tabpanel">
                            <div id="table-product-list-published" class="table-card gridjs-border-none">
                                <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                                    <div class="gridjs-wrapper" style="height: auto;">
                                        <table role="grid" id="tableExport" class="gridjs-table" style="height: auto;">
                                            <thead class="gridjs-thead">
                                                <tr class="gridjs-tr">
                                                    <th data-column-id="#" class="gridjs-th text-muted"
                                                        style="width: 40px;">
                                                        <div class="gridjs-th-content">sr</div>
                                                    </th>
                                                    <th data-column-id="product"
                                                        class="gridjs-th gridjs-th-sort text-muted" tabindex="0"
                                                        style="width: 360px;">
                                                        <div class="gridjs-th-content">Art Name</div>
                                                    </th>

                                                    <th data-column-id="product"
                                                        class="gridjs-th gridjs-th-sort text-muted" tabindex="0"
                                                        style="width: 360px;">
                                                        <div class="gridjs-th-content">Artist Name</div>
                                                    </th>
                                                    <th data-column-id="rating"
                                                        class="gridjs-th gridjs-th-sort text-muted" tabindex="0"
                                                        style="width: 105px;">
                                                        <div class="gridjs-th-content">Category</div>
                                                    </th>
                                                    <th data-column-id="published"
                                                        class="gridjs-th gridjs-th-sort text-muted" tabindex="0"
                                                        style="width: 220px;">
                                                        <div class="gridjs-th-content">Price
                                                        </div>
                                                    </th>

                                                    <th data-column-id="published"
                                                        class="gridjs-th gridjs-th-sort text-muted" tabindex="0"
                                                        style="width: 220px;">
                                                        <div class="gridjs-th-content">Size
                                                        </div>
                                                    </th>
                                                    <th data-column-id="published"
                                                        class="gridjs-th gridjs-th-sort text-muted" tabindex="0"
                                                        style="width: 220px;">
                                                        <div class="gridjs-th-content">Published
                                                        </div>
                                                    </th>
                                                    <th data-column-id="action" class="gridjs-th text-muted"
                                                        style="width: 80px;">
                                                        <div class="gridjs-th-content">Action</div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="gridjs-tbody">
                                                <?php
                                                $i = 1;
                                                ?>
                                                <?php foreach ($shoplist as $Shop): ?>
                                                    <tr class="gridjs-tr">
                                                        <td data-column-id="#" class="gridjs-td"><span>
                                                                <div class="form-check checkbox-product-list">

                                                                    <label class="form-check-label"
                                                                        for="checkbox-undefined">
                                                                        <?= $i++; ?>
                                                                    </label>
                                                                </div>
                                                            </span></td>
                                                        <td data-column-id="product" class="gridjs-td">
                                                            <span>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0 me-3">

                                                                    </div>
                                                                    <div class="flex-grow-1">
                                                                        <h5 class="fs-14 mb-1"><a class="text-dark">
                                                                                <?= $Shop->title ?>
                                                                            </a>
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </span>
                                                        </td>
                                                        <td data-column-id="rating" class="gridjs-td">
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-14 mb-1"><a class="text-dark">
                                                                        <?= $Shop->artistname ?>
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                        </td>
                                                        <td data-column-id="rating" class="gridjs-td">
                                                            <span><small class="">
                                                                    <?= $Shop->categoryname ?>
                                                                </small></span>
                                                        </td>
                                                        <td data-column-id="published" class="gridjs-td">
                                                            <span>
                                                                <?= $Shop->price ?>
                                                            </span>
                                                        </td>

                                                        <td data-column-id="published" class="gridjs-td">
                                                            <span>
                                                                <?= $Shop->size ?>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <?= $Shop->cr_dt?>
                                                        </td>
                                                        <td data-column-id="action" class="gridjs-td">
                                                            <span>
                                                                <div class="dropdown"><button
                                                                        class="btn btn-soft-secondary btn-sm dropdown"
                                                                        type="button" data-bs-toggle="dropdown"
                                                                        aria-expanded="false" fdprocessedid="0e2rqe"><i
                                                                            class="ri-more-fill"></i></button>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li>
                                                                            <a class="dropdown-item"
                                                                                href="<?= base_url('ShopController/editArtShop/' . $Shop->id) ?>">
                                                                                <i
                                                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                                Edit
                                                                            </a>
                                                                        </li>
                                                                        <li class="dropdown-divider">
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item remove-list"
                                                                                href="<?= base_url('ShopController/deleteArtShop/' . $Shop->id) ?>">
                                                                                <i
                                                                                    class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                                Delete
                                                                            </a>
                                                                        </li>
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
                        <!-- end tab pane -->
                        <div class="tab-pane" id="productnav-draft" role="tabpanel">
                            <div class="py-4 text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                    colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px">
                                </lord-icon>
                                <h5 class="mt-4">Sorry! No Result Found</h5>
                            </div>
                        </div>
                        <!-- end tab pane -->
                    </div>
                    <!-- end tab content -->
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</div><!-- container-fluid -->