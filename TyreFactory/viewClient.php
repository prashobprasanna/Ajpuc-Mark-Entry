<?php
?>

   <!DOCTYPE html>
   <html lang="en">
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


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   </head>
   <body>
    <br>
    <br>
    <div class="container-fluid" style="max-width:50%">
  
					<?php
					session_start();
					extract($_REQUEST);
					include("connection.php");
                    $i=1;
                    $_SESSION['Cust_Id']=$Cust_Id;
                    $sql=mysqli_query($con,"SELECT * FROM tblcustomer where Cust_Id=$Cust_Id");
                    if($result= mysqli_fetch_assoc($sql))
                    {
                ?>
                            <form action="" method="post">
                            		<div class="input-group custom">
									<div class="col-md-6 col-sm-12">
												<div class="form-group">
															<label>Customer Id</label>
															<input class="form-control form-control-lg" type="text" name="cusName" value="<?php echo $result['Cust_Id'];?>">
														</div>
											</div>
											<div class="col-md-6 col-sm-12">
												<div class="form-group">
															<label>Customer Name</label>
															<input class="form-control form-control-lg" type="text" name="cusName" value="<?php echo $result['Cust_Name'];?>">
														</div>
											</div>
											<div class="col-md-6 col-sm-12">
												<div class="form-group">
															<label>Email</label>
															<input class="form-control form-control-lg" type="text" name="cusmail" value="<?php echo $result['Cust_Email'];?>">
														</div>
											</div>
											<div class="col-md-6 col-sm-12">
												<div class="form-group">
															<label>Contact</label>
															<input class="form-control form-control-lg" type="text" name="cusPhone" value="<?php echo $result['Cust_Phone'];?>">
														</div>
											</div>
											<div class="col-md-12 col-sm-12">
												<div class="form-group">
															<label>Address</label>
															<input class="form-control form-control-lg" type="text" name="cusAdd" value="<?php echo $result['Cust_Address'];?>">
														</div>
											</div>
											<div class="col-md-12 col-sm-12">
												<div class="form-group">
															<label>Description</label>
															<input class="form-control form-control-lg" type="text" name="cusdesc" value="<?php echo $result['Cust_Desc'];?>">
														</div>
											</div>

											<!-- <div class="col-md-6 col-sm-12">
												<div class="form-group">
															<label>Password</label>
															<input class="form-control form-control-lg" type="password" name="cuspass" value="<?php echo $result['Cust_Password'];?>">
														</div>
											</div> -->
											<div class="col-md-12 col-sm-12">
												<div class="form-group">
															<label>Profile</label>
															<input class="form-control form-control-lg" type="file" name="cusprofile" value="<?php echo $result['Cust_Img'];?>">
														</div>
											</div>
								            <div class="col-md-12 col-sm-12">
                                      			<div class="form-group">
													</br>
													<a href="clients.php"><i class="dw dw-left-arrow-5" style="font-size: 2em;"></i></a>
                                    			</div>
                                			</div>
                            		</div>
                        </form>
                    </div>
    <?php } ?>
</form>
   </body>
   </html>