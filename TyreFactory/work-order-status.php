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
								<h4><i class="micon dw dw-shopping-basket mtext"></i> Work Order</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="customer.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Work Order</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Work Order List</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
								<tr>
									<th>Order Id</th>
									<th>Order Date</th>
									<th>Service Name</th>
									<th>Amount</th>
									<th>Customer</th>
									<th>Technician</th>
									<th>Completion Date</th>
									<th>Status</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							
				<?php
            	include('connection.php');
                    $i=1;
                //	$emps=$_GET['Emp_Id'];
                     //    $_SESSION['emps']=$Emp_Id;
					//$user5= $_SESSION["user"];
					if( session_id()=='')
					session_start();
					if(isset($_SESSION['users1']))
					$users1= $_SESSION['users1'];
					if(isset($_SESSION['user']))
					   	$userT=$_SESSION['user'];
					
					 
					 if($userT=='tbladmin')
                    $sql=mysqli_query($con,"SELECT * FROM tblworkorder order by orderDate asc ");
					else  
					$sql=mysqli_query($con,"SELECT * FROM tblworkorder wo,tblcustomer cc,tblemployee te,tblservice ts where wo.Cust_Id=cc.Cust_Id and wo.Emp_Id=te.Emp_Id and wo.service_id=ts.service_id and cc.Cust_Email='$users1' order by orderDate asc ");
                    while($result= mysqli_fetch_assoc($sql))
                    {
                ?>
							<tbody>
								<tr>

						<?php 	$custi=	$result['Cust_Id'];
                        $sql1=mysqli_query($con,"SELECT * FROM tblcustomer where Cust_Id=$custi");
						if($result1= mysqli_fetch_assoc($sql1))
						$cusname=$result1['Cust_Name'];

						$empi=	$result['Emp_Id'];
                        $sql2=mysqli_query($con,"SELECT * FROM tblemployee where Emp_Id=$empi");
						if($result2= mysqli_fetch_assoc($sql2))
						$cusname=$result2['Emp_Name'];

?>
									<td><?php echo $result['order_Id']?></td>
									<td><?php echo $result['orderDate']?></td>
									<td><?php echo $result['serviceName']?></td>
									<td><?php echo $result['estimatedAmt']?><span class="badge bg-warning"></span></td>
									<td><?php echo $result1['Cust_Name']?></td>
									<td><?php echo $result2['Emp_Name']?></td>
									<td><?php echo $result['orderExpected']?></td>
									<td><?php echo $result['status']?><span class="badge bg-info"></span></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="view-order-status.php?order_Id=<?php echo $result['order_Id'];?>"><i class="dw dw-eye"></i> View</a>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
							<?php } ?>
						</table>
						
					</div>
				</div>
				<!-- Simple Datatable End -->
		</div>
	</div>
	
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