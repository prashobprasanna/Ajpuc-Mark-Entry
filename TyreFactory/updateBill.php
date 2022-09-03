<?php
session_start();
extract($_REQUEST);
include("connection.php");
if(isset($_POST['updateBill']))

{
    $emps=$_SESSION['emps'];
  $status=$_POST['status'];
  $paidDate=$_POST['paidDate'];
  $servicec=$_POST['servicecharge'];
   $labour=$_POST['labour'];
//   $desc=$_POST['techdesc'];
   $remark=$_POST['remark'];
   $sql="update tblbill set billStatus='$status', paidDate='$paidDate', remark='$remark', servicec=$servicec, labour=$labour  where bill_Id=$emps";
   //Emp_Add=$address, Emp_Contact=$contact, Emp_Pass=$pass, Emp_Email=$email where Emp_Id=$Emp_Id";

   $result=$con->query($sql);

   if($result==true)
   {

      echo "<script> alert('Record Updated');</script>";
      header('location: payment.php');
    }
    else 
    echo "<script> alert('Could not Update the record');</script>";
}

   ?>
   <!DOCTYPE html>
   <html lang="en">
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
                //	include('connection.php');
                    $i=1;
                //	$emps=$_GET['Emp_Id'];
                         $_SESSION['emps']=$bill_Id;
                    $sql=mysqli_query($con,"SELECT * FROM tblbill where bill_Id=$bill_Id");
                    if($result= mysqli_fetch_assoc($sql))
                    {
                ?>
<!-- <div class="col-md-12 col-sm-12 mb-30">
        <div class="modal fade" id="update_technician" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class=" border-radius-10">
                        <div class="login-title"><br>
                            <div class="col-md-12 col-sm-12 mb-30">
                            <h2 class="text-center text-primary">Update Technician</h2>
                            </div> -->
                            <form action="" method="post">

                            

                            <div class="input-group custom">
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label> Price</label>
                                                                <input class="form-control form-control-lg" type="text" name="status" value="<?php echo $result['billAmt'];?>">                        
															</div>
												</div>

												
												<!-- <div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Bill Amount</label>
																<input class="form-control form-control-lg" type="text" name="amt" value="<?php echo $abc; ?>">
															</div>
												</div> -->
												 
												
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Status</label>
																<input class="form-control form-control-lg" type="text" name="status" value="<?php echo $result['billStatus'];?>">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Date of Billing</label>
																<input class="form-control form-control-lg" type="date" readonly="readonly" name="billdate" value="<?php echo $result['billDate'];?>">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Paid Date</label>
																<input class="form-control form-control-lg" type="date" name="paidDate" value="<?php echo $result['paidDate'];?>">
															</div>
												</div>

                                                <div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Labour Charge</label>
																<input class="form-control form-control-lg" type="text" name="labour">
															</div>
												</div>

                                                <div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Service Charge</label>
																<input class="form-control form-control-lg" type="text" name="servicecharge">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Remarks</label>
																<input class="form-control form-control-lg" type="text" name="remark" value="<?php echo $result['remark'];?>">
															</div>
												</div>
											
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Update" name="updateBill" >
                                            <a href="payment.php"><i class="dw dw-left-arrow-5" style="font-size: 2em;"></i></a>
                                        </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </form>
            <?php } ?>
        </body>
   </html>