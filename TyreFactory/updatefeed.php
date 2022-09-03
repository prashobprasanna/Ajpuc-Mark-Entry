<?php
session_start();
extract($_REQUEST);
include("connection.php");
if(isset($_POST['update']))

{
  $feedback=$_SESSION['feedback_Id'];
  $cusname=$_POST['cusid'];
  $billid=$_POST['billid'];
  $date=$_POST['date'];
  $comment=$_POST['comment'];

   $sql="update tblfeedback set Cust_Id='$cusname',bill_Id='$billid',feedback_Date='$date',comment='$comment' where feedback_Id=$feedback";
  

   $result=$con->query($sql);

   if($result==true)
   {

      echo "<script> alert('Record Updated');</script>";
      header('location: feedback.php');
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
                    $_SESSION['feedback_Id']=$feedback_Id;
                    $sql=mysqli_query($con,"SELECT * FROM  tblfeedback where feedback_Id=$feedback_Id");
                    if($result= mysqli_fetch_assoc($sql))
                    {
                ?>

                            <form action="" method="post">
                            <div class="input-group custom">
                            <div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Customer Id</label>
																<input class="form-control form-control-lg" type="text" name="cusid" readonly="readonly" value="<?php echo $result['Cust_Id'];?>">
															</div>
												</div>
												<div class="col-md-12 col-sm-12">
													<div class="form-group">
																<label>Bill Id</label>
																<input class="form-control form-control-lg" type="text" name="billid"  value="<?php echo $result['bill_Id'];?>">
																
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Date</label>
																<input class="form-control form-control-lg" type="date" name="date" value="<?php echo $result['feedback_Date'];?>" >
															</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group">
																<label>Comment</label>
                                                                <textarea class="form-control form-control-lg" name="comment" value="<?php echo $result['comment'];?>"><?php echo $result['comment'];?></textarea>
															</div>
												</div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Update" name="update" >
                                            </br>
											</br>
											<a href="feedback.php"><i class="dw dw-left-arrow-5" style="font-size: 2em;"></i></a>
                                        </div>
                            </div>
                            </div>
                        </form>
                    </div>
             <!--   </div>
            </div>
        </div>
    </div> -->
    <?php } ?>
</form>
   </body>
   </html>