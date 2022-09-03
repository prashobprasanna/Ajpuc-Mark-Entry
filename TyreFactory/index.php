<!DOCTYPE html>
<html>
<head>
<?php session_start();
?>

	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Tyre Resole Factory Management System</title>

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
		<?php include('profile.php');?>
	</div>

	<div class="left-side-bar">
	<?php include("sidebar.php"); ?>;
	</div>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">

			<div class="title pb-20">
				<h2 class="h3 mb-0">Dashboard</h2>
			</div>

			<div class="row pb-10">
				<div class="col-xl-4 col-lg-4 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
						<?php 
    					include("connection.php");
						if($result1=mysqli_query($con,"select * from tblworkorder"))
						{
						$rec=mysqli_num_rows($result1);
						//printf($rec1);
 						?>
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo $rec;?></div>
								<div class="font-14 text-secondary weight-500">Service Order</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf"><i class="icon-copy fa fa-tasks"></i></div>
							</div>
						</div>
					</div>
				</div>
                <?php }	?>
			
				<div class="col-xl-4 col-lg-4 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
						<?php 
    					include("connection.php");
						if($result1=mysqli_query($con,"select * from tblcustomer"))
						{
						$rec1=mysqli_num_rows($result1);
						//printf($rec1);
 						?>
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"> <?php echo $rec1;?></div>
								<div class="font-14 text-secondary weight-500">Customer</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#ff5b5b"><span class="micon fa fa-users"></span></div>
							</div>
						</div>
					</div>
				</div>
			<?php }	?>
				<div class="col-xl-4 col-lg-4 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
						<?php 
    					include("connection.php");
						if($result1=mysqli_query($con,"select * from tblemployee"))
						{
						$rec2=mysqli_num_rows($result1);
						//printf($rec1);
 						?>
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"><?php echo $rec2;?></div>
								<div class="font-14 text-secondary weight-500">Technician</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#2c515b"><span class="micon fa fa-wrench"></span></div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard3.js"></script>
</body>
</html>