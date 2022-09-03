
<?php
if(session_id()=='')
session_start();

if(isset($_SESSION['atten1']))
{
  
 echo '<script language="javascript">';
 echo 'alert("Attendence aready exists")';
 echo '</script>'; 
}
unset($_SESSION['atten1']);
?>
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
								<h4><i class="micon dw dw-file mtext"></i> Employee Attendence & Salary</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Attendence & Salary</li>
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
								<a href="#" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#add_item">
									Add New
								</a>
								<a href="#" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#cal_sal">
									Calculate Salary
								</a>
							</div>
						</div><?php } ?>
						
 </div>
						<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-blue h4">Salary Details</h4>
				</div>
				<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
								<tr>
									<th>Salary Id</th>
									<th>Employee Name</th>
									<th>Amount</th>
									<th>Date of Issue</th>
									
									<!-- <th class="datatable-nosort">Action</th> -->
								</tr>
							</thead>
							<tbody>
<?php
 $sql=mysqli_query($con,"select * from tblsalary,tblemployee where tblsalary.Emp_Id=tblemployee.Emp_Id ");
									while($result= mysqli_fetch_assoc($sql))
									{
								?>
								<tr>
									<td><?php echo $result['sal_id']; ?></td>
									<td><?php echo $result['Emp_Name']; ?></td>
									<td><?php echo $result['amount']; ?></td>
									<td><?php echo $result['doi']; ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
		
						
					</div>
				</div>
		</div>
	</div> 
	<!-- Add Item Category-->
	<form action="addattendence.php" method="post">
		<div class="col-md-12 col-sm-12 mb-30">
				<div class="modal fade" id="add_item" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class=" border-radius-10">
								<div class="login-title"><br>
									<div class="col-md-12 col-sm-12 mb-30">
									<h2 class="text-center text-primary">Add Attendence</h2>
									</div>
									
									<div class="input-group custom">
									<div class="form-group">
													<label>Employee Name</label>
													<div class="col-md-12 col-sm-12">
                                                    <select class="form-control form-control-lg" name="empid">
													<?php                   
													 $sql=mysqli_query($con,"SELECT * from tblemployee");
													 $j=0;
													 while($result= mysqli_fetch_assoc($sql))
													 {
													 ?>
													 <option value="<?php echo $result['Emp_Id']?>"><?php echo $result['Emp_Name']?></option>
													<?php } ?>
													</select>
												</div>
									</div>
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
													<label>Date</label>
													<input type="text" class="form-control form-control-lg" name="attdate" value="<?php echo date('y-m-d');?>" readonly>
												</div>
									</div>
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
													<label>Status</label>
													<select class="form-control form-control-lg" type="text" name="attstatus">
														<option>ABSENT</option>
														<option>PRESENT</option>
														<option>HOLIDAY</option>
													 </select>
												</div>
									</div>
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
													<input type="submit" class="btn btn-primary" value="Submit" name="addAtt"></br></br>
													<a href="attendence.php"><i class="dw dw-left-arrow-5" style="font-size: 2em;"></i></a>
												</div>
									</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>


			<form action="calSal.php" method="post">	
		<div class="col-md-12 col-sm-12 mb-30">
				<div class="modal fade" id="cal_sal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class=" border-radius-10">
								<div class="login-title"><br>
									<div class="col-md-12 col-sm-12 mb-30">
									<h2 class="text-center text-primary">Calculate Salary </h2>
									</div>
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
													<label>Employee Name</label>
													<div class="col-md-12 col-sm-12">
										
                                                    
                                                    <select class="form-control form-control-lg" name="empids">
													<?php                   
													$sql=mysqli_query($con,"SELECT * from tblemployee");
													$j=0;
													while($result= mysqli_fetch_assoc($sql))
													{
													?>
													<option value="<?php echo $result['Emp_Id']?>"><?php echo $result['Emp_Name']?></option>
													<?php } ?>
													</select>
												</div>
									</div>
									
									
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
													<label>Date</label>
													<input class="form-control form-control-lg" type="date" name="attdate">
												</div>
									</div>
									
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
													<input type="submit" class="btn btn-primary" value="Submit" name="calsal"></br></br>
													<a href="attendence.php"><i class="dw dw-left-arrow-5" style="font-size: 2em;"></i></a>
												</div>
									</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Simple Datatable start -->
				
			<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-blue h4">Attendence List</h4>
				</div>
				<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
								<tr>
									<th>Attendence Id</th>
									<th>Employee Id</th>
									<th>Date</th>
									<th>Status</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									include('connection.php');
									$i=1;
									if( session_id()=='')
									session_start();

                					$users2=$_SESSION['users1'];
									//echo $users2;
 									if($users1=="tbladmin")
 									{ 
									$sql=mysqli_query($con,"SELECT * FROM tblattendence a,tblemployee e where a.Emp_Id=e.Emp_Id");
									}else
									{
									$sql=mysqli_query($con,"select * from tblattendence a,tblemployee e where a.Emp_Id=e.Emp_Id and a.Emp_id in (SELECT Emp_Id FROM `tblemployee` WHERE Emp_Email='$users2')");
									}

									while($result= mysqli_fetch_assoc($sql))
									{
								    ?>
								   <tr>
									<!-- <td><?php echo $i;$i++; ?></td> -->
									<td><?php echo $result['attendence_Id']; ?></td>
									<td><?php echo $result['Emp_Name']; ?></td>
									<td><?php echo $result['AttDate']; ?></td>
									<td><?php echo $result['AttStatus']; ?></td>
									<td>

									<?php
									//include('connection.php');
									if( session_id()=='')
									session_start();
                					//$users1= $_SESSION['user'];
									if($users1=="tbladmin")
									{ ?>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="updateAtt.php?order_Id=<?php echo $result['attendence_Id'];?>#update_technician" data-target="#update_technician"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="delAtt.php?order_Id=<?php echo $result['attendence_Id'];?>"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
										<?php } ?>
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