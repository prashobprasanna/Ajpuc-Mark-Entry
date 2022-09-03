<?php
if( session_id()=='')
session_start();
if(isset($_SESSION['success']))
{
  
 echo '<script language="javascript">';
 echo 'alert("Record added successfully")';
 echo '</script>'; 

unset($_SESSION['success']);
 
}
else if(isset($_SESSION['error']))
{

	echo '<script language="javascript">';
	echo 'alert("Unable to add record")';
	echo '</script>'; 
   
   unset($_SESSION['error']);
	
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
								<h4><i class="micon dw dw-hammer mtext"></i> Technicians</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Technicians</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a href="#" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#add_technician">
									Add New
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Technicians List</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
								<tr>
									<th>Employee Id</th>
									<th>Employee Name</th>
									<th>Address</th>
									<th>Email</th>
									<th>Contact</th>
									<th>Description</th>
									<th>Grade</th>
									<th>Image</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
										include('connection.php');
										$i=1;
										$sql=mysqli_query($con,"SELECT * FROM tblemployee e,tblgrade g where e.grade_id=g.grade_id");
										while($result= mysqli_fetch_assoc($sql))
										{
									?>
								<tr>
										<?php $i++;
									//	$Emp_Id= $result['Emp_Id'];
									  
										?>
										<td><?php echo $result['Emp_Id'];  ?></td>
										
										<td><?php echo $result['Emp_Name']; ?></td>
										<td><?php echo $result['Emp_Address']; ?></td>
										<td><?php echo $result['Emp_Email']; ?></td>
										<td><?php echo $result['Emp_Phone']; ?></td>
										<td><?php echo $result['Emp_Desc']; ?></td>
										<td><?php echo $result['Emp_grade'];?></td>
										<td><?php echo $result['Emp_Img'];?></td>
										<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i></a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											    <?php $_SESSION['Emp_Id']=$result['Emp_Id'];
                                                 $empid=$result['Emp_Id'];
												 ?>
												<a class="dropdown-item" href="viewTech.php?Emp_Id=<?php echo $result['Emp_Id'];?>"><i class="dw dw-eye"></i> View</a>
												<a class="dropdown-item" href="updateTech.php?Emp_Id=<?php echo $result['Emp_Id'];?>#update_technician" data-target="#update_technician"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								<?php 	
										}
								 ?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
		</div>
	</div>
				<!-- Add Technician Modal -->
				<form action="addtechnician.php" method="post">
					<div class="col-md-12 col-sm-12 mb-30">
							<div class="modal fade" id="add_technician" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class=" border-radius-10">
											<div class="login-title"><br>
												<div class="col-md-12 col-sm-12 mb-30">
												<h2 class="text-center text-primary">Add Technician</h2>
												</div>
											<form>

												<div class="input-group custom">
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Technician Name</label>
																<input class="form-control form-control-lg" type="text" name="techName" required>
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Email</label>
																<input class="form-control form-control-lg" type="email" name="techmail" required>
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Contact</label>
																<input class="form-control form-control-lg" type="text" name="techPhone" required maxlength="10">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Address</label>
																<input class="form-control form-control-lg" type="text" name="techAdd" required>
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Grade</label>
																<select class="form-control form-control-lg" type="text" name="techgrade" required>
																<?php
															session_start();
															extract($_REQUEST);
															include("connection.php");
															$i=1;  
															$sql=mysqli_query($con,"SELECT * FROM tblgrade");
															while($result= mysqli_fetch_assoc($sql))
															{
															?>
															<option value="<?php echo $result['grade_id'];?>"><?php echo $result['Emp_grade'];?></option>
															<?php } ?>
                                                               </select>
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Description</label>
																<input class="form-control form-control-lg" type="text" name="techdesc">
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Password</label>
																<input class="form-control form-control-lg" type="password" name="techpass" required minlength="8" maxlength="16">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Profile</label>
																<input class="form-control form-control-lg" type="file" name="techprofile">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<input type="submit" class="btn btn-primary" value="Submit" name="addnew">
																</br>
																</br>
																<a href="technician.php"><i class="dw dw-left-arrow-5" style="font-size: 2em;"></i></a>
															</div>
												</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
					<div class="col-md-4 col-sm-12 mb-30">
							<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-sm modal-dialog-centered">
									<div class="modal-content bg-danger text-white">
										<div class="modal-body text-center">
											<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i> Alert</h3>
											<p>Are you sure you want to delete this Work Order?</p>
											<button type="button" onclick="location.href='deltech.php?Emp_Id=<?php echo $empid;?>'" class="btn btn-light" data-dismiss="modal">Yes</button>
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