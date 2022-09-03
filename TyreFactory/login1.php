
<?php
session_start();
include('connection.php');
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$username=$_POST['email'];
$password=$_POST['pass'];
$radio1=$_POST['userT'];
$_SESSION["user"]=$_POST['userT'];
$_SESSION['users1']=$username;

if($radio1=="tbladmin")
{

 $sql1=mysqli_query($con,"SELECT Email,Password FROM tbladmin WHERE Email='$username' and Password='$password'");
}
else if($radio1=="tblcustomer")
{
	//mysqli_query($con,"SELECT * FROM tblcustomer");
 $sql1=mysqli_query($con,"SELECT * FROM tblcustomer WHERE Cust_Email='$username' and Cust_Password='$password'");
}
else if($radio1=="tblemployee")
{

 $sql1=mysqli_query($con,"SELECT * FROM tblemployee WHERE Emp_Email='$username' and Emp_Password='$password'");
}
      if(  $result1= mysqli_fetch_assoc($sql1))

{
         // $count=mysqli_num_rows($result1);      
if( $radio1=="tbladmin" )
{       

        $_SESSION['admin']="admin";           
	//$_SESSION['cusid]']= $result5['Cust_Id'];
             header("location:index.php");
        
}
else if( $radio1=="tblcustomer")
{       
	$_SESSION['custname']=$result1['Cust_Name'];
	$_SESSION['cusid]']= $result5['Cust_Id'];
	header("location:customer.php");
}
else if($radio1=="tblemployee")
{
	$_SESSION['empname']=$result1['Emp_Name'];
	$_SESSION['empid]']= $result5['Emp_Id'];
       
	header("location:employee.php");
}
else
{
  echo "<script>alert('Invalid Username/Email or password');</script>";

}
       
 
}

else 
echo "<script>alert('Invalid Username/Email or password');</script>";
}

        ?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Login</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="1	6x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
</head>
<body class="login-page">
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-12">
					<div class="login-box bg-white box-shadow border-radius-10">
						<form action="login1.php" method="post">
							<div class="select-role">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn active">
										<input type="radio" name="userT" value="tbladmin">
										<a>Admin</a>
									</label>
									<label class="btn">
										<input type="radio" name="userT" value="tblcustomer" >
										<a>Customer</a>
									</label>
									<label class="btn">
										<input type="radio" name="userT" value="tblemployee">
										<a>Employee</a>


									</label>
								</div>
							</div>
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" name="email" placeholder="Username">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" name="pass" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
						
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										
											<input class="btn btn-primary btn-lg btn-block" type="submit" name="login" value="Sign In">
										
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="registerC.php">Register To Create Account</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>