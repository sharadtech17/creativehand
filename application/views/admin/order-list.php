<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Orders</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="orderList">
                <div class="card-header border-0">
                    <div class="row align-items-center gy-3">
                        <div class="col-sm">
                            <h5 class="card-title mb-0">Order History</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body border border-dashed border-end-0 border-start-0">
                    
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive table-card mb-1">
                        <table class="table table-nowrap align-middle" id="tableExport">
                            <thead class="text-muted table-light">
                                <tr class="text-uppercase">
                                    <th scope="col" style="width: 25px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll"
                                                value="option">
                                        </div>
                                    </th>
                                    <th class="sort" data-sort="id">Order ID</th>
                                    <th class="sort" data-sort="customer_name">Customer</th>
                                    <th class="sort" data-sort="product_name">Arts</th>
                                    <th class="sort" data-sort="date">Order Date</th>
                                    <th class="sort" data-sort="amount">Amount</th>
                                    <th class="sort" data-sort="payment">Payment Method</th>
                                    <th class="sort" data-sort="status">Delivery Status</th>
                                    <th class="sort" data-sort="city">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                <?php
                                $i = 1;
                                ?>
                                <?php foreach ($orderlist as $order): ?>
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="checkAll"
                                                    value="option1">
                                            </div>
                                        </th>
                                        <td class="id"><a href="apps-ecommerce-order-details.html"
                                                class="fw-medium link-primary"><?= $order->order_no ?></a></td>
                                        <td class="customer_name"><?= $order->customer_name ?></td>
                                        <td class="product_name"><?= $order->order_no ?></td>
                                        <td class="date"><?= date('d M,yy',strtotime($order->date)) ?> <small class="text-muted"></small></td>
                                        <td class="amount"><?= $order->total_amount ?></td>
                                        <td class="payment"><?= $order->payment_type ?></td>
                                        <td>
                                            <?php
                                                if ($order->order_status==0 ) {
                                                    echo '<span class="badge badge-soft-warning text-uppercase">Pending</span>';
                                                }if ($order->order_status==1 ) {
                                                    echo '<span class="badge badge-soft-info text-uppercase">Procesing</span>';
                                                }if ($order->order_status==2 ) {
                                                    echo '<span class="badge badge-soft-primary text-uppercase">Shipping</span>';
                                                }if ($order->order_status==3 ) {
                                                    echo '<span class="badge badge-soft-success text-uppercase">Delivered</span>';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item" data-bs-toggle="tooltip"
                                                    data-bs-trigger="hover" data-bs-placement="top"
                                                    title="View">
                                                    <a href="<?= base_url().'administrator/view-Order-Details/'.$order->id?>"
                                                        class="text-primary d-inline-block">
                                                        <i class="ri-eye-fill fs-16"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item" data-bs-toggle="tooltip"
                                                    data-bs-trigger="hover" data-bs-placement="top"
                                                    title="Remove">
                                                    <a class="text-danger d-inline-block remove-item-btn"
                                                        data-bs-toggle="modal" href="#deleteOrder">
                                                        <i class="ri-delete-bin-5-fill fs-16"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
<!-- End Page-content -->
</div>