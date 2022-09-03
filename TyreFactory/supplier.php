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
								<h4><i class="micon dw dw-hammer mtext"></i>Suppliers</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Suppliers</li>
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
						<h4 class="text-blue h4">Suppliers List</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
								<tr>
									<th>Supplier Id</th>
									<th>Supplier Name</th>
									<th>Address</th>
									<th>Email</th>
									<th>Contact</th>
									<th>Description</th>
									<th>Image</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
										include('connection.php');
										$i=1;
										$sql=mysqli_query($con,"SELECT * FROM tblsupplier");
										while($result= mysqli_fetch_assoc($sql))
										{
									?>
								<tr>
										<?php $i++;
									//	$Emp_Id= $result['Emp_Id'];
									  
										?>
										<td><?php echo $result['Sup_Id'];  ?></td>
										
										<td><?php echo $result['Sup_Name']; ?></td>
										<td><?php echo $result['Sup_Address']; ?></td>
										<td><?php echo $result['Sup_Email']; ?></td>
										<td><?php echo $result['Sup_Phone']; ?></td>
										<td><?php echo $result['Sup_Desc']; ?></td>
                                        <td><?php echo $result['Sup_Img']; ?></td>
										<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i></a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											    <?php $_SESSION['Sup_Id']=$result['Sup_Id']; ?>
												<a class="dropdown-item" href="viewsup.php?Sup_Id=<?php echo $result['Sup_Id'];?>#update_technician" data-target="#update_technician"><i class="dw dw-eye"></i> View</a>
												<a class="dropdown-item" href="updatesup.php?Sup_Id=<?php echo $result['Sup_Id'];?>#update_technician" data-target="#update_technician"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="delsup.php?Sup_Id=<?php echo $result['Sup_Id'];?>"><i class="dw dw-delete-3"></i> Delete</a>
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
				<form action="addsupplier.php" method="post">
					<div class="col-md-12 col-sm-12 mb-30">
							<div class="modal fade" id="add_technician" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class=" border-radius-10">
											<div class="login-title"><br>
												<div class="col-md-12 col-sm-12 mb-30">
												<h2 class="text-center text-primary">Add Supplier</h2>
												</div>
											<form>
												<div class="input-group custom">
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Supplier Name</label>
																<input class="form-control form-control-lg" type="text" name="supName">
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Email</label>
																<input class="form-control form-control-lg" type="text" name="supmail">
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Contact</label>
																<input class="form-control form-control-lg" type="text" name="supPhone">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Address</label>
																<input class="form-control form-control-lg" type="text" name="supAdd">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Description</label>
																<input class="form-control form-control-lg" type="text" name="supdesc">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Profile</label>
																<input class="form-control form-control-lg" type="file" name="supprofile">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<input type="submit" class="btn btn-primary" value="Submit" name="addnew">
																</br>
																</br>
																<a href="supplier.php"><i class="dw dw-left-arrow-5" style="font-size: 2em;"></i></a>
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