<?php
session_start();
extract($_REQUEST);
include("connection.php");
if(isset($_POST['updateOrder']))

{
    $emps=$_SESSION['emps'];
    echo $emps;
  
  $expDate=$_POST['expDate'];
  echo $expDate;
  $estimatedAmt=$_POST['amt'];
  echo $estimatedAmt;
  $qty=$_POST['qty'];
  $status=$_POST['status'];
  echo $status;
  $emp=$_POST['empname'];
   //$sql="update tblworkorder orderDate=   ,orderExpected= ,tyreNumber= , vechicleNumber= , sizeId= , companyId= , estimatedAmt= ,patternId= ,Cust_Id= ,service_id= ,vehicletype_id= ,Emp_Id= , service_type= , qty= , status=  
  // where order_Id=$emps";
   //Emp_Add=$address, Emp_Contact=$contact, Emp_Pass=$pass, Emp_Email=$email where Emp_Id=$Emp_Id";

   $sql="update tblworkorder set orderExpected='$expDate' ,estimatedAmt='$estimatedAmt' ,qty= $qty, status='$status', Emp_Id=$emp where order_Id=$emps";


   $result=$con->query($sql);

   if($result==true)
   {

      echo "<script> alert('Record Updated');</script>";
      header('location: work-order.php');
    }
    else 
    echo "<script> alert('Could not Update the record');</script>";
    header('location: work-order.php');
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
                         $_SESSION['emps']=$order_Id;
                    $sql=mysqli_query($con,"SELECT * FROM tblworkorder where order_Id=$order_Id");
                    if($result= mysqli_fetch_assoc($sql))
                    {
                ?>

<form action="" method="post">

<div class="input-group custom">
<div class="col-md-4 col-sm-12">
    <div class="form-group">
                <label>Ordered Date</label>
                <input class="form-control form-control-lg" type="date" name="Odate" readonly="readonly" value="<?php echo $result['orderDate'] ?>">
            </div>
</div>
<div class="col-md-4 col-sm-12">
    <div class="form-group">
                <label>Customer Id</label>
                <input class="form-control form-control-lg" type="text" name="custid" readonly="readonly" placeholder="Enter your Customer Id" value="<?php echo $result['Cust_Id']  ?>">
            </div>
</div>
<div class="col-md-4 col-sm-12">
<div class="form-group">
                <label>Expected Date</label>
                <input class="form-control form-control-lg" type="date" name="expDate" placeholder="Enter your Customer Id" value="<?php echo $result['orderExpected']  ?>">
            </div>
   </div>  
   <div class="col-md-4 col-sm-12">
<div class="form-group">
                <label>Service Name</label>
                <input class="form-control form-control-lg" type="text" name="sname" readonly="readonly" value="<?php echo $result['service_id']  ?>">
            </div>
   </div>    
<div class="col-md-4 col-sm-12">
    <div class="form-group">
    <label>Service Type</label>
                <input class="form-control form-control-lg" type="text" name="serviceType" readonly="readonly" placeholder="Enter" value="<?php echo $result['service_type']  ?>">
    </div>
</div>

<div class="col-md-4 col-sm-12">
    <div class="form-group">
            <label>Quantity</label>
            <input class="form-control form-control-lg" type="text" name="qty" readonly="readonly" placeholder="Enter qty" value="<?php echo $result['qty']  ?>">
    </div>
</div>


<div class="col-md-4 col-sm-12">
    <div class="form-group">
                <label>Vehicle Type</label>
                <input class="form-control form-control-lg" type="text" name="vechicletype" readonly="readonly" placeholder="Enter your Customer Id" value="<?php echo $result['vehicletype_id']  ?>">
            </div>
</div>
<div class="col-md-4 col-sm-12">
    <div class="form-group">
                <label>Vehicle Number</label>
                <input class="form-control form-control-lg" type="text" name="Vnum" readonly="readonly" placeholder="Please enter your vehicle number" value="<?php echo $result['vehicleNumber']  ?>">
            </div>
</div>
<div class="col-md-4 col-sm-12">
    <div class="form-group">
                <label>Tyre Number</label>
                <input class="form-control form-control-lg" type="text" name="Tnum" readonly="readonly" placeholder="Please enter your tyre number" value="<?php echo $result['tyreNumber']  ?>">
            </div>
</div>
<div class="col-md-4 col-sm-12">
    <div class="form-group">
            <label>Techinician</label>
            <!-- <input class="form-control form-control-lg" type="text" name="empid" placeholder="Please enter emp id" value="<?php echo $result['Emp_Id']  ?>"> -->
            <select  class="form-control form-control-lg"  data-style="btn-outline-secondary btn-lg" title="Not Chosen" name="empname" >
															<?php

															session_start();
															extract($_REQUEST);
															include("connection.php");

															//	include('connection.php');
															$i=1;
															$sql=mysqli_query($con,"SELECT * FROM tblemployee");
															while($result1= mysqli_fetch_assoc($sql))
															{
														    ?>
															<option value="<?php echo $result1['Emp_Id'];?>"><?php echo $result1['Emp_Name'];?></option>
				    										<?php } ?>
														    </select>
            </div>
</div>
 <div class="col-md-4 col-sm-12">
    <div class="form-group">
                <label>Tyre Brand</label>
                <input class="form-control form-control-lg" type="text" name="company" readonly="readonly"  value="<?php echo $result['company_Id'] ?>">
            </div>
</div> 
<div class="col-md-4 col-sm-12">

            <div class="form-group">
                <label>Tyre Size</label>
                <input class="form-control form-control-lg" type="text" name="Tnum" readonly="readonly"  value="<?php echo $result['size_Id'] ?>">
         
                
            </div>
</div>
<div class="col-md-4 col-sm-12">
    <div class="form-group">
                <label>Tyre Pattern</label>
                <input class="form-control form-control-lg" type="text" name="pattern" readonly="readonly"  value="<?php echo $result['pattern_Id'] ?>">

            </div>
</div> 

<div class="col-md-4 col-sm-12">
    <div class="form-group">
                <label>Estimated Amount</label>
                <input class="form-control form-control-lg" type="text" name="amt" placeholder="Please enter amt" value="<?php echo $result['estimatedAmt']  ?>">

            </div>
</div> 




<div class="col-md-4 col-sm-12">
													<div class="form-group">
															<label>Status</label>
															<select class="form-control form-control-lg" name="status">
                                                            <option>Pending</option>
															<option>Completed</option>
                                                            <option> Cancelled</option>
                                                            </select>
													</div>
												</div>

<div class="col-md-12 col-sm-12">
    <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update" name="updateOrder"></br></br>
                <a href="work-order.php"><i class="dw dw-left-arrow-5" style="font-size: 2em;"></i></a>
            </div>
</div>
</div>
</form>
<?php } ?>
</div>
</div>
<!-- Simple Datatable End -->
</div>
</div>

   </body>
   </html>