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
								<h4><i class="micon dw dw-shopping-basket mtext"></i> Work Order Request</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="customer.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Work Order Request</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Work Order Request</h4>
					</div>
					<div class="pb-20">
						<form action="addRequest.php" method="post">

										<div class="input-group custom">
												<div class="col-md-4 col-sm-12">
													<div class="form-group">
																<label>Ordered Date</label>
																<input class="form-control form-control-lg" type="date" name="Odate">
															</div>
												</div>
                                                <div class="col-md-4 col-sm-12">
													<div class="form-group">
																<label>Customer Id</label>
																<input class="form-control form-control-lg" type="text" name="custid" placeholder="Enter your Customer Id">
															</div>
												</div>
		
												
												<div class="col-md-4 col-sm-12">
													<div class="form-group">
															<label>Service Type</label>
															<select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen" name="stype">
                                                            <option>Pick & Drop</option>
															<option>Visit & Get</option>
                                                            </select>
													</div>
												</div>

												<div class="col-md-4 col-sm-12">
													<div class="form-group">
															<label>Quantity</label>
															<select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen" name="qty">
                                                            <option>1</option>
															<option>2</option>
															<option>3</option>
															<option>4</option>
															<option>5</option>
															<option>6</option>
															<option>7</option>
															<option>8</option>
                                                            </select>
													</div>
												</div>


                                                <div class="col-md-4 col-sm-12">
													<div class="form-group">
																<label>Vehicle Type</label>
																<select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen" name="vtype">
                                                                <?php
															session_start();
															extract($_REQUEST);
															include("connection.php");
															$i=1;  
															$sql=mysqli_query($con,"SELECT * FROM tblvehicletype");
															while($result= mysqli_fetch_assoc($sql))
															{
															?>
																<option><?php echo $result['typeName'];?></option>
															<?php } ?>
                                                               </select>
															</div>
												</div>
                                                <div class="col-md-4 col-sm-12">
													<div class="form-group">
																<label>Vehicle Number</label>
																<input class="form-control form-control-lg" type="text" name="Vnum" required placeholder="Please enter your vehicle number"/>
															</div>
												</div>
												<div class="col-md-4 col-sm-12">
													<div class="form-group">
																<label>Tyre Number</label>
																<input class="form-control form-control-lg" type="text" name="Tnum" placeholder="Please enter your tyre number">
															</div>
												</div>
                                                
												<div class="col-md-4 col-sm-12">
													<div class="form-group">
															<label>Service</label>
															<select  class="form-control form-control-lg"  data-style="btn-outline-secondary btn-lg" title="Not Chosen" name="one" onchange="if (this.value=='Hot Resole'||this.value=='Cold Resole')
															{this.form['tbrand'].style.visibility='visible';
																this.form['tpattern'].style.visibility='visible';
																this.form['tsize'].style.visibility='visible';
															}else 
															{
																this.form['tbrand'].style.visibility='hidden';
																this.form['tpattern'].style.visibility='hidden';
																this.form['tsize'].style.visibility='hidden';
																};">
															<option value="" selected="selected">Select...</option>
															<?php

															session_start();
															extract($_REQUEST);
															include("connection.php");

															//	include('connection.php');
															$i=1;
													
															
															$sql=mysqli_query($con,"SELECT * FROM tblservice");
															while($result= mysqli_fetch_assoc($sql))
															{
														    ?>
															<option><?php echo $result['serviceName'];?></option>
				    										<?php } ?>
                                                            </select>	
													    </div>
												    </div>

												<div class="col-md-4 col-sm-12">
													<div class="form-group">
														<label>Brand</label>
														<select  class="form-control form-control-lg"  data-style="btn-outline-secondary btn-lg" title="Not Chosen" name="tbrand" style="visibility:hidden;">
														<?php
															session_start();
															extract($_REQUEST);
															include("connection.php");

															//	include('connection.php');
															$i=1;
													
															
															$sql=mysqli_query($con,"SELECT * FROM tblbrand");
															while($result= mysqli_fetch_assoc($sql))
															{
														    ?>
															<option value="<?php echo $result['company_Id'];?>"><?php echo $result['companyName'];?></option>
				    										<?php } ?>
													    </select>
													</div>
												</div>

												<div class="col-md-4 col-sm-12">
													<div class="form-group">
															<label>Pattern</label>
															<select  class="form-control form-control-lg"  data-style="btn-outline-secondary btn-lg" title="Not Chosen" name="tpattern" style="visibility:hidden;">
															<?php

															session_start();
															extract($_REQUEST);
															include("connection.php");

															//	include('connection.php');
															$i=1;
													
															
															$sql=mysqli_query($con,"SELECT * FROM tbltyrepattern");
															while($result= mysqli_fetch_assoc($sql))
															{
														    ?>
															<option value="<?php echo $result['pattern_Id'];?>"><?php echo $result['patternName'];?></option>
				    										<?php } ?>
														    </select>
													</div>
												</div>

												<div class="col-md-4 col-sm-12">
													<div class="form-group">
															<label>Size</label>
															<select  class="form-control form-control-lg"  data-style="btn-outline-secondary btn-lg"  name="tsize" style="visibility:hidden;">
															<?php

															session_start();
															extract($_REQUEST);
															include("connection.php");

															//	include('connection.php');
															$i=1;
													
															
															$sql=mysqli_query($con,"SELECT * FROM tbltyresize");
															while($result= mysqli_fetch_assoc($sql))
															{
														    ?>
															<option value="<?php echo $result['size_Id'];?>"><?php echo $result['sizeName'];?></option>
				    										<?php } ?>
														    </select>
													</div>
												</div>  				
										</div>
				<!-- Simple Datatable End -->
				                       <div class="col-md-12 col-sm-12">
													<div class="form-group">
																<input type="submit" class="btn btn-primary" value="Order" name="addnew"></br></br>
																<a href="customer-work-order.php"><i class="dw dw-left-arrow-5" style="font-size: 2em;"></i></a>
															</div>
												</div>
												</div>
											</form>
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