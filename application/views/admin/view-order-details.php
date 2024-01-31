<div class="container-fluid">

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Order Details</h4>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#printButton').click(function() {
                $('#order_status').hide();
                $('#printButton').hide();
                $('#customer_details').hide();
                window.print();
            });
        });
    </script>
<!-- end page title -->

<div class="row">
    <div class="col-xl-9">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h5 class="card-title flex-grow-1 mb-0">Order #<?= $orders->order_no?></h5>
                    <div class="flex-shrink-0">
                    <?php
                        if ($orders->order_status==0 ) {
                            echo '<span class="badge badge-soft-warning text-uppercase">Pending</span>';
                        }if ($orders->order_status==1 ) {
                            echo '<span class="badge badge-soft-info text-uppercase">Procesing</span>';
                        }if ($orders->order_status==2 ) {
                            echo '<span class="badge badge-soft-primary text-uppercase">Shipping</span>';
                        }if ($orders->order_status==3 ) {
                            echo '<span class="badge badge-soft-success text-uppercase">Delivered</span>';
                        }
                    ?>
                        <button id="printButton" class="btn btn-success btn-sm"><i class="ri-download-2-fill align-middle me-1"></i> Invoice</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-nowrap align-middle table-borderless mb-0">
                        <thead class="table-light text-muted">
                            <tr>
                                <th scope="col">Art Details</th>
                                <th scope="col">Item Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col" class="text-end">Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $total_amount=0; foreach ($orderitem as $item): ?>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                            <img src="<?= base_url().$item->mainimage ?>" alt=""
                                                class="img-fluid d-block">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="fs-15"><a
                                                    href="apps-ecommerce-product-details.html"
                                                    class="link-primary"><?= $item->title ?></a></h5>
                                            <p class="text-muted mb-0">Size: <span
                                                    class="fw-medium"><?= $item->size ?></span></p>
                                        </div>
                                    </div>
                                </td>
                                <td><?= $item->price ?></td>
                                <td><?= $item->qty ?></td>
                             
                                <td class="fw-medium text-end">
                                <?= $item->subtotal ?>
                                </td>
                            </tr>
                            <?php $total_amount+=$item->subtotal ?>
                        <?php endforeach; ?>
                            <tr class="border-top border-top-dashed">
                                <td colspan="3"></td>
                                <td colspan="2" class="fw-medium p-0">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr class="border-top border-top-dashed">
                                                <th scope="row">Total (Rs) :</th>
                                                <th class="text-end"><?= $total_amount ?></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end card-->
        <div class="card" id="order_status">
            <div class="card-header">
                <div class="d-sm-flex align-items-center">
                    <h5 class="card-title flex-grow-1 mb-0">Order Status</h5>
                </div>
            </div>
            <div class="card-body">
                <form accept-charset="UTF-8" action="<?=base_url()?>ShopController/updateOrderStatus" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" class="form-control" name="order_id" value="<?=$orders->id?>">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="contactnumberInput" class="form-label">
                                    Status</label>
                                    <select class="form-select" id="choices-category-input" name="order_status" data-choices data-choices-search-false>
                                        <option value="0" <?= $orders->order_status==='0' ? 'selected' : '' ?>>Pending</option>
                                        <option value="1" <?= $orders->order_status==='1' ? 'selected' : '' ?>>Processing</option>
                                        <option value="2" <?= $orders->order_status==='2' ? 'selected' : '' ?>>Shipped</option>
                                        <option value="3" <?= $orders->order_status==='3' ? 'selected' : '' ?>>Delivered</option>
                                    </select>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
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
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-xl-3">
        
        <!--end card-->

        <div class="card" id="customer_details">
            <div class="card-header">
                <div class="d-flex">
                    <h5 class="card-title flex-grow-1 mb-0">Customer Details</h5>
                    <div class="flex-shrink-0">
                        <a href="javascript:void(0);" class="link-secondary">View Profile</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0 vstack gap-3">
                    <li>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img src="<?=base_url()?>artistassets/altuser.jpg" alt=""
                                    class="avatar-sm rounded">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1"><?= $orders->customer_name ?></h6>
                                <p class="text-muted mb-0">Customer</p>
                            </div>
                        </div>
                    </li>
                    <li><i
                            class="ri-mail-line me-2 align-middle text-muted fs-16"></i><?= $orders->customer_email ?>
                    </li>
                    <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i><?= $orders->customer_phone ?></li>
                </ul>
            </div>
        </div>
        <!--end card-->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i
                        class="ri-map-pin-line align-middle me-1 text-muted"></i> Billing Address
                </h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                    <li class="fw-medium fs-14"><?= $orders->bill_name ?></li>
                    <li><?= $orders->phone ?></li>
                    <li><?= $orders->bill_address ?></li>
                    <li><?= $orders->city.' -'. $orders->pincode ?></li>
                    <li><?= $orders->country ?></li>
                </ul>
            </div>
        </div>
        <!--end card-->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i
                        class="ri-map-pin-line align-middle me-1 text-muted"></i> Shipping Address
                </h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                    <li class="fw-medium fs-14"><?= $orders->ship_address ?></li>
                </ul>
            </div>
        </div>
        <!--end card-->

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i
                        class="ri-secure-payment-line align-bottom me-1 text-muted"></i> Payment
                    Details</h5>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Transactions:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0"><?= $orders->transaction_no ?></h6>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-shrink-0">
                        <p class="text-muted mb-0">Payment Method:</p>
                    </div>
                    <div class="flex-grow-1 ms-2">
                        <h6 class="mb-0"><?= $orders->payment_type ?></h6>
                    </div>
                </div>
             
            </div>
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<!--end row-->

</div>
