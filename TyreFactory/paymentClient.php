<?php 
	   session_start();
	   if(isset($_SESSION['exceed']))
	   {
          $res=$_SESSION['exceed'];
		if($res=='yes')
	    echo  '<script language="javascript"> alert("No sufficient Stock");</script>'; 
		else
		echo  '<script language="javascript"> alert(" Stock ok");</script>'; 

	   }
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
								<h4><i class="micon dw dw-money mtext"></i> Payment</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Payment</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a href="#" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#add_payment">
									Add New
								</a>

								<a href="#" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#addAmt">
									Calculate Amt
								</a>
							</div>
						</div>
					</div>
				</div>



				
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Payments List</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table responsive">
							<thead>
								<tr>
									<th>Bill Id</th>
									<th>Order Id</th>
									<th>Customer Id</th>
									<th>Bill Amount</th>
									<th>Status</th>
									<th>Bill Date</th>
									<th>Paid Date</th>
									<th>Remarks</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
										include('connection.php');
										$i=1;
                                        if( session_id()=='')
                                        session_start();
                                        $cemail=$_SESSION['users1'];
										$sql=mysqli_query($con,"SELECT * FROM tblbill b,tblcustomer c where b.Cust_Id=c.Cust_Id and c.Cust_Email='$cemail'");
										while($result= mysqli_fetch_assoc($sql))
										{
									?>
								<tr>
									<?php $i++; ?>
									<td><?php echo $result['bill_Id'];?></td>
									<td><?php echo $result['order_Id'];?></td>
									<td><?php echo $result['Cust_Id'];?></td>
									<td><?php echo $result['billAmt'];?></td>
									<td><?php echo $result['billStatus'];?></td>
									<td><?php echo $result['billDate'];?></td>
									<td><?php echo $result['paidDate'];?></td>
									<td><?php echo $result['remark'];?></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<?php $_SESSION['bill_Id']=$result['bill_Id']; ?>
												<a class="dropdown-item" href="print.php?bill_Id=<?php echo $result['bill_Id'];?>"><i class="dw dw-eye"></i> Print</a>
												<a class="dropdown-item" href="updateBill.php?bill_Id=<?php echo $result['bill_Id'];?>"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="delPay.php?bill_Id=<?php echo $result['bill_Id'];?>"><i class="dw dw-delete-3"></i> Delete</a>
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

				<!-- Add Payment Modal -->
				<form action="addpayment.php" method="post">
					<div class="col-md-12 col-sm-12 mb-30">
							<div class="modal fade" id="add_payment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class=" border-radius-10">
											<div class="login-title"><br>
												<div class="col-md-12 col-sm-12 mb-30">
												<h2 class="text-center text-primary">Add Payment</h2>
												</div>
											<form>

												<div class="input-group custom">
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Order Id</label>
																<select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen" name="orderid">
																<?php
																include('connection.php');

																$sql1=mysqli_query($con,"SELECT  *
																FROM `tblbilldetails` tt, tblworkorder wo  WHERE wo.order_Id = tt.workorderid");
																while($result5= mysqli_fetch_assoc($sql1))
																{
																//$abc= $result5['price'];
																?>
																<option value="<?php echo $result5['order_Id']. "   " . $result5['price']; ?>"><?php echo $result5['workorderid'] ?></option>
																<?php } ?>
                                                                </select>
															</div>
												</div>

												
												<!-- <div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Bill Amount</label>
																<input class="form-control form-control-lg" type="text" name="amt" value="<?php echo $billAmt; ?>">
															</div>
												</div>  -->
												 
												<div class="col-md-4 col-sm-12">
													<div class="form-group">
															<label>Customer Name</label>
															<select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen" name="custid">
																<?php
																include('connection.php');
																$sql=mysqli_query($con,"SELECT * FROM tblcustomer");
																while($result= mysqli_fetch_assoc($sql))
																{
																?>
																<option value="<?php echo $result['Cust_Id'];?>"><?php echo $result['Cust_Name'];?></option>
																<?php } ?>   
                                                            </select>
														</div>
													</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Status</label>
																<input class="form-control form-control-lg" type="text" name="status">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Date of Billing</label>
																<input class="form-control form-control-lg" type="date" name="billdate">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Paid Date</label>
																<input class="form-control form-control-lg" type="date" name="paiddate">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Remarks</label>
																<input class="form-control form-control-lg" type="text" name="remark">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<input type="submit" class="btn btn-primary" value="Submit" name="addPayment"></br></br>
																<a href="payment.php"><i class="dw dw-left-arrow-5" style="font-size: 2em;"></i></a>
												</div>
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



<!-- Add Payment Modal -->
<form action="addAmt.php" method="post">
					<div class="col-md-12 col-sm-12 mb-30">
							<div class="modal fade" id="addAmt" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class=" border-radius-10">
											<div class="login-title"><br>
												<div class="col-md-12 col-sm-12 mb-30">
												<h2 class="text-center text-primary">Calculate</h2>
												</div>
											<form>

												<div class="input-group custom">
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
													<label>Order Id</label>
													<select name="orderid">
<?php 
												$sql=mysqli_query($con,"SELECT * FROM tblworkorder");
while($result= mysqli_fetch_assoc($sql))
{
?>
<option value="<?php echo $result['order_Id'];?>"><?php echo $result['order_Id'];?></option>
<?php } ?>   

                                                                </select>
					
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Item</label>
																<select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen" name="itemid">
																<?php
																include('connection.php');

$sql=mysqli_query($con,"SELECT * FROM tblitem");
while($result= mysqli_fetch_assoc($sql))
{
?>
<option value="<?php echo $result['itemId'];?>"><?php echo $result['itemName'];?></option>
<?php } ?>   

                                                                </select>
															</div>
												</div>

												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Qty</label>
																<input class="form-control form-control-lg" type="text" name="qtt">
															</div>
												</div>
							
					<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<input type="submit" class="btn btn-primary" value="Submit" name="addAmt">
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