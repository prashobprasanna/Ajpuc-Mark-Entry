<?php
session_start();
extract($_REQUEST);
include("connection.php");
if(isset($_POST['changePass']))

{

    if($_POST['pass']==$_POST['pass2'])
   {
//   echo $_SESSION['custname'];
//   echo $_SESSION['empname'];
//   echo $_SESSION['admin'];
if(isset($_SESSION['user']))
{
      $radio1=$_SESSION['user'];
      $users1=$_SESSION['users1'];
   $pass1=$_POST['pass'];
if($radio1=="tbladmin")
{

 $sql1="update tbladmin set Password='$pass1' where Email='$users1'";
}
else if($radio1=="tblcustomer")
{
	//mysqli_query($con,"SELECT * FROM tblcustomer");
 $sql1="update tblcustomer set Cust_Password='$pass1' where Cust_Email='$users1'"; 
}
elseif($radio1=="tblsupplier")
{

 $sql1="update tblsuppiler set Sup_Password='$pass1' where Sup_Email='$users1'"; 

}
else if($radio1=="tblemployee")
{

 $sql1="update tblemployee set Emp_Password='$pass1' where Emp_Email='$users1'";
}
   
 

   $result=$con->query($sql1);

   if($result==true)
   {

      echo "<script>alert('Record Updated');</script>";
      header('location: index.php');
    }
    else 
    {
    echo "<script>alert('Could not Update the record');</script>";
    header('location: changePass.php');
    }
}
else
{
echo "<script>alert('password do not match');</script>";

}
}
 } ?>
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
                //     $i=1;
                // //	$emps=$_GET['Emp_Id'];
                // $radio1=$_SESSION['user'];
                // $users1=$_SESSION['users1'];

                // if($radio1=="tbladmin")
                // {
                
                //     $sql=mysqli_query($con,"SELECT * FROM tbladmin where bill_Id=$bill_Id");
                //     if($result= mysqli_fetch_assoc($sql))
                //     {
                // ?>
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
																<label> New Password</label>
                                                                <input class="form-control form-control-lg" type="password" name="pass">                        
															</div>
												</div>

												
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Confirm Password</label>
																<input class="form-control form-control-lg" type="password" name="pass2">
															</div>
												</div> 
												 
												
											
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Update" name="changePass" >
                                             </br></br>
                                            <a href="index.php"><i class="dw dw-left-arrow-5" style="font-size: 2em;"></i></a>
                                        </div>
                            </div>
                            </div>
                        </form>
                    </div>
             <!--   </div>
            </div>
        </div>
    </div> -->
  
</form>

   </body>
   </html>