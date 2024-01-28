<?php
if (!isset($this->session->userdata['creativehandsuser'])) {
    redirect('user-login');
    die();
}
?>
<section class="breadcrumb-container paira-margin-bottom-3">
    <div class=" breadcrumb"
        style="background: linear-gradient(#070606b3, rgba(30, 23, 23, 0)) ,url(<?= base_url() ?>assets/images/banner/home-banner-big.jpg); ">
        <div class="container-fluid padding-fix">

            <ul class="list-inline text-center" style="padding-top: 100px; padding-bottom: 100px;">
                <h1 class="" style="color:white;">Addresses Details</h1>
                <li><a href="<?= base_url() ?>" style="font-size: larger;color: white;">Home <i
                            class="fa fa-angle-right"></i></a>
                </li>
                <li class="" style="color:#c66b15;">Addresses Details</li>
            </ul>
        </div>
    </div>
</section>
<!--=================== Main Content Container ===================-->
<main class="product-page">

    <section class="h-100 h-custom">
        <div class="container h-100 py-5">

            <div class="row d-flex justify-content-center align-items-center h-100">
                <h1 class="text-center">Addresses
                </h1>
                <div class="col-lg-4">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <a href="<?= base_url() ?>user/account"> Account details </a>
                                        </div>
                                    </th>
                                    <td class="align-items-center">
                                        <i class="fa fa-address-card"></i>
                                    </td>

                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <a href="<?= base_url() ?>user/orders"> Orders</a>
                                        </div>
                                    </th>
                                    <td class="align-items-center">
                                        <i class="fa fa-share"></i>
                                    </td>

                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <a href="<?= base_url() ?>user/address"> Address </a>
                                        </div>
                                    </th>
                                    <td class="align-items-center">
                                        <i class="fa fa-address-card"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <a href="<?= base_url() ?>user/logout"> Log out</a>
                                        </div>
                                    </th>
                                    <td class="align-items-center">
                                        <i class="fa fa-sign-in"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-8">
                    <h6>The following addresses will be used on the checkout page by default.</h6>
                    <form accept-charset="UTF-8" action="<?=base_url()?>edit/Address" method="POST" enctype="multipart/form-data">
                        <div class="table-responsive row">
                            <div class="col-lg-5">
                                <h3 class="col-lg-10">Billing address</h3>
                                <h5 class="col-lg-12" style="color: gray;">
                                <textarea name="bill_address" class="form-control">
                                    <?= $user->bill_address ?>
                                </textarea>
                                </h5>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="col-lg-10">Shipping address</h3>
                                <div class="col-lg-2"><button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i></button></div>
                                <h5 class="col-lg-12" style="color: gray;">
                                <textarea name="ship_address" class="form-control">
                                    <?= $user->ship_address ?>
                                </textarea>
                                </h5>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>