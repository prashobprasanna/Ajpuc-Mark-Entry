<?php
session_start();
extract($_REQUEST);
include("connection.php");
if(isset($_POST['updateAtt']))

{
    
  
  $emps = $_SESSION['emps']; 
  $attdate=$_POST['attdate'];
  //echo $estimatedAmt;
 
  $attstatus=$_POST['attstatus'];
  //echo $status;
    $sql="update tblattendence set AttDate='$attdate' ,AttStatus='$attstatus' where attendence_Id=$emps";


   $result=$con->query($sql);

   if($result==true)
   {

      echo "<script> alert('Record Updated');</script>";
      header('location: attendence.php');
    }
    else 
    {
    echo "<script> alert('Could not Update the record');</script>";
    header('location: index.php');
    }
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
                    $sql=mysqli_query($con,"SELECT * FROM tblattendence where attendence_Id='$order_Id'");
                    if($result= mysqli_fetch_assoc($sql))
                    {
                ?>

                            <form action="" method="post">

                            <div class="input-group custom">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
													<label>Employee Id</label>
													<input class="form-control form-control-lg" type="text" name="empid" value="<?php echo $result['Emp_Id'] ?>">
												</div>
									</div>
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
													<label>Date</label>
													<input class="form-control form-control-lg" type="date" name="attdate" value="<?php echo $result['AttDate'] ?>">
												</div>
									</div>
									<!-- <div class="col-md-12 col-sm-12">
										<div class="form-group">
													<label>Status</label>
													<input type="text" class="form-control form-control-lg"  name="attstatus" value="<?php echo $result['AttStatus'] ?>">
                                                    
                                                    
												</div>
									</div> -->
                                    <div class="col-md-12 col-sm-12">
										<div class="form-group">
													<label>Status</label>
													<select class="form-control form-control-lg" type="text" name="attstatus">
                                                        <option value="<?php echo $result['AttStatus'] ?> "><?php echo $result['AttStatus'] ?></option>
														<option>ABSENT</option>
														<option>PRESENT</option>
														<option>HOLIDAY</option>
													 </select>
												</div>
									</div>
<div class="col-md-12 col-sm-12">
    <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update" name="updateAtt">
                <input type="submit" class="btn btn-danger" value="Cancel">
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