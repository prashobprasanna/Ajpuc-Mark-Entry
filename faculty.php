<!DOCTYPE html>
<html>

<head>
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
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
		</div>
		<div class="header-right">
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="src/images/admin.png" width="50">
						</span>
						<span class="user-name">John Doe</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="#"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="#"><i class="dw dw-settings2"></i> Setting</a>
						<hr>
						<a class="dropdown-item" href="login1.php"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php">
				<img src="src/images/logo.png" width="50px">
				<h4 style="color: #f3f3f4;font-size: 20px;padding: 15px"> Tyre Shop</h4>
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li>
						<a href="index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li>
						<a href="clients.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user"></span><span class="mtext">Clients</span>
						</a>
					</li>
					<li>
						<a href="faculty.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-wrench"></span><span class="mtext">Students</span>
						</a>
					</li>
					<li>
						<a href="services.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-handshake-o"></span><span class="mtext">Services</span>
						</a>
					</li>
					<li>
						<a href="attendence.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-file"></span><span class="mtext">Attendence</span>
						</a>
					</li>
					<li>
						<a href="items.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-cart-plus"></span><span class="mtext">Items</span>
						</a>
					</li>
					<li>
						<a href="work-order.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-shopping-basket"></span><span class="mtext">Work Order</span>
						</a>
					</li>
					<li>
						<a href="payment.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-money"></span><span class="mtext">Payment</span>
						</a>
					</li>
					<li>
						<a href="Payment Method.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-wallet"></span><span class="mtext">Payment Method</span>
						</a>
					</li>
					<li>
						<a href="settings.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-settings2"></span><span class="mtext">Settings</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
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
									<li class="breadcrumb-item active" aria-current="page">Faculties</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a href="add_faculty.php" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#add_technician">
									Add New
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Faculties List</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
								<tr>
									<th>Faculty Name</th>
									<th>Gender</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Qualification</th>
									<th>Status</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include('connection.php');
								$i = 1;
								$sql = mysqli_query($con, "SELECT * FROM ");
								while ($result = mysqli_fetch_assoc($sql)) {
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
										<td>
											<div class="dropdown">
												<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
													<i class="dw dw-more"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
													<?php $_SESSION['Emp_Id'] = $result['Emp_Id']; ?>
													<!-- <a class="dropdown-item" href="viewTech.php?Emp_Id=<?php echo $result['Emp_Id']; ?>"><i class="dw dw-eye"></i> View</a> -->
													<a class="dropdown-item" href="viewTech.php?Emp_Id=<?php echo $result['Emp_Id']; ?>#update_technician" data-target="#update_technician"><i class="dw dw-eye"></i> View</a>
													<a class="dropdown-item" href="updateTech.php?Emp_Id=<?php echo $result['Emp_Id']; ?>#update_technician" data-target="#update_technician"><i class="dw dw-edit2"></i> Edit</a>
													<a class="dropdown-item" href="deltech.php?Emp_Id=<?php echo $result['Emp_Id']; ?>"><i class="dw dw-delete-3"></i> Delete</a>
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
													<input class="form-control form-control-lg" type="text" name="techName">
												</div>
											</div>
											<div class="col-md-6 col-sm-12">
												<div class="form-group">
													<label>Email</label>
													<input class="form-control form-control-lg" type="text" name="techmail">
												</div>
											</div>
											<div class="col-md-6 col-sm-12">
												<div class="form-group">
													<label>Contact</label>
													<input class="form-control form-control-lg" type="text" name="techPhone">
												</div>
											</div>
											<div class="col-md-12 col-sm-12">
												<div class="form-group">
													<label>Address</label>
													<input class="form-control form-control-lg" type="text" name="techAdd">
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
													<input class="form-control form-control-lg" type="password" name="techpass">
												</div>
											</div>
											<div class="col-md-12 col-sm-12">
												<div class="form-group">
													<label>Profile</label>
													<input class="form-control form-control-lg" type="file" name="profile">
												</div>
											</div>
											<div class="col-md-12 col-sm-12">
												<div class="form-group">
													<input type="submit" class="btn btn-primary" value="Submit" name="addnew">
													<input type="submit" class="btn btn-danger" value="Cancel">
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>


		<form action="updateTech.php" method="post">


			<div class="col-md-12 col-sm-12 mb-30">
				<div class="modal fade" id="update_techniciany36" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<?php
					//	include('connection.php');

					$i = 1;
					//	$emps=$_GET['Emp_Id'];
					$sql = mysqli_query($con, "SELECT * FROM tblemployee where Emp_Id=$Emp_Id");
					if ($result = mysqli_fetch_assoc($sql)) {
					?>
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class=" border-radius-10">
									<div class="login-title"><br>
										<div class="col-md-12 col-sm-12 mb-30">
											<h2 class="text-center text-primary">Update Technician</h2>
										</div>
										<form>


											<div class="input-group custom">
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label>Technician Name</label>
														<input class="form-control form-control-lg" type="text" name="techName" value="<?php echo $Emp_Id;  ?>">
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label>Email</label>
														<input class="form-control form-control-lg" type="text" name="techmail" value="<?php echo $result['Emp_Email'];  ?>">
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label>Contact</label>
														<input class="form-control form-control-lg" type="text" name="techPhone" value="<?php echo $result['Emp_Phone'];  ?>">
													</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
														<label>Address</label>
														<input class="form-control form-control-lg" type="text" name="techAdd" value="<?php echo $result['Emp_Address'];  ?>">
													</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
														<label>Description</label>
														<input class="form-control form-control-lg" type="text" name="techdesc" value="<?php echo $result['Emp_Desc'];  ?>">
													</div>
												</div>



												<div class="col-md-6 col-sm-12">
													<div class="form-group">
														<label>Password</label>
														<input class="form-control form-control-lg" type="password" name="techpass" value="<?php echo $result['Emp_Password'];  ?>">
													</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
														<label>Profile</label>
														<input class="form-control form-control-lg" type="file" name="profile">
													</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
														<input type="submit" class="btn btn-primary" value="Submit" name="addnew">
														<input type="submit" class="btn btn-danger" value="Cancel">
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
				</div>
			<?php } ?>
		</form>
		<!-- Delete modal -->
		<div class="col-md-4 col-sm-12 mb-30">
			<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm modal-dialog-centered">
					<div class="modal-content bg-danger text-white">
						<div class="modal-body text-center">
							<h3 class="text-white mb-15"><i class="fa fa-exclamation-triangle"></i> Alert</h3>
							<p>Are you sure you want to delete this Technician?</p>
							<button type="button" class="btn btn-light" data-dismiss="modal">Yes</button>
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
		<script src="vendors/scripts/datatable-setting.js"></script>
</body>

</html>