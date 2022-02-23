<?PHP
include('include/header.php');
?>
	<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
							
							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left"style="padding-right:100px;">
										<img src="images/login-img.png" class="img-fluid" alt=" Login">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Login <span></span></h3>
										</div>
										<form action="twilio/sms.php" method="post">
											<div class="form-group">
												<label>Number</label>
												<input type="text" class="form-control" name="mobile">
											</div>
										
										
											<button class="btn btn-primary btn-lg login-btn" type="submit">Login</button>
											<div class="login-or">
												<span class="or-line"></span>
												<span class="span-or">OR</span>
											</div>
											<div class="row form-row social-login">
												<div class="col-6">
													<a href="#" class="btn btn-facebook btn-block"><img src="images/fb.png" class="img-fluid" alt="Logo"></a>
												</div>
												<div class="col-6">
													<a href="#" class="btn btn-google btn-block"><img src="images/google.png" class="img-fluid" alt="Logo"></a>
												</div>
											</div>
										<div class="text-center dont-have">Don’t have an account? <a href="register">Register</a></div>
										</form>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
<?php
include('include/footer.php');