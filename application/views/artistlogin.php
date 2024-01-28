<?php
if (isset($this->session->userdata['creativehandsartist'])) {
	redirect ('artist-panel/dashboard');
	die();
}
?>
<section class="breadcrumb-container paira-margin-bottom-3">
				<div class=" breadcrumb" style="
				 background: linear-gradient(#070606b3, rgba(30, 23, 23, 0)) 
				 ,url(<?=base_url()?>assets/images/banner/home-banner-big.jpg); ">
					<div class="container-fluid padding-fix">

						<ul class="list-inline text-center" style="padding-top: 100px; padding-bottom: 100px;">
							<h1 class="" style="color:white;">Artist Login</h1>
							<li><a href="<?=base_url()?>" style="font-size: larger;color: white;">Home <i
										class="fa fa-angle-right"></i></a></li>
							<li class="" style="color:#c66b15;">Artist Login</li>
						</ul>
					</div>
				</div>
			</section>
	<main class="login-page">
			<!--=================== Breadcrumb Section ===================-->
			<!-- <section class="breadcrumb-container paira-margin-bottom-3">
				<div class="breadcrumb">
					<div class="container-fluid padding-fix">
						<ul class="list-inline">
							<li><a href="#">Home</a></li>
							<li>-</li>
							<li>Login</li>
						</ul>
					</div>
				</div>
			</section> -->
			<!--=================== latest Collection Section ===================-->
			<section class="login-content paira-margin-bottom-3">
				<div class="container">
					<div class="row">
						<div class="col-md-12 heading-title">
							<h2 class="text-capitalize margin-clear text-center"><span>Artist Login</span></h2>
						</div>
						<div class="col-md-6 col-xs-12 col-sm-6 margin-top-30">
							<div class="form-contact">
								<div class="row">
									<form accept-charset="UTF-8" action="<?=base_url()?>artistlogin" class="contact-form" method="post" id="artistlogin">
										<div class="col-md-12 col-xs-12 col-sm-12">
											<div class="input-group margin-bottom-20">
												<span class="input-group-addon" id="basic-addon13">Email</span>
												<input type="text" class="form-control" aria-describedby="basic-addon3" name="email">
											</div>
											<div class="input-group margin-bottom-20">
												<span class="input-group-addon" id="basic-addon14">Password</span>
												<input type="password" class="form-control" aria-describedby="basic-addon3" name="password">
											</div>
											<div class="for-pass full-width">
												<button type="submit" class="btn btn-primary btn-lg" id="submitBtn">Login Account</button>
												<div
													class="new-customer overflow full-width display-inline-b margin-top-15">

													<a href="reset-<?=base_url()?>" class="forget margin-top-15 text-color-1 
														brand-color text-underline">Reset
														Password </a>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-xs-12 col-sm-6 margin-top-30">
							<div class="creat-account">
								<h4 class="margin-clear">Are you new Artist?</h4>
								<a href="<?=base_url()?>artist-register" class="btn btn-lg btn-success margin-top-15">Create An
									Account</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script>
		$(document).ready(function () {
			$('#artistlogin').submit(function (e) {
				e.preventDefault();
				
				$('.form-control').removeClass('is-invalid');

				var email = $('input[name="email"]').val();
				var password = $('input[name="password"]').val();
				
				if (!isValidEmail(email)) {
					alertAndFocus('Please enter a valid email address.', 'input[name="email"]');
					return;
				}

				if (password === '') {
					alertAndFocus('Please enter your password.', 'input[name="password"]');
					return;
				}

				$('#submitBtn').prop('disabled', true);
				$.ajax({
					url: this.action,
					type: this.method,
					data: $(this).serialize(),
					success: function (response) {
						if (response.success) {
	                        window.location.href = '<?=base_url()?>artist-panel/view-profile';
	                    } else {
	                    	$('#submitBtn').prop('disabled', false);
	                        alert('Invalid email or password.');
	                    }
					},
					error: function (error) {
						$('#submitBtn').prop('disabled', false);
						alert('An error occurred while submitting the form.');
					}
				});
			});
			
			function alertAndFocus(message, fieldSelector) {
				alert(message);
				$(fieldSelector).focus();
			}
			
			function isValidEmail(email) {
				var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
				return emailRegex.test(email);
			}
		});
	</script>