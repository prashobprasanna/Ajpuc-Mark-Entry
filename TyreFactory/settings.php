<?php
  include "connection.php";
  // extract($_REQUEST);
  if(isset($_POST['saveSettings']))
  {
    $shopName=$_POST['shopname'];
    $owner=$_POST['owner'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    
    $sql="update tblsettings set shopName='$shopName',owner='$owner',address='$address',email='$email',contact='$contact'"; 
    
    if($con->query($sql))
    {

        $_SESSION['success']='Items added successfully';
    }
    else
    {
        $_SESSION['error']='Please check the values';
    }

    header('location: settings.php');

  }
//   else
//   {
// 	header('location: index.php');
//   }
  
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Tyre Factory Management System</title>

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

</head>
<body>
<div class="header">
	<?php include("profile.php"); ?>;
	</div>

	<div class="left-side-bar">
	<?php include("sidebar.php"); ?>;
	</div>
	
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4><i class="micon dw dw-settings2 mtext"></i> Settings</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Settings</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				 
<?php
                //	include('connection.php');
                    $i=1;
                //	$emps=$_GET['Emp_Id'];
                     //    $_SESSION['emps']=$Emp_Id;
                    $sql=mysqli_query($con,"SELECT * FROM tblsettings ");
                    if($result= mysqli_fetch_assoc($sql))
                    {
                ?>

				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Change Settings</h4>
					</div>
					<div class="pb-20">
							<div class="pd-20 ">
								<form action="" method="post">
									<div class="row">
										<div class="col-md-6 col-sm-12">
											<div class="form-group">
											<label>Shop Name</label>
											<input class="form-control" type="text" placeholder="input shop name" name="shopname" value="<?php echo $result['shopName']?>">
											</div>
										</div>
										<div class="col-md-6 col-sm-12">
											<div class="form-group">
											<label>Owner Name</label>
											<input class="form-control" type="text" placeholder="input owner name" name="owner" value="<?php echo $result['owner']?>">
											</div>
										</div>
										<div class="col-md-12 col-sm-12">
											<div class="form-group">
											<label>Address</label>
											<input class="form-control" type="text" placeholder="input address" name="address" value="<?php echo $result['address']?>">
											</div>
										</div>
										<div class="col-md-6 col-sm-12">
											<div class="form-group">
											<label>Email</label>
											<input class="form-control" type="text" placeholder="input email" name="email" value="<?php echo $result['email']?>">
											</div>
										</div>
										<div class="col-md-6 col-sm-12">
											<div class="form-group">
											<label>Contact</label>
											<input class="form-control" type="text" placeholder="input contact number" name="contact" value="<?php echo $result['contact']?>">
											</div>
										</div>
									</div>
									<div class="form-group">
										<input class="btn btn-primary" type="submit" value="Save Changes" name="saveSettings">
									</div>
									<div class="form-group">
										<a href="backup.php">BackUp</a>
									</div>
									<?php }  ?>
								</form>
							</div>
					</div>
					</div>
				</div>
				<!-- Simple Datatable End -->
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script></body>
</html>