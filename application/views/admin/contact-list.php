
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Contact</h4>
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
                        <h5 class="card-title mb-0 flex-grow-1">Contact</h5>
                        <div class="flex-shrink-0">
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
                                                        <div class="gridjs-th-content">Name</div>
                                                    </th>
                                                    <th data-column-id="orders"
                                                        class="gridjs-th gridjs-th-sort text-muted"
                                                        tabindex="0" >
                                                        <div class="gridjs-th-content">Email</div>
                                                    </th>
                                                    <th data-column-id="published"
                                                        class="gridjs-th gridjs-th-sort text-muted"
                                                        tabindex="0" >
                                                        <div class="gridjs-th-content">Phone</div>
                                                    </th>
                                                    <th data-column-id="action"
                                                        class="gridjs-th text-muted"
                                                        >
                                                        <div class="gridjs-th-content">Subject</div>
                                                    </th>
                                                    <th data-column-id="action"
                                                        class="gridjs-th text-muted"
                                                        >
                                                        <div class="gridjs-th-content">Comments</div>
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
                                            <?php foreach ($contactlist as $Contact): ?>
                                                <tr class="gridjs-tr Contactlistdata">
                                                    <td><?=$i++;?></td>
                                                    <td><?=$Contact->name?></td>
                                                    <td><?=$Contact->email?></td>
                                                    <td><?=$Contact->phone?></td>
                                                    <td><?=$Contact->subject?></td>
                                                    <td><?=$Contact->comment?></td>
                                                    <td data-column-id="action" class="">
                                                        <a href="<?=base_url('ContactController/deleteContact/' . $Contact->id)?>">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                        </a>
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