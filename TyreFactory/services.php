<?php
if( session_id()=='')
session_start();
if(isset($_SESSION['success']))
{
  
 echo '<script language="javascript">';
 echo 'alert("Service added successfully")';
 echo '</script>'; 

unset($_SESSION['success']);
 //header('location: attendence.php');
}
else if(isset($_SESSION['error']))
{

	echo '<script language="javascript">';
	echo 'alert("Record not added")';
	echo '</script>'; 
   
   unset($_SESSION['error']);
	//header('location: attendence.php');
}
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
								<h4><i class="micon dw dw-car mtext"></i> Services</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Services</li>
								</ol>
							</nav>
						</div>
						<?php
						include('connection.php');
						if( session_id()=='')
						session_start();
                		$users1= $_SESSION['user'];
 						if($users1=="tbladmin")
						 { ?>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a href="#" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#add_service">
									Add New
								</a>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<!-- Simple Datatable start -->


      
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Services List</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
								<tr>
                                    <th>Service Id</th>
									<th>Service Name</th>
									<th>Description</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
										include('connection.php');
										$i=1;
										$sql=mysqli_query($con,"SELECT * FROM tblservice");
										while($result= mysqli_fetch_assoc($sql))
										{
									?>
								<tr>
										<?php $i++; 
										$_SESSION['service_id']=$result['service_id'];  
                                         $serid=$result['service_id'];												 
										?>
									<td><?php echo $result['service_id'];  ?></td>
									<td><?php echo $result['serviceName'];  ?></td>
                                    <td><?php echo $result['Description'];  ?></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<?php
												include('connection.php');
												if( session_id()=='')
												session_start();
												$users1= $_SESSION['user'];
												if($users1=="tblemployee")
												{ ?>
											    <a class="dropdown-item" href="viewservice.php?service_id=<?php echo $result['service_id'];?>"><i class="dw dw-eye"></i>View</a>
												<?php } ?>
												<?php
												include('connection.php');
												if( session_id()=='')
												session_start();
												$users1= $_SESSION['user'];
												if($users1=="tbladmin")
												{ ?>
												<a class="dropdown-item" href="updateservice.php?service_id=<?php echo $result['service_id'];?>"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"><i class="dw dw-delete-3"></i> Delete</a>
												<?php } ?>
											</div>
										</div>
									</td>
								</tr>
                                <?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
		</div>
	</div>
	<!-- Add Service Modal -->
	<form action="addservice.php" method="post">
					<div class="col-md-12 col-sm-12 mb-30">
							<div class="modal fade" id="add_service" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class=" border-radius-10">
											<div class="login-title"><br>
												<div class="col-md-12 col-sm-12 mb-30">
												<h2 class="text-center text-primary">Add Services</h2>
												</div>
											<form>

												<div class="input-group custom">
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Service Name</label>
																<input class="form-control form-control-lg" required type="text" name="sname">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Description</label>
																<textarea class="form-control form-control-lg" required name="desc"></textarea>
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<input type="submit" class="btn btn-primary" value="Submit" name="addservice"></br></br>
																<a href="services.php"><i class="dw dw-left-arrow-5" style="font-size: 2em;"></i></a>
															</div>
												</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div></form>
						<div class="col-md-4 col-sm-12 mb-30">
							<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm modal-dialog-centered">
									<div class="modal-content bg-danger text-white">
										<div class="modal-body text-center">
											<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i> Alert</h3>
											<p>Are you sure you want to delete this Work Order?</p>
											<button type="button" onclick="location.href='delservice.php?service_id=<?php echo $serid;?>'" class="btn btn-light" data-dismiss="modal">Yes</button>
											<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
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
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script></body>
</html>