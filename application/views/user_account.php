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
                <h1 class="" style="color:white;">Account Details</h1>
                <li><a href="<?= base_url() ?>" style="font-size: larger;color: white;">Home <i
                            class="fa fa-angle-right"></i></a>
                </li>
                <li class="" style="color:#c66b15;">Account Details</li>
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
                    <div class="col-lg-8 col-sm-1 px-5 py-4">
                        <form accept-charset="UTF-8" action="<?=base_url()?>editUser" method="POST" enctype="multipart/form-data" id="edituserform">
                            <div class="row mar">
                                <div class="col-md-6 mb-5">
                                    <div class="form-outline">
                                        <label class="form-label" for="typeExp">Fast Name</label>
                                        <input type="text" id="typeExp" class="form-control form-control-lg"
                                            value="<?= $user->first_name ?>" name="f_name" size="7" id="exp" minlength="7"
                                            maxlength="7" />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <div class="form-outline">
                                        <label class="form-label" for="typeText">Last Name</label>

                                        <input type="text" id="typeText" name="l_name" value="<?= $user->last_name ?>"
                                            class="form-control form-control-lg" size="1" minlength="3" maxlength="3" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-outline mb-5 margin-top-20">
                                <label class="form-label" for="typeText">Display name</label>
                                <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                                    minlength="19" maxlength="19" />
                                <p>This will be how your name will be displayed in the account
                                    section and in reviews</p>
                            </div>
                            <div class="row margin-top-20">
                                <div class="col-md-6 mb-5">
                                    <div class="form-outline">
                                        <label class="form-label" for="typeExp">Email
                                            address</label>
                                        <input type="email" id="typeExp" name="email" class="form-control form-control-lg"
                                            value="<?= $user->email ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <div class="form-outline">
                                        <label class="form-label" for="typeExp">Phone</label>
                                        <input type="number" id="typeExp" name="number" class="form-control form-control-lg"
                                            value="<?= $user->phone ?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row margin-bottom-40 margin-top-40 text-left">
                                <label class="form-label col-lg-12" for="typeExp">Password change</label>
                                <div class="col-md-4 mb-5">
                                    <div class="form-outline">
                                        <label class="form-label col-lg-12" for="typeExp">Current password</label>
                                        <input type="password" name="password" id="typeExp" class="form-control form-control-lg" />
                                    </div>
                                </div>
                                <div class="col-md-4 mb-5">
                                    <div class="form-outline">
                                        <label class="form-label col-lg-12" for="typeExp">Password change</label>
                                        <input type="password" id="typeExp" name="newpassword" class="form-control form-control-lg" />
                                    </div>
                                </div>
                                <div class="col-md-4 mb-5">
                                    <div class="form-outline">
                                        <label class="form-label col-lg-12" for="typeExp">Confirm new password</label>
                                        <input type="password" id="typeExp" name="cpassword" class="form-control form-control-lg" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-5">
                                    <button type="submit" class="product-cart-con btn btn-primary btn-lg text-capitalize margin-bottom-30">Save Changes</button>
                                </div>
                            </div>
                        </form>
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