<?php
if (isset($this->session->userdata['creativehandsadmin'])) {
	redirect ('administrator/dashboard');
	die();
}
?>

	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script>
		$(document).ready(function () {
			$('#administratorlogin').submit(function (e) {
				e.preventDefault();
				
				$('.form-control').removeClass('is-invalid');

				var email = $('input[name="administratoremail"]').val();
				var password = $('input[name="administratorpassword"]').val();
				
				if (!isValidEmail(email)) {
					alertAndFocus('Please enter a valid email address.', 'input[name="email"]');
					return;
				}

				if (password === '') {
					alertAndFocus('Please enter your password.', 'input[name="password"]');
					return;
				}

				$('#administratorsubmitBtn').prop('disabled', true);
				$.ajax({
					url: this.action,
					type: this.method,
					data: $(this).serialize(),
					success: function (response) {
						if (response.success) {
	                        window.location.href = '<?=base_url()?>administrator/dashboard';
	                    } else {
	                    	$('#administratorsubmitBtn').prop('disabled', false);
	                        alert('Invalid email or password.');
	                    }
					},
					error: function (error) {
						$('#administratorsubmitBtn').prop('disabled', false);
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

			

		<section class="breadcrumb-container paira-margin-bottom-3">
				<div class=" breadcrumb" style="
				 background: linear-gradient(#070606b3, rgba(30, 23, 23, 0)) 
				 ,url(<?=base_url()?>assets/images/banner/home-banner-big.jpg); ">
					<div class="container-fluid padding-fix">

						<ul class="list-inline text-center" style="padding-top: 100px; padding-bottom: 100px;">
							<h1 class="" style="color:white;">Administrator Login</h1>
							<li><a href="<?=base_url()?>" style="font-size: larger;color: white;">Home <i
										class="fa fa-angle-right"></i></a></li>
							<li class="" style="color:#c66b15;">Administrator Login</li>
						</ul>
					</div>
				</div>
			</section>



		<!--=================== Main Content Container ===================-->
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
							<h2 class="text-capitalize margin-clear text-center"><span>Administrator Login</span></h2>
						</div>
						<div class="col-md-12 col-xs-12 col-sm-12 margin-top-30">
							<div class="form-contact">
								<div class="row">
									<form accept-charset="UTF-8" action="<?=base_url()?>administratorlogin" class="contact-form" method="post" id="administratorlogin">
										<div class="col-md-12 col-xs-12 col-sm-12" style="justify-content: center;align-items: center;display: grid;">
											<div class="input-group margin-bottom-20">
												<span class="input-group-addon" id="basic-addon13">Email</span>
												<input type="text" class="form-control" aria-describedby="basic-addon3" name="administratoremail">
											</div>
											<div class="input-group margin-bottom-20">
												<span class="input-group-addon" id="basic-addon14">Password</span>
												<input type="password" class="form-control" aria-describedby="basic-addon3" name="administratorpassword">
											</div>
											<div class="for-pass full-width">
												<button type="submit" class="btn btn-primary btn-lg" id="administratorsubmitBtn">Login</button>
												<div
													class="new-customer overflow full-width display-inline-b margin-top-15">
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>