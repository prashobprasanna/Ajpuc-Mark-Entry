<?php
if(session_id()=='')
session_start();
if(isset($_SESSION['error1']))
{
 echo '<script language="javascript">';
 echo 'alert("Email aready exists")';
 echo '</script>';
 unset($_SESSION['error1']);
}
  
?>
<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Tyre Resole Factory Management System</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/jquery.steps.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>

<body>
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<img src="vendors/images/deskapp-logo.svg" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="login1.php">Login</a></li>
				</ul>
			</div>
		</div>
	</div>
	<script>
        function validateform() {


var x = document.forms["myform"]["Cust_Name"].value;
if (x == "") {
  alert("name must be filled out");
  return false;
}

var y = document.forms["myform"]["Cust_Email"].value;
if (y == "") {
  alert("email must be filled out");
  return false;
}


var xx = document.forms["myform"]["Cust_Phone"].value;
var phone=/^\d{10}$/;
if(xx.value.match(phone))
{

	 return true;


}
else
{
	alert("Enter valid number");
	return false;
}



        } 
</script>
	<div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-6">
					<img src="resole1.jpg" alt="">
				</div>

					<form name="myform" action="register.php" method="post">
					<div class="register-box bg-white box-shadow border-radius-5">
						<div class="wizard-content">
							<form class="tab-wizard2 wizard-circle wizard"></br>
								<!-- Step 2 -->
								<center><h5>Basic Account Credentials</h5></center></br>
								<section>
									<div class="form-wrap max-width-400 mx-auto">
										<div class="form-group row">
										<label class="col-sm-4 col-form-label">&emsp;Username*</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" name="Cust_Name" >
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Email*</label>
											<div class="col-sm-8">
												<input type="email" class="form-control" name="Cust_Email" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Address</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" required name="Cust_Address">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Contact Number*</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" required name="Cust_Phone" maxlength="10" minlength="10">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp; Description </label>
											<div class="col-sm-8">
												<input type="text" class="form-control" name="Cust_Desc">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Password*</label>
											<div class="col-sm-8">
												<input type="password" required class="form-control"name="Cust_Password" maxlength="16" minlength="8" >
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">&emsp;Confirm Password*</label>
											<div class="col-sm-8">
												<input type="password" class="form-control" required>
											</div>
										</div>
									</div>
									<div class="input-group mb-0">
										
										<input class="btn btn-primary btn-lg btn-block" type="submit" onclick="validateform()"  name="register" value="Sign In">
									
								</div>
							
								</section>
							</form>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
	<!-- success Popup html Start -->
	<button type="button" id="success-modal-btn" hidden data-toggle="modal" data-target="#success-modal" data-backdrop="static">Launch modal</button>
	<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered max-width-400" role="document">
			<div class="modal-content">
				<div class="modal-body text-center font-18">
					<h3 class="mb-20">Form Submitted!</h3>
					<div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				</div>
				<div class="modal-footer justify-content-center">
					<a href="login.html" class="btn btn-primary">Done</a>
				</div>
			</div>
		</div>
	</div>
	<!-- success Popup html End -->
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/jquery-steps/jquery.steps.js"></script>
	<script src="vendors/scripts/steps-setting.js"></script>
</body>

</html>