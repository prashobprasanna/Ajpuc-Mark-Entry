<?php
session_start();
extract($_REQUEST);
include("connection.php");
if(isset($_POST['update']))

{
  $company_Id=$_SESSION['company_Id'];
  $name=$_POST['companyname'];
  $desc=$_POST['desc'];
  
   $sql="update tblbrand set companyName='$name', Description='$desc' where company_Id=$company_Id";
  

   $result=$con->query($sql);

   if($result==true)
   {

      echo "<script> alert('Record Updated');</script>";
      header('location: brands.php');
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
	<title>Tyre  Factory Management System</title>

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
              
                    $i=1;
                    $_SESSION['company_Id']=$company_Id;
                    $sql=mysqli_query($con,"SELECT * FROM tblbrand where company_Id=$company_Id");
                    if($result= mysqli_fetch_assoc($sql))
                    {
                ?>

                            <form action="" method="post">
                            <div class="input-group custom">
                            <div class="input-group custom">
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Brand Name</label>
																<input class="form-control form-control-lg" type="text" name="companyname"  value="<?php echo $result['companyName']?>">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Description</label>
																<textarea class="form-control form-control-lg" name="desc" rows="3" cols="15" value="<?php echo $result['Description']?>"><?php echo $result['Description']?></textarea>
															</div>
												</div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Update" name="update" >
                                            </br>
											</br>
											 <a href="brands.php"><i class="dw dw-left-arrow-5" style="font-size: 2em;"></i></a>
                                        </div>
                            </div>
                            </div>
                        </form>
                    </div>
    <?php } ?>
</form>
   </body>
   </html>