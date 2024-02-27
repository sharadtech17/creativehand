<?php
if (isset($this->session->userdata['creativehandsuser'])) {
	redirect ('user/account');
	die();
}
?>
?><section class="breadcrumb-container paira-margin-bottom-3">
				<div class=" breadcrumb" style="
			 background: linear-gradient(#070606b3, rgba(30, 23, 23, 0)) 
			 ,url(<?=base_url()?>assets/images/banner/home-banner-big.jpg); ">
					<div class="container-fluid padding-fix">

						<ul class="list-inline text-center" style="padding-top: 100px; padding-bottom: 100px;">
							<h1 class="" style="color:white;">User Register</h1>
							<li><a href="<?=base_url()?>" style="font-size: larger;color: white;">Home <i
										class="fa fa-angle-right"></i></a></li>
							<li class="" style="color:#c66b15;">User Register</li>
						</ul>
					</div>
				</div>
			</section>
<main class="register-page">
	<!--=================== latest Collection Section ===================-->
	<section class="register-content paira-margin-bottom-3">
		<div class="container">
			<div class="row">
				<div class="col-md-12 heading-title">
					<h2 class="text-capitalize margin-clear text-center"><span>User Register</span></h2>
				</div>
				<div class="col-md-6 col-xs-12 col-sm-6 margin-top-30">
					<div class="form-contact">
						<div class="row">
						<form accept-charset="UTF-8" action="<?=base_url()?>addregisteruser" class="contact-form" method="post" id="registerform">
								<div class="col-xs-12 col-md-12 col-sm-12">
									<input name="form_type" type="hidden" value="contact">
									<input name="utf8" type="hidden" value="✓">
									<div class="input-group margin-bottom-20">
										<span class="input-group-addon" id="basic-addon15">Name</span>
										<input type="text" class="form-control" aria-describedby="basic-addon3" name="name" required>
									</div>
									<div class="input-group margin-bottom-20">
										<span class="input-group-addon" id="basic-addon13"> Number
										</span>
										<input type="number" id="mobile_code" class="form-control" aria-describedby="basic-addon3" name="number" required>
									</div>
									<div class="input-group margin-bottom-20">
										<span class="input-group-addon" id="basic-addon13">Email</span>
										<input type="email" class="form-control" aria-describedby="basic-addon3" name="email" required>
									</div>
									<div class="input-group margin-bottom-20">
										<span class="input-group-addon" id="basic-addon14">Password</span>
										<input type="password" class="form-control" min="8" max="8" size="8" aria-describedby="basic-addon3" name="password" required>

									</div>
									<div class="input-group margin-bottom-20">
										<span class="input-group-addon" id="basic-addon14">Canfirm
											Password</span>
										<input type="password" class="form-control" min="8" aria-describedby="basic-addon3" name="cpassword" required>
									</div>
									<div style="display: flex;  justify-content: center; gap: 6px;">
										<div class="input-group margin-bottom-20" style="margin-top: 6px;">
											<div><input type="checkbox" name="tandc" required></div>
										</div>
										<div>
											<h5> I Accept <a href="<?=base_url('HomeController/privacy_policy')?>" style="color: #c66b15;">  Privacy Policy </a> and <a href="<?=base_url('HomeController/term_condition')?>"  style="color: #c66b15;"> Terms and Conditions</a></h5>
										</div>
									</div>


									<div class="for-pass full-width">

										<button type="submit" class="btn btn-primary btn-lg" id="submitBtn">Create An Account</button>
									</div>

								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-xs-12 col-sm-6 margin-top-30">
					<div class="creat-account">
						<h4 class="margin-clear">Already have a account?</h4>
						<a href="<?=base_url()?>user-login" class="btn btn-lg btn-success margin-top-15">Login</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
			
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
	$(document).ready(function () {
		$('#registerform').submit(function (e) {
			e.preventDefault();
			$('.form-control').removeClass('is-invalid');
			
			var name = $('input[name="name"]').val();
			var number = $('input[name="number"]').val();
			var email = $('input[name="email"]').val();
			var password = $('input[name="password"]').val();
			var cpassword = $('input[name="cpassword"]').val();
			var tandc = $('input[name="tandc"]').prop('checked');
			
			// alert($(this).serialize());
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

    		if (password === '') {
                alertAndFocus('Please enter your password.', 'input[name="password"]');
                return;
            }
            
            if (password.length < 8) {
                alertAndFocus('Password must be at least 8 characters long.', 'input[name="password"]');
                return;
            }
            
            if (cpassword === '') {
                alertAndFocus('Please confirm your password.', 'input[name="cpassword"]');
                return;
            }
            
            if (password !== cpassword) {
                alertAndFocus('Passwords do not match. Please enter matching passwords.', 'input[name="cpassword"]');
                return;
            }


			if (!tandc) {
				alertAndFocus('Please accept privacy policy & terms & conditions.', 'input[name="tandc"]');
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