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
                <h1 class="" style="color:white;">Order Details</h1>
                <li><a href="<?= base_url() ?>" style="font-size: larger;color: white;">Home <i
                            class="fa fa-angle-right"></i></a>
                </li>
                <li class="" style="color:#c66b15;">Order Details</li>
            </ul>
        </div>
    </div>
</section>
<!--=================== Main Content Container ===================-->
<main class="product-page">
    <!--=================== Breadcrumb Section ===================-->

    <!--=================== Product Section ===================-->
    <section class="h-100 h-custom">
        <div class="container h-100 py-5">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="col-lg-4 col-sm-1 ">
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
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr style="background-color: gray">
                                    <th scope="col">Order</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 1;
                                ?>
                                <?php foreach ($orderlist as $order): ?>
                                    <tr>
                                        <th scope="row">
                                            <div class="d-flex align-items-center">
                                                <p class="" style="font-weight: 500;margin-top:30px;">#<?= $order->order_no?></p>
                                            </div>
                                        </th>
                                        <td class="align-items-center">
                                            <p class="" style="font-weight: 500;margin-top:30px;"><?= date('M d,yy',strtotime($order->date)) ?>
                                            </p>
                                        </td>
                                        <td class="align-items-center">
                                            <p class="" style="font-weight: 500;margin-top:30px;">Processing</p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="mb-0" style="font-weight: 500;margin-top:30px;"> ₹<?= $order->total_amount?> </p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="mb-0" style="font-weight: 500;margin-top:30px;"><i class="fa fa-eye"></i></p>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#edituserform').submit(function (e) {
            e.preventDefault();

            $('.form-control').removeClass('is-invalid');

            var name = $('input[name="name"]').val();
            var number = $('input[name="number"]').val();
            var email = $('input[name="email"]').val();
            var newpassword = $('input[name="newpassword"]').val();
            var cpassword = $('input[name="cpassword"]').val();

            if (name === '') {
                alertAndFocus('Please enter your name.', 'input[name="name"]');
                return;
            }

            if (!isValidMobileNumber(number)) {
                alertAndFocus('Please enter a valid mobile number.', 'input[name="number"]');
                return;
            }

            if (!isValidEmail(email)) {
                alertAndFocus('Please enter a valid email address.', 'input[name="email"]');
                return;
            }
            if (newpassword !== cpassword) {
                alertAndFocus('Passwords do not match. Please enter matching passwords.', 'input[name="cpassword"]');
                return;
            }
            this.submit();
        });
        function alertAndFocus(message, fieldSelector) {
            alert(message);
            $(fieldSelector).focus();
        }

        function isValidMobileNumber(number) {
            var mobileNumberRegex = /^\d{10}$/;
            return mobileNumberRegex.test(number);
        }

        function isValidEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    });
</script>