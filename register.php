<?php

include_once 'include/adminConfig.php';
// include_once 'include/configurationadmin.php';

include('include/header.php');

?>
	<!-- /Header -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<!-- Register Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="images/login-img.png" class="img-fluid" alt=" Login">		
											<div aria-live="polite" aria-atomic="true" style="position: relative; top: -200px; min-height: 200px;" >
												<div class="toast bg-danger" style="position: relative;  ">
													<div class="toast-header danger">
											        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
											        	<span aria-hidden="true">&times;</span>
											        </button>
											    </div>
											    <div class="toast-body" style="color: white;">
											       
											    </div>
											  </div>
											</div>
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3> Register</h3>
										</div>
										
										<!-- Register Form -->
										<form  id="signUpForm" method="POST">
											<div class="form-group">
												<label>Name</label>
												<input type="text"  name="username" class="form-control">
											</div>
											<div class="form-group">
												<label> Email</label>
												<input type="text" name="email"  class="form-control">
											</div>
												<div class="form-group">
												<label>Mobile Number</label>
												<input type="text" name="phone"  class="form-control">
											</div>
											<!-- <div class="form-group">
												<label>Create Password</label>
												<input type="password" class="form-control">
											</div> -->
											<div class="text-left">
												<a class="forgot-link" href="login">Already have an account?</a>
											</div>
											<input type="submit" name="signUpBtn" class=" btn btn-primary btn-lg login-btn" value=" Sign Up">
											<!-- <button class="btn btn-primary btn-lg login-btn" id="frmSubmit">Sign Up</button> -->
											<div class="login-or">
												<span class="or-line"></span>
												<span class="span-or">or</span>
											</div>
											<div class="row form-row social-login">
												<div class="col-6">
													<a href="#" class="btn btn-facebook btn-block"><img src="images/fb.png" class="img-fluid" alt="fb"> Login</a>
												</div>
												<div class="col-6">
													<a href="#" class="btn btn-google btn-block"><img src="images/google.png" class="img-fluid" alt="Logo"> Login</a>
												</div>
											</div>
										</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Register Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
<?php
include('include/footer.php');



?>

<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#success_tic">Open Modal</button> -->

<!-- Modal -->
<div id="success_tic" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <a class="close" href="#" data-dismiss="modal">&times;</a>
      <div class="page-body">
    <div class="head">  
      <h3 style="margin-top:5px; color :green">Successfull</h3>
      <h4>Please Login Now </h4>
    </div>

  <h1 style="text-align:center;"><div class="checkmark-circle">
  <div class="background"></div>
  <div class="checkmark draw"></div>
</div><h1>

  </div>
</div>
    </div>

  </div>
<script>
  $(document).ready(function() 
  {
    $("#signUpForm").submit(function(e) 
    {
      e.preventDefault()
      
      $.ajax({
        type: "post",
        dataType: 'json',
        url: "registerfun.php",
        // data: { username : "name", email: "email", phone:"55555" },
        data : $("#signUpForm").serialize(),
        success:function(res)
        {
          // var data = JSON.parse(res)
            
            if (res.status == 200) 
            {
              $("#success_tic").modal('show')
              setTimeout(function() {$('#success_tic').modal('hide');}, 3000);
              setTimeout(function() {
              window.location.replace("login.php")
              }, 4000);
            }
            else
            {

              $('.toast').toast({delay: 3000});
              $(".toast").toast('show')
              $(".toast-body").html(res.message)
            }
      },
        error: function (res) 
        {
          console.log(res);
        }
    });
    })
  })
	
</script>
<style>
	
git stash save --keep-index --include-untracked
 #success_tic .page-body{
  max-width:200px;
  background-color:#FFFFFF;
  margin:5% auto;
}
 #success_tic .page-body .head{
  text-align:center;
}
/* #success_tic .tic{
  font-size:186px;
} */
#success_tic .close{
      opacity: 1;
    position: absolute;
    right: 0px;
    font-size: 20px;
    padding: 3px 15px;
  margin-bottom: 10px;
}
#success_tic .checkmark-circle {
  width: 150px;
  height: 150px;
  position: relative;
  display: inline-block;
  vertical-align: top;
}
.checkmark-circle .background {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  background: #1ab33b;
  position: absolute;
}
#success_tic .checkmark-circle .checkmark {
  border-radius: 5px;
}
#success_tic .checkmark-circle .checkmark.draw:after {
  -webkit-animation-delay: 300ms;
  -moz-animation-delay: 300ms;
  animation-delay: 300ms;
  -webkit-animation-duration: 1s;
  -moz-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-timing-function: ease;
  -moz-animation-timing-function: ease;
  animation-timing-function: ease;
  -webkit-animation-name: checkmark;
  -moz-animation-name: checkmark;
  animation-name: checkmark;
  -webkit-transform: scaleX(-1) rotate(135deg);
  -moz-transform: scaleX(-1) rotate(135deg);
  -ms-transform: scaleX(-1) rotate(135deg);
  -o-transform: scaleX(-1) rotate(135deg);
  transform: scaleX(-1) rotate(135deg);
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
}
#success_tic .checkmark-circle .checkmark:after {
  opacity: 1;
  height: 75px;
  width: 37.5px;
  -webkit-transform-origin: left top;
  -moz-transform-origin: left top;
  -ms-transform-origin: left top;
  -o-transform-origin: left top;
  transform-origin: left top;
  border-right: 15px solid #fff;
  border-top: 15px solid #fff;
  border-radius: 2.5px !important;
  content: '';
  left: 35px;
  top: 80px;
  position: absolute;
}

@-webkit-keyframes checkmark {
  0% {
    height: 0;
    width: 0;
    opacity: 1;
  }
  20% {
    height: 0;
    width: 37.5px;
    opacity: 1;
  }
  40% {
    height: 75px;
    width: 37.5px;
    opacity: 1;
  }
  100% {
    height: 75px;
    width: 37.5px;
    opacity: 1;
  }
}
@-moz-keyframes checkmark {
  0% {
    height: 0;
    width: 0;
    opacity: 1;
  }
  20% {
    height: 0;
    width: 37.5px;
    opacity: 1;
  }
  40% {
    height: 75px;
    width: 37.5px;
    opacity: 1;
  }
  100% {
    height: 75px;
    width: 37.5px;
    opacity: 1;
  }
}
@keyframes checkmark {
  0% {
    height: 0;
    width: 0;
    opacity: 1;
  }
  20% {
    height: 0;
    width: 37.5px;
    opacity: 1;
  }
  40% {
    height: 75px;
    width: 37.5px;
    opacity: 1;
  }
  100% {
    height: 75px;
    width: 37.5px;
    opacity: 1;
  }
}

</style>

