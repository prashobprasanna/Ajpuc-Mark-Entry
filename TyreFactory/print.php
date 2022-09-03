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
<!-- <div class="header">
	<?php include("profile.php"); ?>;
	</div> -->

	<div class="left-side-bar">
	<?php include("sidebar.php"); ?>;
	</div>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<!-- <div class="col-md-6 col-sm-12">
							<div class="title">
								<h4><i class="micon dw dw-money mtext"></i> Payment</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Payment</li>
								</ol>
							</nav>
						</div> -->
						
					</div>
				</div>



				
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<center><h4 class="text-blue h4" >Bill</h4>
                         <h6>Vaibhav Tyre	</h6>
                        <h6> Odabai Sullia</h6></center>
					</div>
					<div class="pb-20">
                    <?php

include("connection.php");
           $i=0;
          $_SESSION['emps']=$bill_Id;
          $sql=mysqli_query($con,"SELECT * FROM tblbill,tblcustomer  where tblbill.Cust_Id=tblcustomer.Cust_Id and bill_Id=$bill_Id");
          if($result= mysqli_fetch_assoc($sql))
  {
 ?>
						<table class="table responsive">
							<thead>
								<tr>
									<th>Bill No</th>
									<th>Order Id</th>
									<th>Customer Name</th>
									<!-- <th>Bill Amount</th> -->
									<!-- <th>Status</th> -->
									<th>Bill Date</th>
									<!-- <th>Paid Date</th> -->
									<!-- <th>Remarks</th> -->
									
								</tr>
							</thead>
							
								
								<tr>
									
									<td><?php echo $result['bill_Id'];  ?></td>
									<td><?php echo $result['order_Id'];  ?></td>
									<td><?php echo $result['Cust_Name'];  ?></td>
									
									<td><?php echo $result['billDate'];  ?></td>
								
									
								</tr>
  
								<?php $sum=0;
								}
								?>
							
						</table>

                        <table class="table responsive">
                                           <thead>
                                               <tr>
                                                   <th>Sr. No</th>
                                                   <th>Item Name</th>
                                                   <th>Qty</th>
                                                   <th>Unit Price</th>
                                                   <th>Amount </th>
                 </tr>
                        <?php 
                         $sql=mysqli_query($con,"SELECT * FROM tblbill b,tblbilldetails bd,tblitem i  where b.order_Id=bd.workorderid and i.itemId=bd.itemid and b.bill_Id=$bill_Id");
                         while($result2= mysqli_fetch_assoc($sql))
                 {
					$sc=$result2['servicec'];
					$lab=$result2['labour'];
					$sum=$sum+$result2['qty'] * $result2['price']; 
                    $gsum=$sum+$result2['qty'] * $result2['price'] +$sc+$lab;
					// $sc=$result2['servicec'];
					// $lab=$result2['labour'];
                ?>
                                      
                 <tr>
                                                   <td><?php echo ++$i; ?></td>
                                                   <td><?php echo $result2['itemName'];  ?></td>
                                                   <td><?php echo $result2['qty'];  ?></td>
                                                   <td><?php echo $result2['price'];  ?></td>
                                                   <td><?php echo $result2['qty'] * $result2['price'];?></td>
                 </tr>
                 <?php } ?>
				 <hr>
				 <tr>
                                                   <td>&nbsp;</td>
                                                   <td>&nbsp;</td>
                                                   <td>&nbsp;</td>
                                                   <td>Total</td>
                                                   <td><?php echo $sum;?></td>
                 </tr>
				 <tr>
                                                   <td>&nbsp;</td>
                                                   <td>&nbsp;</td>
                                                   <td>&nbsp;</td>
                                                   <td>Service Charge</td>
                                                   <td><?php echo $sc ?></td>
                 </tr>
				 <tr>
                                                   <td>&nbsp;</td>
                                                   <td>&nbsp;</td>
                                                   <td>&nbsp;</td>
                                                   <td>Labour Charge</td>
                                                   <td><?php echo $lab ?></td>
                 </tr>
                 <tr>
                                                   <td>&nbsp;</td>
                                                   <td>&nbsp;</td>
                                                   <td>&nbsp;</td>
                                                   <td>Grand Total</td>
                                                   <td><?php echo $gsum;?></td>
                 </tr>
                 </table>
                <center> <input  type="button" value="Print Bill" onclick="javascript:window.print();"></center>
					</div>
                   
				</div>
				<!-- Simple Datatable End -->
		</div>
	</div>

				<!-- Add Payment Modal -->
				<form action="" method="post">
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

$sql1=mysqli_query($con,"SELECT  distinct(workorderid)
FROM `tblbilldetails` tt, tblworkorder wo  WHERE wo.order_Id = tt.workorderid");
while($result5= mysqli_fetch_assoc($sql1))
{
	//$abc= $result5['price'];
?>
<option value="<?php echo $result5['workorderid']?>"><?php echo $result5['workorderid'] ?></option>

<?php } ?>
                                                                </select>
															</div>
												</div>

												
												<!-- <div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Bill Amount</label>
																<input class="form-control form-control-lg" type="text" name="amt" value="<?php echo $abc; ?>">
															</div>
												</div> -->
												 
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
																<input type="submit" class="btn btn-primary" value="Submit" name="addPayment">
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